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
          <strong><center>Fund Reimbursement Summary Form</cente></strong>
          </td>
        </tr>
        <tr>
          <td colspan="1000">
          <small><center>ADMIN FORM NO. 01</center></small>
          </td>
        </tr>
    <tr>
      <td colspan='2'>
        <label class="control-label" for="inputName">Name:</label>
          <div class="controls">
            <input type="text" id="inputName" placeholder="Name">
          </div>
      </td>
    </div>
    <div class="control-group">
      <td>
        <label class="control-label">Date:</label>
          <div class="controls">
            <input type="text" id="datepicker">
          </div>
      </td>
    </tr>
    <tr>
      <td colspan="3">
    <label class="control-label">Purpose:</label>
    <div class="controls">
      <textarea></textarea>
    </div>
      </td>
    </tr>
<tr>
      <td>
      <label class="checkbox">
                <small><input type="checkbox"> PCF LIQUIDATION</small>
              </label>
      </td>
      <td>
            <label class="checkbox">
                <small><input type="checkbox"> CASH REIMBURSEMENT</small>
              </label>
     </td>
     <td>
<label class="checkbox">
                <small><input type="checkbox"> ALLOWANCE REPLENISHMENT</small>
              </label>
            </div>
      </td>
</tr>
    <table class="table table-hover">
    </table>
     <table class="table table-bordered" id="expense_table" cellspacing="0" cellpadding="0">
<!--insert append table-->      
          
          <tr>
						<td><small><center>DATE</center></small></td>
            <td><small><center>REF. NAME</center></small></td>
            <td><small><center>REF. NUMBER</center></small></td>
						<td><small><center>PARTICULARS</center></small></td>
            <td><small><center>AMOUNT</center></small></td>
            <td><small><center>FOR ACCOUNTING USE REMARKS</center></small></td>
					</tr>		
				<tbody id="row" >
					<tr>
						<td><input type="date" name="date" id="date" style="width: 100px;"></td>
						<td><input type="text" name="refname" id="refname" style="width: 100px;"></td>
            <td><input type="text" name="refno" id="refno" style="width: 100px;"></td>
            <td><input type="text" name="particulars" id="particulars" style="width: 100px;"></td>
             <td><input type="text" name="amount" id="amount" style="width: 100px;"></td>
            <td><input type="text" name="remarks" id="remarks" style="width: 100px;"></td>
            <td>&nbsp;</td>
					</tr>
				</tbody>
<!--end of code-->

<tr>
      <td colspan="4">
       <small>TOTAL EXPENSES</small>
      </td>
      <td>
        <input type="text" name="total_expenses" id="total_expenses" style="width: 100px;">
      </td>
    </tr>
<tr>
      <td colspan="4">
        <small>TOTAL AMOUNT OF CASH ADVANCE</small>
      </td>
<td>
        <input type="text" name="total_cash" id="total_cash" style="width: 100px;">
      
      </td>
    </tr>
<tr>
      <td colspan="4">
        <small>TOTAL AMOUNT FOR REIMBURSEMENT/LIQUIDATION</small>
      </td>
      <td>
        <input type="text" name="total_liqui" id="total_liqui" style="width: 100px;">
      </td>
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

      $('#row').append("<tr><td><input type='date' name='date' id='date' style='width: 100px;'></td><td><input type='text' name='refname' id='refname' style='width: 100px;'></td><td><input type='text' name='refno' id='refno' style='width: 100px;'></td><td><input type='text' name='particulars' id='particulars' style='width: 100px;'></td><td><input type='text' name='amount' id='amount' style='width: 100px;'></td><td><input type='text' name='remarks' id='remarks' style='width: 100px;'></td><td><input type='button' value='Delete' class='del_row'></td></tr>"); return false;
});

$(".del_row").live("click", function(){ 
    $(this).closest('tr').remove();
    return false;
});

});

</script>
</html>
