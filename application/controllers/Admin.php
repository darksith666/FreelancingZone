<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('blog_model');
		$this->load->model('projects_model');

		if (
			$_SESSION["authenticated"] != true ||
			$_SESSION["email"] != "maxime.labelle@owasp.org" ||
			$_SESSION["id_user"] != 116
		) {
			redirect("/");
			die();
		}
	}

	public function admin_panel_blog_post_create()	{
		$id_blog = $this->blog_model->create_post();
		redirect("/admin/admin_panel_blog_post_edit/$id_blog");
	}

	public function admin_panel_blog_post_delete($id_blog)	{
		$this->blog_model->delete_post($id_blog);
		redirect("/admin/admin_panel_blog_posts");
	}

	public function admin_panel_blog_post_edit($id_blog)	{
		$post = $this->blog_model->get_post($id_blog);
		if ($this->input->post("action") == "edit") {
			$post["title"] = $this->input->post("title");
			$post["author"] = $this->input->post("author");
			$post["status"] = $this->input->post("status");
			$post["body"] = $this->input->post("body");
			$post["top_image"] = $this->input->post("top_image");

			if (isset($_FILES["file"])) {
				$filename=$_FILES["file"]["name"];
				if ($filename) {
					$tmp_name=$_FILES["file"]["tmp_name"];
					$extension = strtolower(pathinfo($filename)['extension']);

					$new_filename = md5(uniqid().time().$filename).".$extension";
					$new_image_path = FCPATH."resources/uploads/blog_files/$new_filename";

					copy($tmp_name, $new_image_path);

					$post["top_image"] = $new_filename;

					unlink($tmp_name);
				}
			}

			$this->blog_model->update($post);
			$post = $this->blog_model->get_post($id_blog);
		}
		$this->template->view("admin/blog_post_edit", array(
			"post"=>$post
		));
	}

	public function admin_panel_new_projects_disapprove($id_project)	{
		$this->projects_model->disapprove_project($id_project);
		redirect("/admin/admin_panel_new_projects");
	}

	public function admin_panel_new_projects_approve($id_project)	{
		$this->projects_model->approve_project($id_project);
		redirect("/admin/admin_panel_new_projects");
	}

	public function admin_panel_new_projects()	{
		$projects = $this->projects_model->list_all_new();
		$this->template->view("admin/new_projects", array(
			"projects"=>$projects
		));
	}

	public function admin_panel_blog_posts()	{
		$posts = $this->blog_model->posts_list_all();
		$this->template->view("admin/blog_posts", array(
			"posts"=>$posts
		));
	}

	public function index()	{
		redirect("/");
	}

}
