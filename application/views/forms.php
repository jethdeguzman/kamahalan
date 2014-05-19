<style>
#forms-container{
	margin-left:60px;

}
#forms .nav{
	border-bottom: 1px solid #6E6E6E;
}
#forms ul li{

}
.icons{
	display:inline-block; 
	padding:10px;
  cursor: pointer;
}

</style>  
<input type="hidden" id="usertype" value="<?php echo $usertype;?>">
<div class="row ">
	<div class="span10 ">
		<h3 class="module-title">Forms </h3>
		<input id="forms-userid" type="hidden" value="<?php echo $id;?>">
	</div>
</div>

<div class="row">
	<div class="span9 " id="forms-container">
	<div class="tabbable" id="forms"> <!-- Onlyrequired for left/right tabs -->
  <ul class="nav nav-tabs" >
    <li class="active"><a id = "createform-btn" href="#createform" data-toggle="tab">Create Form</a></li>
    <li><a id="myform-btn" href="#myform"  data-toggle="tab">View My Forms</a></li>
    <?php if ($usertype == "Administrator"){ ?>
    <li><a  id="allform-btn" href="#allform" data-toggle="tab">All Forms</a></li>
  <?php } ?>
  </ul>
  <div class="tab-content">
    
    <div class="tab-pane active" id="createform" >
      <div style="margin-left:0px; " class="" id="forms-select">
      	<div class="" style="text-align:center; padding:30px;">
      		<div id="leave" class="icons" style="">
      		<img src="/kamahalan/assets/images/leave.png" height="150" width="200">
      		<p>Leave</p>
      		<h5> 201B FORM NO. 01</h5>
      		</div>
      		<div id="ob" class="icons" style="">
      		<img src="/kamahalan/assets/images/ob.png" height="150" width="200">
      		<p>Official Business</p> 
      		<h5>201B FORM NO. 02</h5>
      		</div>
      		<div id="pcf" class="icons" style="">
      		<img src="/kamahalan/assets/images/pcf.png" height="150" width="200">
      		<p>PCF Liquidation</p>
      		 <h5>ADMIN FORM NO. 01</h5>
      		</div>
      	</div>
      </div>
      <div class="span9" id="formselected" style="display:none; margin-left:-30px;">

      </div>
    </div>
    <div class="tab-pane" id="myform">
        <div id="myform-tbl">
        </div>
        <div class="span9" id="formactions2"  style="display:none; margin-left:-30px;"></div>
    </div>
    <div class="tab-pane" id="allform">
        <div id="allform-tbl">
        </div>
        <div class="span9" id="formactions"  style="display:none; margin-left:-30px;"></div>
    </div>

  </div>
</div>
					
	</div>
</div>

<script>
   var formsuserid = $("#forms-userid").val();
   var status = "none";
   var action = "create";
   var formview = "none";
  $("#createform-btn").stop(true,true).click(function(){
    $("#forms-select").show();
    $("#formselected").hide();
    $("#content").load("/kamahalan/index.php/home/forms");
  });
  $("#leave").stop(true,true).click(function(){
 
    $("#forms-select").hide();
    $("#formselected").show();
    $("#myform-tbl").hide();
    $("#formselected").load("/kamahalan/index.php/home/leaveform/"+formsuserid+"/"+0+"/"+status+"/"+action+"/"+formview);  
  });
  $("#ob").stop(true,true).click(function(){
     $("#forms-select").hide();
      $("#formselected").show();
      $("#myform-tbl").hide();
    $("#formselected").load("/kamahalan/index.php/home/obusinessform/"+formsuserid+"/"+0+"/"+status+"/"+action+"/"+formview);  
  });
   $("#pcf").stop(true,true).click(function(){
     $("#forms-select").hide();
      $("#formselected").show();
       $("#myform-tbl").hide();
    $("#formselected").load("/kamahalan/index.php/home/pcfliquidation/"+formsuserid+"/"+0+"/"+status+"/"+action+"/"+formview);  
  });

   
  $("#allform-btn").stop(true,true).click(function(){ 
      $("#allform-tbl").show();
      $("#allform-tbl").load("/kamahalan/index.php/home/allforms");
       $("#formactions").hide();
        $("#myform-tbl").hide();
    
    });

    $("#myform-btn").stop(true,true).click(function(){ 
      $("#myform-tbl").show();
       $("#myform-tbl").load("/kamahalan/index.php/home/myforms");
      $("#allform-tbl").hide();
       $("#formactions2").hide();

    });
  
</script>
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
      return false;
      
    }else{
      $("#formactions2").show();
      $("#formactions2").load("/kamahalan/index.php/home/obusinessform/"+id+"/"+formid+"/"+status+"/"+action+"/"+formview);
      $("#myform-tbl").hide();
      return false;

    }
  
    break;
    default:
        if(formview == "allform"){
      $("#formactions").show();
      $("#formactions").load("/kamahalan/index.php/home/pcfliquidation/"+id+"/"+formid+"/"+status+"/"+action+"/"+formview);
      $("#allform-tbl").hide();
      return false;
      
    }else{
      $("#formactions2").show();
      $("#formactions2").load("/kamahalan/index.php/home/pcfliquidation/"+id+"/"+formid+"/"+status+"/"+action+"/"+formview);
      $("#myform-tbl").hide();
      return false;

    }
    break;
  }

}
function view(id, formid, formtype, status, formview){
  
  //$("#formactions").load("/kamahalan/index.php/home/editform"+id);
  //alert(id+" michie"+formtype);
  //window.open('print/printObForm.htm','_newtab');
    var open_link = window.open('','_blank');
   switch (formtype){


    case "Leave Form":
    if(formview == "allform"){
    $("#formactions").show();
    open_link.location="/kamahalan/index.php/home/printleaveform/"+id+"/"+formid+"/"+status+"/"+action+"/"+formview;
    $("#allform-tbl").hide();
    return false;
    }else{
      $("#formactions2").show();
      open_link.location="/kamahalan/index.php/home/printleaveform/"+id+"/"+formid+"/"+status+"/"+action+"/"+formview;
      $("#myform-tbl").hide();
    return false;
  }
    break;

    
    case "OB Form":
    if(formview == "allform"){
      $("#formactions").show();
      open_link.location="/kamahalan/index.php/home/printobform/"+id+"/"+formid+"/"+status+"/"+action+"/"+formview;
      $("#allform-tbl").hide();
      return false;
      
    }else{
      $("#formactions2").show();
       open_link.location="/kamahalan/index.php/home/printobform/"+id+"/"+formid+"/"+status+"/"+action+"/"+formview;
      $("#myform-tbl").hide();
      return false;

    }
    break;

    default:
      if(formview == "allform"){
      $("#formactions").show();
      open_link.location="/kamahalan/index.php/home/printpcfform/"+id+"/"+formid+"/"+status+"/"+action+"/"+formview;
      $("#allform-tbl").hide();
      return false;
      
    }else{
      $("#formactions2").show();
      open_link.location="/kamahalan/index.php/home/printpcfform/"+id+"/"+formid+"/"+status+"/"+action+"/"+formview;
      $("#myform-tbl").hide();
      return false;

    }
    break;

  } 

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
     var x;
       var r=confirm("Are you sure to delete this OB form?");
       if (r==true){
            $.ajax({
              url : "/kamahalan/index.php/post/deleteform/"+formtype+"/"+formid,
              success: function(data){
                  $.pnotify({
                      title: 'Success',
                      text: "You have successfully deleted this OB Form.",
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
    default:
       var x;
       var r=confirm("Are you sure to delete this Reinbursement form?");
       if (r==true){
            $.ajax({
              url : "/kamahalan/index.php/post/deleteform/"+formtype+"/"+formid,
              success: function(data){
                  $.pnotify({
                      title: 'Success',
                      text: "You have successfully deleted this Reinbursement Form.",
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
  }

}




</script>



