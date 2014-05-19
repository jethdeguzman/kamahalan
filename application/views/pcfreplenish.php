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
        
 <?php
  if($result5){
      ?>
      <table border="0" style=" width: 100%; border-color:black;">
            <tr>
              <td style="width:20%;"><label>Cover Period</label></td>
               <td class="left" colspan="5"><label><b><div  id="frompcfreplenish">From: <?php echo $from;?> </div> <div id="topcfreplenish"> To: <?php echo $to; ?></div></b></label></td>
            </tr>
            
        </table>

                <table>
          <div class="row-fluid">
            <tr><td  ><a id="printpcfreplenish"  class="btn btn-inverse btn-mini offset7 colspan2">-Printer Friendly Version-</a></td></tr>
          </div>
        </table>

         <table border="1" style=" width: 100%; border-color:black; margin-top:20px; margin-bottom:20px;">
            <tr bgcolor="#003264" style="color:white">
              <td class="center" style="width:20%;"><label>Date</label></td>
              <td class="center" style="width:20%;"><label>Name</label></td>
              <td class="center" style="width:10%;"><label>Transpo</label></td>
              <td class="center" style="width:10%;"><label>Food</label></td>
              <td class="center" style="width:10%;"><label>Comm</label></td>
              <td class="center" style="width:10%;"><label>Supply</label></td>
              <td class="center" style="width:10%;"><label>Misc</label></td>
              <td class="center" style="width:10%;"><label>Total</label></td>
            </tr>
          <?php
        $totaltranspo = 0;

        $totalfood = 0;
        $totalcomm = 0;
        $totalsupplies = 0;
        $totalmisc = 0;
        $totalrow2 = 0;
          foreach ($result5 as $row) {

        $totalrow = 0; 
            $date = $row->date1;
            $users  = $row->users;
            $name = $this->post_model->getprofile($users);
            //echo  $row->date1." ".$row->users."<br>";

            $transpo = $this->post_model->getpcfreplenish2($users, $date , 'Transportation');
            $supplies = $this->post_model->getpcfreplenish3($users, $date, 'Supplies');
            $food = $this->post_model->getpcfreplenish4($users, $date, 'Food');
            $comm = $this->post_model->getpcfreplenish5($users, $date, 'Communication');
            $misc = $this->post_model->getpcfreplenish5($users, $date, 'Misc.');

            ?>
     <tr>
            <td class="center" style="width:20%;" bgcolor="white"><label><?php echo $date;?></label></td>
            <td class="center" style="width:20%;" bgcolor="white"><label><?php echo $name->lastname." ".$name->firstname;?></label></td>
          <?   
    if($transpo){
      foreach ($transpo as $row) {
          $totalrow = $totalrow + $row->total; 
          $totalrow2 = $totalrow2 + $row->total;
          $totaltranspo = $totaltranspo + $row->total;
         ?>
        <td class="center" style="width:10%;" bgcolor="white"><label><?php echo $row->total; ?></label></td>
        <?  }
        }else{ ?> 
        <td class="center" style="width:10%;" bgcolor="white" ><label>-</label></td>
        <? }

    if($food){
      foreach ($food as $row)  { 
            $totalrow = $totalrow + $row->total; 
            $totalrow2 = $totalrow2 + $row->total;
            $totalfood = $totalfood +  $row->total;
            ?>
           
        <td class="center" style="width:10%;" bgcolor="white"><label><?php echo $row->total; ?></label></td>
         <? } 
        }else{ ?>

        <td class="center" style="width:10%;" bgcolor="white"><label>-</label></td>

        <? }      

    if($comm){
        foreach ($comm as $row)  { 
        $totalrow = $totalrow + $row->total;
        $totalrow2 = $totalrow2 + $row->total;
        $totalcomm = $totalcomm +  $row->total;
        ?>
           <td class="center" style="width:10%;" bgcolor="white"><label><?php echo $row->total; ?></label></td>
        
     <?   } 
      }else{ ?>
      <td class="center" style="width:10%;" bgcolor="white"><label>-</label></td>
      <? } 


     if($supplies){
        foreach ($supplies as $row) { 
        $totalrow = $totalrow + $row->total;
        $totalrow2 = $totalrow2 + $row->total;
        $totalsupplies = $totalsupplies + $row->total;
        ?>
             
      <td class="center" style="width:10%;" bgcolor="white"><label><?php echo $row->total;?></label></td>
      <? } 
      } else{ ?>
      <td class="center" style="width:10%;" bgcolor="white"><label>-</label></td>
      <? } 

    if($misc){
      foreach ($misc as $row) { 
        $totalrow = $totalrow + $row->total;
        $totalrow2 = $totalrow2 + $row->total;
        $totalmisc = $totalmisc + $row->total;
        ?> 
        <td class="center" style="width:10%;" bgcolor="white"><label><?php echo $row->total;?></label></td>
   <?   } 

    }else{ ?>
      <td class="center" style="width:10%;" bgcolor="white"><label>-</label></td>
        <? } ?>     
             
            <td class="center" style="width:10%;" bgcolor="white" ><label><?php echo $totalrow; ?></label></td>
            </tr>
        <? } ?>
       <tr>
              <td class="center" colspan="2" bgcolor="white"><label>Total</label></td>
              <td class="center" style="width:10%;" bgcolor="white"><label><?php echo $totaltranspo;?></label></td>
              <td class="center" style="width:10%;" bgcolor="white"><label><?php echo $totalfood;?></label></td>
              <td class="center" style="width:10%;" bgcolor="white"><label><?php echo $totalcomm;?></label></td>
              <td class="center" style="width:10%;" bgcolor="white"><label><?php echo $totalsupplies;?></label></td>
              <td class="center" style="width:10%;" bgcolor="white"><label><?php echo $totalmisc;?></label></td>
              <td class="center" style="width:10%;" bgcolor="white"><label><?php echo $totalrow2;?></label></td>
            </tr>

        </table>
        <table>
        <tr>
              <td class="center" style="width:20%;" ><label>Prepared by:</label></td>
              <td class="center" style="width:10%;"></td>
              <td class="center" style="width:20%;"><label>Checked by:</label></td>
              <td class="center" style="width:10%;"></td>
              <td class="center" style="width:30%;"><label>Approved by:</label></td>
            </tr>
            <tr><td class="center" style="width:20%;">&nbsp;</td></tr>
            <tr><td class="center" style="width:20%;">&nbsp;</td></tr>
            <tr><td class="center" style="width:30%;">&nbsp;</td></tr>
            <tr>
              <td class="center" style="width:20%;"><label><b>Ma. Reyna Moya</b></label></td>
              <td class="center" style="width:10%;"></td>
              <td class="center" style="width:20%;"><label><b><?php echo $checkedbyname;?></b></label></td>
              <td class="center" style="width:10%;"></td>
              <td class="center" style="width:30%;"><label><b><?php echo $approvedbyname;?></b></label></td>
            </tr>
               <tr>
              <td class="center" style="width:20%;"><label>Admin and Business Support</label></td>
              <td class="center" style="width:10%;"></td>
              <td class="center" style="width:20%;"><label><?php echo $checkedbyposition;?></label></td>
              <td class="center" style="width:10%;"></td>
              <td class="center" style="width:30%;"><label><?php echo $approvedbyposition;?></label></td>
            </tr>

</table>
 <?php }else{ ?>
    <div id="alert" class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span><strong>0 result.</strong> No reord Found</span>
                </div>
 <?php }
  ?>
          
    </div>
  </div>
</div>

<script>

  $("#printpcfreplenish").click(function(from1, to1){
   var open_link = window.open('','_blank');
    var from1 = $("#frompcfreplenish").val();
    var to1 = $("#topcfreplenish").val();
   
    if (from1 == ""){
      from1 = "0000-00-00";
    }
    if (to1 == ""){
      to1 = "0000-00-00";
    }
   open_link.location="/kamahalan/index.php/home/printpcfreplenish/"+from1+"/"+to1;

  });
  </script>
