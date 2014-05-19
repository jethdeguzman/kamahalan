<style>
  .leavetable tr th{
    background:#858585;
    color:#424242;
  }
  .leavetable tr td{
    background: #D4D4D4;
  }
  #form-title{
    margin-bottom:20px;
  }
</style>
 <!--<div class="row">
  <div class="span9">
    <h3 class="module-title">Form - Leave Form</h3>
  </div>a
</div>-->
<input type="hidden" id="usertype" value="<?php echo $usertype;?>">
<div class="span9" >
  <div class="row">
 
    <div class="span9" >
  
<form id="leave-form" class="form-inline">

<?php if($status <> "none"){?>


  <?php if ($status == "Pending"){
            if (($usertype == "Administrator")&&($formview == "allform")){?>

  <div id="pending-alert" class="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
  <span><strong>Status: Pending.</strong> Click to approve this form.   <a id="leave-form-approve"  class="btn btn-mini btn-info" >APPROVE</a></span>
</div>
<?php }else{ ?>
 <div class="alert ">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
  <span><strong>Status: Pending.</strong>You can still edit this leave form.</span>
</div>

<?php } } ?>

  <?php if ($status == "Approved"){?>
  <div id="approved-alert" class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
  <span><strong>Status:Approved.</strong></span>
</div>
<?php }?>


<?php } ?>
     <div id="form-title">
        
    <input id="formview" type="hidden" value="<?php echo $formview; ?>">
     <input type="hidden" id="leaveformuserid" name="leaveformuserid" value="<?php echo $id;?>">
     <input type="hidden" id='formid' name='formid' value="<?php echo $formid; ?>">
          <strong><center>Leave Form</center></strong>
     
          <small><center>201B FORM NO. 01</center></small>
       </div> 
    <table  class="table table-bordered leavetable">
    <tr>
      <th><label class="control-label" >Name of Employee:</label></th>
      <th><label class="control-label">Designation:</label></th>
      <th><label class="control-label">Date Prepared:</label></th>
    </tr>
    <tr>
      <td>
        <div class="controls">
          <input type="text" id="inputName" readonly placeholder="Name" value="<?php echo $firstname.' '.$lastname;?>">
        </div>
      </td>
      <td>
        <div class="controls">
          <input type="text" placeholder="Designation" readonly value="<?php echo $position;?>">
        </div>
      </td>
      <td>
        <div class="controls">
          <input type="text" id="datepicker" readonly placeholder="Date" value="<?php if($status=="none"){ echo date('Y-m-d'); }else{ echo $dateprep;}  ?>">
        </div>
      </td>
    </tr>

    </table>

   
          
  
    <table class="table table-bordered leavetable">
    <tr>
      <th colspan="4"><label>Type of Leave:</label></th>
    </tr>
              
    <tr>
      <div class="controls">  
      <td><label class="checkbox"><input  name="typeofleave" <?php if($typeofleave == "authorized"){ echo "checked"; }?> checked type="radio" value="authorized" > Authorized Absent</label></td>
      <td><label class="checkbox"><input name="typeofleave" <?php if($typeofleave == "vl"){ echo "checked"; }?> type="radio"  value="vl" > Serv. Incentive Leave</label></td>
      <td><label class="checkbox"><input name="typeofleave"  <?php if($typeofleave == "sl"){ echo "checked"; }?> type="radio" value="sl" > Sick Leave</label></td>
      <td><label class="checkbox"><input name="typeofleave" <?php if($typeofleave == "undertime"){ echo "checked"; }?> type="radio"  value="undertime" > Undertime</label></td>
       </div>
    </tr>
     
    </table>
    

    <table class="table table-bordered leavetable">
    <tr>
      <th colspan="4"><label>Cover Period:</label></th>
    </tr>
    <tr>
      <td >
            <div class="controls">   
             <label class="checkbox">
              <input checked class="coverperiod" <?php if($cover_period == "am"){ echo "checked";}?> name="cover_period" type="radio" value="am" > AM
             </label>
         </div>
      </td>`
       
       
      <td >
        <div class="controls">
             <label class="checkbox">
                <input class="coverperiod" <?php if($cover_period == "pm"){ echo "checked";}?> name="cover_period" type="radio" value="pm" > PM
              </label>
        </div>
        </td>
      
       
      <td >
        <div class="controls">
             <label class="checkbox">
                <input class="coverperiod" name="cover_period" <?php if($cover_period == "wholeday"){ echo "checked";}?> type="radio" value="wholeday"> Whole Day
              </label>
         </div>
        </td>
      <td><label>Date of Leave</label> <input name="dateofleave" type="text" placeholder="yy-mm-dd" id="dateleave" value="<?php echo $dateofleave; ?>"></td>
     </tr>
     <tr>
      
      <td colspan="4">
            <div class="controls"> 
             <label class="checkbox">

                <input class="coverperiod" <?php if($cover_period == "days"){ echo "checked";}?> name="cover_period" type="radio" id="days" value="days"> Days, from
             </label>

                <input name="daysfrom" placeholder="yy-mm-dd" class="input-medium" style="margin:0px 10px; " type="text" id="from" disabled value=<?php if($cover_period == "days"){  echo $daysfrom;} ?> > to
                <input name="daysto" placeholder="yy-mm-dd" class="input-medium" style="margin:0px 10px; " type="text" id="to" disabled value=<?php if($cover_period == "days"){  echo $daysto;} ?> >
             </div>
        </td>
   
    </tr>
    </table>


    <table class="table  table-bordered leavetable">
    <tr>
      <th> <label class="control-label">Reason:</label> </th>
    </tr>
    <tr>
      <td>
    
      <textarea id="reason" name="reason" rows="5" class="span4"><?php echo $reason;?></textarea>
      </td>
    </tr>
    </table>

    <table class="table  table-bordered leavetable">
    <tr>
      <th colspan="2"><label class="control-label">Status:</label></th>
      <th colspan="2"><label class="control-label">Remaining Credits:</label></th>
      <th><label class="control-label">Total:</label></th>
    </tr>
    <tr>
      <td><label class="checkbox"><input type="checkbox" <?php if($status == "Approved"){ echo "checked";}?> disabled> Approved</label></td>
      <td><label class="checkbox"><input type="checkbox"  disabled> Disapproved</label></td>
      <td>VL:<input class="input-small" type="text" id="inputName" placeholder="VL" readonly value="<?php echo $vl;?>"></td>
      <td>SL:<input class="input-small" type="text" id="inputName" placeholder="SL" readonly value="<?php echo $sl;?>"></td>
      <td><input type="text" id="inputName" placeholder="TOTAL" readonly value="<?php echo $vl+$sl;?>"></td>
    </tr>
      
  </table>

    <table class="table table-bordered leavetable">
    <tr>
      <th><label>Prepared by:</label></th>
      <th><label>Checked by:</label></th>
      <th><label>Approved by:</label></th>
    </tr>
    <tr>
      <td><input name="prepared" type="text" readonly value="<?php echo $firstname.' '.$lastname;?>"></td>
      <td><input name="checked" type="text" readonly value="<?php echo $checkedbyname; ?>"></td>
      <td><input name="approved" type="text" readonly value="<?php echo $approvedbyname; ?>"></td>
    </tr>
    </table>

    <table class="table table-bordered leavetable">
   <?php if($action == "create"){  ?>
    <a id="leave-form-submit"  class="btn btn-success pull-right" >SUBMIT</a> 
   <?php } if ($action == "edit"){ ?>
  
    <a   class="btn btn-success pull-right leave-form-update" >UPDATE</a>
    <?php } ?>
 </table>

</form>


</div>
</div>
</div>

<script>
 /*$("#to").datepicker({
      dateFormat : 'yy-mm-dd'
    });  
 $("#from").datepicker({
      dateFormat : 'yy-mm-dd'
    });  
*/
  $( "#dateleave" ).datepicker({
      changeMonth: true,
      changeYear: true,
       dateFormat : 'yy-mm-dd'
    });
    $( "#from" ).datepicker({
      changeMonth: true,
      changeYear: true,
       dateFormat : 'yy-mm-dd'
    });
      $( "#to" ).datepicker({
      changeMonth: true,
      changeYear: true,
       dateFormat : 'yy-mm-dd'
    });
 $('.coverperiod').change(function(){
  cover();
});
function cover(){
   
    if($("#days").is(':checked')){
        $("#to").attr("disabled",false);    
        $("#from").attr("disabled",false);
    }
    else{
      $("#to").attr("disabled",true);
      $("#from").attr("disabled",true);
    }
}
$(document).ready(function(){
cover();
 $('.coverperiod').change(function(){
  cover();
});









 $("#leave-form-submit").unbind('click').click(function(){
   // alert( $("#leave-form").serialize());
   // alert($("#reason").val());
       var x;
       var r=confirm("Are you sure to submit your leave form?");
       if (r==true){
          $.ajax({
            type: "POST",
            url: "/kamahalan/index.php/post/addleaveform",
            data: $("#leave-form").serialize(),
            success:
              function(data){
                     if($("#usertype").val() == "Administrator"){
                  //alert("hey");
                }
                  $.pnotify({
                      title: 'Success',
                      text: "You have successfully submitted your Leave Form. Status: Pending",
                      type: 'success'
                    });
                    $("#content").load("/kamahalan/index.php/home/forms");
              }
             
          });
        }
      else{
            return false;
           }
    });  

  $(".leave-form-update").unbind('click').click(function(){
   //alert($("#leave-form").serialize());
       var x;
       var r=confirm("Are you sure to update this leave form?");
       if (r==true){
          $.ajax({
            type: "POST",
            url: "/kamahalan/index.php/post/updateleaveform",
            data: $("#leave-form").serialize(),
            success:
              function(data){
                
                  $.pnotify({
                      title: 'Success',
                      text: "You have successfully updated this Leave Form.",
                      type: 'success'
                    });
            if($("#formview").val() == "myform"){    
           $("#content").load("/kamahalan/index.php/home/forms");
            }
              }
             
          });
        }
      else{
            return false;
           }
    });  



 $("#leave-form-approve").unbind('click').click(function(){
    //alert( $("#leave-form").serialize());
   
       var x;
       var r=confirm("Are you sure to Approve this leave form?");
       if (r==true){
          $.ajax({
            type: "POST",
            url: "/kamahalan/index.php/post/approveform",
            data: "formid="+$("#formid").val()+"&formtype=Leave Form&userid="+$("#leaveformuserid").val(),
            success:
              function(data){   
            
             
           
                  $.pnotify({
                      title: 'Success',
                      text: "You have successfully approved this Leave Form. Status: Approved",
                      type: 'success'
                    });
               
                      $("#formactions").load("/kamahalan/index.php/home/leaveform/"+$("#leaveformuserid").val()+"/"+$("#formid").val()+"/Approved/edit/allform");
              }
             
          });
        }
      else{
            return false;
           }
    });  


});

</script>
