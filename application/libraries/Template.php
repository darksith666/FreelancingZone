<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {
  public function view($view, $data = array(), $include_frame = true) {

    require_once FCPATH.'vendor/mobiledetect/mobiledetectlib/Mobile_Detect.php';

    $detect = new Mobile_Detect;

    $is_mobile = false;
    if ( $detect->isMobile() ) {
      $is_mobile = true;
    }

    $CI =& get_instance();

    $data["header_view_name"] = $view;
    $data["footer_is_mobile"] = $is_mobile;

    if ($include_frame) {
      if ($include_frame === "main") {
        $CI->load->view("header_main", $data);
      } else {
        $CI->load->model('jobs_model');
        $CI->load->model('profile_model');
        $tasks = $CI->jobs_model->list_tasks();
        $notifications = $CI->profile_model->get_notifications();
        $data["header_topmenu_tasks"]=$tasks;
        $data["header_topmenu_notifications"]=$notifications;
        $CI->load->view("header", $data);
      }
    }

    $CI->load->view($view, $data);

    if ($include_frame) {
      if ($include_frame === "main") {
        $CI->load->view("footer_main", $data);
      } else {
        $CI->load->view("footer", $data);
      }
    }

  }
}
