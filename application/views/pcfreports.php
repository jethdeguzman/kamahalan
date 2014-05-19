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
       
         
            
           <?php if($result){ ?>
            <table border="0" style=" width: 100%; border-color:black;">
            <tr span=>
              <td ><label>User</label></td>
              <td ><label><b><div id="employeenamepcfreport"><?php echo $lastname." ".$firstname;?></div></b></label></td>
            </tr>
             <tr>
              <td><label>Date</label></td>
              <td ><label><div id="frompcfreport">From:  <b><?php echo $from; ?></div></b><div id="topcfreport"><? echo "To:    ";?><b><?php echo $to;?></div></b></label></td>
            </tr>

            
        </table>

        <table>
          <div class="row-fluid">
            <tr><td  ><a id="printpcf"  class="btn btn-inverse btn-mini offset7 colspan2">-Printer Friendly Version-</a></td></tr>
          </div>
        </table>

           <table border="1" style=" width: 100%; border-color:black; margin-top:20px; margin-bottom:20px;">

            <tr bgcolor="#003264" style="color:white">
              <td class="center" style="width:25%;"><label>Category</label></td>
              <td class="center" style="width:25%;"><label>Ref No.</label></td>
              <td class="center" style="width:25%;"><label>Particulars</label></td>
              <td class="center" style="width:25%;"><label>Amount</label></td>
            </tr>
         <?php       $totalamount = 0;  
         foreach ($result as $row) { 
              $amount = $row->amount;
         
              $totalamount+=$amount;
          ?>
           <tr>
              <td class="center" style="width:25%;" bgcolor="white"><label><?php echo $row->category; ?></label></td>
              <td class="center" style="width:25%;" bgcolor="white"><label><?php echo $row->refno; ?></label></td>
              <td class="center" style="width:25%;"bgcolor="white"label><?php echo $row->particulars; ?></label></td>
              <td class="center" style="width:25%;" bgcolor="white"><label><?php echo $row->amount; ?></label></td>
            </tr>
            <?php } ?>
              <tr>
              <td class="center" colspan="3" bgcolor="#003264" style="color:white;"><label>Total </label></td>
              <td class="center" style="width:25%;" bgcolor="white"><label><?php echo $totalamount;?></label></td>
                   </tr>
                    </table>

      <table>
            <tr>
              <td style="width:65%;"><label>Submitted by:</label></td>
              <td class="left" colspan="5"><label><b><?php echo $lastname." ".$firstname;?></b></label></td>
            </tr>
             <tr>
              <td style="width:65%;"><label>Submitted to:</label></td>
              <td class="left" colspan="5"><label><?php echo $checkedbyname;?></label></td>
            </tr>
        </table>
             <? }else{?>
               <div id="alert" class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span><strong>0 result.</strong> No record Found</span>
                </div>
           <?php }?>

    </div>
  </div>
</div>

<script>

  $("#printpcf").click(function(employeeid, from, to){
   var open_link = window.open('','_blank');

   var employeeid = $("#employeenamepcfreport").val();
    var from = $("#frompcfreport").val();
    var to = $("#topcfreport").val();
    if (from == ""){
      from = "0000-00-00";
    }
    if (to == ""){
      to = "0000-00-00";
    }
   open_link.location="/kamahalan/index.php/home/printpcfreport/" +employeeid+"/"+from+"/"+to;

  });
  </script>