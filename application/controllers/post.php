<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	session_start();
class Post extends CI_Controller{
		function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}


	function adduser(){
		//$this->load->helper("url");
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$status = $_POST['statusrosi'];
		$type = $_POST['type'];
		$hrsreqd = $_POST['hrsreqd'];
		//die($hrsreqd);
		$this->load->model('post_model');	
		$this->post_model->saveuserdb($username, $password, $status, $type, $hrsreqd);
	}

	function deleteuser(){
		//die($id);
		$this->load->model('post_model');	
		$this->post_model->deleteuserdb($id);

	}
	function absent(){
		$session_data = $this->session->userdata('logged_in');
		$id = $session_data['id'];
		$status = "Absent";
		$this->load->model('post_model');	
		$this->post_model->saveabsentdb($id,$status);
		
	}
	function timein(){
		$session_data = $this->session->userdata('logged_in');
		$id = $session_data['id'];
		$timein = $_POST["timein"];
		$status = $_POST["status"];
		$this->load->model('post_model');	
		$this->post_model->savetimeindb($id,$timein,$status);
	}
	function timeout(){

		$session_data = $this->session->userdata('logged_in');
		$id = $session_data['id'];
		$timeout = $_POST["timeout"];
		$this->load->model('post_model');	
		$this->post_model->savetimeoutdb($id,$timeout);
	}
	function profilesave()
	{
		
		$id = $_POST['userid'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$email1 = $_POST['email1'];
		$email2 = $_POST['email2'];
		$vl = $_POST['vl'];
		$sl = $_POST['sl'];
		$position = $_POST['position'];
		$employeeno = $_POST['employeeno'];
		$status = $_POST['status'];
		$datestart = $_POST['datestart'];
		$dateseperated = $_POST['dateseperated'];
		$hrsreqd = $_POST['hrsreqd'];
		$position_intern = $_POST['position_intern'];
		$school = $_POST['school'];

		
		$sss = $_POST['sss'];
		$pagibig = $_POST['pagibig'];
		$philhealth = $_POST['philhealth'];
		$tin = $_POST['tin'];

 
		$this->load->model("post_model");
		$this->post_model->profilesavedb($id, $firstname, $middlename, $lastname, $position, $employeeno, $status, $datestart, $dateseperated, $sss, $pagibig, $philhealth, $tin, $address, $contact, $email1, $email2, $vl, $sl, $hrsreqd, $school, $position_intern);
	
	}

	function do_upload()
	{
		$session_data = $this->session->userdata('logged_in');
		$id = $session_data['id'];
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$picture = $_FILES['userfile']['name'];		

		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload())
		{
			$this->load->model('post_model');
			$this->post_model->profilepicdb($id,$picture);
		}
	
	}

	function addleaveform(){
		
		$id = $_POST['leaveformuserid']; //for users
		$formid = $_POST['formid'];
		$typeofleave = $_POST['typeofleave'];
		$coverperiod = $_POST['cover_period'];
		$dateofleave = $_POST['dateofleave'];
		$reason = $_POST['reason'];
		$prepared = $_POST['prepared'];
		$checked = $_POST['checked'];
		$approved = $_POST['approved'];
		$formtype = "Leave Form";
		if (isset($_POST['daysfrom'])) {
			if ($coverperiod == "days"){
			$daysfrom = $_POST['daysfrom'];
			} 
		}else{
			$daysfrom = "";	
		}
		if (isset($_POST['daysto']))  {
			if ($coverperiod == "days"){
			$daysto = $_POST['daysto'];
		}
		}else{
			$daysto = "";	
		}
		
		$this->load->model('post_model');
		$this->post_model->saveleaveform($id, $typeofleave, $coverperiod, $dateofleave,  $daysfrom, $daysto, $reason, $prepared, $checked, $approved, $formtype);
	}

	function updateleaveform(){
		$id = $_POST['leaveformuserid'];
		$formid = $_POST['formid'];
		$typeofleave = $_POST['typeofleave'];
		$coverperiod = $_POST['cover_period'];
		$dateofleave = $_POST['dateofleave'];
		$reason = $_POST['reason'];
		
		if (isset($_POST['daysfrom'])) {
			if ($coverperiod == "days"){
			$daysfrom = $_POST['daysfrom'];
			} 
		}else{
			$daysfrom = "";	
		}
		if (isset($_POST['daysto']))  {
			if ($coverperiod == "days"){
			$daysto = $_POST['daysto'];
		}
		}else{
			$daysto = "";	
		}
		$this->load->model("post_model");
		$this->post_model->updateleaveformdb($id, $typeofleave, $coverperiod, $dateofleave,  $daysfrom, $daysto, $reason, $formid);
	}

		function addobusinessform(){
		
		$id = $_POST['obusinessformuserid']; //for users
		
		$location = $_POST['location'];
		$dateappo = $_POST['dateappo'];
		$timeappo_start = $_POST['timeappo_start'];
		$timeappo_end = $_POST['timeappo_end'];
		$purpose = $_POST['purpose'];

		$prepared = $_POST['prepared'];
		$checked = $_POST['checked'];
		$approved = $_POST['approved'];
		$formtype = "OB Form";
		$this->load->model('post_model');
		
		$this->post_model->saveobusinessform($id, $location, $dateappo, $timeappo_start, $timeappo_end, $purpose, $prepared, $checked, $approved, $formtype);
	}

	function updatesignature(){
		$approvedbyname = $_POST['approvedbyname'];
		$approvedbyposition = $_POST['approvedbyposition'];
		$checkedbyname = $_POST['checkedbyname'];
		$checkedbyposition = $_POST['checkedbyposition'];
		$this->load->model("post_model");
		$this->post_model->updatesignaturedb($approvedbyname,$approvedbyposition,$checkedbyname,$checkedbyposition);
	}
	function pcfdetails(){
		$result =json_decode($_POST['data'],true);

		$length = sizeof($result['details']);
		//$data = json_decode(data);
/*		$string = '{"purpose":"","type":"cash","totalexpense":"120.00","totalcash":"30","totalamount":"90.00","preparedby":"samplexx N/A","checkedby":"baw tlga","approvedby":"bkt ","details":[{"date":"2013-05-05","category":"Communication","refno":"","particular":"","amount":"20","remarks":"asacfc"},{"date":"2013-05-02","category":"Communication","refno":"","particular":"","amount":"100","remarks":"ascac"}]}
';
		//$result = array();
		$result = json_decode($string,true);
		 //$array = sizeof($result['details']);
		 echo $result['totalcash'];**/

	$this->load->model("post_model");
	$this->post_model->savepcf($result, $length);
	
	}

	function updatepcfdetails(){
			$result =json_decode($_POST['data'],true);
		$length = sizeof($result['details']);
		$this->load->model("post_model");
	$this->post_model->updatepcf($result, $length);
	}

function obdetails(){
	$result = json_decode($_POST['data'],true);
	$length = sizeof($result['details']);
	$this->load->model("post_model");
	$this->post_model->saveob($result, $length);
}
function updateobdetails(){
	$result = json_decode($_POST['data'],true);
	$length = sizeof($result['details']);
	$this->load->model("post_model");
	$this->post_model->updateob($result, $length);
}

function allformsjson(){
 	$this->load->model("post_model");
 	$array = $this->post_model->getallformsjson();
 	
 	$array = json_encode($array);
 	$this->output->set_content_type('application/json');
 	
 	$this->output->set_output($array);
//'{"items":'. json_encode($employees) .'}'
}

function myformsjson(){
		$session_data = $this->session->userdata('logged_in');
		$id = $session_data['id'];
 	$this->load->model("post_model");
 	$array = $this->post_model->getmyformsjson($id);
 	
 	$array = json_encode($array);
 	$this->output->set_content_type('application/json');
 	
 	$this->output->set_output($array);
//'{"items":'. json_encode($employees) .'}'
}

	function approveform(){
		$formid = $_POST['formid'];
		$formtype = $_POST['formtype'];
		$id = $_POST['userid'];
		$this->load->model("post_model");
		$this->post_model->approveformdb($formid, $formtype, $id);
	}




function deleteform($formtype, $formid){

	$this->load->model("post_model");
	$this->post_model->deleteformdb($formtype, $formid);


}

function addholiday(){
	$holidate = $_POST["holidate"];
	$holiname = $_POST["holiname"];

	$this->load->model("post_model");
	$this->post_model->savecalendarinfo($holiname, $holidate, $holidate);
	$this->post_model->saveholiday($holidate, $holiname);
}

function deleteholiday($id){
	$this->load->model("post_model");
	$this->post_model->deleteholiday($id);
}

function updateaccount(){
	$id = $_POST['id-account'];
	$username = $_POST['username-account'];
	$password = md5($_POST['password-account']);

	$this->load->model("post_model");
	$this->post_model->updateaccountdb($id, $username, $password);
}
 function calendarinfo(){
 	$title = $_POST['title'];
 	$start = $_POST['startdate'];
 	$end = $_POST['enddate'];

 	$this->load->model("post_model");
 	$this->post_model->savecalendarinfo($title, $start, $end);

 }




	function calendarinfojson(){
		$this->load->model("post_model");
		$array = $this->post_model->getcalendarinfojson();

		$array = json_encode($array);
			$this->output->set_content_type('application/json');
 	$this->output->set_output($array);

	}

	function deletecalendar($id){
		$this->load->model("post_model");
		$this->post_model->deletecalendarinfo($id);
	}

	function updatedtremployee(){
	$user = $_POST['user'];
	$date = $_POST['date'];
	$timein = $_POST['timein'];
	$timeout = $_POST['timeout'];
	$status = $_POST['status'];
	$sl = $_POST['sl'];
	$vl = $_POST['vl'];

		if (!isset($_POST['status']))  {
		$status = "Absent";
	}else{
			$status = "Present";
	}
	
		if (!isset($_POST['sl']))  {
		$sl = "1";
	}else{
		$sl = "0";
	}	
		if (!isset($_POST['vl']))  {
		$vl = "1";
	}else{
		$vl = "0";
	}	


	$this->load->model('post_model');
	$this->post_model->updatedtremployee_model($user, $date, $timein, $timeout, $status, $sl, $vl);
}

function updatedtrintern(){
	$user = $_POST['user'];
	$date = $_POST['date'];
	$timein = $_POST['timein'];
	$timeout = $_POST['timeout'];
	$hrsday = $_POST['hrsday'];
	$minday = $_POST['minday'];
	
	$this->load->model('post_model');
	$this->post_model->updatedtrintern_model($user, $date, $timein, $timeout, $hrsday, $minday);
}
}
?>