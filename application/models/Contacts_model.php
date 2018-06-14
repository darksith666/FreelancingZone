<?php

class Contacts_model extends CI_Model {

  public function connect_request($id_user) {
    $id_user_me = $_SESSION["id_user"];

    $this->db->delete('users_contacts', array('id_user_contact' => $id_user, 'id_user' => $id_user_me));
    $contact = array(
      'id_user_contact' => $id_user,
      'status' => "CONNECTED",
      'id_user' => $id_user_me
    );
    $this->db->insert("users_contacts", $contact);

    $this->db->delete('users_contacts', array('id_user' => $id_user, 'id_user_contact' => $id_user_me));
    $contact = array(
      'id_user' => $id_user,
      'status' => "REQUEST",
      'id_user_contact' => $id_user_me
    );
    $this->db->insert("users_contacts", $contact);

    $notification = "I want to connect :)";
    $this->db->insert("notifications", array('notification'=>$notification, 'id_user_source'=>$_SESSION["id_user"], 'id_user_destination'=>$id_user, 'status'=>'NEW'));
  }

  public function send_message($id_user, $msg) {
    $id_user_me = $_SESSION["id_user"];

    $sql = "SELECT * FROM users_contacts WHERE id_user='$id_user_me' AND id_user_contact='$id_user' AND status='CONNECTED'";
    $query = $this->db->query($sql);

    if ($query->num_rows() == 0) {
      return;
    }

    $chat = array(
      'message' => $this->db->escape_str($msg),
      'creationdate' => date("Y/m/d H:i"),
      'id_user_destination' => $this->db->escape_str($id_user),
      'id_user_source' => $_SESSION["id_user"]
    );
    $this->db->insert("chat", $chat);
  }

  public function is_contact_connected($id_user) {
    $id_user_me = $_SESSION["id_user"];

    $sql = "SELECT * FROM users_contacts WHERE
    (
      ( id_user='".$this->db->escape_str($id_user)."' AND id_user_contact='$id_user_me' )
      OR
      ( id_user_contact='".$this->db->escape_str($id_user)."' AND id_user='$id_user_me' )
    )
    AND ( status!='REQUEST' ) ";
    $query = $this->db->query($sql);
    if ($query->num_rows() == 2) {
      return true;
    }
    return false;
  }

  public function has_request_from_contact($id_user) {
    $id_user_me = $_SESSION["id_user"];
    $sql = "SELECT * FROM users_contacts WHERE id_user_contact='".$this->db->escape_str($id_user)."' AND id_user='$id_user_me' AND status='REQUEST'";
    $query = $this->db->query($sql);
    if ($query->num_rows() == 0) {
      return false;
    }
    return true;
  }

  public function has_request_from_me($id_user) {
    $id_user_me = $_SESSION["id_user"];
    $sql = "SELECT * FROM users_contacts WHERE id_user='".$this->db->escape_str($id_user)."' AND id_user_contact='$id_user_me' AND status='REQUEST'";
    $query = $this->db->query($sql);
    if ($query->num_rows() == 0) {
      return false;
    }
    return true;
  }

  public function is_contact($id_user) {
    $id_user_me = $_SESSION["id_user"];
    $sql = "SELECT * FROM users_contacts WHERE id_user_contact='".$this->db->escape_str($id_user)."' AND id_user='$id_user_me'";
    $query = $this->db->query($sql);
    if ($query->num_rows() == 0) {
      return false;
    }
    return true;
  }

  public function has_blocked_me($id_user) {
    $id_user_me = $_SESSION["id_user"];
    $sql = "SELECT * FROM users_contacts WHERE id_user='".$this->db->escape_str($id_user)."' AND id_user_contact='$id_user_me'";
    $query = $this->db->query($sql);
    if ($query->num_rows() == 0) {
      return false;
    }
    $results = $query->row_array();
    if ($results["status"] == "BLOCKED") {
      return true;
    }
    return false;
  }

  public function get_contact($id_user) {
    $id_user_me = $_SESSION["id_user"];
    $sql = "SELECT * FROM users_contacts WHERE id_user='$id_user_me' AND id_user_contact='".$this->db->escape_str($id_user)."'";
    $query = $this->db->query($sql);
    if ($query->num_rows() == 0) {
      return false;
    }
    $results = $query->row_array();
    return $results;
  }

  public function accept_connection($id_user) {
    $this->db->where('id_user', $_SESSION["id_user"]);
    $this->db->where('id_user_contact', $id_user);
    $this->db->update("users_contacts", array('status'=>'CONNECTED'));

    $notification = "Connection request accepted.";
    $this->db->insert("notifications", array('notification'=>$notification, 'id_user_source'=>$_SESSION["id_user"], 'id_user_destination'=>$id_user, 'status'=>'NEW'));
  }

  public function unblock($id_user) {
    $this->db->where('id_user', $_SESSION["id_user"]);
    $this->db->where('id_user_contact', $id_user);
    $this->db->update("users_contacts", array('status'=>'CONNECTED'));
    $notification = "I have unblocked you.";
    $this->db->insert("notifications", array('notification'=>$notification, 'id_user_source'=>$_SESSION["id_user"], 'id_user_destination'=>$id_user, 'status'=>'NEW'));
  }

  public function block($id_user) {
    $this->db->where('id_user', $_SESSION["id_user"]);
    $this->db->where('id_user_contact', $id_user);
    $this->db->update("users_contacts", array('status'=>'BLOCKED'));
    $notification = "I have blocked you.";
    $this->db->insert("notifications", array('notification'=>$notification, 'id_user_source'=>$_SESSION["id_user"], 'id_user_destination'=>$id_user, 'status'=>'NEW'));
  }

  public function connect($id_user) {

    $id_user_me = $_SESSION["id_user"];

    $sql = "SELECT jobs.* FROM jobs
    LEFT JOIN projects ON projects.id_project = jobs.id_project
    WHERE jobs.id_user='$id_user' AND projects.id_user = '$id_user_me'";

    $query = $this->db->query($sql);

    if ($query->num_rows() == 0) {
      return false;
    }

    if ($this->has_blocked_me($id_user)) {
      return false;
    }

    $this->db->delete('users_contacts', array('id_user_contact' => $id_user, 'id_user' => $id_user_me));
    $contact = array(
      'id_user_contact' => $id_user,
      'status' => "CONNECTED",
      'id_user' => $id_user_me
    );
    $this->db->insert("users_contacts", $contact);

    $this->db->delete('users_contacts', array('id_user' => $id_user, 'id_user_contact' => $id_user_me));
    $contact = array(
      'id_user' => $id_user,
      'status' => "CONNECTED",
      'id_user_contact' => $id_user_me
    );
    $this->db->insert("users_contacts", $contact);

    $notification = "You have a new contact.";
    $this->db->insert("notifications", array('notification'=>$notification, 'id_user_source'=>$_SESSION["id_user"], 'id_user_destination'=>$id_user, 'status'=>'NEW'));

    return true;
  }

  public function chat_messages($id_user) {

    $id_user_me = $_SESSION["id_user"];

    $sql = "SELECT

    chat.*,

    users_source.fullname as source_fullname,

    users_source.profile_picture as source_profile_picture,

    users_destination.fullname as destination_fullname,

    users_destination.profile_picture as destination_profile_picture

    FROM chat

    LEFT JOIN users AS users_source ON users_source.id_user = chat.id_user_source

    LEFT JOIN users AS users_destination ON users_destination.id_user = chat.id_user_destination

    WHERE

    (chat.id_user_source='$id_user' AND chat.id_user_destination='$id_user_me')

    OR

    (chat.id_user_source='$id_user_me' AND chat.id_user_destination='$id_user')

    ORDER BY chat.creationdate ASC

    ";

    $query = $this->db->query($sql);

    $results = array();

    foreach ($query->result_array() as $row) {
      if ($row["id_user_source"] == $id_user_me) {
        $row["from"] = "me";
      } else {
        $row["from"] = "contact";
      }
      $results[]=$row;
    }

    return $results;

  }

  public function freelancers_list($page = 1) {

    $id_user_me = $_SESSION["id_user"];

    $whereClause = " WHERE users_contacts.id_user='$id_user_me' ";

    $sql = " SELECT COUNT(users_contacts.id_contact) AS TOTAL FROM users_contacts $whereClause ";
    $query = $this->db->query($sql);
    $row = $query->row_array();
    $total = $row["TOTAL"];

    $limit_start = ( $page - 1 ) * 5;
    $limit_stop = 5;

    $sql = "SELECT users.*, users_contacts.status as my_contact_status FROM users_contacts
    LEFT JOIN users ON users.id_user = users_contacts.id_user_contact
    $whereClause LIMIT $limit_start, $limit_stop";
    $query = $this->db->query($sql);

    $results = array();

    foreach ($query->result_array() as $row) {
      $sql = "SELECT * FROM users_contacts WHERE id_user='".$row["id_user"]."' AND id_user_contact='$id_user_me'";
      $query_contact = $this->db->query($sql);
      $results_contact = $query_contact->row_array();
      $row["contact_status"] = $results_contact["status"];
      $results[]=$row;
    }

    return array("rows"=>$results, "total"=>$total);

  }

}
