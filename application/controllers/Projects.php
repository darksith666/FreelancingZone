<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('authentication_model');
		$this->load->model('projects_model');
		$this->load->model('jobs_model');

		if (!$this->authentication_model->is_auth()) {
			redirect("/authentication/login");
			die();
		}

	}

	public function close_job($id_job, $status)	{
		$job = $this->jobs_model->get_job($id_job);
		$project = $this->projects_model->get_project($job["id_project"]);
		if (!$project) {
			redirect("/dashboard");
			die();
		}

		if ($project["id_user"] != $_SESSION["id_user"]) {
			redirect("/dashboard");
			die();
		}

		if ($status != "approve" && $status != "reject") {
			redirect("/dashboard");
			die();
		}

		if ($this->input->post("action") == "close_job") {
			$review_type = $this->security->xss_clean(strip_tags($this->input->post("review_type")));
			$review_review = $this->security->xss_clean(strip_tags($this->input->post("review_review")));
			$this->jobs_model->close_job($job, $status, $review_type, $review_review);
			redirect("/projects/myprojects");
			die();
		}

		$this->template->view("projects/close_job", array(
			"status"=>$status,
			"job"=>$job,
			"project"=>$project
		));
	}

	public function accept_submission($id_project, $id_job)	{
		$project = $this->projects_model->get_project($id_project);

		if (!$project) {
			redirect("/projects");
			die();
		}

		if ($project["id_user"] != $_SESSION["id_user"]) {
			redirect("/projects");
			die();
		}

		$this->jobs_model->accept_submission($id_project, $id_job);
		redirect("/projects/edit/$id_project?show_submissions=yes");
	}

	public function decline_submission($id_project, $id_job)	{
		$project = $this->projects_model->get_project($id_project);

		if (!$project) {
			redirect("/projects");
			die();
		}

		if ($project["id_user"] != $_SESSION["id_user"]) {
			redirect("/projects");
			die();
		}


		$this->jobs_model->decline_submission($id_job);

		redirect("/projects/edit/$id_project?show_submissions=yes");
	}

	public function delete_file($id_project, $filepath)	{
		$project = $this->projects_model->get_project($id_project);

		if (!$project) {
			redirect("/projects");
			die();
		}

		if ($project["id_user"] != $_SESSION["id_user"]) {
			redirect("/projects");
			die();
		}

		$this->projects_model->delete_file($id_project, $filepath);

		redirect("/projects/edit/$id_project");
		die();
	}

	public function index()	{
		$categories = $this->projects_model->get_categories();

		$search_query = array(
			'skills'=>false,
			'query'=>false,
			'id_category'=>false
		);

		if ($this->input->post("action") == "filter") {
			$search_query["id_category"]=$this->input->post("id_category");
			$search_query["skills"]=$this->input->post("skills");
			$search_query["query"]=$this->input->post("query");
		}

		$page = get_page();
		$results = $this->projects_model->projects_list($search_query, $page);
		$total = $results["total"];
		$paging = generate_paging($page, $total);

		$this->template->view("projects/projects", array(
			"categories"=>$categories,
			"search_query"=>$search_query,
			"projects"=>$results["rows"],
			"paging"=>$paging
		));
	}

	public function apply($id_project)	{
		$project = $this->projects_model->get_project($id_project);
		if (!$project) {
			redirect("/projects");
			die();
		}

		$project_submissions = $this->projects_model->get_project_submissions($id_project);
		$can_apply=true;
		foreach($project_submissions as $submission) {
			if ($submission["id_user"] == $_SESSION["id_user"]) {
				$can_apply=false;
				break;
			}
		}

		if ($this->input->post("action") == "submission" && $can_apply) {
			$submission_description=$this->security->xss_clean($this->input->post("submission_description"));
			$submission_amount=$this->security->xss_clean(strip_tags($this->input->post("submission_amount")));
			$submission_milestones=$this->security->xss_clean(strip_tags($this->input->post("submission_milestones")));
			$role=$this->security->xss_clean(strip_tags($this->input->post("role")));

			$this->jobs_model->create_jobs(array(
				"id_project"=>$id_project,
				"submission_milestones"=>$submission_milestones,
				"submission_description"=>$submission_description,
				"role"=>$role,
				"submission_amount"=>$submission_amount
			));

			redirect("/jobs");
			die();
		}

		$this->template->view("projects/apply", array(
			"can_apply"=>$can_apply,
			"project"=>$project
		));
	}

	public function submission($id_job)	{
		$job = $this->jobs_model->get_job($id_job);
		$project = $this->projects_model->get_project($job["id_project"]);
		if (!$project) {
			redirect("/projects/myprojects");
			die();
		}

		if ($project["id_user"] != $_SESSION["id_user"]) {
			redirect("/dashboard");
			die();
		}

		$this->template->view("projects/submission", array(
			"job"=>$job,
			"project"=>$project
		));
	}


	public function download_file($filepath)	{
		$this->load->helper('download');
		$project_file = $this->projects_model->get_project_file($filepath);
		$data = file_get_contents(FCPATH."resources/uploads/projects_files/$filepath");
		force_download($project_file["filename"], $data);
	}

	public function view($id_project)	{
		$project = $this->projects_model->get_project($id_project);
		if (!$project) {
			redirect("/projects");
			die();
		}
		$project_submissions = $this->projects_model->get_project_submissions($id_project);
		$project_files = $this->projects_model->get_project_files($id_project);
		$can_apply=true;
		foreach($project_submissions as $submission) {
			if ($submission["id_user"] == $_SESSION["id_user"]) {
				$can_apply=false;
				break;
			}
		}
		$this->template->view("projects/view", array(
			"can_apply"=>$can_apply,
			"project_submissions"=>$project_submissions,
			"project_files"=>$project_files,
			"project"=>$project
		));
	}

	public function delete($id_project)	{
		$project = $this->projects_model->get_project($id_project);

		if (!$project) {
			redirect("/projects");
			die();
		}

		if ($project["id_user"] != $_SESSION["id_user"]) {
			redirect("/projects");
			die();
		}

		$this->projects_model->delete($id_project);
		redirect("/projects/myprojects");
	}

	public function edit($id_project)	{
		$categories = $this->projects_model->get_categories();
		$project = $this->projects_model->get_project($id_project);

		if (!$project) {
			redirect("/projects");
			die();
		}

		if ($project["id_user"] != $_SESSION["id_user"]) {
			redirect("/projects");
			die();
		}

		if ($this->input->post("action") == "edit") {
			$title=$this->security->xss_clean($this->input->post("title"));
			$description=$this->security->xss_clean($this->input->post("description"));
			$id_category=$this->security->xss_clean($this->input->post("id_category"));
			$type=$this->security->xss_clean($this->input->post("type"));
			$amount=$this->security->xss_clean($this->input->post("amount"));
			$skills=$this->security->xss_clean($this->input->post("skills"));
			$visibility=$this->security->xss_clean($this->input->post("visibility"));

			if (isset($_FILES["file"])) {
				$filename=$_FILES["file"]["name"];
				if ($filename) {
					$tmp_name=$_FILES["file"]["tmp_name"];
					$extension = strtolower(pathinfo($filename)['extension']);

					$new_filename = md5(uniqid().time().$filename).".$extension";
					$new_image_path = FCPATH."resources/uploads/projects_files/$new_filename";

					copy($tmp_name, $new_image_path);

					$this->projects_model->add_file($id_project, $filename, $new_filename);

					unlink($tmp_name);
				}
			}

			$this->projects_model->update(array(
				"id_project"=>$id_project,
				"skills"=>$skills,
				"title"=>$title,
				"description"=>$description,
				"id_category"=>$id_category,
				"type"=>$type,
				"visibility"=>$visibility,
				"amount"=>$amount
			));

			$project = $this->projects_model->get_project($id_project);
		}

		$show_submissions = $this->input->get("show_submissions");

		$project_submissions = $this->projects_model->get_project_submissions($id_project);
		$project_files = $this->projects_model->get_project_files($id_project);
		$this->template->view("projects/edit", array(
			"submissions"=>$project_submissions,
			"show_submissions"=>$show_submissions,
			"project_files"=>$project_files,
			"categories"=>$categories,
			"project"=>$project
		));
	}

	public function create()	{
		$categories = $this->projects_model->get_categories();

		if ($this->input->post("action") == "create") {
			$title=$this->security->xss_clean($this->input->post("title"));
			$description=$this->security->xss_clean($this->input->post("description"));
			$id_category=$this->security->xss_clean($this->input->post("id_category"));
			$type=$this->security->xss_clean($this->input->post("type"));
			$amount=$this->security->xss_clean($this->input->post("amount"));
			$skills=$this->security->xss_clean($this->input->post("skills"));

			$id_project = $this->projects_model->create(array(
				"skills"=>$skills,
				"title"=>$title,
				"description"=>$description,
				"id_category"=>$id_category,
				"type"=>$type,
				"amount"=>$amount
			));

			if (isset($_FILES["file"])) {
				$filename=$_FILES["file"]["name"];
				if ($filename) {
					$tmp_name=$_FILES["file"]["tmp_name"];
					$extension = strtolower(pathinfo($filename)['extension']);

					$new_filename = md5(uniqid().time().$filename).".$extension";
					$new_image_path = FCPATH."resources/uploads/projects_files/$new_filename";

					copy($tmp_name, $new_image_path);

					$this->projects_model->add_file($id_project, $filename, $new_filename);

					unlink($tmp_name);
				}
			}

			redirect("/projects/myprojects");
			die();
		}

		$this->template->view("projects/create", array(
			"categories"=>$categories
		));
	}

	public function myprojects()	{

		$page = get_page();
		$results = $this->projects_model->myprojects_list($page);
		$total = $results["total"];
		$paging = generate_paging($page, $total);

		foreach($results["rows"] as $index=>$row) {
			$project_submissions = $this->projects_model->get_project_submissions($row["id_project"]);
			$results["rows"][$index]["nb_submissions"] = count($project_submissions);
		}

		$this->template->view("projects/myprojects", array(
			"myprojects"=>$results["rows"],
			"paging"=>$paging
		));
	}

}
