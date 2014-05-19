<div class="span9">  
  <div class="row">
    <div class="span9" style='margin-left:30px;'>
     <a class='toggle-btn btn' style="float: right;">Edit DTR Summary</a>
      <input id="employeeid" type='hidden' value="<?php echo $employeeid; ?>">
     <input id="from" type='hidden' value="<?php echo $from; ?>">
     <input id="to" type='hidden' value="<?php echo $to; ?>">
</div>
</div>
</div>



<div id="editdtremployee" style='display:none;'>

  

<div id="editdtremployee-content">
<div class="span9">
  <div class="row">
    <div class="span9">
        <table border="0" style=" width: 100%; border-color:black;">
            <tr>
              <td style="width:20%;"><label>Name</label></td>
              <td class="center" colspan="5"><label><b><?php echo $firstname." ".substr($middlename, 0, 1).". ".$lastname; ?></b></label></td>
            </tr>
             <tr>
              <td style="width:20%;"><label>Employee #</label></td>
              <td class="center" colspan="5"><label><b><?php echo $employeeno; ?></b></label></td>
            </tr>
            <tr>
              <td style="width:20%;"><label>Number of Worked Days</label></td>
              <td class="center" colspan="5"><label><b><?php echo ($days - $weekends - $holiday);?></b></label></td>
            </tr>
        </table>

         <table border="0" style=" width: 100%; border-color:none; margin-top:20px; margin-bottom:20px;">
            <tr bgcolor="#003264" style="color:white;">
              <td class="center" style="width:15%;"><label><b>Date</b></label></td>
              <td class="center" style="width:15%;"><label><b>Time In</b></label></td>
              <td class="center" style="width:15%;"><label><b>Time Out</b></label></td>
              <td class="center" style="width:10%;"><label><b>Absent</b></label></td>
              <td class="center" style="width:10%;"><label><b>SL</b></label></td>
              <td class="center" style="width:10%;"><label><b>SIL</b></label></td>
              <td class="center" style="width:10%;" colspan="2"><label><b>Holiday</b></label></td>
            </tr>
            
            <?php
            if($result2){
           
                $datecheck = "0000-00-00";
                $date = "0000-00-000";

              foreach ($result2 as $row) {
                # code...
                $date = $row->date;
                $showdate = date('D M j, Y', strtotime($date));
                $dayname = date('D', strtotime($row->date));
                $timein = $row->timein;
                $timeout = $row->timeout;
                $status = $row->status;
                $sl = $row->sl;
                $vl = $row->vl;
                $user = $row->users;
                $showtimein="";
                $showtimeout = "";

               
                if($sl == 0){
                  $showsl="";
                }
                if($vl == 0){
                  $showvl="";
                }

                if(($dayname == "Sat") || ($dayname == "Sun") ){
                  $showstatus = "";
                  $color = "#C0C0C0";
                  $text = "#333333";
                  $sl="";
                  $vl="";
                  $showtimein= "";
                  $showtimeout = "";
                  $edit="disabled";
                }else{
                  $showtimeout=$timeout;
                  $showtimein=$timein;
                  $edit="";
                  if($status == "Absent"){
                 
                  $showstatus = "1";
                  $color = "#CD5C5C";
                  $text = "black";
                }else{
                  
                  $showstatus = "";
                $color = "white";
                $text = "black";
                }
                  
                }
              
            
            if($result3){
                foreach ($result3 as $row1) {
                  # code...
                  $datecheck = date('D M j, Y', strtotime($row1->date));
                  if($datecheck == $date){
                    $showholiday = "1";
                    $showtimeout="";
                    $showtimein = "";
                    $showstatus = "";
                    $color = "#C0C0C0";
                    $status = "";
                    $text = "#333333";
                    break;
                  }else{
                    $showholiday = "";
                  }
                
              }
            }
            ?>

            <tr bgcolor="" style="margin-top:50px;">
              <td class="center"><input <?php echo $edit; ?> class="input-medium" type="text" name="date" placeholder="Date" readonly value="<?php echo $showdate; ?>"></td>
              <td class="center"><input <?php echo $edit; ?> class="input-small timein" type="time" name="timein" placeholder="Timein" value="<?php echo $showtimein; ?>"></td>
              <td class="center"><input <?php echo $edit; ?> class="input-small timeout" type="time" name="timeout" placeholder="Timeout" value="<?php echo $showtimeout; ?>"></td>
              <td class="center"><input <?php echo $edit; ?> class="input-mini status" type="text" name="status" placeholder="Status" value="<?php echo $showstatus; ?>"></td>
              <td class="center"><input <?php echo $edit; ?> class="input-mini sl" type="text" name="sl" placeholder="SL" value="<?php echo $showsl; ?>"></td>
              <td class="center"><input <?php echo $edit; ?> class="input-mini vl" type="text" name="vl" placeholder="VL" value="<?php echo $showvl; ?>"></td>
               <td class="center"><input disabled class="input-mini holiday" type="text" name="holiday" placeholder="Holiday" value="<?php echo $showholiday; ?>"></td>
               <td class="center"><input class="input-mini" type="hidden" name="user" class="userid" value="<?php echo $user; ?>">
                                  <input class="input-medium date" type="hidden" name="date" placeholder="Date" value="<?php echo $date; ?>">
                                  <button href="" style="color:white;" class="btn btn-primary updatedtr-submit" value="Update" >Update </button></td>
        
        <?php } ?>
                    <tr  bgcolor="white">
              <td class="center" class="center" style="color:white;" colspan="3" bgcolor="#003264"><label><b>Total</b></label></td>
              <td class="center"><label><?php echo $absent; ?></label></td>
              <td class="center"><label><?php echo $sl; ?></label></td>
              <td class="center"><label><?php echo $vl; ?></label></td>
              <td class="center" colspan="2"><label><?php echo $holiday; ?></label></td>

            </tr>
            <tr  bgcolor="white">
              <td class="center" bgcolor="#003264" style="color:white;"><label><b>Days Worked </b></label></td>
              <td class="center" colspan="2"><label><?php echo $present;/*d pa kamasa ung ob*/ ?></label></td> 
               <td colspan="5"><label>&nbsp;</label></td>
            </tr>
             <tr  bgcolor="white">
              <td class="center" bgcolor="#003264" style="color:white;"><label><b>Days Count</b></label></td>
              <td class="center" colspan="2"><label><?php echo $present+$sl+$vl+$holiday; /*WALA PANG OB NA KASAMA!*/?></label></td>
               <td colspan="5"><label>&nbsp;</label></td>
            </tr>
  
        <?php      } else{
          ?>
            <td bgcolor="white" class="center" colspan="7"><label>No Record Found.</label></td>
             <tr  bgcolor="white">
              <td  class="center" bgcolor="#003264" style="color:white;" class="center" colspan="3"><label><b>Total</b></label></td>
              <td class="center"><label></label></td>
              <td class="center"><label></label></td>
              <td class="center"><label></label></td>
              <td class="center" colspan="2"><label>&nbsp;</label></td>

            </tr>
            <tr  bgcolor="white">
              <td class="center" bgcolor="#003264" style="color:white;"><label><b>Days Worked</b></label></td>
              <td class="center" colspan="2"><label></label></td>
               <td colspan="5"><label>&nbsp;</label></td>
            </tr>
             <tr  bgcolor="white" >
              <td class="center" bgcolor="#003264" style="color:white;"><label><b>Days Count</b></label></td>
              <td class="center" colspan="2"><label></label></td>
               <td  colspan="5"><label>&nbsp;</label></td>
            </tr>
          <?php
              }
            ?>
        </table>
    </div>
  </div>
</div>
</div>

</div>

<div id="showdtremployee" >

</div>

<script>

$(document).ready(function(){
var employeeid = $("#employeeid").val();
  var from = $("#from").val();
  var to = $("#to").val();
  //alert(employeeid + " " +from + " " +to );
   $("#showdtremployee").load("/kamahalan/index.php/home/dtrreportemployee_show/"+employeeid+"/"+from+"/"+to);
});

$(".toggle-btn").click(function(){
  var employeeid = $(this).next().val();
  var from = $(this).next().next().val();
  var to = $(this).next().next().next().val();
 $("#showdtremployee").toggle();
$("#editdtremployee").toggle();
   $("#showdtremployee").load("/kamahalan/index.php/home/dtrreportemployee_show/"+employeeid+"/"+from+"/"+to);
});

  $("#printdtremployee").click(function(){
    
   var open_link = window.open('','_blank');
   open_link.location="/kamahalan/index.php/home/printdtremployee/";

  });
  
 $(".updatedtr-submit").click(function(){
   
     var user = $(this).prev().prev().val();
    var date = $(this).prev().val();
    var timein = $(this).parent().parent().find(".timein").val();
    var timeout = $(this).parent().parent().find(".timeout").val();
    var status = $(this).parent().parent().find(".status").val();
    var sl = $(this).parent().parent().find(".sl").val();
    var vl = $(this).parent().parent().find(".vl").val();

    var datastring = "user=" + user + "&date=" + date + "&timein=" + timein + "&timeout=" + timeout + "&status=" + status + "&sl=" + sl + "&vl=" + vl;
    //alert(datastring); 

    var r = confirm("Update DTR Form?");

    if(r==true){
    $.ajax({
      type: "POST",
      url: "/kamahalan/index.php/post/updatedtremployee",
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
  </script>