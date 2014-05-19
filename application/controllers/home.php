<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	session_start();
class Home extends CI_Controller {
			function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function allforms(){
		
		$this->load->view('allforms');
	}

	function myforms(){
		
		$this->load->view('myforms');
	}
	
	function index(){

		if($this->session->userdata('logged_in')){

			$session_data = $this->session->userdata('logged_in');
			$id = $session_data['id'];
		 $data['id'] = $session_data['id'];

     $data['username'] = $session_data['username'];
     $data['status'] = $session_data['status'];
     $data['type'] = $session_data['type'];
     $this->load->model("post_model");
     $result = $this->post_model->getsignature(); 
     $data['checkedbyname'] = $result->checkedbyname;
     $data['checkedbyposition'] = $result->checkedbyposition;
     $data['approvedbyname'] = $result->approvedbyname;
     $data['approvedbyposition'] = $result->approvedbyposition;

     $result2 = $this->post_model->getuser($id);

     $data['username_account'] = $result2->username;
     $datenow = date('Y-m-d');
     $data['event'] = $this->post_model->getevent($datenow);
     $this->load->view('home', $data);

		}
		else{
			redirect(base_url('index.php/system'));
		}
	}

	function logout(){
		 $this->session->unset_userdata('logged_in');
	   session_destroy();
     redirect(base_url('index.php/home'), 'refresh');

	}

	function attend(){

		$session_data = $this->session->userdata('logged_in');
		$id = $session_data['id'];
		$data['userstatus'] = $session_data['status'];
		//$result = true;

	
		$this->load->model('post_model');

		$resulttimein = $this->post_model->checktimeindb($id); 
		$resulttimeout = $this->post_model->checktimeoutdb($id);
		$resultabsent = $this->post_model->checkabsentdb($id);
		$data['absent'] = "present";
		if ($resultabsent){
			$data['absent'] = "absent";
			$data['dtr'] = 2;
		}
		else{


			if($resulttimein){

				$data['dtr'] = 1;
				if($resulttimeout){
					$data['dtr'] = 2;
				}
			}
			else{
				
				
				$data['dtr'] = 0;
			}
		}

		$data['query'] = $this->post_model->getdtr($id);

	$hrtotal = 0;
  $mintotal = 0;
  $dayno = 0;
 	
 	$result = $this->post_model->getdtrsum($id);

 	if($result){
 	foreach ($result as $row) {
  	$date = $row->date;
    $hrday = $row->hrsday;
    $minday = $row->minday;

  	$hrtotal += $hrday;
  	$mintotal += $minday;
  	$dayno++;

  	while ($mintotal >= 60){
    $addhrtotal = (int)($mintotal/60);
    $hrtotal += $addhrtotal;
    $mintotal %= 60;
  	}
  }
}
  	$data['hrtotal'] = $hrtotal;
  	$data['mintotal'] = $mintotal;

		$this->load->view('attend',$data);
		$this->post_model->savetotalhrs($id, $hrtotal, $mintotal);
	}

	function profile(){
		$session_data = $this->session->userdata('logged_in');
		$id = $session_data['id'];
		$this->load->model('post_model');
	
		$result = $this->post_model->getprofile($id);
		
		$data['picture'] = "";
		$data['firstname'] = "";
		$data['middlename'] = "";
		$data['lastname'] = "";
		$data['address'] = "";
		$contact['contact'] = "";
		$email1['email1'] = "";
		$email2['email2'] = "";
		$data['position'] = "";
		$data['employeeno'] = "";
		$data['status'] = "";
		$data['datestart'] = "";
		$data['dateseperated'] = "";
		$data['sss'] = "";
		$data['pagibig'] = "";
		$data['philhealth'] = "";
		$data['tin'] = "";
			$data['vl'] = "";
		$data['sl'] = "";
		$data['position_intern'] = "";
		$data['school'] = "";
		$data['hrsreqd'] = "";

		if ($result) {
			$data['picture'] = $result->picture;
			$data['firstname'] = $result->firstname;
			$data['middlename'] = $result->middlename;;
			$data['lastname'] = $result->lastname;
			$data['address'] = $result->address;
			$data['contact'] = $result->contact;
			$data['email1'] = $result->email1;
			$data['email2'] = $result->email2;
			$data['position'] = $result->position;
			$data['employeeno'] = $result->employeeno;
			$data['status'] = $result->status;
			$data['datestart'] = $result->datestart;
			$data['dateseperated'] = $result->dateseperated;
			$data['position_intern'] = $result->position_intern;
			$data['school'] = $result->school;
			$data['hrsreqd'] = $result->hrs_required;

			if ($result->datestart == "0000-00-00"){
				$data['datestart'] == "";
			}
			if ($result->dateseperated == "0000-00-00"){
				$data['dateseperated'] == "";
			}
			$data['sss'] = $result->sss;
			$data['pagibig'] = $result->pagibig;
			$data['philhealth'] = $result->philhealth;
			$data['tin'] = $result->tin;
				$data['vl'] = $result->totalvl;
			$data['sl'] = $result->totalsl;
		}

		
	//	
		
		$this->load->view('profile',$data);
	}
	function profileupload(){
		$session_data = $this->session->userdata('logged_in');
		$id = $session_data['id'];
		$this->load->model('post_model');
		$result = $this->post_model->getprofile($id);
		$data['picture'] = "";
		$data['id'] = $session_data['id'];
		if ($result) {
			$data['picture'] = $result->picture;
		
		}
		
	//	
		
		$this->load->view('profileupload',$data);

	}
		function viewuser(){
			$this->load->model("user");
     $data['query'] = $this->user->showalluser();
			$this->load->view('viewuser',$data);
		}

	function forms(){
		$session_data = $this->session->userdata('logged_in');
		$data['id'] = $session_data['id'];
		  $data['usertype'] = $session_data['type'];
		$this->load->view('forms',$data);
	}
//	function leaveform(){
//	$this->load->view('leaveform');
//	}

	function leaveform($id, $formid, $status, $action, $formview){
	

		$this->load->model("post_model");
		$result = $this->post_model->getprofile($id);
		$data['id'] ="";
		$data['firstname']="";
		$data['lastname']="";
		$data['position']="";
		$data['status']= $status;
		$data['vl'] = "";
		$data['sl'] = "";
		$data['action'] = $action;
		$data['formid'] = $formid;
		$data['formview'] = $formview;
	 	$data['typeofleave'] = "";
    	$data['dateprep'] = "";
    	$data['cover_period'] = "";
    	$data['dateofleave'] = "";
    	$data['daysfrom'] = "";
    	$data['daysto'] = "";
    	$data['reason'] = "";					
    	$session_data = $this->session->userdata('logged_in');
    	$data['usertype'] = $session_data['type'];
		if($result){
			$data['id'] = $result->users;
			$data['firstname'] = $result->firstname;
			$data['lastname'] = $result->lastname;
			$data['position'] = $result->position;
			$data['vl'] = $result->totalvl;
			$data['sl'] = $result->totalsl;
		}
		$result2 = $this->post_model->getsignature(); 
    $data['checkedbyname'] = $result2->checkedbyname;
    $data['approvedbyname'] = $result2->approvedbyname;
  

  if($status <> "None"){
  

   	 $result3 = $this->post_model->getleave($formid);
  
    if($result3){

    	$data['typeofleave'] = $result3->typeofleave;
    	$data['dateprep'] = $result3->date;
    	$data['cover_period'] = $result3->cover_period;
    	$data['dateofleave'] = $result3->dateofleave;
    	$data['daysfrom'] = $result3->daysfrom;
    	$data['daysto'] = $result3->daysto;
    	$data['reason'] = $result3->reason;
    
    }

   
  }
		$this->load->view('leaveform',$data);

	//	$this->load->view('obusinessform',$data);
		
	}
	function obusinessform($id, $formid, $status, $action, $formview){

		$this->load->model("post_model");
		$result = $this->post_model->getprofile($id);
		$data['id'] ="";
		$data['firstname']="";
		$data['lastname']="";
		$data['position']="";
		$data['status']= $status;
		$data['action'] = $action;
		$data['formid'] = $formid;
		$data['formview'] = $formview;

		  $session_data = $this->session->userdata('logged_in');
		  $data['usertype'] = $session_data['type'];

    $data['dateprep'] = "";
  			$data['location1'] = "";
  			$data['location2'] = "";
  			$data['client1']  = "";
  			$data['client2'] = "";
  			$data['dateappo'] = "";
  			$data['timestart'] = "00:00:00";
  			$data['timeend'] = "";
  			$data['purpose'] = "";
  			$data['totalamount'] = "0.00";
  			$data['result4'] = "";
  			$data['empty'] = "";
		if($result){
			$data['id'] = $result->users;
			$data['firstname'] = $result->firstname;
			$data['lastname'] = $result->lastname;
			$data['position'] = $result->position;
			
		}
		$result2 = $this->post_model->getsignature(); 
    $data['checkedbyname'] = $result2->checkedbyname;
    $data['approvedbyname'] = $result2->approvedbyname;
		

  if($status <> "none"){
  	
  		$result3 = $this->post_model->getob($formid);
  		if ($result3){

  		
  			$data['dateprep'] = $result3->date;
  			$data['location1'] = $result3->location_start;
  			$data['location2'] = $result3->location_end;
  			$data['client1']  = $result3->client_start;
  			$data['client2'] = $result3->client_end;
  			$data['dateappo'] = $result3->date_appointment;
  			$data['timestart'] = $result3->timeappo_start;
  			$data['timeend'] = $result3->timeappo_end;
  			$data['purpose'] = $result3->purpose;
  			$data['totalamount'] = $result3->total_amount;
  	
		}

  		$result4 = $this->post_model->getobdetails($formid);
  	if($result4){
  			$data['result4'] = $result4;
  			$data['empty'] = false;
  	}
  	else{
  		$data['empty'] = true;
  	}
  
	}

		$this->load->view('obusinessform',$data);
	}
		function pcfliquidation($id, $formid, $status, $action, $formview){

		$this->load->model("post_model");
		$result = $this->post_model->getprofile($id);
		$data['id'] ="";
		$data['firstname']="";
		$data['lastname']="";
		$data['position']="";
		$data['status']=$status;
		$data['action'] = $action;
		$data['formid'] = $formid;
		$data['formview'] = $formview;
		 $session_data = $this->session->userdata('logged_in');
		  $data['usertype'] = $session_data['type'];
				$data['type']= "";
				$data['purpose'] = "";
  			$data['dateprep'] = "";
  			$data['totalexpenses'] = "0.00";
  			$data['totalcashadvance'] = "0.00";
  			$data['totalliquidation'] = "0.00";
  			$data['result4'] = "";
  			$data['empty'] = "";

		if($result){
			$data['id'] = $result->users;
			$data['firstname'] = $result->firstname;
			$data['lastname'] = $result->lastname;
			$data['position'] = $result->position;
			
		}
		$result2 = $this->post_model->getsignature(); 
    $data['checkedbyname'] = $result2->checkedbyname;
    $data['approvedbyname'] = $result2->approvedbyname;
		

		if($status <> "none"){
  	
  		$result3 = $this->post_model->getpcf($formid);
  		if ($result3){
  			$data['type'] = $result3->type;
  			$data['purpose'] = $result3->purpose;
  			$data['dateprep'] = $result3->date;
  			$data['totalexpenses'] = $result3->total_expenses;
  			$data['totalcashadvance'] = $result3->total_cashadvance;
  			$data['totalliquidation'] = $result3->total_liquidation; 
  		
  		
		}

  		$result4 = $this->post_model->getpcfdetails($formid);
  	if($result4){
  			$data['result4'] = $result4;
  			$data['empty'] = false;
  	}
  	else{
  		$data['empty'] = true;
  	}
  
	}

		$this->load->view('pcfliquidation',$data);
	}
	function dtrreportemployee($id, $from, $to){
		
		$this->load->model('post_model');
		
		$result = $this->post_model->getprofile($id);
		$data['firstname'] = "";
		$data['middlename'] = "";
		$data['lastname'] = "";
		$data['employeeno'] = "";
		
		if($result){
		$data['firstname'] = $result->firstname;
		$data['middlename'] = $result->middlename;
		$data['lastname'] = $result->lastname;
		$data['employeeno'] = $result->employeeno;

		}

		$data['result2'] = $this->post_model->getdtrwddate($id, $from, $to);
		$data['result3'] = $this->post_model->getholidaydtr($from, $to);
		$data['result6'] = $this->post_model->getobattend($id, $from, $to);

		$result4 = $this->post_model->getdtrwddate($id, $from, $to);
		$result5 = $this->post_model->getholidaydtr($from, $to);
		$result7 = $this->post_model->getobattend($id, $from, $to);
		 
		
		$sltotal = 0;
		$vltotal = 0;
		$holiday = 0;
		 $weekends= 0;
		 $absent = 0;
    $present = 0;
    $days = 0;
    $obtotal = 0;

    if($result7){
    	foreach ($result7 as $row) {
    		# code...
    		$ob = $row->ob;

    		$obtotal += $ob;
    	}
    }
    if($result4){
		foreach ($result4 as $row) {
			 $sl = $row->sl;
       $vl = $row->vl;
       $date = date('D M j, Y', strtotime($row->date));
       $dayname = date('D', strtotime($row->date));
			$status = $row->status;
     
			if($result5){
       foreach ($result5 as $row1) {
       		$datecheck = date('D M j, Y', strtotime($row1->date));
       		 $dayname1 = date('D', strtotime($row->date));
       	if((($dayname1 == "Sat") || ($dayname1 == "Sun")) && ($datecheck == $date)) {
       				$weekends--;
       }
       		if($datecheck == $date){
       			$holiday++;
       			break;
       		}
       	}}
       		if(($dayname == "Sat") || ($dayname == "Sun") ){
       			 $weekends++;
       		}else{
       			  $sltotal += $sl;
       				$vltotal += $vl;
       			if($status == "Absent"){
       				 $absent++;
       			}else{
       				$present++; //days worked DAPAT KASAMA NA ANG OB!
       			}

       		}

       
     
     
       $days++;
		}
	}
		$data['sltotal'] = $sltotal;
		$data['vltotal'] = $vltotal;
		$data['holiday'] = $holiday;
		$data['weekends'] = $weekends;
		$data['absent'] = $absent;
		$data['present'] = $present;
		$data['days'] = $days;
		$data['employeeid'] = $id;
		$data['from'] = $from;
		$data['to'] = $to;
		$data['obtotal'] = $obtotal;
		
		$this->load->view('dtrreportemployee',$data);
	}
	function dtrreportemployee_show($id, $from, $to){
		
		$this->load->model('post_model');
		
		$result = $this->post_model->getprofile($id);
		$data['firstname'] = "";
		$data['middlename'] = "";
		$data['lastname'] = "";
		$data['employeeno'] = "";
		
		if($result){
		$data['firstname'] = $result->firstname;
		$data['middlename'] = $result->middlename;
		$data['lastname'] = $result->lastname;
		$data['employeeno'] = $result->employeeno;

		}

	$data['result2'] = $this->post_model->getdtrwddate($id, $from, $to);
		$data['result3'] = $this->post_model->getholidaydtr($from, $to);
		$data['result6'] = $this->post_model->getobattend($id, $from, $to);

		$result4 = $this->post_model->getdtrwddate($id, $from, $to);
		$result5 = $this->post_model->getholidaydtr($from, $to);
		$result7 = $this->post_model->getobattend($id, $from, $to);
		 
		
		$sltotal = 0;
		$vltotal = 0;
		$holiday = 0;
		 $weekends= 0;
		 $absent = 0;
    $present = 0;
    $days = 0;
    $obtotal = 0;

    if($result7){
    	foreach ($result7 as $row) {
    		# code...
    		$ob = $row->ob;

    		$obtotal += $ob;
    	}
    }
    if($result4){
		foreach ($result4 as $row) {
			 $sl = $row->sl;
       $vl = $row->vl;
       $date = date('D M j, Y', strtotime($row->date));
       $dayname = date('D', strtotime($row->date));
			$status = $row->status;
     
			if($result5){
       foreach ($result5 as $row1) {
       		$datecheck = date('D M j, Y', strtotime($row1->date));
       $dayname1 = date('D', strtotime($row->date));

       		if((($dayname1 == "Sat") || ($dayname1 == "Sun")) && ($datecheck == $date)) {
       				$weekends--;
       }
       		if($datecheck == $date){
       			$holiday++;
       			break;
       		}
       	}}
       		if(($dayname == "Sat") || ($dayname == "Sun") ){
       			 $weekends++;
       		}else{
       			  $sltotal += $sl;
       				$vltotal += $vl;
       			if($status == "Absent"){
       				 $absent++;
       			}else{
       				$present++; //days worked DAPAT KASAMA NA ANG OB!
       			}

       		}

       	
     
     
       $days++;
		}
	}
		$data['sltotal'] = $sltotal;
		$data['vltotal'] = $vltotal;
		$data['holiday'] = $holiday;
		$data['weekends'] = $weekends;
		$data['absent'] = $absent;
		$data['present'] = $present;
		$data['days'] = $days;
		$data['employeeid'] = $id;
		$data['from'] = $from;
		$data['to'] = $to;
		$data['obtotal'] = $obtotal;
			    	  $data['checkedbyname'] = "";
	    $data['approvedbyname'] = "";
	    	  $data['checkedbyposition'] = "";
	    $data['approvedbyposition'] = "";
				$result2 = $this->post_model->getsignature(); 
	    if($result2){
	    	  $data['checkedbyname'] = $result2->checkedbyname;
	    $data['approvedbyname'] = $result2->approvedbyname;
	    	  $data['checkedbyposition'] = $result2->checkedbyposition;
	    $data['approvedbyposition'] = $result2->approvedbyposition;
	    }
	  
		$this->load->view('dtrreportemployee_show',$data);
	}

		function printdtremployee($id, $from, $to){
		
		$this->load->model('post_model');
		
		$result = $this->post_model->getprofile($id);
		$data['firstname'] = "";
		$data['middlename'] = "";
		$data['lastname'] = "";
		$data['employeeno'] = "";
		
		if($result){
		$data['firstname'] = $result->firstname;
		$data['middlename'] = $result->middlename;
		$data['lastname'] = $result->lastname;
		$data['employeeno'] = $result->employeeno;

		}

	$data['result2'] = $this->post_model->getdtrwddate($id, $from, $to);
		$data['result3'] = $this->post_model->getholidaydtr($from, $to);
		$data['result6'] = $this->post_model->getobattend($id, $from, $to);

		$result4 = $this->post_model->getdtrwddate($id, $from, $to);
		$result5 = $this->post_model->getholidaydtr($from, $to);
		$result7 = $this->post_model->getobattend($id, $from, $to);
		 
		
		$sltotal = 0;
		$vltotal = 0;
		$holiday = 0;
		 $weekends= 0;
		 $absent = 0;
    $present = 0;
    $days = 0;
    $obtotal = 0;

    if($result7){
    	foreach ($result7 as $row) {
    		# code...
    		$ob = $row->ob;

    		$obtotal += $ob;
    	}
    }
    if($result4){
		foreach ($result4 as $row) {
			 $sl = $row->sl;
       $vl = $row->vl;
       $date = date('D M j, Y', strtotime($row->date));
       $dayname = date('D', strtotime($row->date));
			$status = $row->status;
     
			if($result5){
       foreach ($result5 as $row1) {
       		$datecheck = date('D M j, Y', strtotime($row1->date));
       $dayname1 = date('D', strtotime($row->date));

       		if((($dayname1 == "Sat") || ($dayname1 == "Sun")) && ($datecheck == $date)) {
       				$weekends--;
       }
       		if($datecheck == $date){
       			$holiday++;
       			break;
       		}
       	}}
       		if(($dayname == "Sat") || ($dayname == "Sun") ){
       			 $weekends++;
       		}else{
       			  $sltotal += $sl;
       				$vltotal += $vl;
       			if($status == "Absent"){
       				 $absent++;
       			}else{
       				$present++; //days worked DAPAT KASAMA NA ANG OB!
       			}

       		}

       	
     
     
       $days++;
		}
	}
		$data['sltotal'] = $sltotal;
		$data['vltotal'] = $vltotal;
		$data['holiday'] = $holiday;
		$data['weekends'] = $weekends;
		$data['absent'] = $absent;
		$data['present'] = $present;
		$data['days'] = $days;
		$data['employeeid'] = $id;
		$data['from'] = $from;
		$data['to'] = $to;
		$data['obtotal'] = $obtotal;
			    	  $data['checkedbyname'] = "";
	    $data['approvedbyname'] = "";
	    	  $data['checkedbyposition'] = "";
	    $data['approvedbyposition'] = "";
				$result2 = $this->post_model->getsignature(); 
	    if($result2){
	    	  $data['checkedbyname'] = $result2->checkedbyname;
	    $data['approvedbyname'] = $result2->approvedbyname;
	    	  $data['checkedbyposition'] = $result2->checkedbyposition;
	    $data['approvedbyposition'] = $result2->approvedbyposition;
	    }
		
		$this->load->view('printdtremployee',$data);
	}
			function dtrreportintern($id, $from, $to){
		
		$this->load->model('post_model');

		$result = $this->post_model->getprofile($id);
		$data['id']="";
		$data['firstname']="";
		$data['middlename'] = "";
		$data['lastname']="";
		$data['position_intern'] = "";
		$data['school'] = "";
		
		if($result){
			$data['firstname'] = $result->firstname;
			$data['middlename'] = $result->middlename;
			$data['lastname'] = $result->lastname;
			$data['position_intern'] = $result->position_intern;
			$data['school'] = $result->school;
			$data['id'] = $result->id;
			$data['internid'] = $id;
		$data['from'] = $from;
		$data['to'] = $to;
		}

		$data['result2'] = $this->post_model->getdtrwddate($id, $from, $to);


		$this->load->view('dtrreportintern', $data);
	}

	function dtrreportintern_show($id, $from, $to){
		
		$this->load->model('post_model');

		$result = $this->post_model->getprofile($id);
		$data['id']="";
		$data['firstname']="";
		$data['middlename'] = "";
		$data['lastname']="";
		$data['position_intern'] = "";
		$data['school'] = "";
		
		if($result){
			$data['firstname'] = $result->firstname;
			$data['middlename'] = $result->middlename;
			$data['lastname'] = $result->lastname;
			$data['position_intern'] = $result->position_intern;
			$data['school'] = $result->school;
			$data['id'] = $result->id;
		}

		$data['result2'] = $this->post_model->getdtrwddate($id, $from, $to);


		$this->load->view('dtrreportintern_show', $data);
	}

function printdtrintern($id, $from, $to){
		
		$this->load->model('post_model');

		$result = $this->post_model->getprofile($id);
		$data['id']="";
		$data['firstname']="";
		$data['middlename'] = "";
		$data['lastname']="";
		$data['position_intern'] = "";
		$data['school'] = "";
		
		if($result){
			$data['firstname'] = $result->firstname;
			$data['middlename'] = $result->middlename;
			$data['lastname'] = $result->lastname;
			$data['position_intern'] = $result->position_intern;
			$data['school'] = $result->school;
			$data['id'] = $result->id;
		}

		$data['result2'] = $this->post_model->getdtrwddate($id, $from, $to);


		$this->load->view('printdtrintern', $data);
	} 



	function pcfreports($employeeid, $from, $to){
	$this->load->model("post_model");
	$result1 = $this->post_model->getprofile($employeeid);
		$data['lastname'] = "";
		$data['firstname'] = "";
		$data['from'] = $from;
		$data['to'] = $to;
	if($result1){
		$data['lastname'] = $result1->lastname;
		$data['firstname'] = $result1->firstname;
	}
	$data['result']  = $this->post_model->getpcfreport($employeeid, $from, $to);
	//var_dump($result);
	$result2 = $this->post_model->getsignature();
	$data['approvedbyposition'] = "";
				$data['checkedbyposition'] = "";
			 $data['checkedbyname'] = "";
	    $data['approvedbyname'] = "";
	if($result2){
				$data['approvedbyposition'] = $result2->approvedbyposition;
				$data['checkedbyposition'] = $result2->checkedbyposition;
			 $data['checkedbyname'] = $result2->checkedbyname;
	    $data['approvedbyname'] = $result2->approvedbyname;
	}
	$this->load->view('pcfreports',$data);
}

	function printpcfreport($employeeid, $from, $to){
	$this->load->model("post_model");
	$result1 = $this->post_model->getprofile($employeeid);
		$data['lastname'] = "";
		$data['firstname'] = "";
		$data['from'] = $from;
		$data['to'] = $to;
	if($result1){
		$data['lastname'] = $result1->lastname;
		$data['firstname'] = $result1->firstname;
	}
	$data['result']  = $this->post_model->getpcfreport($employeeid, $from, $to);
	//var_dump($result);
		$result2 = $this->post_model->getsignature();
	$data['approvedbyposition'] = "";
				$data['checkedbyposition'] = "";
			 $data['checkedbyname'] = "";
	    $data['approvedbyname'] = "";
	if($result2){
				$data['approvedbyposition'] = $result2->approvedbyposition;
				$data['checkedbyposition'] = $result2->checkedbyposition;
			 $data['checkedbyname'] = $result2->checkedbyname;
	    $data['approvedbyname'] = $result2->approvedbyname;
	}
	$this->load->view('printpcfreport',$data);
}


function pcfreplenish($from, $to){
	$this->load->model("post_model");
	$result5 = $this->post_model->getpcfreplenish($from, $to);
	$data['result5'] = $result5;
//	$result2 = $this->post_model->getpcfreplenish2();
			$data['from'] = $from;
		$data['to'] = $to;
			$result2 = $this->post_model->getsignature();
	$data['approvedbyposition'] = "";
				$data['checkedbyposition'] = "";
			 $data['checkedbyname'] = "";
	    $data['approvedbyname'] = "";
	if($result2){
				$data['approvedbyposition'] = $result2->approvedbyposition;
				$data['checkedbyposition'] = $result2->checkedbyposition;
			 $data['checkedbyname'] = $result2->checkedbyname;
	    $data['approvedbyname'] = $result2->approvedbyname;
	}
	$this->load->view('pcfreplenish',$data);
}

function printpcfreplenish($from, $to){
	$this->load->model("post_model");
	$result5 = $this->post_model->getpcfreplenish($from, $to);
	$data['result5'] = $result5;
//	$result2 = $this->post_model->getpcfreplenish2();
			$data['from'] = $from;
		$data['to'] = $to;
			$result2 = $this->post_model->getsignature();
	$data['approvedbyposition'] = "";
				$data['checkedbyposition'] = "";
			 $data['checkedbyname'] = "";
	    $data['approvedbyname'] = "";
	if($result2){
				$data['approvedbyposition'] = $result2->approvedbyposition;
				$data['checkedbyposition'] = $result2->checkedbyposition;
			 $data['checkedbyname'] = $result2->checkedbyname;
	    $data['approvedbyname'] = $result2->approvedbyname;
	}
	$this->load->view('printpcfreplenish',$data);
} 

function obreport($id, $from, $to){
	$this->load->model("post_model");

	$result1 = $this->post_model->getprofile($id);
		$data['lastname'] = "";
		$data['firstname'] = "";
		$data['from'] = $from;
		$data['to'] = $to;
		$data['position'] = "";
	if($result1){
		$data['lastname'] = $result1->lastname;
		$data['firstname'] = $result1->firstname;
		$data['position'] = $result1->position;
	}

	$data['result7'] = $this->post_model->getobreport($id, $from, $to);
		$result2 = $this->post_model->getsignature();
	$data['approvedbyposition'] = "";
				$data['checkedbyposition'] = "";
			 $data['checkedbyname'] = "";
	    $data['approvedbyname'] = "";
	if($result2){
				$data['approvedbyposition'] = $result2->approvedbyposition;
				$data['checkedbyposition'] = $result2->checkedbyposition;
			 $data['checkedbyname'] = $result2->checkedbyname;
	    $data['approvedbyname'] = $result2->approvedbyname;
	}
	$this->load->view('obreport', $data);
}

function printobreport($id, $from, $to){
	$this->load->model("post_model");

	$result1 = $this->post_model->getprofile($id);
		$data['lastname'] = "";
		$data['firstname'] = "";
		$data['from'] = $from;
		$data['to'] = $to;
		$data['position'] = "";
	if($result1){
		$data['lastname'] = $result1->lastname;
		$data['firstname'] = $result1->firstname;
		$data['position'] = $result1->position;
	}

	$data['result7'] = $this->post_model->getobreport($id, $from, $to);
		$result2 = $this->post_model->getsignature();
	$data['approvedbyposition'] = "";
				$data['checkedbyposition'] = "";
			 $data['checkedbyname'] = "";
	    $data['approvedbyname'] = "";
	if($result2){
				$data['approvedbyposition'] = $result2->approvedbyposition;
				$data['checkedbyposition'] = $result2->checkedbyposition;
			 $data['checkedbyname'] = $result2->checkedbyname;
	    $data['approvedbyname'] = $result2->approvedbyname;
	}
	$this->load->view('printobreport', $data);
}
	function  reports(){
		$this->load->model("post_model");
		$data['internlist'] = $this->post_model->getdtrinterndb();
		$data['employeelist'] = $this->post_model->getdtremployeedb();
		$this->load->view('reports',$data);
	}
	function calendar(){
			$session_data = $this->session->userdata('logged_in');

     $data['usertype'] = $session_data['type'];

		$this->load->view('calendar', $data);

	}
	function calendar2(){
		$this->load->view('calendar2');
	}
	function calendarmodal(){
				$this->load->model("post_model");
		$data['query'] = $this->post_model->getcalendarinfojson();
		$this->load->view('calendarmodal', $data);
	}
	function aboutus(){
		$this->load->view('aboutus');
		//$this->load->view('printdtrreport');
	}
	function refreshheaderinfo($id){
		 $data['picture'] = "";
     $data['firstname'] = "";
     $this->load->model("post_model");
     $result = $this->post_model->getprofile($id);
     if ($result){
     		$data['picture'] = $result->picture;
     		$data['firstname'] = $result->firstname;
     }
     $this->load->view('headerinfo',$data);
	}
	function headerinfo(){
		 $session_data = $this->session->userdata('logged_in');
		 $data['picture'] = "";
     $data['firstname'] = "";
     $id = $session_data['id'];
     $this->load->model("post_model");
     $result = $this->post_model->getprofile($id);
     if ($result){
     		$data['picture'] = $result->picture;
     		$data['firstname'] = $result->firstname;
     }
     $this->load->view('headerinfo',$data);
	}
	function viewprofile($id){
		$this->load->model('post_model');
	
		$result = $this->post_model->getprofile($id);
		$session_data = $this->session->userdata('logged_in');
		$data['id']= $session_data['id'];
		$data['userid'] = "";
		$data['picture'] = "";
		$data['firstname'] = "";
		$data['middlename'] = "";
		$data['lastname'] = "";
		$data['address'] = "";
		$contact['contact'] = "";
		$email1['email1'] = "";
		$email2['email2'] = "";
		$data['position'] = "";
		$data['employeeno'] = "";
		$data['status'] = "";
		$data['datestart'] = "";
		$data['dateseperated'] = "";
		$data['sss'] = "";
		$data['pagibig'] = "";
		$data['philhealth'] = "";
		$data['tin'] = "";
		$data['vl'] = "";
		$data['sl'] = "";
		$data['hrsreqd']="";
		$data['position_intern'] = "";
		$data['school'] = "";

		if ($result) {
			$data['userid'] = $result->users;
			$data['picture'] = $result->picture;
			$data['firstname'] = $result->firstname;
			$data['middlename'] = $result->middlename;;
			$data['lastname'] = $result->lastname;
			$data['address'] = $result->address;
			$data['contact'] = $result->contact;
			$data['email1'] = $result->email1;
			$data['email2'] = $result->email2;
			$data['position'] = $result->position;
			$data['employeeno'] = $result->employeeno;
			$data['status'] = $result->status;
			$data['datestart'] = $result->datestart;
			$data['dateseperated'] = $result->dateseperated;
			$data['sss'] = $result->sss;
			$data['pagibig'] = $result->pagibig;
			$data['philhealth'] = $result->philhealth;
			$data['tin'] = $result->tin;
			$data['vl'] = $result->totalvl;
			$data['sl'] = $result->totalsl;
			$data['hrsreqd'] = $result->hrs_required;
			$data['position_intern'] = $result->position_intern;
			$data['school'] = $result->school;
		}	
				$result2 = $this->post_model->getuser($id);
		//var_dump($result2);
		$data['checkstatus'] = "";
		
		if($result2){
			$data['checkstatus'] = $result2->status;
		}
	//	
		$this->load->view('viewprofile',$data);
		
	}


function printleaveform($id, $formid, $status, $action){

		$this->load->model("post_model");
		$result = $this->post_model->getprofile($id);
		$data['id'] ="";
		$data['firstname']="";
		$data['lastname']="";
		$data['position']="";
		$data['status']= $status;
		$data['vl'] = "";
		$data['sl'] = "";
		$data['action'] = $action;
		$data['formid'] = $formid;

	 	$data['typeofleave'] = "";
    	$data['dateprep'] = "";
    	$data['cover_period'] = "";
    	$data['daysfrom'] = "";
    	$data['daysto'] = "";
    	$data['reason'] = "";					
    	$session_data = $this->session->userdata('logged_in');
    	$data['usertype'] = $session_data['type'];
		if($result){
			$data['id'] = $result->users;
			$data['firstname'] = $result->firstname;
			$data['lastname'] = $result->lastname;
			$data['position'] = $result->position;
			$data['vl'] = $result->totalvl;
			$data['sl'] = $result->totalsl;
		}
		$result2 = $this->post_model->getsignature(); 
	    $data['checkedbyname'] = $result2->checkedbyname;
	    $data['approvedbyname'] = $result2->approvedbyname;
  

  if($status <> "None"){
  

   	 $result3 = $this->post_model->getleave($formid);
  
    if($result3){

    	$data['typeofleave'] = $result3->typeofleave;
    	$data['dateprep'] = $result3->date;
    	$data['cover_period'] = $result3->cover_period;
    	$data['daysfrom'] = $result3->daysfrom;
    	$data['daysto'] = $result3->daysto;
    	$data['reason'] = $result3->reason;
    
    }

   
  }


	$this->load->view("printleaveform", $data);
}




function printobform($id, $formid, $status, $action){

		$this->load->model("post_model");
		$result = $this->post_model->getprofile($id);
		$data['id'] ="";
		$data['firstname']="";
		$data['lastname']="";
		$data['position']="";
		$data['status']= $status;
		$data['action'] = $action;
		$data['formid'] = $formid;

		  $session_data = $this->session->userdata('logged_in');
		  $data['usertype'] = $session_data['type'];

    		$data['dateprep'] = "";
  			$data['location1'] = "";
  			$data['location2'] = "";
  			$data['client1']  = "";
  			$data['client2'] = "";
  			$data['dateappo'] = "";
  			$data['timestart'] = "00:00:00";
  			$data['timeend'] = "";
  			$data['purpose'] = "";
  			$data['totalamount'] = "0.00";
  			$data['result4'] = "";
  			$data['empty'] = "";
		if($result){
			$data['id'] = $result->users;
			$data['firstname'] = $result->firstname;
			$data['lastname'] = $result->lastname;
			$data['position'] = $result->position;
			
		}
		$result2 = $this->post_model->getsignature(); 
    $data['checkedbyname'] = $result2->checkedbyname;
    $data['approvedbyname'] = $result2->approvedbyname;
		

  if($status <> "none"){
  	
  		$result3 = $this->post_model->getob($formid);
  		if ($result3){

  		
  			$data['dateprep'] = $result3->date;
  			$data['location1'] = $result3->location_start;
  			$data['location2'] = $result3->location_end;
  			$data['client1']  = $result3->client_start;
  			$data['client2'] = $result3->client_end;
  			$data['dateappo'] = $result3->date_appointment;
  			$data['timestart'] = $result3->timeappo_start;
  			$data['timeend'] = $result3->timeappo_end;
  			$data['purpose'] = $result3->purpose;
  			$data['totalamount'] = $result3->total_amount;
  	
		}

  		$result4 = $this->post_model->getobdetails($formid);
  	if($result4){
  			$data['result4'] = $result4;
  			$data['empty'] = false;
  	}
  	else{
  		$data['empty'] = true;
  	}
  
	}

		$this->load->view('printobform',$data);
	}

function viewholiday(){
	$this->load->model("post_model");
	$data['result'] = $this->post_model->getholiday();
	
	$this->load->view('viewholiday',$data);
}

function printpcfform($id, $formid, $status, $action){

		$this->load->model("post_model");
		$result = $this->post_model->getprofile($id);
		$data['id'] ="";
		$data['firstname']="";
		$data['lastname']="";
		$data['position']="";
		$data['status']=$status;
		$data['action'] = $action;
		$data['formid'] = $formid;
		//$data['formview'] = $formview;
		 $session_data = $this->session->userdata('logged_in');
		  $data['usertype'] = $session_data['type'];
				$data['type']= "";
				$data['purpose'] = "";
  			$data['dateprep'] = "";
  			$data['totalexpenses'] = "0.00";
  			$data['totalcashadvance'] = "0.00";
  			$data['totalliquidation'] = "0.00";
  			$data['result4'] = "";
  			$data['empty'] = "";

		if($result){
			$data['id'] = $result->users;
			$data['firstname'] = $result->firstname;
			$data['lastname'] = $result->lastname;
			$data['position'] = $result->position;
			
		}
		$result2 = $this->post_model->getsignature(); 
    $data['checkedbyname'] = $result2->checkedbyname;
    $data['approvedbyname'] = $result2->approvedbyname;
		

		if($status <> "none"){
  	
  		$result3 = $this->post_model->getpcf($formid);
  		if ($result3){
  			$data['type'] = $result3->type;
  			$data['purpose'] = $result3->purpose;
  			$data['dateprep'] = $result3->date;
  			$data['totalexpenses'] = $result3->total_expenses;
  			$data['totalcashadvance'] = $result3->total_cashadvance;
  			$data['totalliquidation'] = $result3->total_liquidation; 
  		
  		
		}

  		$result4 = $this->post_model->getpcfdetails($formid);
  	if($result4){
  			$data['result4'] = $result4;
  			$data['empty'] = false;
  	}
  	else{
  		$data['empty'] = true;
  	}
  
	}

		$this->load->view('printpcform',$data);
	}

	function totalpendingleave(){
		$this->load->model("post_model");
		$result = $this->post_model->getobform();
		echo $result;
	}


}





?>