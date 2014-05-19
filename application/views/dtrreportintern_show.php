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


         <table border="1" style=" width: 100%; border-color:black; margin-top:20px; margin-bottom:20px;">
            <tr bgcolor="#003264" style="color:white;">
              <td class="center" style="width:20%;"><label><b>Date</b></label></td>
              <td class="center" style="width:20%;"><label><b>Time In</b></label></td>
              <td class="center" style="width:20%;"><label><b>Time Out</b></label></td>
              <td class="center" colspan = "3"><label><b>Sub Total Hours</b></label></td>
            </tr>
          <?php 
              $hrtotal = 0;
              $mintotal= 0;

              foreach ($result2 as $row) {
                # code...
                $date = date('D M j, Y', strtotime($row->date));
                $dayname = date('D', strtotime($row->date));
                $timein = $row->timein;
                $timeout = $row->timeout;
                $hrsday = $row->hrsday;
                $minday = $row->minday;

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
            
                  $showtimeout=strftime("%I:%M %p",strtotime($timeout));
                  $showtimein=strftime("%I:%M %p",strtotime($timein));
                $color = "white";
                $text = "black";
                  $showhrsday = $hrsday;
                  $showminday = $minday;
                
                 
                }
            ?>
             
            <tr bgcolor="<?php echo $color; ?>" style="color:<?php echo $text;?>;">
              <td class="center" style="width:20%;"><label><?php echo $date; ?></label></td>
              <td class="center" style="width:20%;"><label><?php echo $showtimein; ?></label></td>
              <td class="center" style="width:20%;"><label><?php echo $showtimeout; ?></label></td>
              <td class="center" style="width:15%;"><label><?php echo $showhrsday; ?></label></td>
              <td class="center" style="width:15%;"><label><?php echo $showminday; ?></label></td>
              <td class="center" style="width:10%;"><label>Minutes</label></td>
            

             <?php } ?>
                 </tr>
            <tr  bgcolor="white" >
              <td bgcolor="#003264" style="color:white;" class="center" colspan="3"><label><b>Total Hours</b></label></td>
              <td class="center" style="width:15%;"><label><b><?php echo $hrtotal; ?></b></label></td>
              <td class="center" style="width:15%;"><label><b><?php echo $mintotal; ?></b></label></td>
              <td class="center" style="width:10%;"><label><b>Minutes</b></label></td>
            </tr>
            <tr bgcolor="white"><td colspan="6">&nbsp;</td></tr>
            <tr bgcolor="white"><td colspan="6">&nbsp;</td></tr>
               <tr  bgcolor="white">
              <td class="center" colspan="3"><label>Prepared by:</label></td>
              <td class="center"  colspan="3"><label>Certified true and correct by:</label></td>
            </tr>
            <tr  bgcolor="white" ><td colspan="6">&nbsp;</td></tr>
            <tr bgcolor="white"><td colspan="6">&nbsp;</td></tr>
                <tr bgcolor="white">
              <td class="center"  colspan="3"><label><b>Ma. Reyna Moya</b></label></td>
              <td class="center" colspan="3"><label><b>Allan De Guzman</b></label></td>
            </tr>
               <tr bgcolor="white">
              <td class="center" colspan="3"><label>Admin and Business Support</label></td>
              <td class="center" colspan="3"><label>Research and Dev Officer</label></td>
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

