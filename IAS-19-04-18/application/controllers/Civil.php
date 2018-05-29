<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Civil extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('form_validation');
        $this->load->helper('security');
        $this->load->model('All_page');
	}
	
	public function about_cs_exam(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    
	    $data['activepage']="about-civil-services";
		$this->load->view('civil/about_cs_exam',$data);
	}
	
	public function civil_services(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    
		$data['activepage']="about-civil-services";
		$this->load->view('civil/civil_services',$data);
	}
	
	public function civil_services_eligibility_criteria(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    
		$data['activepage']="about-civil-services";
		$this->load->view('civil/civil_services_eligibility_criteria',$data);
	}
	
	public function civil_services_syllabus(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    
	    $data['activepage']="about-civil-services";
		$this->load->view('civil/civil_services_syllabus',$data);
	}
	
	public function upsc_notification(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    
	    $data['activepage']="about-civil-services";
		$this->load->view('civil/upsc_notification',$data);
	}
}