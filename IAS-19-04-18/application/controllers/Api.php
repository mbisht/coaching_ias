<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

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
        $this->load->model('All_api');
        $this->load->library('email');
        $this->load->library('details');
	}
	
	public function add_guest_blog(){
	    header('Content-type: application/json');
        ini_set('memory_limit', '-1');
	    if($_SERVER['REQUEST_METHOD'] == "POST"){
	        try{
            $cust_id = $this->security->xss_clean($_REQUEST['cust_id']);
            $title = $this->security->xss_clean($_REQUEST['title']);
            $description = $this->security->xss_clean($_REQUEST['description']);
            
         if(empty($cust_id) || empty($title) || empty($description)) {
            echo json_encode(array("code"=>"201","status"=>"error","message"=>"Please fill all the Fields!"));
            return true;
            exit();
         }
         
                     $customer_details = array(
                        'cust_id' => $cust_id,
                        'title' => $title,
                        'description' => $description,
                        'slug' => url_title($title, '-', true),
                        'status	' => '2',
                        'ip'   => $this->details->getClientIP()
                         );
         
                $quiz_details = $this->All_api->InsertNewGuestBlog($customer_details);
                
            if ($quiz_details){
            echo json_encode(array("code"=>"200","status"=>"succes","message"=>"New Guest blog added Sucessfully"));
            return true;
            }else{
                    echo json_encode(array("code"=>"202","status"=>"error","message"=>'Server error occured'));
                    return true;
            }
	        }catch(Exception $ex){
			echo json_encode(array("response"=>206,"status"=>"error","message"=>$ex->getMessage()));
            return true;
			exit();
		}
	  }else{
	        echo json_encode(array("code"=>"204","status"=>"error","message"=>'Wrong Method'));
            return true;
	    }
	}
	
	public function submit_main_test(){
	    header('Content-type: application/json');
        ini_set('memory_limit', '-1');
	    if($_SERVER['REQUEST_METHOD'] == "POST"){
	        try{
    	       if(!isset($_REQUEST['cust_id']) || !isset($_REQUEST['question_id']) || !isset($_FILES['file']['name'])){
        	        echo json_encode(array("code"=>"206","status"=>"error","message"=>"Please fill all the fields!"));
                    return true;
                    exit();
    	       }
            $cust_id = $this->security->xss_clean($_REQUEST['cust_id']);
            $question_id = $this->security->xss_clean($_REQUEST['question_id']);
            $file1 = $_FILES['file']['name'];
            
            $config['upload_path']          = './assets/files/mains/';
               $config['allowed_types']        = 'pdf';
               $config['max_size']             = 999999;
               $config['remove_spaces']        = TRUE;
               $this->load->library('upload',$config);
			       
			            if(!$this->upload->do_upload('file')){
                            echo json_encode(array("code"=>"206","status"=>"error","message"=>$this->upload->display_errors()));
                            return true;
                            exit();
                        }else{
                        $upload_data = $this->upload->data();
                        $file_name = $upload_data['file_name'];
                        $customer_details = array(
                        'user_id' => $cust_id,
                        'question_id' => $question_id,
                        'file_url' => $file_name,
                        'ip'   => $this->details->getClientIP()
                         );
         
                                $quiz_details = $this->All_api->SubmitMainTest($customer_details);
                                if ($quiz_details){
                                echo json_encode(array("code"=>"200","status"=>"succes","message"=>"Mains Online test submitted Sucessfully"));
                                return true;
                                }else{
                                echo json_encode(array("code"=>"202","status"=>"error","message"=>'Server error occured'));
                                return true;
                                }
            
                        }
	        }catch(Exception $ex){
			echo json_encode(array("response"=>206,"status"=>"error","message"=>$ex->getMessage()));
            return true;
			exit();
		}
	  }else{
	        echo json_encode(array("code"=>"204","status"=>"error","message"=>'Wrong Method'));
            return true;
	    }
	}
	
	public function submit_optional_test(){
	    header('Content-type: application/json');
        ini_set('memory_limit', '-1');
	    if($_SERVER['REQUEST_METHOD'] == "POST"){
	        try{
    	       if(!isset($_REQUEST['cust_id']) || !isset($_REQUEST['question_id']) || !isset($_FILES['file']['name'])){
        	        echo json_encode(array("code"=>"206","status"=>"error","message"=>"Please fill all the fields!"));
                    return true;
                    exit();
    	       }
            $cust_id = $this->security->xss_clean($_REQUEST['cust_id']);
            $question_id = $this->security->xss_clean($_REQUEST['question_id']);
            $file1 = $_FILES['file']['name'];
            
            $config['upload_path']          = './assets/files/optional/';
               $config['allowed_types']        = 'pdf';
               $config['max_size']             = 999999;
               $config['remove_spaces']        = TRUE;
               $this->load->library('upload',$config);
			       
			            if(!$this->upload->do_upload('file')){
                            echo json_encode(array("code"=>"206","status"=>"error","message"=>$this->upload->display_errors()));
                            return true;
                            exit();
                        }else{
                        $upload_data = $this->upload->data();
                        $file_name = $upload_data['file_name'];
                        $customer_details = array(
                        'user_id' => $cust_id,
                        'question_id' => $question_id,
                        'file_url' => $file_name,
                        'ip'   => $this->details->getClientIP()
                         );
         
                                $quiz_details = $this->All_api->SubmitOptionalTest($customer_details);
                                if ($quiz_details){
                                echo json_encode(array("code"=>"200","status"=>"succes","message"=>"Optional Online test submitted Sucessfully"));
                                return true;
                                }else{
                                echo json_encode(array("code"=>"202","status"=>"error","message"=>'Server error occured'));
                                return true;
                                }
            
                        }
	        }catch(Exception $ex){
			echo json_encode(array("response"=>206,"status"=>"error","message"=>$ex->getMessage()));
            return true;
			exit();
		}
	  }else{
	        echo json_encode(array("code"=>"204","status"=>"error","message"=>'Wrong Method'));
            return true;
	    }
	}
	
	public function check_user_to_access_test(){
	    header('Content-type: application/json');
        ini_set('memory_limit', '-1');
	    if($_SERVER['REQUEST_METHOD'] == "POST"){
	        try{
    	       if(!isset($_REQUEST['user_id']) || !isset($_REQUEST['question_id'])){
        	        echo json_encode(array("code"=>201,"status"=>"error","message"=>"Please fill all the fields!"));
                    return true;
                    exit();
    	       }
            $user_id = $this->security->xss_clean($_REQUEST['user_id']);
            $question_id = $this->security->xss_clean($_REQUEST['question_id']);
            
            $data['GetUserDetails'] = $this->All_api->GetUserDetail($user_id);
            
            if(in_array("1", explode(",",$data['GetUserDetails'][0]['role']))){
        	    $data['online_test_prelims_submitted']=$this->All_api->GetOnlineTestPrelimsSubmitted(array("user_id"=>$user_id,"quetion_id"=>$question_id));
        	    if(!$data['online_test_prelims_submitted']){
                		echo json_encode(array("code"=>200,"status"=>"succes","message"=>"User has permission to access this test"));
                        return true;
        	    }else{
        	        $data['GetSpecialUserForPrelims']=$this->All_api->GetSpecialUserForPrelims(array("user_id"=>$user_id,"quetion_id"=>$question_id));
        	        if($data['GetSpecialUserForPrelims'] && $data['GetSpecialUserForPrelims']['0']['status'] >= count($data['online_test_prelims_submitted'])){
                		echo json_encode(array("code"=>"200","status"=>"succes","message"=>"User has permission to access this test"));
                        return true;
        	        }else{
        	        echo json_encode(array("code"=>203,"status"=>"error","message"=>"User has already attended this test"));
                    return true;
        	        }
                }
        }else{
            echo json_encode(array("code"=>202,"status"=>"error","message"=>"User don't have permission to access this test"));
            return true;
        }
	        }catch(Exception $ex){
			echo json_encode(array("response"=>206,"status"=>"error","message"=>$ex->getMessage()));
            return true;
			exit();
		}
	  }else{
	        echo json_encode(array("code"=>204,"status"=>"error","message"=>'Wrong Method'));
            return true;
	    }
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