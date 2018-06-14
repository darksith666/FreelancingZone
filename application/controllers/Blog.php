<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('blog_model');
	}

	public function article($id_blog, $slug)	{
		$post = $this->blog_model->get_post($id_blog);
		$this->template->view("blog/post", array("post"=>$post), "main");
	}

	public function index()	{
		redirect("/blog/posts/1");
	}

	public function posts($page = "1")	{

		$results = $this->blog_model->posts_list($page);
		$total = $results["total"];
		$paging = generate_paging($page, $total);

		$this->template->view("blog/posts", array(
			"posts"=>$results["rows"],
			"paging"=>$paging
		), "main");
	}

}
