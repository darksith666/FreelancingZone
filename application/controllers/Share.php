<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Share extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('projects_model');
	}

	public function index()	{
		redirect("https://www.freelancing.zone");
	}

	public function project($uuid = false)	{
		if (!$uuid) {
			redirect("https://www.freelancing.zone");
			die();
		}

		$categories = $this->projects_model->get_categories();

		$project = $this->projects_model->get_project_uuid($uuid);

		if (!$project) {
			redirect("https://www.freelancing.zone");
			die();
		}

		$this->template->view("projects/share", array(
			"categories"=>$categories,
			"project"=>$project
		), false);
	}

}
