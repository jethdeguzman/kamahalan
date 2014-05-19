<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Post_model extends CI_Model{

function saveuserdb($username, $password, $status, $type, $hrsreqd){

		$this->load->database();

		$query = $this->db->query("INSERT INTO users (id, username, password, status, type) VALUES ('','$username','$password','$status','$type')");
		$userid=$this->db->insert_id();
		$picture = "systemprofile.png";
		$this->db->set('users',$userid);
		$this->db->set('firstname',$username);
		$this->db->set('middlename','N/A');
		$this->db->set('lastname','N/A');
		$this->db->set('address','N/A');
		$this->db->set('contact','N/A');
		$this->db->set('email1','N/A');
		$this->db->set('email2','N/A');
		$this->db->set('position','N/A');
		$this->db->set('employeeno','N/A');
		$this->db->set('status',$status);
		$this->db->set('datestart','N/A');
		$this->db->set('dateseperated','N/A');
		$this->db->set('hrs_required', $hrsreqd);
		$this->db->set('sss','N/A');
		$this->db->set('philhealth','N/A');
		$this->db->set('pagibig','N/A');
		$this->db->set('tin','N/A');
		$this->db->set('totalvl','N/A');
		$this->db->set('totalsl','N/A');
		$this->db->set('position_intern','N/A');
		$this->db->set('school','N/A');
		$this->db->set('picture',$picture);
		$this->db->insert('profiles');

	}



 function deleteuserdb($id){


  $query = $this->db->query("DELETE FROM users WHERE id = '$id'");
  $query2 = $this->db->query("DELETE FROM profiles WHERE users = '$id'");
  

 }

 public function checktimeindb($id){

 		
 	$datenow = date("Y-m-d");
 	$query = $this->db->query("SELECT * FROM attendance WHERE users = '$id' and date = '$datenow'");

 	if ($query->num_rows == 1){

 		return $query->result();
 	}
 	else{
 		return false;
 	}


 }

 function checktimeoutdb($id){
 		$datenow = date("Y-m-d");
 		$query = $this->db->query("SELECT * FROM attendance WHERE users = '$id' and date = '$datenow' and timeout <> '00:00:00' ");
 		if ($query->num_rows == 1){
 			return $query->result();
 		}
 		else{
 			return false;
 		}
 }
 function saveabsentdb($id,$status){
 	$datenow = date("Y-m-d");
 	$this->db->set('users',$id);
 	$this->db->set('date',$datenow);
 	$this->db->set('status',$status);
 	$this->db->insert('attendance');
 	
 }
 function checkabsentdb($id){
 	$datenow = date("Y-m-d");
 	$query = $this->db->query("SELECT * FROM attendance WHERE users = '$id' and date = '$datenow' and status = 'Absent'");
 	if ($query->num_rows > 0){
 		return true;
 	}
 }
 function savetimeindb($id,$timein,$status){
 		$datenow = date("Y-m-d");
 		$timein = strftime("%H:%M",strtotime($timein));
 		
 		$hrdayfinal = 0; 
 		$mindayfinal =0;

 	//$this->db->query("UPDATE attendance SET timein = '$timein', timein1 = '$timein', hrsday = '$hrdayfinal', minday = '$mindayfinal'  WHERE users = '$id' AND date = '$datenow'");
 
 		$this->db->set('users',$id);
 		$this->db->set('date',$datenow);
 		$this->db->set('timein',$timein);
 		$this->db->set('hrsday',$hrdayfinal);
 		$this->db->set('minday',$mindayfinal);
 		$this->db->set('status',$status);
 		$this->db->insert('attendance');
 	//	$query = $this->db->query("INSERT INTO attendance (id,users,date,timein) VALUES ('','$id','$datenow','$timein')");
 }	

function savetimeoutdb($id, $timeout){
 	$datenow = date("Y-m-d");
 	$query = $this->db->query("SELECT * FROM attendance WHERE users = '$id' and date = '$datenow'");
 	$row = $query->row();

 	$timein = $row->timein;
 	$timeout = strftime("%H:%M",strtotime($timeout));
 	
 	$hrdayin = strftime("%H", strtotime($timein));
 	$mindayin = strftime("%M", strtotime($timein));

 	$timeout = strftime("%H:%M",strtotime($timeout));
 	$hrdayout = strftime("%H", strtotime($timeout));
	$mindayout = strftime("%M", strtotime($timeout));

 	$hrday = $hrdayout - $hrdayin;

 	if(($hrdayin<13)&&($hrdayout>=13)) {
      $hrday--; //deduct the lunch hour
    }
    if(($hrdayin<19)&&($hrdayout>=19)) {
      $hrday--; //deduct the dinner lunch
      }

 	$minday = ($mindayout - $mindayin);

 	if($minday < 0 ){

 		$convhr = $hrday*60;
 		$diffmin = $convhr + $minday;
 		$hrdayfinal = (int)($diffmin/60); 
 		$mindayfinal = $diffmin % 60;
 	}else{
 		$hrdayfinal = $hrday;
 		$mindayfinal = $minday;
 	}

 	$this->db->query("UPDATE attendance SET timeout = '$timeout', timein1 = '$timein', hrsday = '$hrdayfinal', minday = '$mindayfinal'  WHERE users = '$id' AND date = '$datenow'");
 }

 function savetotalhrs($id, $hrtotal, $mintotal){

  	$this->db->query("UPDATE users SET hrtotal = '$hrtotal', mintotal = '$mintotal'  WHERE id = '$id' ");
 }
  function getuser($id){
 	$query = $this->db->query("SELECT * FROM users WHERE id = '$id'");
  if($query->num_rows()){
 	return $query->row();
		}
 }

 function getdtrinterndb(){

 $query = $this->db->query("SELECT * FROM profiles a LEFT JOIN users b on a.users = b.id WHERE b.status = 'Practicumer'");
 if ($query->num_rows()>0){
 	 return $query->result();
 	}
 }

 function getdtremployeedb(){
 $query = $this->db->query("SELECT * FROM profiles a LEFT JOIN users b on a.users = b.id WHERE b.status = 'Employee'");
 if ($query->num_rows()>0){
 	 return $query->result();
 }
 }

 function getdtr($id){ //specific user and date
 	$datenow = date("Y-m-d");
 	$query = $this->db->query("SELECT * FROM attendance WHERE users = '$id' AND date = '$datenow'");
 	return $query->result();
 }
function getdtrsum($id){ //for output: dtr summary
	$query = $this->db->query("SELECT * FROM attendance WHERE users = '$id'");
 	if($query->num_rows()){
 		return $query->result();
 	}
 }

function getdtrwddate($id, $from, $to){ //for output: dtr summary
	//$query = $this->db->query("SELECT * FROM attendance WHERE users = '$id' AND date >= '2013-05-26' and date <= '2013-05-28' ");
	$query = $this->db->query("SELECT * FROM attendance WHERE users = '$id' AND date BETWEEN '$from' and '$to'");
	if($query->num_rows()){
 		return $query->result();
 	}
 }
 function getpcfreport($id, $from, $to){

 	$query = $this->db->query("SELECT * FROM liquidation_details a LEFT JOIN allforms b on a.allforms = b.id WHERE  a.users = '$id' and a.date BETWEEN '$from' and '$to' and b.status = 'Approved' ORDER BY a.category ");
 	if ($query->num_rows()>0){
 		return $query->result();
 		}
  }
 	function getpcfreplenish($from, $to){
 		$query = $this->db->query("SELECT a.date as date1, a.users FROM liquidation_details a LEFT JOIN allforms b on a.allforms = b.id WHERE a.date BETWEEN '$from' and '$to' and b.status = 'Approved' GROUP BY date1, a.users");
 		if ($query->num_rows()>0){
 			return $query->result();
 		}
 	}
 	function getpcfreplenish2($users, $date, $category){


 			$query = $this->db->query("SELECT SUM(a.amount) as total, a.category, a.users, a.date FROM liquidation_details a  LEFT JOIN allforms b on a.allforms = b.id WHERE b.status = 'approved' and a.users = '$users' and a.date = '$date' and a.category = '$category' GROUP BY a.category");
 		return $query->result();
 		
 			
 	}
 	 	function getpcfreplenish3($users, $date, $category){


 			$query = $this->db->query("SELECT SUM(a.amount) as total, a.category, a.users, a.date FROM liquidation_details a  LEFT JOIN allforms b on a.allforms = b.id WHERE b.status = 'approved' and a.users = '$users' and a.date = '$date' and a.category = '$category' GROUP BY a.category");
 		return $query->result();
 		
 			
 	}
 	function getpcfreplenish4($users, $date, $category){


 			$query = $this->db->query("SELECT SUM(a.amount) as total, a.category, a.users, a.date FROM liquidation_details a  LEFT JOIN allforms b on a.allforms = b.id WHERE b.status = 'approved' and a.users = '$users' and a.date = '$date' and a.category = '$category' GROUP BY a.category");
 		return $query->result();
 					
 	}
 	 	function getpcfreplenish5($users, $date, $category){


 			$query = $this->db->query("SELECT SUM(a.amount) as total, a.category, a.users, a.date FROM liquidation_details a  LEFT JOIN allforms b on a.allforms = b.id WHERE b.status = 'approved' and a.users = '$users' and a.date = '$date' and a.category = '$category' GROUP BY a.category");
 		return $query->result();
 					
 	}

 	function getobreport($users, $from, $to){
 			$query = $this->db->query("SELECT * FROM official_business WHERE users = '$users' and date BETWEEN '$from' and '$to'");
 			if($query->num_rows()>0){
 				return $query->result();
 			}
 	}
 
 

 function profilesavedb($id, $firstname, $middlename, $lastname, $position, $employeeno, $status, $datestart, $dateseperated, $sss, $pagibig, $philhealth, $tin, $address, $contact, $email1, $email2, $vl, $sl, $hrsreqd, $school, $position_intern){
 
 	$query = $this->db->query("UPDATE profiles SET firstname = '$firstname', middlename = '$middlename', lastname = '$lastname', address = '$address', contact = '$contact', email1 = '$email1', email2 = '$email2', position = '$position', employeeno = '$employeeno', status = '$status', datestart = '$datestart', dateseperated = '$dateseperated', sss = '$sss', philhealth = '$philhealth', pagibig = '$pagibig', tin = '$tin', totalvl = '$vl', totalsl = '$sl', hrs_required = '$hrsreqd', position_intern = '$position_intern', school = '$school' WHERE users = '$id' ");
 		
 }

 function profilepicdb($id, $picture){
 		$query =$this->db->query("UPDATE profiles SET picture = '$picture' WHERE users = '$id'");
 }

 function getprofile($id){
 		$query = $this->db->query("SELECT * FROM profiles WHERE users = '$id'");
 			if($query->num_rows()>0){
 					return $query->row();
 					
 	}
 }
 
  function saveleaveform($id, $typeofleave, $coverperiod, $dateofleave,  $daysfrom, $daysto, $reason, $prepared, $checked, $approved, $formtype){

 		$status = "Pending";
 		$datenow =  date('Y-m-d');
 	//	$viewbtn = "<input value='".$id."'>";
 		$query = $this->db->query("INSERT INTO allforms (id, users, formtype, status, prepared, date, action,action2) VALUES ('', '$id', '$formtype', '$status', '$prepared', '$datenow','','')");

 		$allforms = $this->db->insert_id();

			 		$action = "<a class=\'btn btn-primary btn-mini\' onclick=\'view(\"".$id."\",".$allforms.",\"".$formtype."\",\"".$status."\",\"allform\")\'>View</a> <a class=\'btn  btn-mini \' onclick=\'edit(\"".$id."\",".$allforms.",\"".$formtype."\",\"".$status."\",\"allform\")\'>Edit</a> <a class=\'btn btn-mini btn-danger \' onclick=\'deleteform(\"".$id."\",".$allforms.",\"".$formtype."\",\"".$status."\",\"allform\")\'>Delete</a>";

			 			$action2 = "<a class=\'btn btn-primary btn-mini\' onclick=\'view(\"".$id."\",".$allforms.",\"".$formtype."\",\"".$status."\",\"myform\")\'>View</a> <a class=\'btn  btn-mini \' onclick=\'edit(\"".$id."\",".$allforms.",\"".$formtype."\",\"".$status."\",\"myform\")\'>Edit</a>";

 		$query2 = $this->db->query("UPDATE allforms SET action = '$action', action2 = '$action2'  WHERE id = '$allforms'"); 	

 		$this->db->set('allforms', $allforms);
		$this->db->set('users', $id);
		$this->db->set('typeofleave', $typeofleave);
		$this->db->set('cover_period', $coverperiod);
		$this->db->set('dateofleave', $dateofleave);
		$this->db->set('daysfrom', $daysfrom);
		$this->db->set('daysto', $daysto);
		$this->db->set('reason', $reason);
		$this->db->set('prepared', $prepared);
		$this->db->set('checked', $checked);
		$this->db->set('approved', $approved);
		$this->db->set('date', date('Y-m-d'));
 		$this->db->insert('leaveform');

 		
}
function updateleaveformdb($id, $typeofleave, $coverperiod, $dateofleave, $daysfrom, $daysto, $reason, $formid){


	$query = $this->db->query("UPDATE leaveform SET typeofleave = '$typeofleave', cover_period = '$coverperiod', dateofleave = '$dateofleave',  daysfrom = '$daysfrom', daysto = '$daysto', reason = '$reason' WHERE allforms = '$formid'");

} 
 function saveobusinessform($id, $location, $dateappo, $timeappo_start, $timeappo_end, $purpose, $prepared, $checked, $approved, $formtype){
 	
 		$timeappo_start = strftime("%H:%M",strtotime($timeappo_start));
 		$timeappo_end = strftime("%H:%M",strtotime($timeappo_end));
 		$datenow =  date('Y-m-d');

		$this->db->set('users', $id);
		$this->db->set('date', $datenow);
		$this->db->set('location_appointment', $location); 
		$this->db->set('date_appointment', $dateappo);
		$this->db->set('timeappo_start', $timeappo_start);
		$this->db->set('timeappo_end', $timeappo_end);
		$this->db->set('purpose', $purpose);
		$this->db->set('prepared', $prepared);
		$this->db->set('checked', $checked);
		$this->db->set('approved', $approved);
 		$this->db->insert('official_business');
}

function updatesignaturedb($approvedbyname,$approvedbyposition,$checkedbyname,$checkedbyposition){
	$query = $this->db->query("SELECT * FROM form_defaults");
		if ($query->num_rows()==0){
				$this->db->set('approvedbyname', $approvedbyname);
	$this->db->set('approvedbyposition',$approvedbyposition);
	$this->db->set('checkedbyname', $checkedbyname);
	$this->db->set('checkedbyposition', $checkedbyposition);
	$this->db->insert('form_defaults');
		}
		else{
			$query = $this->db->query("UPDATE form_defaults SET approvedbyname = '$approvedbyname', approvedbyposition = '$approvedbyposition', checkedbyname = '$checkedbyname', checkedbyposition = '$checkedbyposition' WHERE id = 1");
		}
	}

	function getsignature(){
		$query = $this->db->query("SELECT * FROM form_defaults");
		return $query->row();
	}


	function savepcf($result, $length, $id){
		$users = $result['pcfformuserid'];
		$type = $result['type'];
		$purpose = $result['purpose'];
		$date = 	 date('Y-m-d');
		$total_expenses = $result['totalexpense'];
		$total_cashadvance = $result['totalcash'];
		$total_liquidation = $result['totalamount'];
		$prepared = $result['preparedby'];
		$approved = $result['approvedby'];
		$checked = $result['checkedby'];
		$formtype = "Reimbursement Form - ".$type;
		$status = "Pending";


	$query4 = $this->db->query("INSERT INTO allforms (id, users, formtype, status, prepared, date, action, action2) VALUES ('', '$users', '$formtype', '$status', '$prepared', '$date','','')");

		$allforms = $this->db->insert_id();

		 		$action = "<a class=\'btn btn-primary btn-mini\' onclick=\'view(\"".$users."\",".$allforms.",\"".$formtype."\",\"".$status."\",\"allform\")\'>View</a> <a class=\'btn  btn-mini \' onclick=\'edit(\"".$users."\",".$allforms.",\"".$formtype."\",\"".$status."\",\"allform\")\'>Edit</a> <a class=\'btn btn-mini btn-danger \' onclick=\'deleteform(\"".$users."\",".$allforms.",\"".$formtype."\",\"".$status."\",\"allform\")\'>Delete</a>";

			 			$action2 = "<a class=\'btn btn-primary btn-mini\' onclick=\'view(\"".$users."\",".$allforms.",\"".$formtype."\",\"".$status."\",\"myform\")\'>View</a> <a class=\'btn  btn-mini \' onclick=\'edit(\"".$users."\",".$allforms.",\"".$formtype."\",\"".$status."\",\"myform\")\'>Edit</a>";

 		$query2 = $this->db->query("UPDATE allforms SET action = '$action', action2 = '$action2'  WHERE id = '$allforms'"); 	

		$query = $this->db->query("INSERT INTO liquidation (id, users, allforms, type, purpose, date, total_expenses, total_cashadvance, total_liquidation, prepared, approved, checked) VALUES ('', '$users', '$allforms', '$type', '$purpose', '$date', '$total_expenses', '$total_cashadvance', '$total_liquidation', '$prepared', '$approved', '$checked')");

		$liquidation = $this->db->insert_id();

		for ($i=0; $i<$length; $i++){
			$date = $result['details'][$i]['date'];
			$category = $result['details'][$i]['category'];
			$refno = $result['details'][$i]['refno'];
			$particulars = $result['details'][$i]['particular'];
			$amount = $result['details'][$i]['amount'];
			$remarks = $result['details'][$i]['remarks'];
			
			$query3 = $this->db->query("INSERT INTO liquidation_details (id, users, allforms,  liquidation, date, category, refno, particulars, amount, remarks) VALUES ('','$users', '$allforms', '$liquidation', '$date', '$category', '$refno', '$particulars', '$amount', '$remarks') ");
		}
		
	}

	function updatepcf($result, $length){
		$users = $result['pcfformuserid'];
		$formid = $result['formid'];
		$type = $result['type'];
		$purpose = $result['purpose'];
		$date = 	 date('Y-m-d');
		$total_expenses = $result['totalexpense'];
		$total_cashadvance = $result['totalcash'];
		$total_liquidation = $result['totalamount'];
		$prepared = $result['preparedby'];
		$approved = $result['approvedby'];
		$checked = $result['checkedby'];
		$formtype = "Reimbursement Form - ".$type;
		$status = "Pending";


		$query = $this->db->query("UPDATE liquidation SET type = '$type', purpose = '$purpose', total_expenses = '$total_expenses', total_cashadvance = '$total_cashadvance', total_liquidation = '$total_liquidation' WHERE allforms = '$formid'");

			$query4 = $this->db->query("SELECT * FROM liquidation WHERE allforms = '$formid'");

			$liquidation = $query4->row()->id;


		$query2 = $this->db->query("DELETE FROM liquidation_details WHERE allforms = '$formid'");

		for ($i=0; $i<$length; $i++){
			$date = $result['details'][$i]['date'];
			$category = $result['details'][$i]['category'];
			$refno = $result['details'][$i]['refno'];
			$particulars = $result['details'][$i]['particular'];
			$amount = $result['details'][$i]['amount'];
			$remarks = $result['details'][$i]['remarks'];
			
			$query3 = $this->db->query("INSERT INTO liquidation_details (id, users, allforms,  liquidation, date, category, refno, particulars, amount, remarks) VALUES ('','$users', '$formid', '$liquidation', '$date', '$category', '$refno', '$particulars', '$amount', '$remarks') ");
		}

	}

	function saveob($result, $length){
		$users = $result['obusinessformuserid'];
		$date =  date('Y-m-d');
		$location_start = $result['location_start'];
		$location_end = $result['location_end'];
		$client_start = $result['client_start'];
		$client_end = $result['client_end'];
		$date_appointment = $result['date_appointment'];
		$timeappo_start = strftime("%H:%M",strtotime($result['timeappo_start']));
		$timeappo_end = strftime("%H:%M",strtotime($result['timeappo_end']));
		$purpose = $result['purpose'];
		$total_amount = $result['total_amount'];
		$prepared = $result['prepared'];
		$approved = $result['approved'];
		$checked = $result['checked'];
		$formtype = "OB Form";
		$status = "Pending";
		$query5 = $this->db->query("SELECT * FROM attendance WHERE users = '$users' and date = '$date_appointment'");
		if($query5->num_rows()==0){
				$query6 = $this->db->query("INSERT INTO attendance (id, users, date, timein, timeout, status, hrsday, minday, timein1, sl, vl, ob) VALUES ('', '$users', '$date_appointment', '$timeappo_start', '', 'Present', '', '', '', '', '', '1') ");
		}

		$query4 = $this->db->query("INSERT INTO allforms (id, users, formtype, status, prepared, date, action, action2) VALUES ('', '$users', '$formtype', '-', '$prepared', '$date','', '')");

	$allforms = $this->db->insert_id();


				 		$action = "<a class=\'btn btn-primary btn-mini\' onclick=\'view(\"".$users."\",".$allforms.",\"".$formtype."\",\"".$status."\",\"allform\")\'>View</a> <a class=\'btn  btn-mini \' onclick=\'edit(\"".$users."\",".$allforms.",\"".$formtype."\",\"".$status."\",\"allform\")\'>Edit</a> <a class=\'btn btn-mini btn-danger \' onclick=\'deleteform(\"".$users."\",".$allforms.",\"".$formtype."\",\"".$status."\",\"allform\")\'>Delete</a>";

			 			$action2 = "<a class=\'btn btn-primary btn-mini\' onclick=\'view(\"".$users."\",".$allforms.",\"".$formtype."\",\"".$status."\",\"myform\")\'>View</a>";

 		$query2 = $this->db->query("UPDATE allforms SET action = '$action', action2 = '$action2'  WHERE id = '$allforms'"); 	

		$query = $this->db->query("INSERT INTO official_business (id, users, allforms, date, location_start, location_end, client_start, client_end, date_appointment, timeappo_start, timeappo_end, purpose, total_amount, prepared, approved, checked) VALUES ('', '$users', '$allforms','$date','$location_start', '$location_end', '$client_start', '$client_end', '$date_appointment', '$timeappo_start', '$timeappo_end', '$purpose', '$total_amount', '$prepared', '$approved', '$checked')");
	
		$official_business = $this->db->insert_id();

	
		for($i = 0; $i<$length; $i++){
			$vehicle = $result['details'][$i]['vehicle'];
			$refno = $result['details'][$i]['refno'];
			$fromlocation = $result['details'][$i]['from'];
			$tolocation = $result['details'][$i]['to'];
			$amount = $result['details'][$i]['amount'];
			
			$query3 = $this->db->query("INSERT INTO official_business_details (id, users, allforms, official_business, vehicle, refno, fromlocation, tolocation, amount) VALUES ('','$users','$allforms', '$official_business','$vehicle','$refno','$fromlocation','$tolocation','$amount')");
		}

		
	}

	function updateob($result, $length){
		$users = $result['obusinessformuserid'];
		$formid = $result['formid'];
		$date =  date('Y-m-d');
		$location_start = $result['location_start'];
		$location_end = $result['location_end'];
		$client_start = $result['client_start'];
		$client_end = $result['client_end'];
		$date_appointment = $result['date_appointment'];
		$timeappo_start = strftime("%H:%M",strtotime($result['timeappo_start']));
		$timeappo_end = strftime("%H:%M",strtotime($result['timeappo_end']));
		$purpose = $result['purpose'];
		$total_amount = $result['total_amount'];
		$prepared = $result['prepared'];
		$approved = $result['approved'];
		$checked = $result['checked'];
		$formtype = "OB Form";
		


			$query = $this->db->query("UPDATE official_business SET location_start = '$location_start', location_end = '$location_end', client_start = '$client_start', client_end = '$client_end', date_appointment = '$date_appointment', timeappo_start = '$timeappo_start', timeappo_end = '$timeappo_end', purpose = '$purpose', total_amount = '$total_amount' WHERE allforms = '$formid'");

			$query4 = $this->db->query("SELECT * FROM official_business WHERE allforms = '$formid'");

			$official_business = $query4->row()->id;
			$query2 = $this->db->query("DELETE FROM official_business_details WHERE allforms = '$formid'");

			for($i = 0; $i<$length; $i++){
			$vehicle = $result['details'][$i]['vehicle'];
			$refno = $result['details'][$i]['refno'];
			$fromlocation = $result['details'][$i]['from'];
			$tolocation = $result['details'][$i]['to'];
			$amount = $result['details'][$i]['amount'];
			
		
		
				$query3 = $this->db->query("INSERT INTO official_business_details (id, users, allforms, official_business, vehicle, refno, fromlocation, tolocation, amount) VALUES ('','$users','$formid', '$official_business','$vehicle','$refno','$fromlocation','$tolocation','$amount')");
		}


	}

	function getallformsjson(){
		$query = $this->db->query("SELECT * FROM allforms");
			
			return $query->result();
	}

	function getmyformsjson($id){
		$query = $this->db->query("SELECT * FROM allforms WHERE users = '$id'");
			
			return $query->result();
	}


	function getleave($formid){
		$query = $this->db->query("SELECT * FROM leaveform WHERE allforms = '$formid' ");
		//$query = $this->db->get_where('leaveform', array('id'=>1));
	return $query->row();
		//if($query->num_rows()>0){
			
	//	}

	}

	function getob($formid){
		$query = $this->db->query("SELECT * FROM official_business WHERE allforms = '$formid' ");
		return $query->row();
	}

function getobattend($id, $from, $to){
		$query = $this->db->query("SELECT * FROM attendance WHERE users = '$id' AND ob = '1' AND date BETWEEN '$from' AND '$to' ");
		if($query){
		return $query->result();
		}
	}

	function getobdetails($formid){
		$query = $this->db->query("SELECT * FROM official_business_details WHERE allforms = '$formid'");

		if($query->num_rows() > 0 ){
			return $query->result();
		}
		return false;
	}

	function getpcf($formid){
		$query = $this->db->query("SELECT * FROM liquidation WHERE allforms = '$formid' ");
		return $query->row();
	}
		function getpcfdetails($formid){
		$query = $this->db->query("SELECT * FROM liquidation_details WHERE allforms = '$formid'");

		if($query->num_rows() > 0 ){
			return $query->result();
		}
		return false;
	}

	function approveformdb($formid, $formtype, $id){
		$status = "Approved";
		$allforms = $formid;
		$action = "<a class=\'btn btn-primary btn-mini\' onclick=\'view(\"".$id."\",".$allforms.",\"".$formtype."\",\"".$status."\",\"allform\")\'>View</a> <a class=\'btn  btn-mini \' onclick=\'edit(\"".$id."\",".$allforms.",\"".$formtype."\",\"".$status."\",\"allform\")\'>Edit</a> <a class=\'btn btn-mini btn-danger \' onclick=\'deleteform(\"".$id."\",".$allforms.",\"".$formtype."\",\"".$status."\",\"allform\")\'>Delete</a>";

		$action2 = "<a class=\'btn btn-primary btn-mini\' onclick=\'view(\"".$id."\",".$allforms.",\"".$formtype."\",\"".$status."\",\"myform\")\'>View</a>";

			$query = $this->db->query("UPDATE allforms SET status = 'Approved', action = '$action', action2 = '$action2'  WHERE id = '$formid'");
	}

	function deleteformdb($formtype, $formid){
			$query = $this->db->query("DELETE FROM allforms WHERE id = '$formid'");

		
				if ($formtype == "Leave%20Form"){
					$query2 = $this->db->query("DELETE FROM leaveform WHERE allforms = '$formid'");
				}
				elseif($formtype == "OB%20Form"){
					$query3 = $this->db->query("DELETE FROM official_business WHERE allforms = '$formid'");
					$query4 = $this->db->query("DELETE FROM official_business_details WHERE allforms = '$formid'");
				}
				else{
				
					$query5 = $this->db->query("DELETE FROM liquidation WHERE allforms = '$formid'");
					$query6 = $this->db->query("DELETE FROM liquidation_details WHERE allforms = '$formid'");
				}
			
	}


	function getholiday(){
		$query = $this->db->query("SELECT * FROM holiday ORDER BY date");
		if ($query->num_rows > 0){
			return $query->result();
		}
	}
		function getholidaydtr($from, $to){
		$query = $this->db->query("SELECT * FROM holiday WHERE date BETWEEN '$from' AND '$to' ORDER BY date");
		if ($query->num_rows > 0){
			return $query->result();
		}
	}

	function saveholiday($holidate, $holiname){
		$this->load->database();
		$query = $this->db->query("INSERT INTO holiday (id, date, title) VALUES ('', '$holidate', '$holiname')");
	}

	function deleteholiday($id){
		$this->load->database();
		$query= $this->db->query("DELETE FROM holiday WHERE id = '$id' ");
	}

	function updateaccountdb($id, $username, $password){
		$this->load->database();

		$query = $this->db->query("UPDATE users SET username = '$username', password = '$password' WHERE id = '$id' ");
	} 		

	function getpendingleave(){
		$query = $this->db->query("SELECT * FROM allforms WHERE formtype = 'Leave Form' AND status = 'Pending'");
		return $query->num_rows();
		
	} 
	function getaprovedleave(){
		$query = $this->db->query("SELECT * FROM allforms WHERE formtype = 'Leave Form' AND status = 'Approved' ");
		return $query->num_rows();
	}

	function getpendingpcf(){
		$query = $this->db->query("SELECT * FROM allforms WHERE formtype LIKE '%Reimbursement%' AND status = 'Pending'");
		return $query->num_rows();
	}
function getapprovedpcf(){
		$query = $this->db->query("SELECT * FROM allforms WHERE formtype LIKE '%Reimbursement%' AND status = 'Approved'");
		return $query->num_rows();
	}
	function getobform(){
		$query = $this->db->query("SELECT * FROM allforms WHERE formtype = 'OB Form'");

		return $query->num_rows();
	}


function savecalendarinfo($title, $start, $end){
	$query = $this->db->query("INSERT INTO calendar (id, title, start, end) VALUES ('','$title', '$start', '$end') ");
}

function getcalendarinfojson(){
	$query = $this->db->query("SELECT * FROM calendar");
	if($query->num_rows>0){
				return $query->result();
	}
}

function deletecalendarinfo($id){
	$query = $this->db->query("DELETE FROM calendar WHERE id = '$id'");

}

function updatedtremployee_model($user, $date, $timein, $timeout, $status, $sl, $vl){

	$this->load->database();

	$query = $this->db->query("UPDATE attendance SET timein = '$timein', timeout = '$timeout', status = '$status', sl = '$sl', vl = '$vl' WHERE users = '$user' AND date = '$date' ");

	}

	function updatedtrintern_model($user, $date, $timein, $timeout, $hrsday, $minday){

		$this->load->database();

	$query = $this->db->query("UPDATE attendance SET timein = '$timein', timeout = '$timeout', hrsday = '$hrsday', minday = '$minday' WHERE users = '$user' AND date = '$date' ");

	}


	function getevent($datenow){
		$query = $this->db->query("SELECT * FROM calendar WHERE start = '$datenow' ");
		if ($query->num_rows>0){
			return $query->result();
		}
	}

}
?>


