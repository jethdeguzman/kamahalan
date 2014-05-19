<style>
#reports-container{
  margin-left:60px;

}
#reports .nav{
  border-bottom: 1px solid #6E6E6E;
}
#reports ul li{

}
.icons{
  display:inline-block; 
  padding:10px;
  cursor: pointer;
}
.brd{
  border:1px solid black;
}

  .dtrtable tr th{
    background:#858585;
    color:#424242;
    text-align: center;
    vertical-align: middle;
  }
  .dtrtable tr td{
    background: #D4D4D4;
     vertical-align: middle;
  }
  #form-title{
    margin-bottom:20px;
  }
  .center{
    text-align: center;
  }

</style>  

<div class="row ">
  <div class="span10 ">
    <h3 class="module-title">Reports</h3>
    <!--<input id="forms-userid" type="hidden" value="<?php echo $id;?>"> -->
  </div>
</div>

<div class="row">
  <div class="span9 " id="reports-container">
  <div class="tabbable" id="reports" > <!-- Onlyrequired for left/right tabs -->
  <ul class="nav nav-tabs" >
    <li class="active"><a id = "dtrreport-btn" href="#dtrreport" data-toggle="tab">DTR Report</a></li>
    <li><a id="pcfreport-btn" href="#pcfreport" data-toggle="tab">PCF Report</a></li>
     <li><a id="pcfreplenish-btn" href="#pcfreplenish" data-toggle="tab">PCF Replenishment Report</a></li>
     <li><a id="ob-btn" href="#obreport" data-toggle="tab">OB Report</a></li>
  </ul>

  <div class="tab-content">
   
<div class="tab-pane active" id="dtrreport" >
   <div class="span9" style="margin-left:0px;" >
  <div class="row">
 
    <div class="span9" >
      <table  class="dtrtable table table-bordered">
        <tr>
            <th style='width:20%;'><label>Employment Status</label></th>
            <td style='width:20%;'><select id="estatus" >
          
              <option value="Employee">Employee</option>
              <option value="Practicumer">Practicumer</option>
            </select>
          </td>
            <th style='width:20%;'><label>Name</label></th>

            <td><select id="internname">
              <?php foreach ($internlist as $row) { ?>
                <option value="<?php echo $row->users; ?>"><?php echo $row->lastname." ".$row->firstname;?></option>
               
              <?php }?>
              
            </select>

            <select  id="employeename">

                 <?php foreach ($employeelist as $row) { ?>
                <option value="<?php echo $row->users; ?>"><?php echo $row->lastname." ".$row->firstname;?></option>
               
              <?php }?>         
            </select>

          </td>
         
        </tr>

<tr>
            
            <th  style='width:10%;'><label>Cover Period</label></th>
              <td colspan='3'>From<input type="text" id="from" class="input-medium" placeholder="yy-mm-dd" style='margin-left:20px; margin-right:20px;' value="<?php echo date("Y-m-01"); ?>"> To <input type="text" value="<?php echo date("Y-m-t"); ?>" class="input-medium" id="to" placeholder="yy-mm-dd" style='margin-left:20px; margin-right:20px;'>
              <a id="report-btn"  class="btn btn-primary">Submit</a>
              </td>
        </tr>
       
      </table>

        <table>
          <div class="row-fluid">
            <tr><td  ><a id="printdtrintern-btn"  class="btn btn-inverse btn-mini offset7 colspan2">-Printer Friendly Version-</a></td></tr>
          </div>
        </table>  
    </div>
  </div>
</div>
     <div class="span9" id="dtrreportintern-content" style=" margin-left:-30px;"></div>
      <div class="span9" id="dtrreportemployee-content" style=" margin-left:-30px;"></div>
    </div>


    <div class="tab-pane" id="pcfreport">
        <div class="span9" style="margin-left:0px;" >
  <div class="row">
 
    <div class="span9" >
      <table  class="dtrtable table table-bordered">
        <tr>
            
            <th style='width:20%;'><label>Name</label></th>
            <td><select style="display:none;"  id="internname">
              <?php foreach ($internlist as $row) { ?>
                <option ><?php echo $row->lastname." ".$row->firstname;?></option>
               
              <?php }?>
              
            </select>

            <select  id="employeenamepcfreport">

                 <?php foreach ($employeelist as $row) { ?>
                <option value="<?php echo $row->users; ?>"><?php echo $row->lastname." ".$row->firstname;?></option>
               
              <?php }?>         
            </select>

          </td>
          </tr>
          <tr>
            <th  ><label>Cover Period</label></th>
             <td >From<input type="text" id="frompcfreport" class="input-medium" placeholder="yy-mm-dd" style='margin-left:20px; margin-right:20px;'> To <input type="text" class="input-medium" id="topcfreport" placeholder="yy-mm-dd" style='margin-left:20px; margin-right:20px;'><a id="submitpcfreport"  class="btn btn-primary">Submit</a></td>
       </tr>
      </table>
 
    </div>
  </div>
</div>
        <div class="span9" id="pcfreport-content"  style="display:none; margin-left:-30px;"></div>
    </div>

     <div class="tab-pane" id="pcfreplenish">
               <div class="span9" style="margin-left:0px;" >
  <div class="row">
 
    <div class="span9" >
       <table class="dtrtable table table-bordered"> 
           <tr>
            <th  ><label>Cover Period</label></th>
             <td >From<input type="text" id="frompcfreplenish" class="input-medium" placeholder="yy-mm-dd" style='margin-left:20px; margin-right:20px;'> To <input type="text" class="input-medium" id="topcfreplenish" placeholder="yy-mm-dd" style='margin-left:20px; margin-right:20px;'><a id="submitpcfreplenish"  class="btn btn-primary">Submit</a></td>
       </tr>
      </table>
    </div>
  </div>
</div>
        <div class="span9" id="pcfreplenish-content"  style=" display:none;  margin-left:-30px;"></div>
    </div>



      <div class="tab-pane" id="obreport">
        <div class="span9" style="margin-left:0px;" >
  <div class="row">
 
    <div class="span9" >
      <table  class="dtrtable table table-bordered">
        <tr>
            
            <th style='width:20%;'><label>Name</label></th>
            <td>
            <select  id="employeenameobreport">

                 <?php foreach ($employeelist as $row) { ?>
                <option value="<?php echo $row->users; ?>"><?php echo $row->lastname." ".$row->firstname;?></option>
               
              <?php }?>         
            </select>

          </td>
          </tr>
          <tr>
            <th  ><label>Cover Period</label></th>
             <td >From<input type="text" id="fromobreport" class="input-medium" placeholder="yy-mm-dd" style='margin-left:20px; margin-right:20px;'> To <input type="text" class="input-medium" id="toobreport" placeholder="yy-mm-dd" style='margin-left:20px; margin-right:20px;'><a id="submitobreport"  class="btn btn-primary">Submit</a></td>
       </tr>
      </table>
    </div>
  </div>
</div>
        <div class="span9" id="obreport-content"  style="margin-left:-30px;">dsgs</div>
    </div>



  </div>
</div>
          
  </div>
</div>

<script>
$(document).ready(function(){
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
    $( "#frompcfreport" ).datepicker({
      changeMonth: true,
      changeYear: true,
       dateFormat : 'yy-mm-dd'
    });
      $( "#topcfreport" ).datepicker({
      changeMonth: true,
      changeYear: true,
       dateFormat : 'yy-mm-dd'
    });
           $( "#topcfreplenish" ).datepicker({
      changeMonth: true,
      changeYear: true,
       dateFormat : 'yy-mm-dd'
    });
         $( "#frompcfreplenish" ).datepicker({
      changeMonth: true,
      changeYear: true,
       dateFormat : 'yy-mm-dd'
    });
      $( "#fromobreport" ).datepicker({
      changeMonth: true,
      changeYear: true,
       dateFormat : 'yy-mm-dd'
    });
      $( "#toobreport" ).datepicker({
      changeMonth: true,
      changeYear: true,
       dateFormat : 'yy-mm-dd'
    });
$("#internname").hide();
  $("#dtrreportemployee-content").hide();
    $("#dtrreportintern-content").hide();
  $("#estatus").change(function(){
    var estatus = $(this).val();
    if(estatus == "Practicumer"){
      $("#internname").show();
      $("#employeename").hide();
    }    
    else{
       $("#internname").hide();
      $("#employeename").show();
    }
  });

  $("#employeename").change(function(){
    alert("ascd");
    var employeeid = $('#employeename :selected').attr("value");
    alert(employeeid);
  });

  $("#internname").change(function(){
    alert("intern");
    var internid = $('#internname :selected').attr("value");
    alert(internid);
  });
 //  alert($('#employeename :selected').attr("value"));
});
   var formsuserid = $("#forms-userid").val();
   var status = "none";
   //var action = "create";
   var formview = "none";
    var action = "";

$("#editdtrbtn").change(function(){
 
  if($(this).is(':checked')){
    //alert("checked");
    action = "edit";
  }else{
   // alert("ow");
    action="show";
  }
  //alert(action);
});

$("#report-btn").stop(true, true).click(function(){

   var from = ($("#from").val());
   var to = ($("#to").val());

   var estatus = $("#estatus :selected").val();
   var employeeid = $('#employeename :selected').attr("value");
   var internid = $('#internname :selected').attr("value");
   
   if(estatus == "Employee"){
    $("#dtrreportintern-content").hide();
     $("#dtrreportemployee-content").show();
    $("#dtrreportemployee-content").load("/kamahalan/index.php/home/dtrreportemployee/"+employeeid+"/"+from+"/"+to);
   }else{
    $("#dtrreportemployee-content").hide();
    $("#dtrreportintern-content").show();
    $("#dtrreportintern-content").load("/kamahalan/index.php/home/dtrreportintern/"+internid+"/"+from+"/"+to);
   }
      });

   
  $("#dtrreport-btn").stop(true,true).click(function(){
   //   $("#dtrreportintern-content").load("/kamahalan/index.php/home/dtrreportintern");
  // $("#dtrreportemployee-content").load("/kamahalan/index.php/home/dtrreportemployee");
   // $("#dtrreport-content").load("/kamahalan/index.php/home/dtrreport");
     $("#pcfreport-content").hide();
      $("#pcfreplenish-content").hide();
              $("#obreport-content").hide();
  });
 
  $("#pcfreport-btn").stop(true,true).click(function(){ 
      
      $("#pcfreport-content").show();
      $("#pcfreplenish-content").hide();
              $("#obreport-content").hide();
      //$("#pcfreport-content").load("/kamahalan/index.php/home/pcfreports");

    
    });
      $("#pcfreplenish-btn").stop(true,true).click(function(){ 
      $("#pcfreplenish-content").show();
       $("#pcfreport-content").hide();
        $("#obreport-content").hide();
    });

      $("#ob-btn").stop(true,true).click(function(){
 $("#obreport-content").show();
    
 //$("#obreport-content").load("/kamahalan/index.php/home/obreport");
         $("#pcfreplenish-content").hide();
       $("#pcfreport-content").hide();
      });

  $("#submitpcfreport").stop(true,true).click(function(){
    var employeeid = $("#employeenamepcfreport").val();
    var from = $("#frompcfreport").val();
    var to = $("#topcfreport").val();
    if (from == ""){
      from = "0000-00-00";
    }
    if (to == ""){
      to = "0000-00-00";
    }
    $("#pcfreport-content").load("/kamahalan/index.php/home/pcfreports/"+employeeid+"/"+from+"/"+to);
  });
  
  $("#submitpcfreplenish").stop(true,true).click(function(){

    var from1 = $("#frompcfreplenish").val();
    var to1 = $("#topcfreplenish").val();
   
    if (from1 == ""){
      from1 = "0000-00-00";
    }
    if (to1 == ""){
      to1 = "0000-00-00";
    }
    $("#pcfreplenish-content").load("/kamahalan/index.php/home/pcfreplenish/"+from1+"/"+to1);

  });
  
    $("#submitobreport").stop(true,true).click(function(){
    var employeeid3 = $("#employeenameobreport").val();
   
    var from3 = $("#fromobreport").val();
    var to3 = $("#toobreport").val();
    if (from3 == ""){
      from3 = "0000-00-00";
    }
    if (to3 == ""){
      to3 = "0000-00-00";
    }
    $("#obreport-content").load("/kamahalan/index.php/home/obreport/"+employeeid3+"/"+from3+"/"+to3);
   //alert(employeeid3);
   });
      


  $("#printdtrintern-btn").click(function(){
   alert('sdas');
   
   var open_link = window.open('','_blank');
   var from = ($("#from").val());
   var to = ($("#to").val());
   var estatus = $("#estatus :selected").val();
   var employeeid = $('#employeename :selected').attr("value");
   var internid = $('#internname :selected').attr("value");
   
   if(estatus == "Employee"){
    open_link.location="/kamahalan/index.php/home/printdtremployee/"+employeeid+"/"+from+"/"+to ;
   }else{
    open_link.location="/kamahalan/index.php/home/printdtrintern/"+internid+"/"+from+"/"+to ;
   }

  });
</script>



<!-- FORMS
  <script>
function edit(id, formid, formtype, status, formview){
 // alert(formid);
 
  var action = "edit";
  //alert(id+" "+formtype);
  switch (formtype){
    case "Leave Form":
    if(formview == "allform"){
    $("#formactions").show();
    $("#formactions").load("/kamahalan/index.php/home/leaveform/"+id+"/"+formid+"/"+status+"/"+action+"/"+formview);
    $("#allform-tbl").hide();
    return false;
    }else{
     $("#formactions2").show();
    $("#formactions2").load("/kamahalan/index.php/home/leaveform/"+id+"/"+formid+"/"+status+"/"+action+"/"+formview);
    $("#myform-tbl").hide();
    return false;
  }
    break;
    case "OB Form":
    if(formview == "allform"){
      $("#formactions").show();
      $("#formactions").load("/kamahalan/index.php/home/obusinessform/"+id+"/"+formid+"/"+status+"/"+action+"/"+formview);
      $("#allform-tbl").hide();
      
    }else{
      $("#formactions2").show();
      $("#formactions2").load("/kamahalan/index.php/home/obusinessform/"+id+"/"+formid+"/"+status+"/"+action+"/"+formview);
      $("#myform-tbl").hide();

    }
  
    break;
    default:
    $("#formactions").show();
      $("#formactions").load("/kamahalan/index.php/home/pcfliquidation/"+id+"/"+"formid"+"/"+status+"/"+action+formview);
      $("#allform-tbl").hide();
    break;
  }

}
function view(id, formid, formtype, status, formview){
  status = "Pending";
  //$("#formactions").load("/kamahalan/index.php/home/editform"+id);
  //alert(id+" michie"+formtype);
  //window.open('print/printObForm.htm','_newtab');
  var open_link = window.open('','_blank');
  open_link.location="/kamahalan/index.php/home/printleaveform/"+id+"/"+formid+"/"+status+"/"+action+"/"+formview;
}
function deleteform(id, formid, formtype, status, formview){
  switch (formtype){
    case "Leave Form":
     var x;
       var r=confirm("Are you sure to delete this leave form?");
       if (r==true){
            $.ajax({
              url : "/kamahalan/index.php/post/deleteform/"+formtype+"/"+formid,
              success: function(data){
                  $.pnotify({
                      title: 'Success',
                      text: "You have successfully deleted this Leave Form.",
                      type: 'success'
                    });

                $("#allform-tbl").load("/kamahalan/index.php/home/allforms");
              }

            });
        }
         else{
            return false;
        }
    
    break;

    case "OB Form":
  
    break;
    default:
  
    break;
  }

}


</script>
-->
