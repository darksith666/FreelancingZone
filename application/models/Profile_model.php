<?php

class Profile_model extends CI_Model {

  public function delete_skill($id_users_skill) {
    $sql = "DELETE FROM users_skills WHERE id_users_skill='".$this->db->escape_str($id_users_skill)."' AND id_user='".$this->db->escape_str($_SESSION["id_user"])."'";
    $this->db->query($sql);
  }

  public function clear_all_notifications() {
    $this->db->where('id_user_destination', $_SESSION["id_user"]);
    $this->db->update("notifications", array("status"=>"READ"));
  }

  public function clear_notification($id_notification) {
    $this->db->where('id_user_destination', $_SESSION["id_user"]);
    $this->db->where('id_notification', $id_notification);
    $this->db->update("notifications", array("status"=>"READ"));
  }

  public function get_notifications() {
    $id_user_me = $_SESSION["id_user"];
    $sql = "SELECT count(id_notification) AS TOTAL FROM notifications WHERE id_user_destination='$id_user_me' AND status='NEW'";
    $query = $this->db->query($sql);
    $results = $query->row_array();
    $total_notifications = $results["TOTAL"];
    $notifications = array();
    $sql = "SELECT notifications.*, users.fullname, users.profile_picture FROM notifications
    LEFT JOIN users ON users.id_user = notifications.id_user_source
    WHERE notifications.id_user_destination='$id_user_me' AND notifications.status='NEW'
    ORDER BY notifications.creationdate DESC LIMIT 5";
    $query = $this->db->query($sql);
    foreach ($query->result_array() as $row) {
      $notifications[] = $row;
    }

    return array("total"=>$total_notifications,"notifications"=>$notifications);

  }

  public function update_profile_password($new_password) {
    $this->db->where('id_user', $_SESSION["id_user"]);
    $password = password_hash($new_password, PASSWORD_DEFAULT);
    $this->db->update("users", array("password"=>$password));
  }

  public function close_my_account() {
    $this->db->where('id_user', $_SESSION["id_user"]);
    $this->db->update("users", array("status"=>"CLOSED"));
  }

  public function validate_email($hash) {
    $sql = "SELECT * FROM users WHERE email_verified='".$this->db->escape_str($hash)."'";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      $this->db->where('id_user', $_SESSION["id_user"]);
      $this->db->update("users", array("email_verified"=>"YES"));
    }
  }

  public function reset_password($hash, $new_password) {
    $sql = "SELECT * FROM users WHERE password_reset='".$this->db->escape_str($hash)."'";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      $password = password_hash($new_password, PASSWORD_DEFAULT);
      $this->db->where('password_reset', $hash);
      $this->db->update("users", array("password"=>$password, "password_reset"=>""));
    }
  }

  public function reset_email($email) {
    $sql = "SELECT * FROM users WHERE email='".$this->db->escape_str($email)."'";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      $this->db->where('email', $email);
      $hash = md5(uniqid().time());
      $this->db->update("users", array("password_reset"=>$hash));
      return $hash;
    }
    return false;
  }

  public function validate_hash() {
    $this->db->where('id_user', $_SESSION["id_user"]);
    $hash = md5(uniqid().time());
    $this->db->update("users", array("email_verified"=>$hash));
    return $hash;
  }

  public function update_profile($profile) {
    $skills = array();
    foreach($profile["skills"] as $index=>$skill) {
      $skills[]=$skill["skill"];
      $this->db->where('id_users_skill', $skill["id_users_skill"]);
      unset($skill["id_users_skill"]);
      $this->db->update("users_skills", $skill);
    }
    $profile["skills"]=join(',', $skills);

    $this->db->where('id_user', $_SESSION["id_user"]);
    unset($profile["id_user"]);
    unset($profile["nb_work_approved"]);
    unset($profile["nb_work_rejected"]);
    unset($profile["nb_review_negative"]);
    unset($profile["nb_review_positive"]);
    unset($profile["reviews"]);
    unset($profile["id_user"]);

    $this->db->update("users", $profile);
  }

  public function add_skill($id_user) {
    $sql = "INSERT INTO users_skills(id_user, skill, level) VALUES('".$this->db->escape_str($id_user)."','Skill description','0')";
    $this->db->query($sql);
  }

  public function get_profile($id_user) {

    $sql = "SELECT users.* FROM users
    WHERE users.id_user='".$this->db->escape_str($id_user)."'";

    $query = $this->db->query($sql);
    if ($query->num_rows() == 0) {
      return false;
    }

    $results = $query->row_array();

    $results["skills"] = array();
    $sql = "SELECT * FROM users_skills WHERE id_user='".$this->db->escape_str($id_user)."'";
    $query = $this->db->query($sql);
    foreach ($query->result_array() as $row) {
      $results["skills"][]=$row;
    }

    $sql = "SELECT count(id_job) AS TOTAL FROM jobs WHERE id_user='".$this->db->escape_str($id_user)."' AND status='APPROVED'";
    $query = $this->db->query($sql);
    $results_total = $query->row_array();
    $results["nb_work_approved"] = $results_total["TOTAL"];

    $sql = "SELECT count(id_job) AS TOTAL FROM jobs WHERE id_user='".$this->db->escape_str($id_user)."' AND status='REJECTED'";
    $query = $this->db->query($sql);
    $results_total = $query->row_array();
    $results["nb_work_rejected"] = $results_total["TOTAL"];

    $sql = "SELECT count(id_review) AS TOTAL FROM reviews WHERE id_user_reviewed='".$this->db->escape_str($id_user)."' AND type='POSITIVE'";
    $query = $this->db->query($sql);
    $results_total = $query->row_array();
    $results["nb_review_positive"] = $results_total["TOTAL"];

    $sql = "SELECT count(id_review) AS TOTAL FROM reviews WHERE id_user_reviewed='".$this->db->escape_str($id_user)."' AND type='NEGATIVE'";
    $query = $this->db->query($sql);
    $results_total = $query->row_array();
    $results["nb_review_negative"] = $results_total["TOTAL"];

    $results["reviews"] = array();
    $sql = "SELECT reviews.*, users.fullname, users.profile_picture FROM reviews
    LEFT JOIN users ON users.id_user = reviews.id_user_reviewer
    WHERE id_user_reviewed='".$this->db->escape_str($id_user)."'
    ORDER BY reviews.creationdate DESC";
    $query = $this->db->query($sql);
    foreach ($query->result_array() as $row) {
      $results["reviews"][]=$row;
    }

    return $results;

  }

  public function freelancers_list($search_query, $page = 1) {

    $id_user = $_SESSION["id_user"];

    $whereClause = " WHERE users.status='ACTIVE' AND users.id_user != '$id_user'";

    if (!empty($search_query["query"])) {
      $keywords = explode(" ", $this->db->escape_str($search_query["query"]));
      if (count($keywords) > 0) {
        foreach($keywords as $keyword) {
          $whereClause .= " AND ( users.summary LIKE '%$keyword%' OR users.description LIKE '%$keyword%' OR users.location LIKE '%$keyword%' ) ";
        }
      }
    }

    if (!empty($search_query["skills"])) {
      $skills = explode(",", $this->db->escape_str($search_query["skills"]));
      if (count($skills) > 0) {
        foreach($skills as $skill) {
          $whereClause .= " AND ( users.skills LIKE '%$skill%' ) ";
        }
      }
    }

    $sql = " SELECT COUNT(id_user) AS TOTAL FROM users $whereClause ";
    $query = $this->db->query($sql);
    $row = $query->row_array();
    $total = $row["TOTAL"];

    $limit_start = ( $page - 1 ) * 5;
    $limit_stop = 5;

    $sql = "SELECT users.* FROM users
    $whereClause LIMIT $limit_start, $limit_stop";
    $query = $this->db->query($sql);

    $results = array();

    foreach ($query->result_array() as $row) {
      $results[]=$row;
    }

    return array("rows"=>$results, "total"=>$total);

  }
}
