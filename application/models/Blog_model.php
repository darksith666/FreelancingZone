<?php

class Blog_model extends CI_Model {

  public function delete_post($id_blog) {
    $sql = "DELETE FROM blog WHERE id_blog='".$this->db->escape_str($id_blog)."'";
    $this->db->query($sql);
  }

  public function get_post($id_blog) {
    $sql = "SELECT * FROM blog WHERE id_blog='".$this->db->escape_str($id_blog)."'";
    $query = $this->db->query($sql);
    return $query->row_array();
  }

  public function create_post() {
    $post=array(
      'creationdate'=>date("F j, Y"),
      'author'=>"Max",
      'status'=>'HIDDEN'
    );
    $this->db->insert("blog", $post);
    return $this->db->insert_id();
  }

  public function update($post) {
    $this->db->where('id_blog', $post["id_blog"]);
    unset($post["id_blog"]);
    $this->db->update("blog", $post);
  }

  public function posts_list_all() {

    $sql = "SELECT blog.* FROM blog ORDER BY creationdate DESC";
    $query = $this->db->query($sql);

    $results = array();

    foreach ($query->result_array() as $row) {
      $results[]=$row;
    }

    return $results;

  }

  public function posts_list($page = 1) {

    $sql = " SELECT COUNT(blog.id_blog) AS TOTAL FROM blog WHERE status='PUBLIC'";
    $query = $this->db->query($sql);
    $row = $query->row_array();
    $total = $row["TOTAL"];

    $limit_start = ( $page - 1 ) * 5;
    $limit_stop = 5;

    $sql = "SELECT blog.* FROM blog  WHERE status='PUBLIC' ORDER BY creationdate DESC LIMIT $limit_start, $limit_stop";
    $query = $this->db->query($sql);

    $results = array();

    foreach ($query->result_array() as $row) {
      $results[]=$row;
    }

    return array("rows"=>$results, "total"=>$total);

  }

}
