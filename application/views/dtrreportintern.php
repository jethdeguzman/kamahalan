<style>
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


<div class="span9">  
  <div class="row">
    <div class="span9" style='margin-left:30px;'>
     <a class='toggle-btn btn' style="float: right;">Edit DTR Summary</a>
      <input id="internid" type='hidden' value="<?php echo $internid; ?>">
     <input id="from" type='hidden' value="<?php echo $from; ?>">
     <input id="to" type='hidden' value="<?php echo $to; ?>">
</div>
</div>
</div>

<div id="showdtrintern">

</div>

<div id="editdtrintern" style="display:none;">
<div class="span9">
  <div class="row">
    <div class="span9">
      <input type="hidden" id="internid" value="<?php echo $id; ?>"/>
       
            <?php
            if($result2){ ?>
 <table border="0" style=" width: 100%; border-color:black;" >
            <tr>
              <td style="width:20%;"><label>Name</label></td>
              <td class="center" colspan="5"><label><b><div id="nameintern"><?php echo $firstname." ".substr($middlename, 0, 1).". ".$lastname; ?></div></b></label></td>
            </tr>
             <tr>
              <td style="width:20%;"><label>Designation</label></td>
              <td class="center" colspan="5"><label><b><?php echo $position_intern; ?></b></label></td>
            </tr>
             <tr>
              <td style="width:20%;"><label>School</label></td>
              <td class="center" colspan="5"><label><b><?php echo $school; ?></b></label></td>
            </tr>
        </table>  


         <table border="0" style=" width: 100%; margin-top:20px; margin-bottom:20px;">
            <tr bgcolor="#003264" style="color:white;">
              <td class="center" style="width:20%;"><label><b>Date</b></label></td>
              <td class="center" style="width:20%;"><label><b>Time In</b></label></td>
              <td class="center" style="width:20%;"><label><b>Time Out</b></label></td>
              <td class="center" colspan = "4"><label><b>Sub Total Hours</b></label></td>
            </tr>
          <?php 
              $hrtotal = 0;
              $mintotal= 0;

              foreach ($result2 as $row) {
                # code...
                $date = $row->date;
                $showdate = date('D M j, Y', strtotime($date));
                $dayname = date('D', strtotime($row->date));
                $timein = $row->timein;
                $timeout = $row->timeout;
                $hrsday = $row->hrsday;
                $minday = $row->minday;
                $user = $row->users;

                $hrtotal += $hrsday;
                  $mintotal += $minday;
          
          if(($dayname == "Sat") || ($dayname == "Sun")){
                   $showtimeout="";
                    $showtimein = "";
                  $color = "#C0C0C0";
                  $text = "#333333";
                  $showhrsday = "";
                  $showminday = "";
                    $edit = "disabled";
                }else{
            
                  $showtimeout=$timeout;
                  $showtimein=$timein;
                $color = "white";
                $text = "black";
                  $showhrsday = $hrsday;
                  $showminday = $minday;

                $edit = "";                
                }
            ?>
             
            <tr style="color:<?php echo $text;?>;">
              <td class="center" style="width:20%;"><input <?php echo $edit; ?> class="input-medium" type="text" name="date" placeholder="Date" readonly value="<?php echo $showdate; ?>"></td>
              <td class="center" style="width:20%;"><input <?php echo $edit; ?> class="input-small timein" type="time" name="timein" placeholder="Timein" value="<?php echo $showtimein; ?>"></td>
              <td class="center" style="width:20%;"><input <?php echo $edit; ?> class="input-small timeout" type="time" name="timeout" placeholder="Timeout" value="<?php echo $showtimeout; ?>"></td>
              <td class="center" style="width:15%;"><input <?php echo $edit; ?> class="input-mini hrsday" type="text" name="showhrsday" placeholder="HrsDay" value="<?php echo $hrsday; ?>"></td>
              <td class="center" style="width:15%;"><input <?php echo $edit; ?> class="input-mini minday" type="text" name="showminday" placeholder="MinDay" value="<?php echo $minday; ?>"></td>
              <td class="center" style="width:10%;"><label>Minutes</label></td>
              <td class = "center"><input class="input-mini" type="hidden" name="user" class="userid" value="<?php echo $user; ?>">
                                  <input class="input-medium date" type="hidden" name="date" placeholder="Date" value="<?php echo $date; ?>">
                                  <button href="" style="color:white;" class="btn btn-primary updatedtr-submit" value="Update" >Update </button></td>
            

             <?php } ?>
                 </tr>
            <tr >
              <td bgcolor="#003264" style="color:white;" class="center" colspan="3"><label><b>Total Hours</b></label></td>
              <td class="center" style="width:15%;"><label><b><?php echo $hrtotal; ?></b></label></td>
              <td class="center" style="width:15%;"><label><b><?php echo $mintotal; ?></b></label></td>
              <td class="center" style="width:10%;"><label><b>Minutes</b></label></td>
            </tr>
            <tr bgcolor="white"><td colspan="7">&nbsp;</td></tr>
            <tr bgcolor="white"><td colspan="7">&nbsp;</td></tr>
               <tr  bgcolor="white">
              <td class="center" colspan="3"><label>Prepared by:</label></td>
              <td class="center"  colspan="4"><label>Certified true and correct by:</label></td>
            </tr>
            <tr  bgcolor="white" ><td colspan="7">&nbsp;</td></tr>
            <tr bgcolor="white"><td colspan="7">&nbsp;</td></tr>
                <tr bgcolor="white">
              <td class="center"  colspan="3"><label><b>Ma. Reyna Moya</b></label></td>
              <td class="center" colspan="4"><label><b>Allan De Guzman</b></label></td>
            </tr>
               <tr bgcolor="white">
              <td class="center" colspan="3"><label>Admin and Business Support</label></td>
              <td class="center" colspan="4"><label>Research and Dev Officer</label></td>
          <?php }
           else{
            ?>
               <div id="alert" class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span><strong>0 result.</strong> No record Found</span>
                </div>
            <?php } ?>
        
            </tr>
        </table>
    </div>
  </div>
</div>
</div>

<script>

$(document).ready(function(){

var internid = $("#internid").val();
  var from = $("#from").val();
  var to = $("#to").val();
  //alert(internid + " " +from + " " +to );
   $("#showdtrintern").load("/kamahalan/index.php/home/dtrreportintern_show/"+internid+"/"+from+"/"+to);
});

$(".toggle-btn").click(function(){
  var internid = $(this).next().val();
  var from = $(this).next().next().val();
  var to = $(this).next().next().next().val();
 $("#showdtrintern").toggle();
$("#editdtrintern").toggle();
   $("#showdtrintern").load("/kamahalan/index.php/home/dtrreportintern_show/"+internid+"/"+from+"/"+to);
});

 $(".updatedtr-submit").click(function(){
   
     var user = $(this).prev().prev().val();
    var date = $(this).prev().val();
    var timein = $(this).parent().parent().find(".timein").val();
    var timeout = $(this).parent().parent().find(".timeout").val();
    var hrsday = $(this).parent().parent().find(".hrsday").val();
    var minday = $(this).parent().parent().find(".minday").val();
  

    var datastring = "user=" + user + "&date=" + date + "&timein=" + timein + "&timeout=" + timeout + "&hrsday=" + hrsday + "&minday=" + minday;
    //alert(datastring); 

    var r = confirm("Update DTR Form?");

    if(r==true){
    $.ajax({
      type: "POST",
      url: "/kamahalan/index.php/post/updatedtrintern",
      data: datastring,
      success: 
        function(data){
          $.pnotify({
            title: 'Success',
                text: 'You have succesfully Updated the DTR.',
                type: 'success'
          });
        }
    });
  }    

    });