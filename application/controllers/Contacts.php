<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('authentication_model');
		$this->load->model('contacts_model');
		$this->load->model('profile_model');

		if (!$this->authentication_model->is_auth()) {
			redirect("/authentication/login");
			die();
		}

	}

	public function connect($id_user) {
		$connected = $this->contacts_model->connect($id_user);
		if ($connected) {
			redirect("/contacts/talk/$id_user");
			die();
		}

		redirect("/dashboard");
	}

	public function accept_connection($id_user)	{
		$this->contacts_model->accept_connection($id_user);
		redirect("/contacts/talk/$id_user");
	}

	public function block($id_user)	{
		$this->contacts_model->block($id_user);
		redirect("/contacts/talk/$id_user");
	}

	public function unblock($id_user)	{
		$this->contacts_model->unblock($id_user);
		redirect("/contacts/talk/$id_user");
	}

	public function talk($id_user)	{
		$profile = $this->profile_model->get_profile($id_user);
		if (!$profile) {
			redirect("/dashboard");
			die();
		}

		if ($this->input->post("action") == "sendmsg") {
			$msg = $this->security->xss_clean(strip_tags($this->input->post("msg")));
			$this->contacts_model->send_message($id_user, $msg);
		}

		$messages = $this->contacts_model->chat_messages($id_user);
		$contact = $this->contacts_model->get_contact($id_user);

		$has_blocked_me = $this->contacts_model->has_blocked_me($id_user);
		$is_contact = $this->contacts_model->is_contact($id_user);
		$is_contact_connected = $this->contacts_model->is_contact_connected($id_user);
		$has_request_from_contact = $this->contacts_model->has_request_from_contact($id_user);
		$has_request_from_me = $this->contacts_model->has_request_from_me($id_user);

		$is_blocked = false;
		if ($has_blocked_me || $contact["status"] == "BLOCKED") {
			$is_blocked = true;
		}

		$this->template->view("contacts/talk", array(
			"has_request_from_contact"=>$has_request_from_contact,
			"has_request_from_me"=>$has_request_from_me,
			"is_contact_connected"=>$is_contact_connected,
			"is_contact"=>$is_contact,
			"is_blocked"=>$is_blocked,
			"has_blocked_me"=>$has_blocked_me,
			"contact"=>$contact,
			"messages"=>$messages,
			"profile"=>$profile
		));
	}

	public function index()	{

		$page = get_page();
		$results = $this->contacts_model->freelancers_list($page);
		$total = $results["total"];
		$paging = generate_paging($page, $total);

		$this->template->view("contacts/contacts", array(
			"freelancers"=>$results["rows"],
			"paging"=>$paging
		));
	}

}
