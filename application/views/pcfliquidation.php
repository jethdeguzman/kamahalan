<style>
  .pcftable tr th{
    background:#858585;
    color:#424242;
  }
  .pcftable tr td{
    background: #D4D4D4;
  }
  #form-title{
    margin-bottom:20px;
  }
</style>
<!--<div class="row">
  <div class="span10">
    <h3 class="module-title">Form - PCF Liquidation Form</h3>
  </div>
</div>-->

<div class="span9" >
  <div class="row">
 
    <div class="span9" >
      <?php if($status <> "none"){?>


  <?php if ($status == "Pending"){
            if (($usertype == "Administrator")&&($formview == "allform")){?>

  <div id="pending-alert" class="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
  <span><strong>Status: Pending.</strong> Click to approve this form.   <a id="pcf-form-approve"  class="btn btn-mini btn-info" >APPROVE</a></span>
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
      <form class="form-inline">
      <div id="form-title">
       <input type="hidden" id="formid" value = "<?php echo $formid;?>"> 
       <input id="formview" type="hidden" value="<?php echo $formview; ?>">
       <input type="hidden" id="pcfformuserid" name="pcfformuserid" value="<?php echo $id;?>">
          <strong><center>Fund Reimbursement Summary Form</center></strong>
     
          <small><center>201B FORM NO. 02</center></small>
       </div> 
    <table  class="table table-bordered pcftable">
    <tr>
      <th><label class="" >Name of Employee:</label></td>
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
          <input type="text"   readonly placeholder="Date"  value="<?php if($status=="none"){ echo date('Y-m-d'); }else{ echo $dateprep; }  ?>">
        </div>
      </td>
    </tr>

    </table>

    <table class="table  table-bordered pcftable">
    <tr>
      <th> <label class="control-label">Purpose:</label> </th>
    </tr>
    <tr>
      <td>
      <textarea id = "purpose" rows="5" class="span4"><?php echo $purpose;?></textarea>
      </td>
    </tr>
    </table>

<table class="table table-bordered pcftable">
    <tr>
      <th colspan="4"><label>Type of Applied Form:</label></th>
    </tr>
              
    <tr>
      <div class="controls">  
      <td><label class="checkbox"><input checked <?php if($type == "pcf"){ echo "checked"; }?>  class="typeofpcf" id="pcf" type="radio" name="typeofpcf" value="pcf"> PCF Liquidation</label></td>
      <td><label class="checkbox"><input <?php if($type == "cash"){ echo "checked"; }?> class="typeofpcf" type="radio" name="typeofpcf" value="cash"> Cash Reimbursements</label></td>
      <td><label class="checkbox"><input <?php if($type == "allow"){ echo "checked"; }?> class="typeofpcf" type="radio" name="typeofpcf" value="allow"> Allowance Replenishment</label></td>
      
       </div>
    </tr>
     
    </table>


<table class="table  table-bordered pcftable" id="expense_table" cellspacing="0" cellpadding="0">
  <tr>
      <th colspan="6"><label>Summary of PCF applied:</label></th>
    </tr>

<!--insert append table-->      
          <tr>
            <td style="width:15%">Date</td>
            <td style="width:15%">Category</td>
            <td style="width:15%">Ref.No</td>
            <td style="width:15%">Particulars</td>
            
            <td style="width:15%">Amount</td>
            <td >Remarks</td>
          </tr>     
        
          <!--<tr>
            <td><input class="input-small datestart"  type="text" id="date"  name="date" >
            <td><select class="input-medium"  name="category" id="category"  >
              <option></option>
              <option>Transportation</option>
              <option>Food</option>
              <option>Communication</option>
              <option>Supplies</option>
              <option>Misc.</option>
            </select></td>
            <td><input class="input-small"  type="text" name="refno" id="refno"  ></td>
            <td><input class="input-small"  type="text" name="particular" id="particular"></td>
            <td><input class="input-small" type="text" name="amount" id="amount"  ></td>
            <td><input class="input-small"  type="text" name="remarks" id="remarks"  ></td>
            
          </tr>-->
           <?php if(($status <> "none")&&(!$empty)){?>
           <tbody id="row" >
         <?php foreach ($result4 as $row) {
         
          ?>

          <tr class='group'><td><input class='date' id='date' type='date' name='date'  style='width: 120px;' value="<?php echo $row->date; ?>"></td><td><select class='input-medium category'  name='category' id='category'><option><?php echo $row->category; ?></option><option>Transportation</option><option>Food</option><option>Communication</option><option>Supplies</option><option>Misc.</option></select></td><td><input class='input-small refno' type='text' name='refno' id='refno' style='width: 100px;' value="<?php echo $row->refno; ?>"></td><td><input class='input-small particular' type='text' name='particular' id='particular' style='width: 100px;' value="<?php echo $row->particulars;?>"></td><td><input style='text-align:right;' class='input-small amount' type='text' name='amount' id='amount' value='<?php echo $row->amount; ?>' onkeyup='totalexpense()'></td><td><input class='input-small remarks' type='text' name='remarks' id='remarks' style='width: 100px;' value="<?php echo $row->remarks; ?>"> <input  type='button' value='Delete' class='del_row btn btn-mini btn-danger'></td></tr>

        <?php } ?>

        </tbody>
       
        <?php  }else{ ?>

          <tbody id="row" >
        </tbody>

        <?php } ?>



          <tr>
             <td colspan="2">  <a  class="btn btn-inverse addbtn">Add</a> </td>
             <td colspan="2"> Total Expenses</td>
             <td colspan="1"><input type="text" id="totalexpenses" readonly value="<?php echo $totalexpenses; ?>"   style="text-align:right; width: 100px;"></td>
             <td colspan="1"></td>
          </tr>
          <tr>
             <td colspan="2"></td>
             <td colspan="2" > Total Cash Advance</td>
             <td colspan="1"><input onkeyup="totalexpense()" value="<?php echo $totalcashadvance; ?>" type="text" id="totalcash"  style="text-align:right; width: 100px;"   ></td>
             <td colspan="1"></td>
          </tr>
          <tr>
             <td colspan="2"></td>
             <td colspan="2">Total Amount for Reinbursement/liquidation</td>
             <td colspan="1"><input type="text" id="totalamount" readonly value="<?php echo $totalliquidation; ?>"   style="text-align:right; width: 100px;"></td>
             <td colspan="1"></td>
          </tr>
          
   </table>
  
 <table class="table table-bordered pcftable">
    <tr>
      <th><label>Prepared by:</label></th>
      <th><label>Checked by:</label></th>
      <th><label>Approved by:</label></th>
    </tr>
    <tr>
      <td><input type="text" id="preparedby" readonly value="<?php echo $firstname.' '.$lastname;?>"></td>
      <td><input type="text" id="checkedby" readonly value="<?php echo $checkedbyname; ?>"></td>
      <td><input type="text" id="approvedby" readonly value="<?php echo $approvedbyname; ?>"></td>
    </tr>
</table>

 <table class="table table-bordered pcftable">
  <?php if($action == "create"){?>
    <a id="pcf-form-submit"  class="btn btn-success pull-right" >SUBMIT</a> 
 <?php } if ($action == "edit"){?>
     <a   class="btn btn-success pull-right pcf-form-update" >UPDATE</a>
  <?php } ?>
 </table>
</form>

</div>
</div>
</div>

<script>
/**var ctr = 0;
var data = {};
$("#pcf-form-submit").click(function(){
  data= {"profile":[
    {"name":"j", "age":"21"},
    {"name":"rosieth", "age":"20"}
    ]};**/ 

  
var data = {};
  var date, category, refno, particular, amount, remarks;



   $(".datestart").datepicker({
      dateFormat : 'yy-mm-dd'
    });  

  
  $(".addbtn").unbind('click').click(function(){

    
       
    
    $('#row').append("<tr class='group'><td><input class='date' id='date' type='date' name='date'  style='width: 120px;' placeholder='yy-mm-dd'></td><td><select class='input-medium category'  name='category' id='category'><option></option><option>Transportation</option><option>Food</option><option>Communication</option><option>Supplies</option><option>Misc.</option></select></td><td><input class='input-small refno' type='text' name='refno' id='refno' style='width: 100px;'></td><td><input class='input-small particular' type='text' name='particular' id='particular' style='width: 100px;'></td><td><input style='text-align:right;' class='input-small amount' type='text' name='amount' id='amount' value='0.00' onkeyup='totalexpense()'></td><td><input class='input-small remarks' type='text' name='remarks' id='remarks' style='width: 100px;'> <input  type='button' value='Delete' class='del_row btn btn-mini btn-danger'></td></tr>"); 

    
 // return false;

   // console.log(JSON.stringify(data));

});






$(".del_row").live("click", function(){ 
    var r=confirm("Are you sure you want to delete this?");
  if (r==true){
   $(this).closest('tr').remove();
     totalexpense();
  }
 else{
    return false;
    }
    //data.details = [];
});

/**
  alert(JSON.stringify(data.profile.length));
});**/

var typeofpcf;
$(".typeofpcf").change(function(){
  typeofpcf = $("input:radio[name=typeofpcf]:checked").val(); 
  data = { "purpose":$("#purpose").val(), "type":typeofpcf, "totalexpense":$("#totalexpenses").val(),"totalcash": $("#totalcash").val(), "totalamount":$("#totalamount").val(), "preparedby": $("#preparedby").val(), "checkedby": $("#checkedby").val(), "approvedby":$("#approvedby").val()};

});



function totalexpense(){
  var expenses = 0;

  $(" .amount").each(function(){
      var num = parseFloat($(this).attr("value"));
      if (isNaN(num)){
        num = 0;
      }
      expenses = expenses + num; 
  });
  var cash = parseFloat($("#totalcash").attr("value"));
  if (isNaN(cash)){
    cash = 0;
  }
  var amount = expenses - cash;
  $("#totalexpenses").attr("value",expenses.toFixed(2));

  $("#totalamount").attr("value",amount.toFixed(2));

}


//alert(JSON.stringify(data.details));



$("#pcf-form-submit").click(function(){

  data = {"pcfformuserid": $("#pcfformuserid").val(),"purpose":$("#purpose").val(), "type":$("input:radio[name=typeofpcf]:checked").val(),  "totalexpense": $("#totalexpenses").val(), "totalcash": $("#totalcash").val(), "totalamount": $("#totalamount").val(),"preparedby": $("#preparedby").val(), "checkedby": $("#checkedby").val(), "approvedby":$("#approvedby").val(), "details":[]};
  /* for(var x=1; x<=ctr; x++){  

      date = "#date"+x;
      category = "#category"+x;
      refno = "#refno"+x;
      particular = "#particular"+x;
      amount = "#amount"+x;
      remarks = "#remarks"+x;
    */
      $('.group').each(function(){
         data.details.push({"date":$(this).find(".date").val(), "category" : $(this).find(".category").val(), "refno" : $(this).find(".refno").val(), "particular" : $(this).find(".particular").val(), "amount" : $(this).find(".amount").val(), "remarks" : $(this).find(".remarks").val()});
      });
     
    //}
    console.log(JSON.stringify(data));
  //  alert($("#date1").val());
    var jsonarray = JSON.stringify(data);
    var x;
    var r=confirm("Are you sure to submit your PCF form?");
    if (r==true){
    $.ajax({
      type: "POST",
      url : "/kamahalan/index.php/post/pcfdetails",
      datatype: "json",
      data : {'data':jsonarray},
      success: function(data){
        //alert(jsonarray);
        //alert('success');
        $.pnotify({
                      title: 'Success',
                      text: "You have successfully submitted your PCF Form. Status: Pending",
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

   

$(".pcf-form-update").click(function(){

  data = {"pcfformuserid": $("#pcfformuserid").val(),"formid":$("#formid").val(),"purpose":$("#purpose").val(), "type":$("input:radio[name=typeofpcf]:checked").val(),  "totalexpense": $("#totalexpenses").val(), "totalcash": $("#totalcash").val(), "totalamount": $("#totalamount").val(),"preparedby": $("#preparedby").val(), "checkedby": $("#checkedby").val(), "approvedby":$("#approvedby").val(), "details":[]};
  /* for(var x=1; x<=ctr; x++){  

      date = "#date"+x;
      category = "#category"+x;
      refno = "#refno"+x;
      particular = "#particular"+x;
      amount = "#amount"+x;
      remarks = "#remarks"+x;
    */
      $('.group').each(function(){
         data.details.push({"date":$(this).find(".date").val(), "category" : $(this).find(".category").val(), "refno" : $(this).find(".refno").val(), "particular" : $(this).find(".particular").val(), "amount" : $(this).find(".amount").val(), "remarks" : $(this).find(".remarks").val()});
      });
     
    //}
    console.log(JSON.stringify(data));
  //  alert($("#date1").val());
    var jsonarray = JSON.stringify(data);
    var x;
    var r=confirm("Are you sure to submit your PCF form?");
    if (r==true){
    $.ajax({
      type: "POST",
      url : "/kamahalan/index.php/post/updatepcfdetails",
      datatype: "json",
      data : {'data':jsonarray},
      success: function(data){
        //alert(jsonarray);
        //alert('success');
        $.pnotify({
                      title: 'Success',
                      text: "You have successfully updated your PCF Form. Status: Pending",
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

 $("#pcf-form-approve").unbind('click').click(function(){
    //alert( $("#leave-form").serialize());
   
       var x;
       var r=confirm("Are you sure to Approve this leave form?");
       if (r==true){
          $.ajax({
            type: "POST",
            url: "/kamahalan/index.php/post/approveform",
            data: "formid="+$("#formid").val()+"&formtype=Reinbursement Form&userid="+$("#pcfformuserid").val(),
            success:
              function(data){   
            
             
           
                  $.pnotify({
                      title: 'Success',
                      text: "You have successfully approved this Reinbursement Form. Status: Approved",
                      type: 'success'
                    });
               
                      $("#formactions").load("/kamahalan/index.php/home/pcfliquidation/"+$("#pcfformuserid").val()+"/"+$("#formid").val()+"/Approved/edit/allform");
              }
             
          });
        }
      else{
            return false;
           }
    });  

</script>


