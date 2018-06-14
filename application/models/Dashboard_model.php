<?php

class Dashboard_model extends CI_Model {

  public function activity() {
    $results = array();
    $sql = "SELECT activity.*, users.fullname, users.profile_picture FROM activity
    LEFT JOIN users ON users.id_user = activity.id_user
    ORDER BY activity.creationdate DESC LIMIT 10";
    $query = $this->db->query($sql);
    foreach ($query->result_array() as $row) {
      $results[]=$row;
    }
    return $results;
  }

  public function registration_total() {
    $sql = "SELECT count(id_user) AS TOTAL FROM users";
    $query = $this->db->query($sql);
    $results = $query->row_array();
    return $results["TOTAL"];
  }

  public function registration_today() {
    $sql = "SELECT count(id_user) AS TOTAL FROM users WHERE creationdate LIKE '".date("Y/m/d")."%'";
    $query = $this->db->query($sql);
    $results = $query->row_array();
    return $results["TOTAL"];
  }

}
