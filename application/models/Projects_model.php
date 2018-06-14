<?php

class Projects_model extends CI_Model {

  public function add_file($id_project, $filename, $filepath) {
    $project_file=array(
      'id_project'=>$id_project,
      'filepath'=>$filepath,
      'filename'=>$filename
    );
    $this->db->insert("projects_files", $project_file);
  }

  public function approve_project($id_project) {
    $this->db->where('id_project', $id_project);
    $this->db->update("projects", array("status"=>"ACTIVE"));
  }

  public function disapprove_project($id_project) {
    $this->db->where('id_project', $id_project);
    $this->db->update("projects", array("status"=>"DISAPPROVED"));
  }

  public function update($project) {
    $sql = "SELECT * FROM projects WHERE id_project='".$this->db->escape_str($project["id_project"])."'";
    $query = $this->db->query($sql);
    if ($query->num_rows() == 0) {
      return false;
    }
    $results = $query->row_array();
    if ($results["id_user"] != $_SESSION["id_user"]) {
      return false;
    }
    $this->db->where('id_project', $project["id_project"]);
    unset($project["id_project"]);
    $this->db->update("projects", $project);
  }

  public function create($project) {
    $project["id_user"]=$_SESSION["id_user"];
    $project["visibility"]="PUBLIC";
    $project["status"]="NEW";
    $project["uuid"]=sha1(uniqid());
    $project["creationdate"]=date("Y/m/d H:i");
    $this->db->insert("projects", $project);
    $activity = array();

    $activity["id_user"] = $_SESSION["id_user"];
    $activity["creationdate"] = date("Y/m/d H:i");
    $activity["activity"] = "New project posted, good luck everyone!";
    $this->db->insert("activity", $activity);

    return $this->db->insert_id();
  }

  public function get_project_uuid($uuid) {

    $sql = "SELECT projects.*, categories.category_label FROM projects
    LEFT JOIN categories ON categories.id_category = projects.id_category
    WHERE projects.uuid='".$this->db->escape_str($uuid)."'";
    $query = $this->db->query($sql);
    if ($query->num_rows() == 0) {
      return false;
    }
    $results = $query->row_array();
    return $results;

  }

  public function delete_file($id_project, $filepath) {
    $sql = "DELETE FROM projects_files WHERE id_project='".$this->db->escape_str($id_project)."' AND filepath='".$this->db->escape_str($filepath)."'";
    $this->db->query($sql);
  }

  public function get_project_file($filepath) {
    $sql = "SELECT * FROM projects_files WHERE filepath='".$this->db->escape_str($filepath)."'";
    $query = $this->db->query($sql);

    $results = $query->row_array();
    return $results;
  }

  public function delete($id_project) {
    $sql = "DELETE FROM projects WHERE id_project='".$this->db->escape_str($id_project)."'";
    $this->db->query($sql);
  }

  public function get_project_files($id_project) {
    $sql = "SELECT * FROM projects_files WHERE id_project='".$this->db->escape_str($id_project)."'";
    $query = $this->db->query($sql);

    $results = array();

    foreach ($query->result_array() as $row) {
      $results[]=$row;
    }

    return $results;
  }

  public function get_project_submissions($id_project) {
    $sql = "SELECT jobs.*,users.fullname FROM jobs
    LEFT JOIN users ON users.id_user = jobs.id_user
    WHERE jobs.id_project='".$this->db->escape_str($id_project)."'";
    $query = $this->db->query($sql);

    $results = array();

    foreach ($query->result_array() as $row) {
      $results[]=$row;
    }

    return $results;
  }

  public function get_project($id_project) {

    $sql = "SELECT projects.*, categories.category_label, category_groups.group_label, users.fullname FROM projects
    LEFT JOIN users ON users.id_user = projects.id_user
    LEFT JOIN categories ON categories.id_category = projects.id_category
    LEFT JOIN category_groups ON category_groups.id_group = categories.id_group
    WHERE projects.id_project='".$this->db->escape_str($id_project)."'";
    $query = $this->db->query($sql);
    if ($query->num_rows() == 0) {
      return false;
    }
    $results = $query->row_array();
    return $results;

  }

  public function get_categories() {
    $sql = "SELECT * FROM category_groups ORDER BY group_label ASC";
    $query = $this->db->query($sql);

    $results = array();

    foreach ($query->result_array() as $row) {
      $results[$row["group_label"]]=$row;
      $results[$row["group_label"]]["categories"]=array();
      $sql = "SELECT * FROM categories WHERE id_group='".$row["id_group"]."'";
      $query_cat = $this->db->query($sql);
      foreach ($query_cat->result_array() as $row_cat) {
        $results[$row["group_label"]]["categories"][]=$row_cat;
      }
    }

    return $results;
  }

  public function projects_list($search_query, $page = 1) {

    $id_user = $_SESSION["id_user"];

    $whereClause = " WHERE status!='NEW' AND status!='DISAPPROVED' AND id_user!='$id_user' ";

    if (!empty($search_query["query"])) {
      $keywords = explode(" ", $this->db->escape_str($search_query["query"]));
      if (count($keywords) > 0) {
        foreach($keywords as $keyword) {
          $whereClause .= " AND ( projects.title LIKE '%$keyword%' OR projects.description LIKE '%$keyword%' ) ";
        }
      }
    }

    if (!empty($search_query["id_category"])) {
      if ($search_query["id_category"] != "ALL") {
        $whereClause .= " AND ( projects.id_category = '".$this->db->escape_str($search_query["id_category"])."' ) ";
      }
    }

    if (!empty($search_query["skills"])) {
      $skills = explode(",", $this->db->escape_str($search_query["skills"]));
      if (count($skills) > 0) {
        foreach($skills as $skill) {
          $whereClause .= " AND ( projects.skills LIKE '%$skill%' ) ";
        }
      }
    }

    $sql = " SELECT COUNT(id_project) AS TOTAL FROM projects $whereClause ";
    $query = $this->db->query($sql);
    $row = $query->row_array();
    $total = $row["TOTAL"];

    $limit_start = ( $page - 1 ) * 5;
    $limit_stop = 5;

    $sql = "SELECT projects.*, categories.category_label FROM projects
    LEFT JOIN categories ON categories.id_category = projects.id_category
    $whereClause LIMIT $limit_start, $limit_stop";
    $query = $this->db->query($sql);

    $results = array();

    foreach ($query->result_array() as $row) {
      $results[]=$row;
    }

    return array("rows"=>$results, "total"=>$total);

  }

  public function list_all_new() {
    $sql = "SELECT * FROM projects WHERE status='NEW'";
    $query = $this->db->query($sql);

    $results = array();

    foreach ($query->result_array() as $row) {
      $results[]=$row;
    }

    return $results;
  }

  public function myprojects_list($page = 1) {

    $id_user = $_SESSION["id_user"];

    $sql = "SELECT COUNT(id_project) AS TOTAL FROM projects WHERE id_user='$id_user'";
    $query = $this->db->query($sql);
    $row = $query->row_array();
    $total = $row["TOTAL"];

    $limit_start = ( $page - 1 ) * 5;
    $limit_stop = 5;

    $sql = "SELECT projects.*, categories.category_label FROM projects
    LEFT JOIN categories ON categories.id_category = projects.id_category
    WHERE id_user='$id_user' LIMIT $limit_start, $limit_stop";
    $query = $this->db->query($sql);

    $results = array();

    foreach ($query->result_array() as $row) {
      if ($row["status"] == "ASSIGNED") {
        $sql = "SELECT * FROM jobs WHERE status='ACCEPTED' AND id_project='".$row["id_project"]."'";

        $query_assigned = $this->db->query($sql);
        $results_assigned = $query_assigned->row_array();
        $row["id_job_assigned"] = $results_assigned["id_job"];
      }

      $results[]=$row;
    }

    return array("rows"=>$results, "total"=>$total);

  }

}
