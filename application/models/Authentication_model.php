<?php


class Authentication_model extends CI_Model {

  public function logout() {
    $_SESSION["authenticated"] = false;
    session_destroy();
  }

  public function is_auth() {

    if ($_SESSION["authenticated"] === true) {
      return true;
    }

    return false;
  }

  public function auth($email, $password) {

    $this->db->query("DELETE FROM ci_sessions WHERE ci_sessions.timestamp < ".strtotime("-12 hours")."");

    $query = $this->db->query("SELECT * FROM users WHERE email='".$this->db->escape_str($email)."' AND status='ACTIVE'");
    if ($query->num_rows()) {
      $row = $query->row_array();
      $passwordhash = $row["password"];
      $id_user = $row["id_user"];
      $fullname = $row["fullname"];
      $profile_picture = $row["profile_picture"];
      if (password_verify($password, $passwordhash)) {
        $_SESSION["authenticated"] = true;
        $_SESSION["email"] = $email;
        $_SESSION["fullname"] = $fullname;
        $_SESSION["id_user"] = $id_user;
        $_SESSION["profile_picture"] = $profile_picture;
        return true;
      }
    }

    return false;
  }

  public function facebook_register($facebook_id, $email, $fullname, $profile_picture_url) {
    $this->db->query("DELETE FROM ci_sessions WHERE ci_sessions.timestamp < ".strtotime("-12 hours")."");
    
    $query = $this->db->query("SELECT * FROM users WHERE facebook_id='".$this->db->escape_str(trim($facebook_id))."'");
    //print_r($query->num_rows());
    //die();
    if ($query->num_rows() == 0) {
      $profile_picture_large = "https://graph.facebook.com/$facebook_id/picture?type=large";
      $profile_picture_data = file_get_contents($profile_picture_large);
      $profile_picture_url = explode("?", $profile_picture_url)[0];
      $filename=basename($profile_picture_url);
      $extension = strtolower(pathinfo($filename)['extension']);
      $new_filename = md5(uniqid().time().$filename).".$extension";
      $new_image_path = FCPATH."resources/uploads/profile_pictures/$new_filename";
      file_put_contents($new_image_path, $profile_picture_data);
      $user["password"] = '';
      $user["status"] = "ACTIVE";
      $user["creationdate"] = date("Y/m/d H:i");
      $user["email"] = $email;
      $user["fullname"] = $fullname;
      $user["email_visibility"] = "PUBLIC";
      $user["summary"] = "New freelancer";
      $user["email_verified"] = "YES";
      $user["profile_picture"] = $new_filename;
      $user["facebook_id"] = $facebook_id;
      $this->db->insert("users", $user);
      $new_id_user = $this->db->insert_id();

      $activity = array();
      $activity["id_user"] = $new_id_user;
      $activity["creationdate"] = date("Y/m/d H:i");
      $activity["activity"] = "New user sign up, welcome aboard!";
      $this->db->insert("activity", $activity);

      return array("id_user"=>$new_id_user, "profile_picture"=>$new_filename, "new_from_fb"=>true);
    }

    $row = $query->row_array();

    return array("id_user"=>$row["id_user"], "profile_picture"=>$row["profile_picture"], "new_from_fb"=>false);
  }

  public function register($user) {
    $query = $this->db->query("SELECT * FROM users WHERE email='".$this->db->escape_str(trim($user["email"]))."'");
    //print_r($query->num_rows());
    //die();
    if ($query->num_rows() > 0) {
      return false;
    }
    $hash = md5(uniqid().time());
    $user["password"] = password_hash($user["password"], PASSWORD_DEFAULT);
    $user["status"] = "ACTIVE";
    $user["summary"] = "New freelancer";
    $user["email_visibility"] = "PUBLIC";
    $user["creationdate"] = date("Y/m/d H:i");
    $user["email_verified"] = $hash;
    $this->db->insert("users", $user);

    $new_id_user = $this->db->insert_id();

    $activity = array();
    $activity["id_user"] = $new_id_user;
    $activity["creationdate"] = date("Y/m/d H:i");
    $activity["activity"] = "New user sign up, welcome aboard!";
    $this->db->insert("activity", $activity);

    return $hash;
  }

}
