<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	session_start();
class System extends CI_Controller {

	function __construct(){

		parent::__construct();
	
	}

	public function index(){


		if($this->session->userdata('logged_in')){

			$session_data = $this->session->userdata('logged_in');
      $data['id'] = $session_data['id'];
     $data['username'] = $session_data['username'];
     $data['type'] = $session_data['type'];

     $this->load->view('home', $data);

		}
		else{
			redirect(base_url('index.php/system/login'));
		}
	}
	function login(){

		$this->load->view('login');
	}

	 function check_database(){
   //Field validation succeeded.&nbsp; Validate against database
   

   //query the database
   $this->load->model('user');
   $username = $_POST['username'];
   $password = md5($_POST['password']);  
 
   $result = $this->user->login($username, $password);

  
 
   if($result)
   {
     
     $sess_array = array();
     foreach($result as $row)
     {
      //die($row->status);
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username,
         'status' => $row->status,
         'type' => $row->type
       );

       $this->session->set_userdata('logged_in', $sess_array);
     }
    
     
      redirect(base_url('index.php/home'));
   }
   else
   {

    redirect(base_url("index.php/system/index"));
    
    
   }
 }

 

 


	

}

/* End of file welcome.php */
