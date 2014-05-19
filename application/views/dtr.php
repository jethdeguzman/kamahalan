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
     
          <strong><center>Daily Time Record Report</center></strong>
     
       </div> 
    <table  class="table table-bordered headertable">
    <tr>
    <th><label class="control-label">Name:</label></td>
    <td><input type="text" id="inputName" readonly placeholder="Name" value=""></td>
    </tr>
    <tr>
    <th><label class="control-label">Employee Number:</label></td>
    <td><input type="text" id="inputEmployeeno" readonly placeholder="Employee #" value=""></td>
    </tr>
    <tr>
    <th><label class="control-label">Cover Period:</label></td>
    <td><input type="text" id="inputCover" readonly placeholder="Cover Period" value=""></td>
    </tr>
    <tr>
    <th><label class="control-label">Number of Worked Days:</label></td>
    <td><input type="text" id="inputWorked" readonly placeholder="Worked Days" value=""></td>
    </tr>
    </table>
    <br />
    <table  class="table table-bordered dtrtable" align="center">
    <thead style="">
      <tr>
        <th>DATE</th>
        <th>TIME IN</th>
        <th>TIME OUT</th>
        <th>ABSENT</th>
        <th>SL</th>
        <th>SIL</th>
        <th>HOLIDAY</th>
      </tr>
    </thead>
      <?php foreach ($result2 as $row ) {
    # code...
    //echo $row->date." ". $row->timein." ". $row->timeout."" . $row->status;
    $date = $row->date;
    $timein = $row->timein;
    $timeout = $row->timeout;
    $status = $row->status;

    $hrdayin = substr($timein, 0, 2);
    $hrdayout = substr($timeout, 0, 2);
    $mindayin = substr($timein, 3, 2);
    $mindayout = substr($timeout, 3, 2);

    echo $hrdayin." ".$mindayin." ".$hrdayout." ".$mindayout;

  $hrday = $hrdayout - $hrdayin;

  if($status == "Present"){
    $hrday--;
  }

  $minday = $mindayout + $mindayin;

  echo $hrday." ".$minday;  
/*
while (minday > 60){
  addhr = minday/60;
  hrday =+ addhr;
  minday = minday mod 60;
}*/
  ?>
 <tr>
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
          <input id="absent" type="text" class="input-small" value="<?php echo$status; ?>">
        </div>
      </td>
  <?php }  ?>

      <td>
        <div class="controls">
          <input id="sl" type="text" class="input-small" value="">
        </div>
      </td>
      <td>
        <div class="controls">
          <input id="sil" type="text" class="input-small" value="">
        </div>
      </td>
      <td>
        <div class="controls">
          <input id="holiday" type="text" class="input-small" value="">
        </div>
      </td>
    </tr>
    <tr>
    <th colspan="3">TOTAL:</th>
    <td><input type="text" id="totalabsent" readonly class="input-small" value=""></td>
    <td><input type="text" id="totalSL" readonly class="input-small" value=""></td>
    <td><input type="text" id="totalSIL" readonly class="input-small" value=""></td>
    <td><input type="text" id="totalholiday" readonly class="input-small" value=""></td>
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

<!--
given id of the user
{
$hrday = (hrdayout - hrdayin) -1;
minday = mindayout + mindayin;

while (minday > 60){
  addhr = minday/60;
  hrday =+ addhr;
  minday = minday mod 60;
}
}