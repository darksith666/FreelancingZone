<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

class Profile extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('authentication_model');
		$this->load->model('profile_model');

		if (!$this->authentication_model->is_auth()) {
			redirect("/authentication/login");
			die();
		}

	}

	public function clear_all_notifications()	{
		$this->profile_model->clear_all_notifications();
		redirect("/dashboard");
	}

	public function clear_notification($id_notification)	{
		$this->profile_model->clear_notification($id_notification);
		redirect("/dashboard");
	}

	public function delete_skill($id_users_skill)	{
		$this->profile_model->delete_skill($id_users_skill);
		redirect("/profile/edit");
	}

	public function add_skill()	{
		$this->profile_model->add_skill($_SESSION["id_user"]);
		redirect("/profile/edit");
	}

	public function settings()	{

		$profile = $this->profile_model->get_profile($_SESSION["id_user"]);
		if (!$profile) {
			redirect("/dashboard");
			die();
		}

		if ($profile["id_user"] != $_SESSION["id_user"]) {
			redirect("/dashboard");
			die();
		}

		$error=false;

		if ($this->input->post("action") == "edit") {

			$new_password = $this->security->xss_clean($this->input->post("new_password"));
			$new_password_conf = $this->security->xss_clean($this->input->post("new_password_conf"));

			if (strlen($new_password) < 5) {
				$error = "Passwords must have at least 5 characters.";
			}

			if ($new_password != $new_password_conf) {
				$error = "Passwords do not match.";
			}

			if(!$error) {
				$this->profile_model->update_profile_password($new_password);
				redirect("/profile");
				die();
			}
		}


		$this->template->view("profile/settings", array(
			"error"=>$error,
			"profile"=>$profile
		));
	}


	public function close_my_account()	{
		$this->profile_model->close_my_account();
		redirect("https://www.freelancing.zone");
	}

	public function edit()	{

		$profile = $this->profile_model->get_profile($_SESSION["id_user"]);
		if (!$profile) {
			redirect("/dashboard");
			die();
		}

		if ($profile["id_user"] != $_SESSION["id_user"]) {
			redirect("/dashboard");
			die();
		}

		$error=false;

		if ($this->input->post("action") == "edit") {

			$profile["fullname"] = $this->security->xss_clean($this->input->post("fullname"));
			$profile["location"] = $this->security->xss_clean($this->input->post("location"));
			$profile["mobile"] = $this->security->xss_clean($this->input->post("mobile"));

			if ($this->input->post("email") != $profile["email"]) {
				$profile["email_verified"] = "NO";
			}

			$profile["email"] = $this->security->xss_clean($this->input->post("email"));
			$profile["email_visibility"] = $this->security->xss_clean($this->input->post("email_visibility"));
			$profile["summary"] = $this->security->xss_clean($this->input->post("summary"));
			$profile["description"] = $this->security->xss_clean($this->input->post("description"));

			if (!filter_var($profile["email"], FILTER_VALIDATE_EMAIL)) {
				$error = "Please enter a valid email address.";
			}

			foreach($profile["skills"] as $index=>$skill) {
				$profile["skills"][$index]["skill"] = $this->security->xss_clean($this->input->post("skill_".$profile["skills"][$index]["id_users_skill"]));
				$profile["skills"][$index]["level"] = $this->security->xss_clean($this->input->post("skill_level_".$profile["skills"][$index]["id_users_skill"]));
			}

			if (isset($_FILES["file"]) && !$error) {
				$filename=$_FILES["file"]["name"];
				if ($filename) {
					$tmp_name=$_FILES["file"]["tmp_name"];
					$extension = strtolower(pathinfo($filename)['extension']);

					$new_filename = md5(uniqid().time().$filename).".$extension";
					$new_image_path = FCPATH."resources/uploads/profile_pictures/$new_filename";
					if(
						$extension != "jpg" &&
						$extension != "jpeg" &&
						$extension != "png" &&
						$extension != "gif"
					) {
						$error="Only allowed image types are jpg, jpeg, gif and png.";
					} else {
						copy($tmp_name, $new_image_path);
						$profile["profile_picture"] = $new_filename;
						$_SESSION["profile_picture"] = $new_filename;
					}
					unlink($tmp_name);
				}
			}

			if(!$error) {
				$this->profile_model->update_profile($profile);
				redirect("/profile");
				die();
			}
		}


		$this->template->view("profile/edit", array(
			"error"=>$error,
			"profile"=>$profile
		));
	}

	public function index()	{
		$profile = $this->profile_model->get_profile($_SESSION["id_user"]);
		if (!$profile) {
			redirect("/dashboard");
			die();
		}

		$info = false;

		if ($this->input->post("action") == "validate_email") {

			$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
	    //Server settings

	    $mail->isSMTP();                                      // Set mailer to use SMTP
	    $mail->Host = 'mail.freelancing.zone';  // Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    $mail->Username = '';                 // SMTP username
	    $mail->Password = '';                           // SMTP password
	    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = 587;                                    // TCP port to connect to

	    //Recipients
	    $mail->setFrom('info@freelancing.zone', 'Freelancing Zone');
	    $mail->addAddress($profile["email"], $profile["fullname"]);     // Add a recipient
	    $mail->addReplyTo('info@freelancing.zone', 'Freelancing Zone');

	    //Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = 'Freelancing.zone email verification';
			// Compose a simple HTML email message
			$hash = $this->profile_model->validate_hash();
			$validation_url = "https://www.freelancing.zone/authentication/validate_email/$hash";
			$message = file_get_contents(FCPATH."resources/email_validation.html");
			$message = str_replace("{{EMAIL_VALIDATION_URL}}", $validation_url, $message);
			$mail->Body = $message;

	    $mail->send();

			$info = "Validation link sent, please check your email.";
		}

		$this->template->view("profile/profile", array(
			"info"=>$info,
			"profile"=>$profile
		));
	}

}
