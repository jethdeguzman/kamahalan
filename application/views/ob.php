<style>
  .headertable tr th{
    background:#858585;
    color:#424242;
  }
  .headertable tr td{
    background: #D4D4D4;
  }
  .obtable tr th{
    background:#858585;
    color:#424242;
    text-align:center;
    }
  .obtable tr td{
    background: #D4D4D4;
  }
  #form-title{
    margin-bottom:20px;
  }
</style>
<div class="row">
  <div class="span10">
    <h3 class="module-title">OB Report</h3>
  </div>
</div>

<div class="span9" >
  <div class="row">
 
    <div class="span9" >
      <form class="form-inline">
      <div id="form-title">
     
          <strong><center>Official Business Report</center></strong>
     
       </div> 
    <table class="table table-bordered headertable">
    <tr>
    <th><label class="control-label">User:</label></td>
    <td><input type="text" id="inputName" class="input-small" readonly placeholder="Username" value=""></td>
    </tr>
    <tr>
    <th><label class="control-label">Cover Period:</label></td>
    <td><input type="text" id="inputCover" class="input-small" readonly placeholder="Cover Period" value=""></td>
    </tr>
    </table>
    <br />
    <table  class="table table-bordered obtable" align="center">
    <thead style="">
      <tr>
        <th>DATE</th>
        <th>TIME IN</th>
        <th>LOCATION</th>
        <th>CLIENT</th>
        <th>TIMEOUT</th>
        <th>LOCATION</th>
        <th>CLIENT</th>
      </tr>
    </thead>
    <tr>
      <td>
        <div class="controls">
          <input id="date" type="text" class="input-small" value="">
        </div>
      </td>
      <td>
        <div class="controls">
          <input id="timein" type="text" class="input-small" value="">
        </div>
      </td>
      <td>
        <div class="controls">
          <input id="locin" type="text" class="input-small" value="">
        </div>
      </td>
      <td>
        <div class="controls">
          <input id="clientin" type="text" class="input-small" value="">
        </div>
      </td>
      <td>
        <div class="controls">
          <input id="timout" type="text" class="input-small" value="">
        </div>
      </td>
      <td>
        <div class="controls">
          <input id="locationout" type="text" class="input-small" value="">
        </div>
      </td>
      <td>
        <div class="controls">
          <input id="clientout" type="text" class="input-small" value="">
        </div>
      </td>
    </tr>
    </table>
    <br />

</form>

</div>
</div>
</div>
