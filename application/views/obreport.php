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
  .left{
    text-align: left;
  }
</style>




<div class="span9">
  <div class="row">
    <div class="span9">
      <?php if($result7){ ?> 
       <table style=" width: 100%; border-color:black;">
         <tr>
              <td style="width:20%;"><label>User</label></td>
              <td class="left" colspan="5"><label><b> <div id="employeenameobreport"><?php echo $lastname." ".$firstname;?></div></b></label></td>
            </tr>
             <tr>
              <td style="width:20%;"><label>Date</label></td>
              <td class="left" colspan="5"><label><b>From:  <?php echo $from; ?></b><b>To:<?php echo $to;?></b></label></td>
            </tr>
      </table>

     <table>
          <div class="row-fluid">
            <tr><td  ><a id="printobreport"  class="btn btn-inverse btn-mini offset7 colspan2">-Printer Friendly Version-</a></td></tr>
          </div>
      </table>
      <table  border = '1'style=" width: 100%; border-color:black; margin-top:20px;">
        <tr bgcolor="#003264" style="color:white">
            <td class="center"><label>Date</label></td>
            <td class="center"><label>Time In</label></td>
            <td class="center"><label>Location</label></td>
            <td class="center"><label>Client</label></td>
            <td class="center"><label>Time Out</label></td>
            <td class="center"><label>Location</label></td>
            <td class="center"><label>Client</label></td>
        </tr>
        <?php foreach ($result7 as $row ) { ?>
             <tr>
            <td class="center" style="width:14%;" bgcolor="white"><label><?php echo $row->date;?></label></td>
            <td class="center" style="width:14%;" bgcolor="white"><label><?php echo strftime("%I:%M %p",strtotime($row->timeappo_start));?></label></td>
            <td class="center" style="width:14%;" bgcolor="white"><label></label><?php echo $row->location_start;?></td>
            <td class="center" style="width:14%;" bgcolor="white"><label></label><?php echo $row->client_start;?></td>
            <td class="center" style="width:14%;" bgcolor="white"><label></label><?php  echo strftime("%I:%M %p",strtotime($row->timeappo_end)); ?></td>
            <td class="center" style="width:14%;" bgcolor="white"><label></label><?php echo $row->location_end;?></td>
            <td class="center" style="width:14%;" bgcolor="white"><label></label><?php echo $row->client_end;?></td>
        </tr>
        <?php } ?>
        </table>

              <table>
            <tr>
              <td style="width:65%;"><label>Prepared By:</label></td>
              <td class="left" colspan="5"><label><b><?php echo $lastname." ".$firstname;?></b></label></td>
            </tr>
             <tr>
              <td style="width:65%;"><label>Acknowledged By: </label></td>
              <td class="left" colspan="5"><label><?php echo $checkedbyname;?></label></td>
            </tr>
        </table>
      <?  }else{?>
            <div id="alert" class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span><strong>0 result.</strong> No record Found</span>
                </div>
      <?php }?>
       
  
    </div>
  </div>
</div>

<script>


  $("#printobreport").stop(true,true).click(function(employeeid3, from3, to3){
    var open_link = window.open('','_blank');
    var employeeid3 = $("#employeenameobreport").val();
   
    var from3 = $("#fromobreport").val();
    var to3 = $("#toobreport").val();
    if (from3 == ""){
      from3 = "0000-00-00";
    }
    if (to3 == ""){
      to3 = "0000-00-00";
    }
     open_link.location="/kamahalan/index.php/home/printobreport/" +employeeid3+"/"+from3+"/"+to3;

   //alert(employeeid3);
   });

  </script>