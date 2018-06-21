<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

class Authentication extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('authentication_model');
		$this->load->model('profile_model');
	}

	public function register()	{
		if(!session_id()) {
    	session_start();
		}

		$_SESSION['FBRLH_state']=$this->input->get('state');
		$error=false;

		/*
		$visitor_id = $this->input->get("visitor_id");
		if (!empty($visitor_id)) {
			$_SESSION["visitor_id"] = $visitor_id;
		}
		*/

		require(FCPATH."vendor/autoload.php");
		$fb = new Facebook\Facebook([
		  'app_id' => 'FACEBOOK_APP_ID', // Replace {app-id} with your app id
		  'app_secret' => 'FACEBOOK_APP_SECRET',
		  'default_graph_version' => 'v2.2',
		  ]);

		$helper = $fb->getRedirectLoginHelper();

		$permissions = ['email']; // Optional permissions
		$loginUrl = $helper->getLoginUrl('https://www.freelancing.zone/authentication/facebook_callback', $permissions);

		$error=false;
		$fullname='';
		$email='';

		if ($this->input->post("action") == "register") {
			$fullname = $this->security->xss_clean(strip_tags($this->input->post("fullname")));
			$email = $this->security->xss_clean($this->input->post("email"));
			$password = $this->input->post("password");
			$passwordconf = $this->input->post("passwordconf");

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error = "Please enter a valid email address.";
			}

			if (empty($password)) {
				$error = "Password can't be empty.";
			}

			if ($password!=$passwordconf) {
				$error = "Passwords don't match.";
			}

			if (strlen($password) < 5) {
				$error = "Passwords must have at least 5 characters.";
			}

			if (!$error) {
				$hash = $this->authentication_model->register(
					array(
						"fullname"=>$fullname,
						"email"=>$email,
						"password"=>$password
					)
				);

				if ($hash) {

					/*
					$visitor_id = $_SESSION["visitor_id"];
					if (!empty($visitor_id)) {
						@file_get_contents("http://ad.propellerads.com/conversion.php?aid=155149&pid=&tid=35804&visitor_id=$visitor_id");
					}
					*/

					$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
			    //Server settings

			    $mail->isSMTP();                                      // Set mailer to use SMTP
			    $mail->Host = 'mail.freelancing.zone';  // Specify main and backup SMTP servers
			    $mail->SMTPAuth = true;                               // Enable SMTP authentication
			    $mail->Username = 'smtp_username';                 // SMTP username
			    $mail->Password = 'smtp_password';                           // SMTP password
			    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			    $mail->Port = 587;                                    // TCP port to connect to

			    //Recipients
			    $mail->setFrom('info@freelancing.zone', 'Freelancing Zone');
			    $mail->addAddress($email, $fullname);     // Add a recipient
			    $mail->addReplyTo('info@freelancing.zone', 'Freelancing Zone');

			    //Content
			    $mail->isHTML(true);                                  // Set email format to HTML
			    $mail->Subject = 'Freelancing.zone email verification';
					// Compose a simple HTML email message

					$validation_url = "https://www.freelancing.zone/authentication/validate_email/$hash";
					$message = file_get_contents(FCPATH."resources/email_validation.html");
					$message = str_replace("{{EMAIL_VALIDATION_URL}}", $validation_url, $message);
					$mail->Body = $message;

			    $mail->send();

					$this->authentication_model->auth($email, $password);

					redirect("/dashboard?registration=done");
					return;
				} else {
					$error = "This email is already in our database.";
				}
			}
		}

		$from_adfly_banner_ad = false;
		if ($this->input->get("ad") == "2935487654") {
			$from_adfly_banner_ad = true;
		}

		$data=array(
			"from_adfly_banner_ad"=>$from_adfly_banner_ad,
			"error"=>$error,
			"loginUrl"=>$loginUrl,
			"fullname"=>$fullname,
			"email"=>$email
		);
		$this->template->view('register', $data, "main");
	}

	public function reset()	{
		if(!session_id()) {
    	session_start();
		}
		$_SESSION['FBRLH_state']=$this->input->get('state');
		$error=false;

		require(FCPATH."vendor/autoload.php");
		$fb = new Facebook\Facebook([
		  'app_id' => '', // Replace {app-id} with your app id
		  'app_secret' => '',
		  'default_graph_version' => 'v2.2',
		  ]);

		$helper = $fb->getRedirectLoginHelper();

		$permissions = ['email']; // Optional permissions
		$loginUrl = $helper->getLoginUrl('https://www.freelancing.zone/authentication/facebook_callback', $permissions);
		$msg=false;

		if ($this->input->post("action") == "reset") {
			$email = $this->input->post("email");

			$hash = $this->profile_model->reset_email($email);

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
	    $mail->addAddress($email);     // Add a recipient
	    $mail->addReplyTo('info@freelancing.zone', 'Freelancing Zone');

	    //Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = 'Freelancing.zone email verification';
			// Compose a simple HTML email message

			$validation_url = "https://www.freelancing.zone/authentication/reset_password/$hash";
			$message = file_get_contents(FCPATH."resources/email_reset.html");
			$message = str_replace("{{EMAIL_RESET_URL}}", $validation_url, $message);
			$mail->Body = $message;

			if ($hash) {
	    	$mail->send();
			}

			$msg="Please check your email and click on the reset link.";
		}

		$data=array(
			"msg"=>$msg,
			"loginUrl"=>$loginUrl
		);

		$this->template->view('reset', $data, "main");
	}

	public function reset_password($hash)	{
		$error=false;
		if ($this->input->post("action") == "reset") {
			$password = $this->input->post("password");
			$passwordconf = $this->input->post("passwordconf");

			if (empty($password)) {
				$error = "Password can't be empty.";
			}

			if ($password!=$passwordconf) {
				$error = "Passwords don't match.";
			}

			if (strlen($password) < 5) {
				$error = "Passwords must have at least 5 characters.";
			}

			if (!$error) {
				$this->profile_model->reset_password($hash, $password);
				redirect("/dashboard");
				die();
			}
		}
		$data=array(
			"error"=>$error
		);
		$this->template->view('reset_password', $data, "main");
	}

	public function validate_email($hash)	{
		$this->profile_model->validate_email($hash);
		redirect("/dashboard");
	}

	public function logout()	{
		$this->authentication_model->logout();
		redirect("/dashboard");
	}

	public function facebook_callback()	{

		if(!session_id()) {
    	session_start();
		}

		$_SESSION['FBRLH_state']=$this->input->get('state');
		require(FCPATH."vendor/autoload.php");

		$fb = new Facebook\Facebook([
		  'app_id' => '', // Replace {app-id} with your app id
		  'app_secret' => '',
		  'default_graph_version' => 'v2.2',
		  ]);

		$helper = $fb->getRedirectLoginHelper();

		try {
		  $accessToken = $helper->getAccessToken();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}

		if (! isset($accessToken)) {
		  if ($helper->getError()) {
		    header('HTTP/1.0 401 Unauthorized');
		    echo "Error: " . $helper->getError() . "\n";
		    echo "Error Code: " . $helper->getErrorCode() . "\n";
		    echo "Error Reason: " . $helper->getErrorReason() . "\n";
		    echo "Error Description: " . $helper->getErrorDescription() . "\n";
		  } else {
		    header('HTTP/1.0 400 Bad Request');
		    echo 'Bad request';
		  }
		  exit;
		}

		// Logged in
		//$facebook_access_token = $accessToken->getValue();

		// The OAuth 2.0 client handler helps us manage access tokens
		$oAuth2Client = $fb->getOAuth2Client();

		if (! $accessToken->isLongLived()) {
		  try {
		    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
		  } catch (Facebook\Exceptions\FacebookSDKException $e) {
		    echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
		    exit;
		  }

		}

		$_SESSION['fb_access_token'] = (string) $accessToken;
		$fb->setDefaultAccessToken($_SESSION['fb_access_token']);
		$profileRequest = $fb->get('/me?fields=id,name,first_name,last_name,email,link,gender,locale,picture');
		$fbUserProfile = $profileRequest->getGraphNode()->asArray();

		$fullname = $fbUserProfile["name"];
		$email = $fbUserProfile["email"];
		$facebook_id = $fbUserProfile["id"];

		$profile_picture_url = $fbUserProfile["picture"]["url"];

		$profile = $this->authentication_model->facebook_register($facebook_id, $email, $fullname, $profile_picture_url);
		$id_user = $profile["id_user"];
		$profile_picture = $profile["profile_picture"];

		if ($profile["new_from_fb"]) {
			/*
			$visitor_id = $_SESSION["visitor_id"];
			if (!empty($visitor_id)) {
				@file_get_contents("http://ad.propellerads.com/conversion.php?aid=155149&pid=&tid=35804&visitor_id=$visitor_id");
			}
			*/
		}

		$_SESSION["authenticated"] = true;
		$_SESSION["email"] = $email;
		$_SESSION["fullname"] = $fullname;
		$_SESSION["id_user"] = $id_user;
		$_SESSION["profile_picture"] = $profile_picture;

		// User is logged in with a long-lived access token.
		// You can redirect them to a members-only page.
		redirect("/dashboard");
	}

	public function login()	{
		if(!session_id()) {
    	session_start();
		}
		$_SESSION['FBRLH_state']=$this->input->get('state');
		$error=false;

		require(FCPATH."vendor/autoload.php");
		$fb = new Facebook\Facebook([
		  'app_id' => '', // Replace {app-id} with your app id
		  'app_secret' => '',
		  'default_graph_version' => 'v2.2',
		  ]);

		$helper = $fb->getRedirectLoginHelper();

		$permissions = ['email']; // Optional permissions
		$loginUrl = $helper->getLoginUrl('https://www.freelancing.zone/authentication/facebook_callback', $permissions);

		if ($this->input->post("action") == "login") {
			$email = $this->input->post("email");
			$password = $this->input->post("password");

			if (!$this->authentication_model->auth($email, $password)) {
				$error = "Invalid email or password.";
			}

			if (!$error) {
				redirect("/dashboard");
				die;
			}

		}

		$this->authentication_model->logout();
		$data=array(
			"loginUrl"=>$loginUrl,
			"error"=>$error
		);
		$this->template->view('login', $data, "main");
	}

	public function index()	{
		if ($this->authentication_model->is_auth()) {
			redirect('/dashboard');
			die;
		}

		redirect('/authentication/login');
	}

}
