<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('authentication_model');
		$this->load->model('jobs_model');
		$this->load->model('projects_model');

		if (!$this->authentication_model->is_auth()) {
			redirect("/authentication/login");
			die();
		}

	}

	public function review($id_job, $review_type)	{
		$job = $this->jobs_model->get_job($id_job);
		$project = $this->projects_model->get_project($job["id_project"]);
		if (!$project) {
			redirect("/dashboard");
			die();
		}

		if ($job["id_user"] != $_SESSION["id_user"]) {
			redirect("/dashboard");
			die();
		}

		if ($review_type != "positive" && $review_type != "negative") {
			redirect("/dashboard");
			die();
		}

		if ($this->input->post("action") == "review") {
			$review_type = $this->security->xss_clean(strip_tags($this->input->post("review_type")));
			$review_review = $this->security->xss_clean(strip_tags($this->input->post("review_review")));
			$this->jobs_model->post_review($job, $project, $review_type, $review_review);
			redirect("/projects/myprojects");
			die();
		}

		$this->template->view("jobs/review", array(
			"review_type"=>$review_type,
			"job"=>$job,
			"project"=>$project
		));
	}

	public function view($id_job)	{
		$job = $this->jobs_model->get_job($id_job);

		$project = $this->projects_model->get_project($job["id_project"]);
		if (!$project) {
			redirect("/projects/myprojects");
			die();
		}

		if ($job["id_user"] != $_SESSION["id_user"]) {
			redirect("/dashboard");
			die();
		}

		if ($this->input->post("action") == "save") {
			$milestones = json_decode($job["submission_milestones"], true);
			foreach($milestones as $index=>$milestone) {
				$progress=$this->input->post("milestone_progress_$index");
				if ($progress>100) { $progress=100; }
				if ($progress<0) { $progress=0; }
				if (empty($progress)) { $progress=0; }
				$milestones[$index]["progress"]=$progress;
			}
			$job["submission_milestones"] = json_encode($milestones);

			$this->jobs_model->update_job(array(
				"id_job"=>$id_job,
				"submission_milestones"=>$job["submission_milestones"]
			));

			$job = $this->jobs_model->get_job($id_job);
		}

		$this->template->view("jobs/view", array(
			"job"=>$job,
			"project"=>$project
		));
	}

	public function edit($id_job)	{
		$job = $this->jobs_model->get_job($id_job);

		if ($job["status"] != "NEW" && $job["status"] != "READ") {
			redirect("/jobs/view/$id_job");
			die();
		}

		$project = $this->projects_model->get_project($job["id_project"]);

		if (!$project) {
			redirect("/projects/myprojects");
			die();
		}

		if ($job["id_user"] != $_SESSION["id_user"]) {
			redirect("/jobs");
			die();
		}

		if ($this->input->post("action") == "edit") {
			$submission_description=$this->security->xss_clean($this->input->post("submission_description"));
			$submission_amount=$this->security->xss_clean(strip_tags($this->input->post("submission_amount")));
			$submission_milestones=$this->security->xss_clean(strip_tags($this->input->post("submission_milestones")));
			$role=$this->security->xss_clean(strip_tags($this->input->post("role")));

			$this->jobs_model->update_job(array(
				"id_job"=>$id_job,
				"submission_milestones"=>$submission_milestones,
				"submission_description"=>$submission_description,
				"role"=>$role,
				"submission_amount"=>$submission_amount
			));

			$job = $this->jobs_model->get_job($id_job);
		}

		$this->template->view("jobs/edit", array(
			"job"=>$job,
			"project"=>$project
		));
	}

	public function index()	{

		$page = get_page();
		$results = $this->jobs_model->myjobs_list($page);
		$total = $results["total"];
		$paging = generate_paging($page, $total);

		$this->template->view("jobs/jobs", array(
			"myjobs"=>$results["rows"],
			"paging"=>$paging
		));

	}

}
