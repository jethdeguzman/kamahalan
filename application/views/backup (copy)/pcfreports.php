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

          <tr>
             <td ><a id="printpcf"  class="btn btn-primary btn-mini pull-right">Printer Friendly</a></td>
          </tr>
            <tr>
              <td style="width:20%;"><label>User</label></td>
              <td class="left" colspan="5"><label><b><?php echo $lastname." ".$firstname;?></b></label></td>
            </tr>
             <tr>
              <td style="width:20%;"><label>Date</label></td>
              <td class="left" colspan="5"><label>From <b><?php echo $from; ?></b><? echo "     to     ";?><b><?php echo $to;?></b></label></td>
            </tr>

            
        </table>
           <table border="1" style=" width: 100%; border-color:black; margin-top:20px; margin-bottom:20px;">

            <tr>
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
              <td class="center" style="width:25%;"><label><?php echo $row->category; ?></label></td>
              <td class="center" style="width:25%;"><label><?php echo $row->refno; ?></label></td>
              <td class="center" style="width:25%;"><label><?php echo $row->particulars; ?></label></td>
              <td class="center" style="width:25%;"><label><?php echo $row->amount; ?></label></td>
            </tr>
            <?php } ?>
              <tr>
              <td class="center" colspan="3"><label>Total </label></td>
              <td class="center" style="width:25%;"><label><?php echo $totalamount;?></label></td>
                   </tr>
                    </table>

                      <table>
            <tr>
              <td style="width:65%;"><label>Sumitted to:</label></td>
              <td class="left" colspan="5"><label><b><?php echo $lastname." ".$firstname;?></b></label></td>
            </tr>
             <tr>
              <td style="width:65%;"><label>Through:</label></td>
              <td class="left" colspan="5"><label><?php echo $lastname." ".$firstname;?></label></td>
            </tr>
        </table>
             <? }else{?>
               <div id="alert" class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span><strong>0 result.</strong> No reord Found</span>
                </div>
           <?php }?>
       

       
     
    </div>
  </div>
</div>

<script>

  $("#printpcf").click(function($employeeid, $from, $to){
   var open_link = window.open('','_blank');
   open_link.location="/kamahalan/index.php/home/printpcfreport/"

  });
  </script>