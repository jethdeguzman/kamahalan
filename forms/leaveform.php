<!DOCTYPE html>
<html lang="en">
<head>
      <title>Test</title>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen"</link>
       <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen"</link>
       <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen"</link>
       <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"</link>
       <script> src="bootstrap/js/bootstrap.js" </script>
       <script> src="bootstrap/js/bootstrap.min.js" </script>

  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
    $( "#datepicker1" ).datepicker();
    $( "#datepicker2" ).datepicker();
  });
  </script>
</head>
<body>
<br />
<br />
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
      <!--Sidebar content-->
    </div>
    <div class="span9">
      <form class="form-inline">
        <table class="table table-hover">
          <img src="asset/logo.jpg" width="1000"/>
      <div class="control-group">
      <table class="table table-hover">
        <tr>
          <td colspan="1000">
          <strong><center>Leave Form</center></strong>
          </td>
        </tr>
        <tr>
          <td colspan="1000">
          <small><center>201B FORM NO. 01</center></small>
          </td>
        </tr>
    <tr>
      <td>
        <label class="control-label" for="inputName">Name of Employee:</label>
          <div class="controls">
            <input type="text" id="inputName" placeholder="Name">
          </div>
      </td>
    </div>
    <div class="control-group">
      <td>
        <label class="control-label">Designation:</label>
          <div class="controls">
            <input type="text" placeholder="Designation">
          </div>
      </td>
    </div>
    <div class="control-group">
      <td>
        <label class="control-label">Date Prepared:</label>
          <div class="controls">
            <input type="text" id="datepicker">
          </div>
      </td>
    </tr>
    </table>
    <table>
          Type of Leave:
    </table>
    <table class="table table-hover">
              <div class="controls">  
    <tr>
      <td> 
             <label class="checkbox">
                <input type="checkbox"> Authorized Absent
              </label>
      </td>
      <td>
             <label class="checkbox">
                <input type="checkbox"> Serv. Incentive Leave
              </label>
        </td>
      <td>
             <label class="checkbox">
                <input type="checkbox"> Sick Leave
              </label>
        </td>
      <td>
             <label class="checkbox">
                <input type="checkbox"> Undertime
              </label>
            </div>
        </td>
    </tr>
    </table>
    <table>
          Cover Period:
    </table>
    <table class="table table-hover">
    <tr>
          <div class="controls">   
           <td colspan="10">
             <label class="checkbox">
              <input type="checkbox"> AM
             </label>
          </div>
      </td>
      <td colspan="10">
             <label class="checkbox">
                <input type="checkbox"> PM
              </label>
        </td>
      <td colspan="10">
             <label class="checkbox">
                <input type="checkbox"> Whole Day
              </label>
        </td>
      <td colspan="10">
             <label class="checkbox">
                <input type="checkbox"> Undertime
              </label>
        </td>
      <td >
             <label class="checkbox">
                <input type="checkbox"> Days, from
                <input type="text" id="datepicker1"> to
                <input type="text" id="datepicker2">
              </label>
        </td>
    </div>
    </tr>
    </table>
    <table class="table table-hover">
    <tr>
      <td>
    <label class="control-label">Reason:</label>
      <textarea></textarea>
      </td>
    </tr>
    </table>
    <table class="table table-hover">
    <tr>
      <td>
    <label class="control-label">Status:</label>
    <br />
      <label class="checkbox">
                <input type="checkbox" disabled> Approved&nbsp;&nbsp;&nbsp;&nbsp;
              </label>
            <label class="checkbox">
                <input type="checkbox" disabled> Disapproved
              </label>
            </div>
      </td>
     <td>
    <label class="control-label">Remaining Credits:</label>
     </td>
     <td>
<div class="controls">
            VL:&nbsp;<input type="text" id="inputName" placeholder="VL" disabled><br /><br />
            SL:&nbsp;<input type="text" id="inputName" placeholder="SL" disabled>
          </div>
</td>
<td>
    TOTAL:&nbsp;<input type="text" id="inputName" placeholder="TOTAL" disabled>
     </td>
</td>
    </tr>
    <table class="table table-hover">
    <tr>
      <td>
      Prepared by:&nbsp;<input type="text"><br /><br />
      Approved by:&nbsp;<input type="text" disabled>
      </td>
      <td>
      Checked by:&nbsp;<input type="text" disabled>
      </td>
    </table>
  </div>
</form>
</form>
</div>
</div>
</div>
</body>
</html>
