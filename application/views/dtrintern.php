<style>
  .headertable tr th{
    background:#858585;
    color:#424242;
  }
  .headertable tr td{
    background: #D4D4D4;
  }
  .dtrtable tr th{
    background:#858585;
    color:#424242;
    text-align:center;
    }
  .dtrtable tr td{
    background: #D4D4D4;
  }
  #form-title{
    margin-bottom:20px;
  }
</style>
<div class="row">
  <div class="span10">
    <h3 class="module-title">DTR Report</h3>
  </div>
</div>
<div class="span9" >
  <div class="row">
 
    <div class="span9" >
      <form class="form-inline">
      <div id="form-title">
      <input type="text" name="dtrid-name" id="dtrid" value="<?php echo $id;?>" />
          <strong><center>Daily Time Record Report</center></strong>
     
       </div> 
    <table  class="table table-bordered headertable">
    <tr>
    <th><label class="control-label">Name:</label></td>
    <td><input type="text" id="inputName" readonly placeholder="Name" value="<?php echo $firstname.' '.$lastname; ?>"></td>
    </tr>
    <tr>
    <th><label class="control-label">Designation:</label></td>
    <td><input type="text" id="inputEmployeeno" readonly placeholder="Designation" value="<?php echo $position_intern; ?>"></td>
    </tr>
    <tr>
    <th><label class="control-label">School:</label></td>
    <td><input type="text" id="inputWorked" readonly placeholder="School" value="<?php echo $school;?>"></td>
    </tr>
     <tr>
    <th><label class="control-label">Cover Period:</label></td>
    <td><input type="text" id="inputCover" readonly placeholder="Cover Period" value=""></td>
    </tr>
    </table>
    <br />
    <table  class="table table-bordered dtrtable" align="center">
    <thead style="">
      <tr>
         <th>DAY</th>
        <th>DATE</th>
        <th>TIME IN</th>
        <th>TIME OUT</th>
        <th>STATUS</th>
        <th>HOURS</th>
        <th>MINUTES</th>
      </tr>
    </thead>
 <?php 
  $hrtotal = 0;
  $mintotal = 0;
  $dayno = 0;
    foreach ($result2 as $row ) {
    # code...
    //echo $row->date." ". $row->timein." ". $row->timeout."" . $row->status;
    $date = $row->date;
    $timein = $row->timein;
    $timeout = $row->timeout;
    $status = $row->status;

    $year= "";
    $month = "";
    $day = "";
    $year = substr($date, 0, 4);
    $month =substr($date, 5, 2);
    $day =substr($date, 8, 2);

    //echo $year." ".$month." ".$day;
    $dayname = date("l", mktime( 0, 0, 0, $month, $day, $year));

    $hrdayin = substr($timein, 0, 2);
    $hrdayout = substr($timeout, 0, 2);
    $mindayin = substr($timein, 3, 2);
    $mindayout = substr($timeout, 3, 2);

   // echo $hrdayin." ".$mindayin." ".$hrdayout." ".$mindayout." ";

  //total hours
  $hrday = $hrdayout - $hrdayin;

  if($status == "Present"){
    $dayno++;
    if($hrdayout>=13) {
      $hrday--;
    }
    if($hrdayout>=19) {
      $hrday--;
    }
  }

  if($hrday < 0) $hrday = 0;

  //wala ung dinner part

  //total minutes
  $minday = $mindayout + $mindayin;
  

  while ($minday >= 60){
    $addhr = (int)($minday/60);
    $hrday += $addhr;
    $minday %= 60;
  }

  //echo $hrday." ".$minday." "; 

  $hrtotal += $hrday;
  $mintotal += $minday;

  while ($mintotal >= 60){
    $addhrtotal = (int)($mintotal/60);
    $hrtotal += $addhrtotal;
    $mintotal %= 60;
  }
  ?>
  
 <tr>
        <td>
        <div class="controls">
          <input id="dayname" type="text" class="input-small" value="<?php echo $dayname;?>">
        </div>
      </td>
      <td>
        <div class="controls">
          <input id="date" type="text" class="input-small" value="<?php echo $date; ?>">
        </div>
      </td>
      <td>
        <div class="controls">
          <input id="timein" type="text" class="input-small" value="<?php echo $timein; ?>">
        </div>
      </td>
      <td>
        <div class="controls">
          <input id="timeout" type="text" class="input-small" value="<?php echo $timeout; ?>">
        </div>
      </td>
      <td>
        <div class="controls">
          <input id="absent" type="text" class="input-small" value="<?php echo $status;?>">
        </div>
      </td>
      <td>
        <div class="controls">
          <input id="hours" type="text" class="input-small" value="<?php echo $hrday; ?>">
        </div>
      </td>
      <td>
        <div class="controls">
          <input id="minutes" type="text" class="input-small" value="<?php echo $minday; ?>">
        </div>
      </td>

    </tr>
      <?php }  ?>
    <tr>
    <th colspan="4">TOTAL:</th>
    <td><input type="text" id="totalabsent" readonly class="input-small" value="<?php echo $dayno; ?>"></td>
    <td><input type="text" id="totalhr" readonly class="input-small" value="<?php echo $hrtotal; ?>"></td>
    <td><input type="text" id="totalmin" readonly class="input-small" value="<?php echo $mintotal; ?>"></td>
    </tr>
    <tr>
      <th>Days Worked:</th>
      <td><input type="text" id="totalabsent" readonly class="input-small" value=""></td>
    </tr>
    <tr>
      <th>Days Count:</th>
      <td><input type="text" id="totalabsent" readonly class="input-small" value=""></td>
    </tr>
    </table>
    <br />

</form>

</div>
</div>
</div>

