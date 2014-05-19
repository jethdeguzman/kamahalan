<style>
  .businesstable tr th{
    background:#858585;
    color:#424242;
  }
  .businesstable tr td{
    background: #D4D4D4;
  }
  #form-title{
    margin-bottom:20px;
  }
</style>
<!--<div class="row">
  <div class="span10">
    <h3 class="module-title">Form - Business Form</h3>
  </div>
</div>-->

<div class="span9" >
  <div class="row">
 
    <div class="span9" >



      <form id="ob-form" class="form-inline">
      <div id="form-title">
        <input id="formview" type="hidden" value="<?php echo $formview; ?>">
      <input type="hidden" id="formid" value = "<?php echo $formid;?>">
     <input type="hidden" id="obusinessformuserid" name="obusinessformuserid" value="<?php echo $id;?>">
          <strong><center>Business Form</center></strong>
     
          <small><center>201B FORM NO. 02</center></small>
       </div> 
    <table  class="table table-bordered businesstable">
    <tr>
      <th><label class="" >Name of Employee:</label></td>
      <th><label class="">Designation:</label></td>
      <th><label class="">Date Prepared:</label></td>
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
          <input type="text" id="datepicker" readonly placeholder="Date" value="<?php if($status=="none"){ echo date('Y-m-d'); }else{ echo $dateprep; }  ?>">
        </div>
      </td>
    </tr>

    </table>

    <table  class="table table-bordered businesstable">
    <tr>
      <th><label class="">Date of Appointment:</label></td>
      <th><label class="">Time of Appointment:</label></td>
    </tr>
    <tr align="center">
      
      <td>
        <div class="controls">
          <input type="text" name="date" id="dateob"  placeholder="yy-mm-dd" value="<?php echo $dateappo; ?>">
        </div>
      </td>
      <td>
          <input id="hourtimein1" class="time-input" onchange="change('#hourtimein')" type="number"  value="<?php if($status <> "none"){ echo strftime("%I",strtotime($timestart)); } else{ echo date("g"); } ?>" name="hourtimein"  max="12" min="1" style="width: 35px;">:
          <input id="mintimein1" class="time-input" onchange="change('#mintimein')" type="number"  value="<?php if($status <> "none"){ echo strftime("%M",strtotime($timestart)); } else{ echo date("i"); } ?>" name="mintimein" max="59" min="00" style="width: 35px;">
          <select id="ampmtimein1" class="time-input" onchange="change('#ampmtimein')" name="ampmtimein" style="width: 60px;">
          <?php $ampmtimestart = strftime("%p",strtotime($timestart)); if ($status <> "none") { ?>
          <option><?php echo $ampmtimestart; ?></option>
          <option><?php switch ($ampmtimestart) {
                      case 'AM':
                        echo "PM";
                        break;
                      case 'PM':
                        echo 'AM';
                        break;
                    } ?></option>
        <?php }else{  ?>
          <option><?php echo $ampmtimestart;?></option>
          <option><?php switch ($ampmtimestart) {
                      case 'AM':
                        echo "PM";
                        break;
                      case 'PM':
                        echo 'AM';
                        break;
                    } ?></option><?php } ?>
          </select>
          to
          <input id="hourtimeout1" class="time-input" onchange="change('#hourtimeout')" type="number"  value="<?php if($status <> "none"){ echo strftime("%I",strtotime($timeend)); } else{ echo date("g"); } ?>" name="hourtimein" max="12" min="1" style="width: 35px;">:
          <input id="mintimeout1" class="time-input" type="number" onchange="change('#mintimeout')" value="<?php if($status <> "none"){ echo strftime("%M",strtotime($timeend)); } else{ echo date("i"); } ?>" name="mintimein" max="59" min="00" style="width: 35px;">
          <select id="ampmtimeout1" class="time-input" onchange="change('#ampmtimeout')" name="ampmtimein"  style="width: 60px;">
             <?php $ampmtimeend = strftime("%p",strtotime($timeend)); if ($status <> "none") { ?>
          <option><?php echo $ampmtimeend; ?></option>
          <option><?php switch ($ampmtimestart) {
                      case 'AM':
                        echo "PM";
                        break;
                      case 'PM':
                        echo 'AM';
                        break;
                    } ?></option>
        <?php }else{  ?>
          <option><?php echo $ampmtimeend ;?></option>
          <option><?php switch ($ampmtimeend ) {
                      case 'AM':
                        echo "PM";
                        break;
                      case 'PM':
                        echo 'AM';
                        break;
                    } ?></option><?php } ?>

        </select>
          
      </td>
    </tr>

    </table>


      <table  class="table table-bordered businesstable">
    <tr>
      
      <th colspan="2"><label class="">Start of Appointment:</label></td>
      <th colspan="2"><label class="">End of Appointment:</label></td>
    </tr>
    

     <tr>
      <td>
        <div class="controls">
          <input type="text" id="location1"  placeholder="Location 1" value="<?php echo $location1; ?>" style="width: 170px;">
        </div>
      </td>
      <td >
        <div class="controls">
          <input type="text" id="client1"  placeholder="Client 1" value="<?php echo $client1; ?>" style="width: 170px;">
        </div>
      </td>
      <td>
        <div class="controls">
          <input type="text" id="location2"  placeholder="Location 2" value="<?php echo $location2; ?>" style="width: 170px;">
        </div>
      </td>
      <td>
        <div class="controls">
          <input type="text" id="client2"  placeholder="Client 2" value="<?php echo $client2; ?>" style="width: 170px;">
        </div>
      </td>
    </tr>





    </table>
    
    <table class="table  table-bordered businesstable">
    <tr>

      <th> <label class="control-label">Purpose:</label> </th>
    </tr>
    <tr>
      <td>
      <textarea name="purpose" id="purpose" rows="5" class="span4"><?php echo $purpose; ?></textarea>
      </td>
    </tr>
    </table>



<table class="table  table-bordered businesstable" id="expense_table" cellspacing="0" cellpadding="0">
      <tr>
      <th colspan="6"><label>Summary of Expenses:</label></th>
    </tr>

<!--insert append table-->      
          <tr>
            <td >Vehicle</td>
            <td >Ref. No.</td>
            <td style="width:20%">From</td>
            <td style="width:20%">To</td>
            <td >Amount Paid</td>

          </tr>     
       
        <!--  <tr>
            <td><input type="text" name="vehicle" id="vehicle" style="width: 100px;"></td>
            <td><input type="text" name="refno" id="refno" style="width: 100px;"></td>
            <td><input type="text" name="from" id="from" class="input-large"></td>
            <td><input type="text" name="to" id="to" class="input-large"></td>
            <td><input type="text" name="amountpaid" id="amountpaid" style="width: 100px;"></td>
            
          </tr>-->
        
        <?php if(($status <> "none")&&(!$empty)){?>
           <tbody id="row" >
         <?php foreach ($result4 as $row) {
         
          ?>
          
          <tr class='group'>
            <td><input type='text' class='vehicle' name='vehicle' id='vehicle' style='width: 100px;' value="<?php echo $row->vehicle;?>"></td>
            <td><input class='refno' type='text' name='refno' id='refno' style='width: 100px;' value="<?php echo $row->refno; ?>"></td>
            <td><input type='text' name='from' id='from' class='from input-medium' value="<?php echo $row->fromlocation;?>"></td>
            <td><input type='text' name='to' id='to' class='to input-medium' value="<?php echo $row->tolocation;?>"></td>
            <td><input type='text' name='amountpaid' onkeyup='getamountpaid()' id='amountpaid' class='amountpaid' style='width: 100px; text-align:right;' value="<?php echo $row->amount;?>">
            <input  type='button' value='Delete' class='del_row btn btn-mini btn-danger'></td>
          </tr>


        <?php } ?>

        </tbody>
       
        <?php  }else{ ?>

          <tbody id="row" >
        </tbody>

        <?php } ?>


          <tr>
             <td> <a  class="btn btn-inverse addbtn">Add</a>  </td> 
             <td></td>
             <td></td>
             <td> <center>Total Amount Paid</center></td>
             <td><input type="text" id="totalamountpaid" readonly value="<?php echo $totalamount;?>"  style="width: 100px; text-align:right;"></td>
          </tr>
          <tr>
          </tr>
   </table>
  
 <table class="table table-bordered businesstable">
    <tr>
      <th><label>Prepared by:</label></th>
      <th><label>Checked by:</label></th>
      <th><label>Approved by:</label></th>
    </tr>
    <tr>
      <td><input id="prepared" type="text" readonly value="<?php echo $firstname.' '.$lastname;?>"></td>
      <td><input id="checked" type="text" readonly value="<?php echo $checkedbyname; ?>"></td>
      <td><input id="approved" type="text" readonly value="<?php echo $approvedbyname; ?>"></td>
    </tr>
</table>

 <table class="table table-bordered businesstable">
  <?php if($action == "create"){ ?>
    <a id="ob-form-submit"  class="btn btn-success pull-right" >SUBMIT</a> 
 <?php } if($action == "edit"){ ?>
   <a   class="btn btn-success pull-right ob-form-update" >UPDATE</a>
 <?php }?>
 </table>
</form>

</div>
</div>
</div>

<script>
  $( "#dateob" ).datepicker({
      changeMonth: true,
      changeYear: true,
       dateFormat : 'yy-mm-dd'
    });
$(document).ready(function(){
// alert("asd");
  var items;
  $.getJSON('/kamahalan/index.php/post/allformsjson',items,function(data){
      //items = data.items;
      //console.log(data);
      //array =  { "items" : data };
  });
});
var data = {};
function change(id){
  var selector = id+"1";
  var target = id+"2";
  $(target).attr('value',$(selector).val());
}



  $(".addbtn").click(function(){
//alert('asd');
      $('#row').append("<tr class='group'><td><input type='text' class='vehicle' name='vehicle' id='vehicle' style='width: 100px;'></td><td><input class='refno' type='text' name='refno' id='refno' style='width: 100px;'></td><td><input type='text' name='from' id='from' class='from input-medium '></td><td><input type='text' name='to' id='to' class='to input-medium '></td><td><input type='text' name='amountpaid' onkeyup='getamountpaid()' id='amountpaid' class='amountpaid' style='width: 100px; text-align:right;'> <input  type='button' value='Delete' class='del_row btn btn-mini btn-danger'></td></tr>"); 
  
      

});






$(".del_row").live("click", function(){ 

   var r=confirm("Are you sure you want to delete this?");
  if (r==true){
    $(this).closest('tr').remove();
    getamountpaid();
  }
 else{
    return false;
    }
});

function getamountpaid(){
  var totalamount = 0;
   
  $(".amountpaid").each(function(){
    var amount = parseFloat($(this).val());
   
    
    if(isNaN(amount)){
      amount = 0;
      
    }
   
    totalamount = totalamount + amount;
  });
  $("#totalamountpaid").attr("value", totalamount.toFixed(2));
}

 $("#ob-form-submit").unbind('click').click(function(){
    //alert( $("#ob-form").serialize());
    var obusinessformuserid = $('#obusinessformuserid').val();
    var location1 = $('#location1').val();
    var location2 = $('#location2').val();
    var client1 = $('#client1').val();
    var client2 = $('#client2').val();
    var dateappo = $('#dateob').val();

    var hourtimein1 = $("#hourtimein1").val();
    var mintimein1 = $("#mintimein1").val();
    var ampmtimein1 = $("#ampmtimein1").val();

    var hourtimeout1 = $("#hourtimeout1").val();
    var mintimeout1 = $("#mintimeout1").val();
    var ampmtimeout1 = $("#ampmtimeout1").val();

    var timeappo_start = hourtimein1 + ":" + mintimein1 + " " + ampmtimein1;
    var timeappo_end = hourtimeout1 + ":" + mintimeout1 + " " + ampmtimeout1;

    var purpose = $('#purpose').val();
    var prepared = $('#prepared').val();
    var checked = $('#checked').val();
    var approved = $('#approved').val();
    var totalamountpaid = $("#totalamountpaid").val();
    var formid = $("#formid").val();
    data = {"obusinessformuserid":obusinessformuserid, "location_start": location1, "location_end":location2, "client_start":client1, "client_end":client2, "date_appointment": dateappo, "timeappo_start":timeappo_start, "timeappo_end":timeappo_end, "purpose": purpose, "total_amount":totalamountpaid, "prepared":prepared, "approved":approved, "checked":checked, "details":[]};

    $('.group').each(function(){
      data.details.push({"vehicle":$(this).find('.vehicle').val(), "refno" : $(this).find('.refno').val(), "from":$(this).find('.from').val(), "to":$(this).find('.to').val(),"amount":$(this).find(".amountpaid").val()});
    });

    //alert(JSON.stringify(data));
    var jsonarray = JSON.stringify(data);
    var x;
    var r=confirm("Are you sure to submit your OB form?");
  if (r==true){
    $.ajax({
      type: "POST",
      url: "/kamahalan/index.php/post/obdetails",
      datatype: "json",
      data: {'data':jsonarray},
      success: function(data){
           
        // alert(jsonarray);
        //alert('success');
         $.pnotify({
                      title: 'Success',
                      text: "You have successfully submitted your OB Form.",
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






$(".ob-form-update").unbind('click').click(function(){
    //alert( $("#ob-form").serialize());
    var obusinessformuserid = $('#obusinessformuserid').val();
    var location1 = $('#location1').val();
    var location2 = $('#location2').val();
    var client1 = $('#client1').val();
    var client2 = $('#client2').val();
    var dateappo = $('#datestart').val();

    var hourtimein1 = $("#hourtimein1").val();
    var mintimein1 = $("#mintimein1").val();
    var ampmtimein1 = $("#ampmtimein1").val();

    var hourtimeout1 = $("#hourtimeout1").val();
    var mintimeout1 = $("#mintimeout1").val();
    var ampmtimeout1 = $("#ampmtimeout1").val();

    var timeappo_start = hourtimein1 + ":" + mintimein1 + " " + ampmtimein1;
    var timeappo_end = hourtimeout1 + ":" + mintimeout1 + " " + ampmtimeout1;

    var purpose = $('#purpose').val();
    var prepared = $('#prepared').val();
    var checked = $('#checked').val();
    var approved = $('#approved').val();
    var totalamountpaid = $("#totalamountpaid").val();
    var formid = $("#formid").val();
    data = {"obusinessformuserid":obusinessformuserid, "formid":formid, "location_start": location1, "location_end":location2, "client_start":client1, "client_end":client2, "date_appointment": dateappo, "timeappo_start":timeappo_start, "timeappo_end":timeappo_end, "purpose": purpose, "total_amount":totalamountpaid, "prepared":prepared, "approved":approved, "checked":checked, "details":[]};

    $('.group').each(function(){
      data.details.push({"vehicle":$(this).find('.vehicle').val(), "refno" : $(this).find('.refno').val(), "from":$(this).find('.from').val(), "to":$(this).find('.to').val(),"amount":$(this).find(".amountpaid").val()});
    });

    //alert(JSON.stringify(data));
    var jsonarray = JSON.stringify(data);
    var x;
    var r=confirm("Are you sure to submit your OB form?");
  if (r==true){
    $.ajax({
      type: "POST",
      url: "/kamahalan/index.php/post/updateobdetails",
      datatype: "json",
      data: {'data':jsonarray},
      success: function(data){
           
        /// alert(jsonarray);
        //alert('success');
         $.pnotify({
                      title: 'Success',
                      text: "You have successfully submitted your OB Form.",
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






</script>



