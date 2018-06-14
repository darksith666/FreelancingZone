<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('authentication_model');

		if (!$this->authentication_model->is_auth()) {
			redirect("/authentication/login");
			die();
		}

	}

	public function index()	{
		$this->template->view("calendar/calendar");
	}

}
