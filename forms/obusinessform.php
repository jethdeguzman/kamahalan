<!DOCTYPE html>
<html lang="en">
<head>
      <title>Test</title>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen"</link>
       <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen"</link>
       <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen"</link>
       <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"</link>
       <link rel="stylesheet" href="/resources/demos/style.css" />
</head>
<body>
<br />
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
      <!--Sidebar content-->
    </div>
    <div class="span9">
      <form class="form-inline">
        <table class="table table-hover">
          <img src="asset/logo.jpg" width="1000"/>
      <div class="control-group">
      <table class="table table-hover">
        <tr>
          <td colspan="1000">
          <strong><center>Official Business Form</center></strong>
          </td>
        </tr>
        <tr>
          <td colspan="1000">
          <small><center>201B FORM NO. 02</center></small>
          </td>
        </tr>
    <tr>
      <td>
        <label class="control-label" for="inputName">Name of Employee:</label>
          <div class="controls">
            <input type="text" id="inputName" placeholder="Name">
          </div>
      </td>
    </div>
    <div class="control-group">
      <td>
        <label class="control-label">Designation:</label>
          <div class="controls">
            <input type="text" placeholder="Designation">
          </div>
      </td>
    </div>
    <div class="control-group">
      <td>
        <label class="control-label">Date Prepared:</label>
          <div class="controls">
            <input type="text" id="datepicker">
          </div>
      </td>
    </tr>
    <tr>
      <td>
        <label class="control-label" for="inputName">Location of Appointment:</label>
          <div class="controls">
            <input type="text" id="inputName" placeholder="Location">
          </div>
      </td>
    </div>
    <div class="control-group">
      <td>
        <label class="control-label">Date of Appointment:</label>
          <div class="controls">
            <input type="text" id="datepicker1">
          </div>
      </td>
    </div>
    <div class="control-group">
      <td>
        <label class="control-label">Time of Appointment:</label>
          <div class="controls">
            <input type="text">
          </div>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <label class="control-label">Time Start of Appointment:</label>
          <div class="controls">
            <input type="time">
          </div>
      </td>
      <td>
        <label class="control-label">Time End of Appointment:</label>
          <div class="controls">
            <input type="time">
          </div>
      </td>
    </tr>
    <table class="table table-hover">
    <tr>
      <td>
    <label class="control-label">Purpose:</label>
    <div class="controls">
      <textarea></textarea>
    </div>
      </td>
    </tr>
    </table>
     <table class="table table-bordered" id="expense_table" cellspacing="0" cellpadding="0">
    <tr>
       <center>Details of Travel Expense</center>
    </tr>

<!--insert append table-->      
          <tr>
						<td>Vehicle</td>
            <td>Ref. No.</td>
						<td>From</td>
            <td>To</td>
            <td>Amount Paid</td>
					</tr>			
				<tbody id="row" >
					<tr>
						<td><input type="text" name="vehicle" id="vehicle" style="width: 100px;"></td>
						<td><input type="text" name="refno" id="refno" style="width: 100px;"></td>
            <td><input type="text" name="from" id="from" style="width: 100px;"></td>
             <td><input type="text" name="to" id="to" style="width: 100px;"></td>
            <td><input type="text" name="amountpaid" id="amountpaid" style="width: 100px;"></td>
            <td>&nbsp;</td>
					</tr>
				</tbody>
<!--end of code-->

<tr>
      <td colspan="4">
        <center>Total Amount Paid</center>
      </td>
      <td>
      </td>
    </tr>
    <tr>
    </tr>
    </table>
    <button id="addbtn">Add</button>  
    <div class="text-error"><br />
<small>*Note:  This form should be accompanied by Fund Reimbursement Form and for Business Appointments, minutes of meeting should be attached.</small></div>
    
    <table class="table table-hover">
    <tr>
      <td>
      Prepared by:&nbsp;<input type="text"><br /><br />
      Approved by:&nbsp;<input type="text" disabled>
      </td>
      <td>
      Checked by:&nbsp;<input type="text" disabled>
      </td>
    </table>
  </div>
</form>
</form>
</div>
</div>
</div>
</body>
  <script src="jquery-1.9.1.min.js"></script>
  <script src="jquery-1.4.4.min.js"></script>
       <script> src="bootstrap/js/bootstrap.js" </script>
       <script> src="bootstrap/js/bootstrap.min.js" </script>
<script>
$(document).ready(function(){

  $("#addbtn").click(function(){

      $('#row').append("<tr><td><input type='text' name='vehicle' id='vehicle' style='width: 100px;'></td><td><input type='text' name='refno' id='refno' style='width: 100px;'></td><td><input type='text' name='from' id='from' style='width: 100px;'></td><td><input type='text' name='to' id='to' style='width: 100px;'></td><td><input type='text' name='amountpaid' id='amountpaid' style='width: 100px;'></td><td><input type='button' value='Delete' class='del_row'></td></tr>"); return false;
});

$(".del_row").live("click", function(){ 
    $(this).closest('tr').remove();
    return false;
});

});

</script>
</html>
