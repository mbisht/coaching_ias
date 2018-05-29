<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_details extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_user_details($data){
        $sql = "SELECT *, us.id AS customer_id FROM user us WHERE us.id='$data'";        
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function getPrelimsDetails($data){
        $sql = "SELECT *, om.id as QID,om.date_added as DateAdded, om.date_modified as ModifiedDate FROM online_test_submit_prelims om INNER JOIN online_test_prelims_question_set otp ON otp.question_set=om.question_type LEFT JOIN online_test_subjects ot ON ot.id=otp.subject_id WHERE om.user_id='$data' ORDER BY om.date_added DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function getMainsDetails($data){
        $sql = "SELECT *, om.id as QID,om.file_url as ResultFile,om.date_added as DateAdded, om.date_modified as ModifiedDate FROM online_test_mains_submission om INNER JOIN user us ON us.id=om.user_id LEFT JOIN online_test_mains ot ON ot.id=om.question_id WHERE om.user_id='$data' ORDER BY om.date_added DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function getOptionalDetails($data){
        $sql = "SELECT *, om.id as QID,om.file_url as ResultFile,om.date_added as DateAdded, om.date_modified as ModifiedDate FROM online_test_optional_submission om INNER JOIN user us ON us.id=om.user_id LEFT JOIN online_test_optional ot ON ot.id=om.question_id WHERE om.user_id='$data' ORDER BY om.date_added DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    
    public function get_user_active_internet_package($data){
        $sql = "SELECT *, ip.id as packageId, ip.Name as Package_name, nt.Name as Provider_name FROM user_has_broadband ub INNER JOIN internet_pack ip ON ip.id=ub.package_id INNER JOIN network_type nt ON nt.id=ip.Network_id WHERE user_id='$data'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    
    public function change_user_password($data){
        $password=array('password'=>md5($data['user_password']));
        $this->db->where('id',$data['id']);
        return $this->db->update('user',$password);
    }
    

    
    public function guest_blog_submission($data){
        return $this->db->insert('guest_blog', $data);
    }
    
    public function get_post_payments($data){
        $sql = "SELECT * FROM wvc_payment pa INNER JOIN wvc_transaction tr ON tr.id=pa.transaction_id WHERE pa.user_id='$data' AND pa.Status='1' ORDER BY pa.Date_added DESC LIMIT 12";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function post_complaint_submission($data){
        return $this->db->insert('complaint', $data);
    }
    
    public function get_post_complaint($data){
        $sql = "SELECT * FROM complaint WHERE user_id='$data' AND status='1' ORDER BY created_at DESC LIMIT 12";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}