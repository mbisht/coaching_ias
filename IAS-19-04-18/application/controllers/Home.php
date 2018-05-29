<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $this->load->library('email');
        $this->load->library('details');
	}
	
	public function index(){
	    $data['activepage']="home";
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['achievers_details_data']=$this->All_page->GetAchieversDetails();
	    $data['gallery_details_data']=$this->All_page->GetGalleryDetails();
	    $data['home_videos_data']=$this->All_page->GetHomeVideos();
	    $data['director_message_data']=$this->All_page->GetDirectorMessage();
	    
	    $data['meta_title'] = "Best IAS Coaching Institute, Top IAS, UPSC Coaching Centres Bangalore";
	    $data['meta_description'] = "Start preparing for IAS exam while joining Shiksha IAS Academy, the Best IAS coaching centre in Bangalore. We are the Top IAS coaching centre in Bangalore known for offering advanced course materials leading to sure shot success.";
	    $data['meta_keywords'] = "Best IAS coaching institute in Bangalore, Best IAS coaching centre in Bangalore, Top IAS coaching centre in Bangalore, IAS coaching centres in Bangalore, UPSC coaching centres in Bangalore";
	    
		$this->load->view('home_page', $data);
	}
}
