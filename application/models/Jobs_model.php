<?php

class Jobs_model extends CI_Model {

  public function list_tasks() {
    $id_user_me = $_SESSION["id_user"];
    $tasks = array();
    $sql = "SELECT * FROM jobs WHERE status='ACCEPTED' AND id_user='$id_user_me'";
    $query = $this->db->query($sql);

    foreach ($query->result_array() as $row) {
      $milestones = json_decode($row["submission_milestones"], true);
      foreach($milestones as $milestone) {
        if ($milestone["progress"] < 100) {
          $tasks[]= array(
            'milestone' => $milestone,
            'id_job' => $row["id_job"]
          );
        }
      }
    }

    return $tasks;
  }

  public function post_review($job, $project, $review_type, $review_review) {
    $this->db->where('id_job', $job["id_job"]);
    $this->db->update("jobs", array('employer_reviewed'=>"YES"));

    if (!empty($review_review)) {
      $review = array();
      $review["type"] = $review_type;
      $review["id_user_reviewed"] = $project["id_user"];
      $review["id_user_reviewer"] = $_SESSION["id_user"];
      $review["review"]=$review_review;
      $review["creationdate"]=date("Y/m/d H:i");
      $this->db->insert("reviews", $review);

      $notification = "You have received a positive review.";
      if ($review_type == "NEGATIVE") {
        $notification = "You have received a negative review.";
      }
      $this->db->insert("notifications", array('notification'=>$notification, 'id_user_source'=>$_SESSION["id_user"], 'id_user_destination'=>$project["id_user"], 'status'=>'NEW'));
    }
  }

  public function close_job($job, $status, $review_type, $review_review) {
    $this->db->where('id_job', $job["id_job"]);
    if ($status == "reject") {
      $status = "REJECTED";
    }
    if ($status == "approve") {
      $status="APPROVED";
    }
    $this->db->update("jobs", array('status'=>$status));

    $notification = "Your job was approved.";
    if ($status == "reject") {
      $notification = "Your job was rejected.";
    }
    $this->db->insert("notifications", array('notification'=>$notification, 'id_user_source'=>$_SESSION["id_user"], 'id_user_destination'=>$job["id_user"], 'status'=>'NEW'));

    $this->db->where('id_project', $job["id_project"]);
    $this->db->update("projects", array('status'=>'CLOSED'));

    if (!empty($review_review)) {
      $review = array();
      $review["type"] = $review_type;
      $review["id_user_reviewed"] = $job["id_user"];
      $review["id_user_reviewer"] = $_SESSION["id_user"];
      $review["review"]=$review_review;
      $review["creationdate"]=date("Y/m/d H:i");
      $this->db->insert("reviews", $review);

      $notification = "You have received a positive review.";
      if ($review_type == "NEGATIVE") {
        $notification = "You have received a negative review.";
      }
      $this->db->insert("notifications", array('notification'=>$notification, 'id_user_source'=>$_SESSION["id_user"], 'id_user_destination'=>$job["id_user"], 'status'=>'NEW'));
    }
  }

  public function accept_submission($id_project, $id_job) {
    $this->db->where('id_job', $id_job);
    $this->db->update("jobs", array('status'=>'ACCEPTED'));
    $this->db->where('id_project', $id_project);
    $this->db->update("projects", array('status'=>'ASSIGNED'));

    $job = $this->get_job($id_job);
    $notification = "Your submission was accepted :)";
    $this->db->insert("notifications", array('notification'=>$notification, 'id_user_source'=>$_SESSION["id_user"], 'id_user_destination'=>$job["id_user"], 'status'=>'NEW'));
  }

  public function decline_submission($id_job) {
    $this->db->where('id_job', $id_job);
    $this->db->update("jobs", array('status'=>'DECLINED'));

    $job = $this->get_job($id_job);
    $notification = "Your submission was declined.";
    $this->db->insert("notifications", array('notification'=>$notification, 'id_user_source'=>$_SESSION["id_user"], 'id_user_destination'=>$job["id_user"], 'status'=>'NEW'));
  }


  public function create_job($submission) {
    $sql = "SELECT * FROM projects WHERE id_project='".$submission["id_project"]."' AND status='ACTIVE'";
    $query = $this->db->query($sql);

    if ($query->num_rows() == 0) {
      return;
    }

    $submission["id_user"]=$_SESSION["id_user"];
    $submission["status"]="NEW";
    $submission["creationdate"]=date("Y/m/d H:i");
    $this->db->insert("jobs", $submission);
  }

  public function update_job($job) {
    $this->db->where('id_job', $job["id_job"]);
    unset($job["id_job"]);
    $this->db->update("jobs", $job);
  }

  public function get_job($id_job) {

    $sql = "SELECT jobs.*, users.fullname FROM jobs
    LEFT JOIN users ON users.id_user = jobs.id_user
    WHERE jobs.id_job='".$this->db->escape_str($id_job)."'";
    $query = $this->db->query($sql);
    if ($query->num_rows() == 0) {
      return false;
    }

    $results = $query->row_array();
    if ($results["status"] == "NEW") {
      $sql = "UPDATE jobs SET status='READ' WHERE id_job='".$this->db->escape_str($id_job)."'";
      $this->db->query($sql);
    }

    return $results;

  }

  public function myjobs_list($page = 1) {

    $id_user = $_SESSION["id_user"];

    $sql = "SELECT COUNT(id_job) AS TOTAL FROM jobs WHERE id_user='$id_user'";
    $query = $this->db->query($sql);
    $row = $query->row_array();
    $total = $row["TOTAL"];

    $limit_start = ( $page - 1 ) * 5;
    $limit_stop = 5;

    $sql = "SELECT jobs.*, projects.title FROM jobs
    LEFT JOIN projects ON projects.id_project = jobs.id_project
    WHERE jobs.id_user='$id_user' LIMIT $limit_start, $limit_stop";
    $query = $this->db->query($sql);

    $results = array();

    foreach ($query->result_array() as $row) {
      $results[]=$row;
    }

    return array("rows"=>$results, "total"=>$total);

  }

}
