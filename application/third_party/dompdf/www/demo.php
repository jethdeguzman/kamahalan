<?php

require_once("../dompdf_config.inc.php");




if ( isset( $_POST["html"] )  ) {

  if ( get_magic_quotes_gpc() )
    $_POST["html"] = stripslashes($_POST["html"]);
  
  $dompdf = new DOMPDF();
  $dompdf->load_html($_POST["html"]);
  $dompdf->set_paper($_POST["paper"], $_POST["orientation"]);
  $dompdf->render();

  $dompdf->stream("leaveform.pdf", array("Attachment" => false));

  exit(0);
}

?>


<a name="demo"> </a>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
  <div style="text-align: center; margin-top: 1em;">
  <button type="submit">Print as PDF</button>
</div>

<div class="hidden-form" >
<textarea name="html" cols="60" rows="20">


&lt;

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">

<HTML>
<HEAD>
  <link href="test/css/printForm.css" rel="stylesheet" type="text/css" />
  
  <STYLE>
    <!-- 
    BODY,DIV,TABLE,THEAD,TBODY,TFOOT,TR,TH,TD,P { font-family:"Nimbus Sans L"; font-size:x-small }
     -->
  </STYLE>
  
</HEAD>

<BODY TEXT="#000000">




<TABLE CELLSPACING="0" COLS="9" BORDER="0" id="testTable">
  <COLGROUP WIDTH="11"></COLGROUP>
  <COLGROUP WIDTH="114"></COLGROUP>
  <COLGROUP WIDTH="77"></COLGROUP>
  <COLGROUP WIDTH="96"></COLGROUP>
  <COLGROUP WIDTH="98"></COLGROUP>
  <COLGROUP WIDTH="104"></COLGROUP>
  <COLGROUP WIDTH="88"></COLGROUP>
  <COLGROUP WIDTH="74"></COLGROUP>
  <COLGROUP WIDTH="10"></COLGROUP>
  <TR>
    <TD HEIGHT="76" ALIGN="LEFT"><div class="font"></TD>
    <TD COLSPAN=7 ALIGN="CENTER" VALIGN=MIDDLE><div class="fontleave"><BR><IMG SRC="logo.jpg" WIDTH=598 HEIGHT=67 HSPACE=30 VSPACE=4>
    </div></TD>
    <TD ALIGN="LEFT"><div class="font"></TD>
  </TR>
  <TR>
    <TD HEIGHT="20" ALIGN="LEFT"><div class="font"></TD>
    <TD COLSPAN=7 ALIGN="CENTER" VALIGN=MIDDLE><B><div class="fontleave">LEAVE FORM</div></B></TD>
    <TD ALIGN="LEFT"><div class="font"></TD>
  </TR>
  <TR>
    <TD HEIGHT="20" ALIGN="LEFT"><div class="font"></TD>
    <TD COLSPAN=7 ALIGN="CENTER" VALIGN=MIDDLE><B><div class="fontleave">201B FORM NO. 01</div></B></TD>
    <TD ALIGN="LEFT"><div class="font"></TD>
  </TR>
  <TR>
    <TD HEIGHT="13" ALIGN="LEFT"><div class="font"></TD>
    <TD COLSPAN=7 ALIGN="CENTER" VALIGN=MIDDLE><B><div class="font"></B></TD>
    <TD ALIGN="LEFT"><div class="font"></TD>
  </TR>
  <TR>
    <TD class="topleft" HEIGHT="20" ALIGN="LEFT"><div class="font"></TD>
    <TD class="topright" COLSPAN=3 ALIGN="LEFT" VALIGN=MIDDLE><B><div class="fontleave">Name of Employee:</div></B></TD>
    <TD class="topleftright" COLSPAN=2 ALIGN="LEFT" VALIGN=MIDDLE><B><div class="fontleave">Designation</div></B></TD>
    <TD class="topleft" COLSPAN=2 ALIGN="LEFT" VALIGN=MIDDLE><B><div class="fontleave">Date Prepared</div></B></TD>
    <TD class="topright" ALIGN="LEFT"><div class="font"></TD>
  </TR>
  <TR>
    <TD class="botleft" HEIGHT="20" ALIGN="LEFT"><div class="font"></TD>
    <TD class="botright" COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><B><id="nameleave">LAWRENCE JOSEPH LIBO-ON</div></B></TD>
    <TD class="botleftright" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><B><id="designation">BUS. DEV. MANAGER</div></B></TD>
    <TD class="botleftright" COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE SDVAL="41367" SDNUM="13321;0;MM/DD/YY"><B><Fid="date">04/03/13</div></B></TD>
    </TR>
  <TR>
    <TD class="topleft" HEIGHT="20" ALIGN="LEFT"><div class="font"></TD>
    <TD class="top" COLSPAN=7 ALIGN="LEFT" VALIGN=MIDDLE><B><div class="fontleave">Type of Leave</div></B></TD>
    <TD class="topright" ALIGN="LEFT"><div class="font"></TD>
  </TR>
  <TR>
    <TD class="botleft" HEIGHT="20" ALIGN="LEFT" VALIGN=MIDDLE><div class="font"></TD>
    <TD class="bot" ALIGN="RIGHT" VALIGN=MIDDLE><B><div id="absent"><input type="checkbox" name="absent" value="absent">Authorized Absent</div></b></td>
    <TD class="bot" COLSPAN=2 ALIGN="LEFT" VALIGN=MIDDLE><B><div id="serv"> <input type="checkbox" name="serv" value="serv">Serv. Incentive Leave</div></b></td>
    <TD class="bot" ALIGN="LEFT" VALIGN=MIDDLE><B><div class="font"></B></TD>
    <TD class="bot" ALIGN="LEFT" VALIGN=MIDDLE><B><div id="sick"> <input type="checkbox" name="sick" value="sick">Sick Leave</div></b></td>
    <TD class="bot" ALIGN="LEFT" VALIGN=MIDDLE><B><input type="checkbox" name="undertime" value="undertime">Undertime</div></b></td>
    <TD class="bot" ALIGN="LEFT" VALIGN=MIDDLE><B><div class="fontleave"></div></B></TD>
    <TD class="botright" ALIGN="LEFT" VALIGN=MIDDLE><div class="font"></TD>
  </TR>
  <TR>
    <TD class="topleft" HEIGHT="20" ALIGN="LEFT"><div class="font"></TD>
    <TD class="top" COLSPAN=7 ALIGN="LEFT" VALIGN=MIDDLE><B><div class="fontleave">Cover Period</div></B></TD>
    <TD class="topright" ALIGN="LEFT"><div class="font"></TD>
  </TR>
  <TR>
    <TD class="botleft" HEIGHT="20" ALIGN="LEFT" VALIGN=MIDDLE><div class="font"></TD>
    <TD class="bot" ALIGN="LEFT" VALIGN=MIDDLE> <div id="am"> <input type="checkbox" name="am" value="am">AM</div></b></td>
    <TD class="bot" ALIGN="LEFT" VALIGN=MIDDLE><div id="pm"> <input type="checkbox" name="pm" value="pm">PM</div></b></td>
    <TD class="bot" ALIGN="LEFT" VALIGN=MIDDLE><div id="whole"> <input type="checkbox" name="whole" value="undertime">Whole Day</div></b></td>
    <TD class="bot" ALIGN="LEFT" VALIGN=MIDDLE><B><div id="days"> <input type="checkbox" name="days" value="days">Days</div></b></td>
    <TD class="bot" ALIGN="RIGHT" VALIGN=MIDDLE SDNUM="13321;0;MM/DD/YY"><B><div id="from">from 03/21/2013</div></b></td>
    <TD class="bot" ALIGN="LEFT" VALIGN=MIDDLE SDVAL="41360" SDNUM="13321;0;MM/DD/YY"><B><div id="to"> to 03/21/13</div></b></td>
    <TD class="bot" ALIGN="LEFT" VALIGN=MIDDLE><B><div class="font"></B></TD>
    <TD class="botright" ALIGN="LEFT" VALIGN=MIDDLE><div class="font"></TD>
  </TR>
  <TR>
    <TD class="topleft" HEIGHT="20" ALIGN="LEFT"><div class="font"></TD>
    <TD class="top" COLSPAN=7 ALIGN="LEFT" VALIGN=MIDDLE><B><div class="fontleave">Reason:</div></B></TD>
    <TD class="topright" ALIGN="LEFT"><div class="font"></TD>
  </TR>
  <TR>
    <TD class="left" HEIGHT="20" ALIGN="LEFT"><div class="font"></TD>
    <TD class="botright" COLSPAN=8 ROWSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><FONT COLOR="#0000FF">Death of Immediate Family Member (Mother)</div></TD>
    </TR>
  <TR>
    <TD class="botleft" HEIGHT="20" ALIGN="LEFT"><div class="font"></TD>
    </TR>
  <TR>
    <TD class="topleft" HEIGHT="20" ALIGN="LEFT"><div class="font"></TD>
    <TD class="topright" COLSPAN=2 ALIGN="LEFT" VALIGN=MIDDLE><B><div class="fontleave">Status</div></B></TD>
    <TD class="topleft" ALIGN="LEFT"><B><div class="fontleave">Remaining Credits</div></B></TD>
    <TD class="top" ALIGN="RIGHT"><B><div class="fontleave">VL:</div></B></TD>
    <TD class="top" ALIGN="CENTER"><div id="vl">4 days</div></TD>
    <TD class="top" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><div class="font"></TD>
    <TD class="topright" ALIGN="LEFT"><div class="font"></TD>
  </TR>
  <TR>
    <TD class="left" HEIGHT="20" ALIGN="LEFT"><BR></TD>
    <TD ALIGN="LEFT" VALIGN=MIDDLE><B><div id="approved"> <input type="checkbox" name="approved" value="approved">Approved</div></b></td>
    <TD class="right" ALIGN="LEFT" VALIGN=MIDDLE><B><div id="disapproved"> <input type="checkbox" name="disapproved" value="disapproved">Disapproved</div></b></td>
    <TD class="left" ALIGN="LEFT"><B><div class="font"></B></TD>
    <TD ALIGN="RIGHT"><B><div class="fontleave">SL:</div></B></TD>
    <TD class="topbot" ALIGN="CENTER"><div id="sl">3 days</div></TD>
    <td align="RIGHT"><b><font size="1">TOTAL:</font></b></td>
    <td align="CENTER" class="bot"><b><font size="1">P50.00</font></b></td>
    <TD class="right" ALIGN="LEFT"><BR></TD>
  </TR>

  <TR>
    <TD class="botleft" HEIGHT="10" ALIGN="LEFT"><BR></TD>
    <TD class="botright" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><B><div class="font"></B></TD>
    <TD class="botleft" COLSPAN=5 ALIGN="CENTER" VALIGN=MIDDLE><B><div class="font"></B></TD>
    <TD class="botright" ALIGN="LEFT"><div class="font"></TD>
  </TR>
  <TR>
    <TD HEIGHT="28" ALIGN="LEFT"><div class="font"></TD>
    <TD COLSPAN=7 ALIGN="CENTER" VALIGN=MIDDLE><div class="font"></TD>
    <TD ALIGN="LEFT"><div class="font"></TD>
  </TR>
  <TR>
    <TD HEIGHT="20" ALIGN="LEFT"><div class="font"></TD>
    <TD ALIGN="LEFT"><div class="fontleave">Prepared by:</div></TD>
    <TD class="bot" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><div id="prep">LAWRENCE JOSEPH LIBO-ON</div></td>
    <TD ALIGN="LEFT"><div class="font"></TD>
    <TD ALIGN="LEFT"><div class="fontleave">Checked by:</div></TD>
    <TD class="bot" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><div id="check">MA. REYNA MOYA</div></td>
    <TD ALIGN="LEFT"><div class="font"></TD>
  </TR>
  <TR>
    <TD HEIGHT="28" ALIGN="LEFT"><div class="font"></TD>
    <TD COLSPAN=7 ALIGN="CENTER" VALIGN=MIDDLE><div class="font"></TD>
    <TD ALIGN="LEFT"><div class="font"></TD>
  </TR>
  <TR>
    <TD HEIGHT="20" ALIGN="LEFT"><div class="font"></TD>
    <TD ALIGN="LEFT"><div class="fontleave">Approved by:</div></TD>
    <TD class="bot" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><div id="app">ROSALINDA TSANG</div></td>
    <TD ALIGN="LEFT"><div class="font"></TD>
    <TD ALIGN="LEFT"><div class="font"></TD>
    <TD ALIGN="LEFT"><div class="font"></TD>
    <TD ALIGN="LEFT"><div class="font"></TD>
    <TD ALIGN="LEFT"><div class="font"></TD>
  </TR>
</TABLE>

</BODY>
</HTML>
&gt;


</textarea>
</div> <!--hidden-form-->
</form>
