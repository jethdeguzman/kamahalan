<?php
$host = "localhost";
$username = "root";
$password = "jeth14";
$con = mysql_connect("$host", "$username", "$password");
if (!$con){

	die('Could not connect :'.mysql_error());
}
mysql_select_db("8layer",$con);

$result = mysql_query("SELECT id FROM users");

while($row = mysql_fetch_array($result)){
	$datenow = date("Y-m-d");
	$id  = $row['id'];
	$query2 = mysql_query("SELECT * FROM attendance WHERE date = '$datenow' AND users = '$id'");
	if(mysql_num_rows($query2)>0){
		continue;
	}
	else{
		$query3 = mysql_query("INSERT INTO attendance (id, users, date, status) VALUES('','$id','$datenow','Absent')");
	}
}
?>
