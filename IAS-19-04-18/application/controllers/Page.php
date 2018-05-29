<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

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
	
	public function gallery(){
	    $data['activepage']="gallery";
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['gallery_details_data']=$this->All_page->GetGalleryImages();
	    
		$this->load->view('gallery_page',$data);
	}
	
	public function about(){
	    $data['activepage']="about-us";
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['meta_title'] = "UPSC coaching centres in Bangalore, IAS coaching centres";
	    $data['meta_description'] = "Start preparing for IAS exam while joining Shiksha IAS Academy, the Best IAS coaching centre in Bangalore. We are the Top IAS coaching centre in Bangalore known for offering advanced course materials leading to sure shot success.";
	    $data['meta_keywords'] = "Best IAS coaching institute in Bangalore, Best IAS coaching centre in Bangalore, Top IAS coaching centre in Bangalore, IAS coaching centres in Bangalore, UPSC coaching centres in Bangalore";
	    
		$this->load->view('about_page',$data);
	}
	
	public function courses(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['activepage']="courses";
	    
	    if(isset($this->session->userdata['logged_in'])){
		    $this->load->view('courses',$data);
        }else{
            $this->load->view('common/permission_denied',$data);
        }
		
	}
	
	public function foundation(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['activepage']="courses";
	        $data['foundation_data']=$this->All_page->GetFoundationDetails();
		    $this->load->view('resource/foundation',$data);
	}
	
	public function prelims(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['activepage']="courses";
		    $data['prelims_data']=$this->All_page->GetPrelimsDetails();
		$this->load->view('resource/prelims',$data);

	}
	
	public function mains_course(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['activepage']="courses";
		$data['main_course_data']=$this->All_page->GetMainCourseDetails();
		$this->load->view('resource/mains_course',$data);
	}
	
	public function optional(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['activepage']="courses";
		 $data['optional_course_data']=$this->All_page->GetOptionalCourseDetails();
		$this->load->view('resource/optional',$data);
	}
	public function fee_payment(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['activepage']="courses";
		$this->load->view('resource/fee_payment',$data);
	}
	
	public function faculty(){
	    $data['activepage']="faculty";
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['faculty_data']=$this->All_page->GetAllFaculty();
		$this->load->view('faculty', $data);
	}
	
	public function message(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['message_data']=$this->All_page->GetAllMessage();
		$this->load->view('message', $data);
	}
	
	public function download_app(){
	    $data['activepage']="download";
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $this->load->view('download_app', $data);
	}
	
	public function daily_quiz(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['activepage']="daily-quiz";
		$data['today_quiz_data']=$this->All_page->GetTodayQuiz();
		$data['quiz_dates_data']=$this->All_page->GetQuizDates();
		$this->load->view('daily_quiz_page',$data);
	}
	
	public function start_quiz(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
		if (!isset($_REQUEST['date'])) {
		    $data['today_quiz_data']=$this->All_page->GetTodayQuiz();
		    $this->load->view('daily_quiz_page',$data);
		    $this->data['message_error'] = "Please select date";
		    return;
         }
         
         $customer_details = array('date' => $_REQUEST['date']);
         
        $quiz_details = $this->All_page->GetDateQuiz($customer_details['date']);
        if ($quiz_details && is_array($quiz_details)){
                    $data['today_quiz_data']=$quiz_details;
		            $this->load->view('daily_start_page',$data);
            }else{
                    $data['today_quiz_data']=$this->All_page->GetTodayQuiz();
		            $this->load->view('daily_start_page',$data);
            }
	}
	
	public function submit_quiz(){
	    
	    $postdata = file_get_contents("php://input");
	    header('Content-type: application/json');
        ini_set('memory_limit', '-1');
        
        if(empty($postdata)){
            echo json_encode(array("code"=>'202',"status1"=>"error","message"=>"Select fill all the fields!"));
            return true;
        }else{
            $request = json_decode($postdata);
            if(!isset($request->userlogged_id) || !isset($request->question_id) || !isset($request->Selected_Questions) || !isset($request->correctAnswers) 
            || !isset($request->TotalQuestion)){
                    echo json_encode(array("code"=>'203',"status1"=>"error","message"=>"Some fields are missing!"));
                    return true;
                }
        }
                    
        $customer_details = array(
                     'user_id' => $request->userlogged_id,
                     'name' => $request->name,
                     'email' => $request->email,
                     'mobile' => $request->mobile,
                     'quiz_date' => $request->quizDate,
                     'question_id' => json_encode($request->question_id),
                     'selected_questions' => json_encode($request->Selected_Questions),
                     'selected_answers' => json_encode($request->Selected_Answers),
                     'correct_answers' => json_encode($request->correctAnswers),
                     'total_questions' => $request->TotalQuestion,
                     'answered_questions' => $request->questionAnswered,
                     'corrected_answers' => $request->numCorrect,
                     'wrong_answers' => ($request->questionAnswered - $request->numCorrect),
                     'percentage' => $request->calculatePerc,
                     'marks' => $request->marks,
                     'ip' => $this->details->getClientIP()
                     );
      
        $contact_details = $this->All_page->insert_submit_quiz($customer_details);
        if($contact_details){
        echo json_encode(array("code"=>"200","status1"=>"success","message"=>'Your Inquiry submitted Successfully!'));
        return true;
        }else{
            echo json_encode(array("code"=>"201","status1"=>"error","message"=>'Some Errors Occurs!'));
            return true;
        }
		
	}
	
	public function date_quiz(){
	    header('Content-type: application/json');
        ini_set('memory_limit', '-1');
	    
         if (!isset($_REQUEST['date']) || !$_REQUEST['date']) {
         echo json_encode(array("code"=>'201',"status1"=>"error","message"=>"Select the date"));
         return true;
         }
         
         $customer_details = array('date' => $_REQUEST['date']);
         
        $quiz_details = $this->All_page->GetDateQuiz($customer_details['date']);
        if ($quiz_details && is_array($quiz_details)){
            echo json_encode(array("code"=>"200","status1"=>"succes","message"=>"Data Available!","items"=>$quiz_details));
            return true;
            }else{
                    echo json_encode(array("code"=>"202","status1"=>"error","message"=>'Data Not Available'));
                    return true;
            }
	}
	
	
	public function submit_online_test(){
	    $postdata = file_get_contents("php://input");
	    header('Content-type: application/json');
        ini_set('memory_limit', '-1');
        
        if(empty($postdata)){
            echo json_encode(array("code"=>'202',"status1"=>"error","message"=>"Select fill all the fields!"));
            return true;
        }else{
            $request = json_decode($postdata);
            if(!isset($request->userlogged_id) || !isset($request->question_id) || !isset($request->Selected_Questions) || !isset($request->correctAnswers) 
            || !isset($request->TotalQuestion)){
                    echo json_encode(array("code"=>'203',"status1"=>"error","message"=>"Some fields are missing!"));
                    return true;
                }
        }
                    
        $customer_details = array(
                     'user_id' => $request->userlogged_id,
                     'question_type' => $request->question_type,
                     'question_id' => json_encode($request->question_id),
                     'selected_questions' => json_encode($request->Selected_Questions),
                     'selected_answers' => json_encode($request->Selected_Answers),
                     'correct_answers' => json_encode($request->correctAnswers),
                     'total_questions' => $request->TotalQuestion,
                     'answered_questions' => $request->questionAnswered,
                     'corrected_answers' => $request->numCorrect,
                     'wrong_answers' => ($request->questionAnswered - $request->numCorrect),
                     'percentage' => $request->calculatePerc,
                     'marks' => $request->marks,
                     'ip' => $this->details->getClientIP()
                     );
      
        $contact_details = $this->All_page->insert_submit_test($customer_details);
        if($contact_details){
        echo json_encode(array("code"=>"200","status1"=>"error","message"=>'Your Inquiry submitted Successfully!'));
        return true;
        }else{
            echo json_encode(array("code"=>"201","status1"=>"error","message"=>'Some Errors Occurs!'));
            return true;
        }
	}
	
	public function daily_news(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['activepage']="daily-news";
	    if(isset($_REQUEST['date'])){
	       $data['daily_news_data'] = $this->All_page->GetDailyNewsByDate($_REQUEST['date']);
	    }else{
	    $data['daily_news_data']=$this->All_page->GetDailyNews();
	    }
		$this->load->view('resource/daily_news_page',$data);
	}
	
	public function load_daily_news(){
	    header('Content-type: application/json');
        ini_set('memory_limit', '-1');
	    if (!isset($_REQUEST['date']) || !$_REQUEST['date']) {
         echo json_encode(array("code"=>'201',"status1"=>"error","message"=>"Select the date"));
         return true;
         }
         
         $customer_details = array('date' => $_REQUEST['date']);
	    $quiz_details = $this->All_page->GetDailyNewsByDate($customer_details['date']);
	    
	        if ($quiz_details && is_array($quiz_details)){
            echo json_encode(array("code"=>"200","status1"=>"succes","message"=>"Data Available!","items"=>$quiz_details));
            return true;
            }else{
                    echo json_encode(array("code"=>"202","status1"=>"error","message"=>'Data Not Available'));
                    return true;
            }
	}
	
	public function daily_news_article(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['activepage']="daily-news";
	    if(isset($_REQUEST['date'])){
	       $data['daily_article_data'] = $this->All_page->GetDailyArticleByDate($_REQUEST['date']);
	    }else{
	    $data['daily_article_data']=$this->All_page->GetDailyArticle();
	    }
		$this->load->view('resource/daily_news_article',$data);
	}
	
	public function load_daily_news_article(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    header('Content-type: application/json');
        ini_set('memory_limit', '-1');
	    if (!isset($_REQUEST['date']) || !$_REQUEST['date']) {
         echo json_encode(array("code"=>'201',"status1"=>"error","message"=>"Select the date"));
         return true;
         }
         
         $customer_details = array('date' => $_REQUEST['date']);
	    $quiz_details = $this->All_page->GetDailyArticleByDate($customer_details['date']);
	    
	        if ($quiz_details && is_array($quiz_details)){
            echo json_encode(array("code"=>"200","status1"=>"succes","message"=>"Data Available!","items"=>$quiz_details));
            return true;
            }else{
                    echo json_encode(array("code"=>"202","status1"=>"error","message"=>'Data Not Available'));
                    return true;
            }
	}
	
	public function current_affair(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['activepage']="current-affair";
	    $data['siasa_video_data']=$this->All_page->GetSiasaVideos();
		$this->load->view('current_affair',$data);
	}
	
	public function siasa_blog(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['activepage']="blog";
		$this->load->view('siasa_blog',$data);
	}
	
	public function siasa_videos(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['activepage']="material";
	    $data['siasa_video_data']=$this->All_page->GetSiasaVideos();
		$this->load->view('siasa_videos',$data);
	}
	
	public function load_siasa_video(){
	    header('Content-type: application/json');
        ini_set('memory_limit', '-1');
        
	    if (!isset($_REQUEST['date']) || !$_REQUEST['date']) {
         echo json_encode(array("code"=>'201',"status1"=>"error","message"=>"Select the date"));
         return true;
         }
         
         $customer_details = array('date' => $_REQUEST['date']);
	    $quiz_details = $this->All_page->GetSiasaVideosByDate($customer_details['date']);
	    
	        if ($quiz_details && is_array($quiz_details)){
            echo json_encode(array("code"=>"200","status1"=>"succes","message"=>"Data Available!","items"=>$quiz_details));
            return true;
            }else{
                    echo json_encode(array("code"=>"202","status1"=>"error","message"=>'Data Not Available'));
                    return true;
            }
	}
	
	public function materials(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['activepage']="material";
		$this->load->view('materials',$data);
	}
	
	public function contact(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['activepage']="contact-us";
	     $data['meta_title'] = "Looking for Top UPSC & IAS coaching centres in Bangalore? | Shiksha IAS Academy";
	    $data['meta_description'] = "Start preparing for IAS exam while joining Shiksha IAS Academy, the Best IAS coaching centre in Bangalore. We are the Top IAS coaching centre in Bangalore known for offering advanced course materials leading to sure shot success.";
	    $data['meta_keywords'] = "Best IAS coaching institute in Bangalore, Best IAS coaching centre in Bangalore, Top IAS coaching centre in Bangalore, IAS coaching centres in Bangalore, UPSC coaching centres in Bangalore";
	    
		$this->load->view('contact_page',$data);
	}
	
	public function contact_submission(){
	    try{
	   $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	     $data['activepage']="contact-us";
	     $this->form_validation->set_rules('contact_name', 'Full Name', 'trim|required|xss_clean');
         $this->form_validation->set_rules('contact_email', 'Email ID', 'trim|xss_clean|required|min_length[8]|valid_email');
         $this->form_validation->set_rules('contact_phone', 'Mobile', 'trim|required|xss_clean|min_length[10]|regex_match[/^[0-9]{10}$/]');
         $this->form_validation->set_rules('contact_subject', 'Course Type', 'trim|xss_clean|required');
         $this->form_validation->set_rules('contact_message', 'Message', 'trim|required|xss_clean|min_length[6]');
         
         $this->data['message_error'] = ($this->form_validation->run() == False) ? validation_errors() : $this->session->flashdata('message');

         if ($this->form_validation->run() == FALSE) {
            $this->load->view('contact_page',$data);
            return false;
         }
         
         $customer_details = array(
         'name'   => $this->input->post('contact_name'),
         'email'=> $this->input->post('contact_email'),
         'mobile'   => $this->input->post('contact_phone'),
         'subject'=> $this->input->post('contact_subject'),
         'city'   => "nil",
         'message'=> $this->input->post('contact_message'),
         'ip'   => $this->details->getClientIP()
      );
      
        $login_details = $this->All_page->InsertNewEnquiry($customer_details);
        if ($login_details){
           $this->session->set_flashdata('message', 'Your Inquiry submitted Successfully. We ll get back you soon!');
           $this->data['message'] = $this->session->flashdata('message');
           
           $subject='New Contact Form Submitted';
           $message='<table cellpadding="5" border="1" style="border-collapse:collapse;width:100%;max-width:600px;margin:10px auto;"><tr><th colspan="2" style="background: #0093de;color: #fff;">NEW ENQUIRY</th></tr><tr><td>Name</td><td>'.$customer_details['name'].'</td></tr><tr><td>Email</td><td>'.$customer_details['email'].'</td></tr><tr><td>Mobile</td><td>'.$customer_details['mobile'].'</td></tr><tr><td>Course Type</td><td>'.$customer_details['subject'].'</td></tr><tr><td>City</td><td>'.$customer_details['city'].'</td></tr><tr><td>Message</td><td>'.$customer_details['message'].'</td></tr></table>';
           $this->send_mail('support@webliststore.org','support@webliststore.org',$subject,$message);
           redirect(base_url().'contact-us');
           exit();
        }else{
            $this->session->set_flashdata('message', 'Server Error Occured. Please try after sometimes!');
            $this->data['message'] = $this->session->flashdata('message');
            $this->load->view('contact_page',$data);
            return false;
            }
	   }catch(Exception $ex){
            $this->session->set_flashdata('message', $e->getMessage());
            $this->data['message'] = $this->session->flashdata('message');
            $this->load->view('contact_page',$data);
            return false;
	   }
	}
	
	public function home_contact_submission(){
	    try{
	   $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	     $data['activepage']="home";
	     $this->form_validation->set_rules('contact_name', 'Full Name', 'trim|required|xss_clean');
         $this->form_validation->set_rules('contact_email', 'Email ID', 'trim|xss_clean|required|min_length[8]|valid_email');
         $this->form_validation->set_rules('contact_phone', 'Mobile', 'trim|required|xss_clean|min_length[10]|regex_match[/^[0-9]{10}$/]');
         $this->form_validation->set_rules('contact_subject', 'Course Type', 'trim|xss_clean|required');
         $this->form_validation->set_rules('contact_message', 'Message', 'trim|required|xss_clean|min_length[6]');
         
         $this->data['message_error'] = ($this->form_validation->run() == False) ? validation_errors() : $this->session->flashdata('message');

         if ($this->form_validation->run() == FALSE) {
            $this->load->view('home_page',$data);
            return false;
         }
         
         $customer_details = array(
         'name'   => $this->input->post('contact_name'),
         'email'=> $this->input->post('contact_email'),
         'mobile'   => $this->input->post('contact_phone'),
         'subject'=> $this->input->post('contact_subject'),
         'city'   => "nil",
         'message'=> $this->input->post('contact_message'),
         'ip'   => $this->details->getClientIP()
      );
      
        $login_details = $this->All_page->InsertNewEnquiry($customer_details);
        if ($login_details){
           $this->session->set_flashdata('message', 'Your Inquiry submitted Successfully. We ll get back you soon!');
           $this->data['message'] = $this->session->flashdata('message');
           
           $subject='New Contact Form Submitted';
           $message='<table cellpadding="5" border="1" style="border-collapse:collapse;width:100%;max-width:600px;margin:10px auto;"><tr><th colspan="2" style="background: #0093de;color: #fff;">NEW ENQUIRY</th></tr><tr><td>Name</td><td>'.$customer_details['name'].'</td></tr><tr><td>Email</td><td>'.$customer_details['email'].'</td></tr><tr><td>Mobile</td><td>'.$customer_details['mobile'].'</td></tr><tr><td>Course Type</td><td>'.$customer_details['subject'].'</td></tr><tr><td>City</td><td>'.$customer_details['city'].'</td></tr><tr><td>Message</td><td>'.$customer_details['message'].'</td></tr></table>';
           $this->send_mail('support@webliststore.org','support@webliststore.org',$subject,$message);
           redirect(base_url());
           exit();
        }else{
            $this->session->set_flashdata('message', 'Server Error Occured. Please try after sometimes!');
            $this->data['message'] = $this->session->flashdata('message');
            $this->load->view('home_page',$data);
            return false;
            }
	   }catch(Exception $ex){
            $this->session->set_flashdata('message', $e->getMessage());
            $this->data['message'] = $this->session->flashdata('message');
            $this->load->view('home_page',$data);
            return false;
	   }
	}
	
	public function careers(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['activepage']="careers";
		$this->load->view('career_page',$data);
	}
	
	public function career_submit(){
	    try{
	     $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['activepage']="careers";
               $config['upload_path']          = './assets/files/resume/';
               $config['allowed_types']        = 'pdf|doc|docx';
               $config['max_size']             = 999999;
               $config['remove_spaces']        = TRUE;
               $this->load->library('upload',$config);
               
                    $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]|xss_clean');
                    $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required|xss_clean');
                    $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[10]|max_length[10]|xss_clean');
                    $this->form_validation->set_rules('employementtype', 'Employement Type', 'trim|xss_clean');
                    $this->form_validation->set_rules('role', 'Role', 'trim|xss_clean');
            	    if (empty($_FILES['resume_file']['name'])){
            	        $this->form_validation->set_rules('resume_file', 'Result File', 'trim|required|xss_clean');
            	    }
               
               $data['message_error'] = ($this->form_validation->run() == False) ? validation_errors() : $this->session->flashdata('message');
               if ($this->form_validation->run() == FALSE) {
                   $data['error'] = $this->upload->display_errors();
                    $data['online_test_optional_data']=$this->All_page->GetOnlineTestOptional();
                    $this->load->view('career_page',$data);
                   return false;
                   }
                        if(!$this->upload->do_upload('resume_file')){
                           $data['message_error'] = array('error' => $this->upload->display_errors());
                           $data['error'] = $this->upload->display_errors();
                           $data['online_test_optional_data']=$this->All_page->GetOnlineTestOptional();
                           $this->load->view('career_page',$data);
                           return false;
                        }else{
                            $upload_data = $this->upload->data();
                            $upload_file = $upload_data['file_name'];
                            
                            $result_details = array(
                                'name' => $this->input->post('name'),
                                'email' => $this->input->post('email'),
                                'mobile' => $this->input->post('mobile'),
                                'employementtype' => $this->input->post('employementtype'),
                                'role' => $this->input->post('role'),
                                'resume_url' => $upload_file,
                                'ip_address' => $this->details->getClientIP()
                                );
                                
                            $submit_results = $this->All_page->InsertSubmitResume($result_details);
                            
                            $this->session->set_flashdata('message', 'Your Resume has been upoladed Successfully!');
                            $this->data['message'] = $this->session->flashdata('message');
                            redirect(base_url().'careers', 'refresh');
                            return true;
                        }
	    }catch(Exception $ex){
            $this->session->set_flashdata('message', $e->getMessage());
            $this->data['message'] = $this->session->flashdata('message');
            $this->load->view('career_page',$data);
            return false;
	   }
	}
	
	public function admission_submit(){
	    try{
	     $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['activepage']="admission";
              
                    $this->form_validation->set_rules('fullname', 'Fullname', 'trim|required|min_length[4]|xss_clean');
                    $this->form_validation->set_rules('dateofbirth', 'dateofbirth', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('gender', 'gender', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('medium', 'medium', 'trim|xss_clean');
                    $this->form_validation->set_rules('father_name', 'father_name', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('father_mobile', 'father_mobile', 'trim|min_length[10]|max_length[10]|xss_clean');
                    $this->form_validation->set_rules('father_profession', 'father_profession', 'trim|xss_clean');
                    $this->form_validation->set_rules('permanent_address', 'permanent_address', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('permanent_pincode', 'permanent_pincode', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('permanent_mobile', 'permanent_mobile', 'trim|required|min_length[10]|max_length[10]|xss_clean');
                    $this->form_validation->set_rules('local_address', 'local_address', 'trim|required|min_length[4]|xss_clean');
                    $this->form_validation->set_rules('local_pincode', 'local_pincode', 'trim|xss_clean');
                    $this->form_validation->set_rules('local_mobile', 'local_mobile', 'trim|required|min_length[10]|max_length[10]|xss_clean');
                    $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');
                    $this->form_validation->set_rules('regular_session', 'regular_session', 'trim|xss_clean');
                    $this->form_validation->set_rules('weekend_session', 'weekend_session', 'trim|xss_clean');
                    $this->form_validation->set_rules('course', 'course', 'trim|xss_clean');
                    $this->form_validation->set_rules('course_optional_subject', 'trim|xss_clean');
                    $this->form_validation->set_rules('qualification_12year', 'trim|xss_clean');
                    $this->form_validation->set_rules('qualification_12subject', 'trim|xss_clean');
                    $this->form_validation->set_rules('qualification_12univ', 'trim|xss_clean');
                    $this->form_validation->set_rules('qualification_12marks', 'trim|xss_clean');
                    $this->form_validation->set_rules('qualification_12division', 'trim|xss_clean');
                    $this->form_validation->set_rules('qualification_12medium', 'trim|xss_clean');
                    $this->form_validation->set_rules('qualification_Gradyear', 'trim|xss_clean');
                    
                    $this->form_validation->set_rules('qualification_Gradsubject', 'qualification_Gradsubject', 'trim|xss_clean');
                    $this->form_validation->set_rules('qualification_Graduniv', 'qualification_Graduniv', 'trim|xss_clean');
                    $this->form_validation->set_rules('qualification_Gradmarks', 'qualification_Gradmarks', 'trim|xss_clean');
                    $this->form_validation->set_rules('qualification_Graddivision', 'qualification_Graddivision', 'trim|xss_clean');
                    $this->form_validation->set_rules('qualification_Gradmedium', 'qualification_Gradmedium', 'trim|xss_clean');
                    $this->form_validation->set_rules('qualification_PostGyear', 'qualification_PostGyear', 'trim|xss_clean');
                    $this->form_validation->set_rules('qualification_PostGsubject', 'qualification_PostGsubject', 'trim|xss_clean');
                    $this->form_validation->set_rules('qualification_PostGuniv', 'qualification_PostGuniv', 'trim|xss_clean');
                    $this->form_validation->set_rules('qualification_PostGmarks', 'qualification_PostGmarks', 'trim|xss_clean');
                    $this->form_validation->set_rules('qualification_PostGdivision', 'qualification_PostGdivision', 'trim|xss_clean');
                    $this->form_validation->set_rules('qualification_PostGmedium', 'qualification_PostGmedium', 'trim|xss_clean');
                    $this->form_validation->set_rules('qualification_AddQyear', 'qualification_AddQyear', 'trim|xss_clean');
                    $this->form_validation->set_rules('qualification_AddQsubject', 'qualification_AddQsubject', 'trim|xss_clean');
                    $this->form_validation->set_rules('qualification_AddQuniv', 'qualification_AddQuniv', 'trim|xss_clean');
                    $this->form_validation->set_rules('qualification_AddQmarks', 'qualification_AddQmarks', 'trim|xss_clean');
                    $this->form_validation->set_rules('qualification_AddQdivision', 'qualification_AddQdivision', 'trim|xss_clean');
                    $this->form_validation->set_rules('qualification_AddQmedium', 'qualification_AddQmedium', 'trim|xss_clean');
                    $this->form_validation->set_rules('last_exam', 'last_exam', 'trim|xss_clean');
                    $this->form_validation->set_rules('optional_subject_main', 'optional_subject_main', 'trim|xss_clean');
                    $this->form_validation->set_rules('appeared_civil_exam', 'appeared_civil_exam', 'trim|xss_clean');
                    $this->form_validation->set_rules('family_bground', 'family_bground', 'trim|xss_clean');
                    $this->form_validation->set_rules('is_student', 'is_student', 'trim|xss_clean');
                    $this->form_validation->set_rules('is_employed', 'is_employed', 'trim|xss_clean');
                    $this->form_validation->set_rules('newspapers', 'newspapers', 'trim|xss_clean');
                    $this->form_validation->set_rules('magazines', 'magazines', 'trim|xss_clean');
                    $this->form_validation->set_rules('hostel', 'hostel', 'trim|xss_clean');
                    $this->form_validation->set_rules('recommended', 'recommended', 'trim|xss_clean');
                    $this->form_validation->set_rules('todaydate', 'todaydate', 'trim|xss_clean');
                    $this->form_validation->set_rules('signature', 'signature', 'trim|xss_clean');
               
               $data['message_error'] = ($this->form_validation->run() == False) ? validation_errors() : $this->session->flashdata('message');
               if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admission_page',$data);
                   return false;
                   }
                            
                            $result_details = array(
                                'fullname' => $this->input->post('fullname'),
                                'dateofbirth' => $this->input->post('dateofbirth'),
                                'gender' => $this->input->post('gender'),
                                'medium' => $this->input->post('medium'),
                                'father_name' => $this->input->post('father_name'),
                                'father_mobile' => $this->input->post('father_mobile'),
                                'father_profession' => $this->input->post('father_profession'),
                                'permanent_address' => $this->input->post('permanent_address'),
                                'permanent_pincode' => $this->input->post('permanent_pincode'),
                                'permanent_mobile' => $this->input->post('permanent_mobile'),
                                'local_address' => $this->input->post('local_address'),
                                'local_picode' => $this->input->post('local_pincode'),
                                'local_mobile' => $this->input->post('local_mobile'),
                                'email' => $this->input->post('email'),
                                'regular_session' => $this->input->post('regular_session'),
                                'weekend_session' => $this->input->post('weekend_session'),
                                'course' => $this->input->post('course'),
                                'course_optional_subject' => $this->input->post('course_optional_subject'),
                                'qualification_12year' => $this->input->post('qualification_12year'),
                                'qualification_12subject' => $this->input->post('qualification_12subject'),
                                'qualification_12univ' => $this->input->post('qualification_12univ'),
                                'qualification_12marks' => $this->input->post('qualification_12marks'),
                                'qualification_12division' => $this->input->post('qualification_12division'),
                                'qualification_12medium' => $this->input->post('qualification_12medium'),
                                'qualification_Gradyear' => $this->input->post('qualification_Gradyear'),
                                'qualification_Gradsubject' => $this->input->post('qualification_Gradsubject'),
                                'qualification_Graduniv' => $this->input->post('qualification_Graduniv'),
                                'qualification_Graddivision' => $this->input->post('qualification_Graddivision'),
                                'qualification_Gradmarks' => $this->input->post('qualification_Gradmarks'),
                                'qualification_Gradmedium' => $this->input->post('qualification_Gradmedium'),
                                'qualification_PostGyear' => $this->input->post('qualification_PostGyear'),
                                'qualification_PostGsubject' => $this->input->post('qualification_PostGsubject'),
                                'qualification_PostGuniv' => $this->input->post('qualification_PostGuniv'),
                                'qualification_PostGmarks' => $this->input->post('qualification_PostGmarks'),
                                'qualification_PostGdivision' => $this->input->post('qualification_PostGdivision'),
                                'qualification_PostGmedium' => $this->input->post('qualification_PostGmedium'),
                                'qualification_AddQyear' => $this->input->post('qualification_AddQyear'),
                                'qualification_AddQsubject' => $this->input->post('qualification_AddQsubject'),
                                'qualification_AddQuniv' => $this->input->post('qualification_AddQuniv'),
                                'qualification_AddQmarks' => $this->input->post('qualification_AddQmarks'),
                                'qualification_AddQdivision' => $this->input->post('qualification_AddQdivision'),
                                'qualification_AddQmedium' => $this->input->post('qualification_AddQmedium'),
                                'last_exam' => $this->input->post('last_exam'),
                                'optional_subject_main' => $this->input->post('optional_subject_main'),
                                'appeared_civil_exam' => $this->input->post('appeared_civil_exam'),
                                'family_bground' => $this->input->post('family_bground'),
                                'is_student' => $this->input->post('is_student'),
                                'is_employed' => $this->input->post('is_employed'),
                                'newspapers' => $this->input->post('newspapers'),
                                'magazines' => $this->input->post('magazines'),
                                'hostel' => $this->input->post('hostel'),
                                'recommended' => $this->input->post('recommended'),
                                'todaydate' => $this->input->post('todaydate'),
                                'signature' => $this->input->post('signature'),
                                'ip_address' => $this->details->getClientIP()
                                );
                                
                            $submit_results = $this->All_page->InsertSubmitAdmission($result_details);
                            if($submit_results){
                            $this->session->set_flashdata('message', 'Your Admission has been submitted Successfully. You can take printout also!');
                            $this->data['message'] = $this->session->flashdata('message');
                            $this->load->view('admission_print',$data);
                            //redirect(base_url().'careers', 'refresh');
                            return true;
                            }else{
                                $this->session->set_flashdata('message', 'Server Error Occured. Please try after sometimes!');
                                $this->data['message'] = $this->session->flashdata('message');
                                $this->load->view('admission_page',$data);
                                return false;
                            }
                      
	    }catch(Exception $ex){
            $this->session->set_flashdata('message', $e->getMessage());
            $this->data['message'] = $this->session->flashdata('message');
            $this->load->view('admission_page',$data);
            return false;
	   }
	}
	
	public function admission(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['activepage']="admission";
		$this->load->view('admission_page',$data);
	}
	
	public function admission_print(){
	    $data['notification_data']=$this->All_page->GetNotificationDetails();
	    $data['alert_notification_data']=$this->All_page->GetAlertNotification();
	    $data['activepage']="admission";
		$this->load->view('admission_page',$data);
	}
	
	public function send_mail($from='support@webliststore.org',$to='support@webliststore.org',$subject='Test Mail from World Vision Cable',$message='',$cc='support@webliststore.org',$bcc='')
    {
        $mail_subject = $subject;
	    $message_html = '<!DOCTYPE html><html lang="en"><head><meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
                        <style type="text/css">
                        html, body {margin: 0; padding: 0; outline: 0; font-family: "Lucida Grande",Verdana,Arial,Helvetica,sans-serif; font-size: 13px; font-weight: normal; width:100%; height:100%; }
                        body{min-width:320px; margin:0; padding:0; background:#fff;}
                        *, *:before, *:after { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; }
                        .main { width:100%; margin:0; padding:0; display:block; position:relative; }
                        .main-center {background: #f6f6f6; width:100%; max-width:800px; margin:0 auto; display:block; }
                        .center { width:100%; max-width:650px; margin:0 auto; display:block; padding-top:0px; }
                        </style>
                        </head>
                        <body class="background">
                        <div class="main">
                        <div class="main-center">
                        <div class="center">
                        <table style="border: 0px solid #ccc" border="0" cellpadding="0" cellspacing="0" align="center" width="600" bgcolor="#FFFFFF">
                        <tbody>
                        <tr>
                            <td width="500" height="80" align="left" bgcolor="#FFFFFF" style="font-size: 0; line-height: 0; padding: 0 10px">
                            <span style="font-size: 0; line-height: 0"><a href="#" target="_blank" rel="noreferrer"><img src="https://iasshiksha.com/ias/images/shikshaiaslogo.jpg" width="200" border="0"></a></span>
                            </td>
                        
                            <td width="100" align="right" bgcolor="#FFFFFF" class="m_-8518122674246736728responsive-image" style="font-size: 0; line-height: 0; padding: 0 10px">
                            <span style="font-size: 0; line-height: 0"><a href="#" target="_blank" rel="noreferrer"><img src="https://www.webliststore.in/image/icon-andriod.png" width="22" height="24" border="0"></a></span>
                            </td>
                        
                            <td width="25" align="right" bgcolor="#FFFFFF" style="font-size: 0; line-height: 0; padding: 0 10px 0 0"><a href="https://itunes.apple.com/us/app/weblist-store-classified-and-online-shopping/id1256935760?ls=1&mt=8" target="_blank" rel="noreferrer"><img src="https://www.webliststore.in/image/icon-ios.png" width="22" height="24" border="0"></a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" bgcolor="#0093de" style="padding: 30px; font-size: 16px;font-weight: bold; text-align: center; color: #fff"><span style="color:#fff;">IAS SHIKSHA! </span> To have competent, creative and committed faculty</td>
                        </tr>
                        <tr>
                        <td colspan="4" style="padding: 30px 20px 10px; font-size: 14px">
                            <div>'.$message.'</div>
                            <br><br>
                            <div>To be one of the most progressive in the field of learning. <a href="https://iasshiksha.com" style="color:#de1d3c;"><b>IAS SHIKSHA</b></a>.</div>
                            <br></td>
                        </tr>
                        <tr><td colspan="4" style="padding: 20px; font-size: 14px"><div style="font-size: 14px"> <span>Regards,</span></div>
                            <div style="font-size: 14px; padding-top: 10px"> <span>Team World Vision Cable</span> </div></td>
                        </tr>
                        <tr>
                        <td colspan="4" style="padding: 10px 20px; font-size: 14px;background: #0093de;color:#fff;font-size: 10px;">
                        <p>The information contained in this e-mail is private & confidential and may also be legally privileged. If you are not the intended recipient of this mail, please notify us, preferably by e-mail; and do not read, copy or disclose the contents of this message to anyone. Whilst we have taken reasonable precautions to ensure that any attachment to this e-mail has been swept for viruses, e-mail communications cannot be guaranteed to be secure or error free, as information can be corrupted, intercepted, lost or contain viruses. We do not accept liability for such matter or their consequences.</p>
                        </td></tr></tbody></table></div></div></div></body></html>';
	    
        	    $config['protocol']    = 'sendmail';
                $config['mailpath']    = '/usr/sbin/sendmail';
                //$config['smtp_timeout'] = '5'; 
                $config['charset']    = 'utf-8';
                $config['mailtype'] = 'html'; // or html
                $config['validation'] = TRUE;
      
              $config['wordwrap'] = TRUE;
              $config['smtp_host'] = 'mail.webliststore.in';
              $config['smtp_port'] = '465';
              $config['smtp_user'] = 'form@webliststore.in';
              $config['smtp_pass'] = 'weblist@123';

      $this->email->initialize($config);
     
      $this->email->to($to);
      if(isset($bcc)){$this->email->bcc($bcc);}
      $this->email->cc($cc);
      //$this->phpmailer->IsMail();
      $this->email->from($from);
      //$this->email->IsHTML(true);
      $this->email->subject($mail_subject);
      $this->email->message($message_html);
      if($this->email->Send()) {
        return '1';
      }
      else {
        return '0';
      }
    }
}