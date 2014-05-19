<div class='span9'>
  <div class="row">
    <div class="span9">

      <?php 
        if($result2) {
      ?>

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

        <table border="1" style=" width: 100%; border-color:black; margin-top:20px; margin-bottom:20px;">
            <tr bgcolor="#003264" style="color:white;">
              <td class="center" style="width:20%;"><label><b>Date</b></label></td>
              <td class="center" style="width:20%;"><label><b>Time In</b></label></td>
              <td class="center" style="width:20%;"><label><b>Time Out</b></label></td>
              <td class="center" style=""><label><b>Absent</b></label></td>
              <td class="center" style=""><label><b>SL</b></label></td>
              <td class="center" style=""><label><b>SIL</b></label></td>
              <td class="center" style=""><label><b>Holiday</b></label></td>
            </tr>

        <?php 
          $datecheck = "0000-00-00";
          $date = "0000-00-000";

          foreach ($result2 as $row) {

          $date = date('D M j, Y', strtotime($row->date));
          $dayname = date('D', strtotime($row->date));
          $timein = $row->timein;
          $timeout = $row->timeout;
          $status = $row->status;
          $sl = $row->sl;
          $vl = $row->vl;
          $user = $row->users;
          
          $showtimein="";
          $showtimeout = "";


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
                  }else{
                     $showholiday="";  
                
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
                 
                }else{
                  $showtimeout=strftime("%I:%M %p",strtotime($timeout));
                  $showtimein=strftime("%I:%M %p",strtotime($timein));
                  if($status == "Absent"){
                 
                  $showstatus = "1";
                  $color = "#CD5C5C";
                  $text = "black";
                }else{
                  
                  $showstatus = "";
                $color = "white";
                $text = "black";
                }
                  
                }//
              }
          
            }
        ?>

         <tr bgcolor="<?php echo $color; ?>" style="color:<?php echo $text;?>;">
              <td class="center"><label><?php echo $date; ?></label></td>
              <td class="center"><label><?php echo $showtimein; ?></label></td>
              <td class="center"><label><?php echo $showtimeout; ?></label></td>
              <td class="center"><label><?php echo $showstatus; ?></label></td>
              <td class="center"><label><?php echo $showsl; ?></label></td>
              <td class="center"><label><?php echo $showvl; ?></label></td>
               <td class="center"><label><?php echo $showholiday; ?></label></td>


        <?php   
          }
           } ?>  
                   <tr  bgcolor="white">
              <td class="center" class="center" style="color:white;" colspan="3" bgcolor="#003264"><label><b>Total</b></label></td>
              <td class="center"><label><?php echo $absent; ?></label></td>
              <td class="center"><label><?php echo $sl; ?></label></td>
              <td class="center"><label><?php echo $vl; ?></label></td>
              <td class="center"><label><?php echo $holiday; ?></label></td>

            </tr>
            <tr  bgcolor="white">
              <td class="center" bgcolor="#003264" style="color:white;"><label><b>Days Worked </b></label></td>
              <td class="center" colspan="2"><label><?php echo $present;/*d pa kamasa ung ob*/ ?></label></td> 
               <td colspan="4"><label>&nbsp;</label></td>
            </tr>
             <tr  bgcolor="white">
              <td class="center" bgcolor="#003264" style="color:white;"><label><b>Days Count</b></label></td>
              <td class="center" colspan="2"><label><?php echo $present+$sl+$vl+$holiday; /*WALA PANG OB NA KASAMA!*/?></label></td>
               <td colspan="4"><label>&nbsp;</label></td>
            </tr>


      <?php }else{?>

               <div id="alert" class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span><strong>0 result.</strong> No record Found</span>
                </div>

      <?php }?>
    </div>
  </div>
</div>