<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Freelancers extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('authentication_model');
		$this->load->model('profile_model');
		$this->load->model('contacts_model');

		if (!$this->authentication_model->is_auth()) {
			redirect("/authentication/login");
			die();
		}

	}

	public function connect_request($id_user)	{
		$profile = $this->contacts_model->connect_request($id_user);
		redirect("/freelancers/view/$id_user");
	}

	public function view($id_user)	{
		
		$profile = $this->profile_model->get_profile($id_user);
		if (!$profile) {
			redirect("/dashboard");
			die();
		}

		if ($id_user == $_SESSION["id_user"]) {
			redirect("/profile");
			die();
		}

		$is_contact = $this->contacts_model->is_contact($id_user);
		$is_contact_connected = $this->contacts_model->is_contact_connected($id_user);
		$has_request_from_contact = $this->contacts_model->has_request_from_contact($id_user);
		$has_request_from_me = $this->contacts_model->has_request_from_me($id_user);
		$this->template->view("freelancers/view", array(
			"has_request_from_contact"=>$has_request_from_contact,
			"has_request_from_me"=>$has_request_from_me,
			"is_contact_connected"=>$is_contact_connected,
			"is_contact"=>$is_contact,
			"profile"=>$profile
		));
	}

	public function index()	{

		$search_query = array(
			'skills'=>false,
			'query'=>false
		);

		if ($this->input->post("action") == "filter") {
			$search_query["skills"]=$this->input->post("skills");
			$search_query["query"]=$this->input->post("query");
		}

		$page = get_page();
		$results = $this->profile_model->freelancers_list($search_query, $page);
		$total = $results["total"];
		$paging = generate_paging($page, $total);

		$this->template->view("freelancers/freelancers", array(
			"search_query"=>$search_query,
			"freelancers"=>$results["rows"],
			"paging"=>$paging
		));
	}


}
