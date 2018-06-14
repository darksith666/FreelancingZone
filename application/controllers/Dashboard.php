<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('authentication_model');
		$this->load->model('dashboard_model');

		if (!$this->authentication_model->is_auth()) {
			redirect("/authentication/login");
			die();
		}

	}

	public function index()	{

		$registration_today = $this->dashboard_model->registration_today();
		$registration_total = $this->dashboard_model->registration_total();
		$activity = $this->dashboard_model->activity();
		foreach($activity as $index=>$log) {
			$activity[$index]["time_since"] = time_since(time() - strtotime($activity[$index]["creationdate"]));
		}

		$registration = $this->input->get("registration");
		if ($registration == "done") {
			$registration = true;
		} else {
			$registration = false;
		}

		$this->template->view("dashboard", array(
				"activity"=>$activity,
				"registration_today"=>$registration_today,
				"registration_total"=>$registration_total,
				"registration"=>$registration
			)
		);
	}

}
