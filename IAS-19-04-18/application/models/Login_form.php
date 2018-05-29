<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_form extends CI_Model{
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function check_login($data){
    $sql = "SELECT * FROM user WHERE userid='$data'";        
    $query = $this->db->query($sql);        
    return $query->result_array();
    }
    
    public function post_forgot_password($data){
    $this->db->insert('forgot_password_request',$data);
    $insert_id = $this->db->insert_id();
    return  $insert_id;
    }
    
    public function Check_Email_Forgot($data){
    $sql = "SELECT * FROM user WHERE email='$data'";        
    $query = $this->db->query($sql);        
    return $query->result_array();
    }
    
    public function Reset_Password($data){
    $password = md5($data['password']);
    $sql = "UPDATE user SET password='$password' WHERE email='$data[email]'";
    return $this->db->query($sql);
    }
    
    public function submit_signup($data){
    $this->db->insert('user',$data);
    $insert_id = $this->db->insert_id();
    return  $insert_id;
    }
    
    public function InsertNewEnquiry($data){
    $this->db->insert('request_enquiry',$data);
    $insert_id = $this->db->insert_id();
    return  $insert_id;
    }
    
    public function InsertNewAdmission($data){
    $this->db->insert('request_admission',$data);
    $insert_id = $this->db->insert_id();
    return  $insert_id;
    }
    
    public function InsertNewSubscription($data){
    $this->db->insert('request_subscription',$data);
    $insert_id = $this->db->insert_id();
    return  $insert_id;
    }
    
}