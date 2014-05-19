
</HTML>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">

<HTML>
<HEAD>
	<link href="<?php echo base_url();?>assets/css/printForm.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/print.css" rel="stylesheet" media="print">

	<STYLE>
		<!-- 
		BODY,DIV,TABLE,THEAD,TBODY,TFOOT,TR,TH,TD,P { font-family:"Nimbus Sans L"; font-size:x-small }
		 -->
	</STYLE>
	
</HEAD>

<BODY TEXT="#000000">
	<table>
		<div class="print" ALIGN="CENTER" VALIGN=MIDDLE>
		 <a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly" onclick="window.print();return false;" title="Printer Friendly and PDF">
		<img style="border:none;" src="<?php echo base_url();?>assets/images/print.png" style="position: relative; top: 10px; left: 500px;" alt="Print Friendly and PDF"/></a>
		</div>
	</table>

<?php

if($result2){ ?>
<TABLE CELLSPACING="0" COLS="6" BORDER="0">
	<COLGROUP WIDTH="120"></COLGROUP>
	<COLGROUP SPAN="2" WIDTH="157"></COLGROUP>
	<COLGROUP SPAN="2" WIDTH="85"></COLGROUP>
	<COLGROUP WIDTH="60"></COLGROUP>



	<TR>
		<TD COLSPAN=6 ROWSPAN=5 HEIGHT="85" ALIGN="CENTER" VALIGN=MIDDLE ><BR><IMG SRC="<?php echo base_url();?>assets/images/logo.jpg" WIDTH=643 HEIGHT=66 HSPACE=14 VSPACE=11>
		</TD>
		</TR>
	<TR>
		</TR>
	<TR>
		</TR>
	<TR>
		</TR>
	<TR>
		</TR>
	<TR>
		<TD COLSPAN=6 HEIGHT="17" ALIGN="CENTER" VALIGN=MIDDLE><B>Daily Attendance Summary Report</B></TD>
		</TR>
	<TR>
		<TD COLSPAN=6 HEIGHT="17" ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
		</TR>
	<TR>
		<TD HEIGHT="17" ALIGN="LEFT">Name:</TD>
		<TD STYLE="border-bottom: 1px solid #000000" COLSPAN=4 ALIGN="CENTER" VALIGN=MIDDLE><B><?php echo $firstname." ".substr($middlename, 0, 1).". ".$lastname; ?> &nbsp;</B></TD>
		<TD ROWSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
	</TR>
	<TR>
		<TD HEIGHT="17" ALIGN="LEFT">Designation:</TD>
		<TD COLSPAN=4 ALIGN="CENTER" VALIGN=MIDDLE><B><?php echo $position_intern; ?>&nbsp;</B></TD>
		</TR>
	<TR>
		<TD HEIGHT="17" ALIGN="LEFT">School:</TD>
		<TD class="topbot" COLSPAN=4 ALIGN="CENTER" VALIGN=MIDDLE><B><?php echo $school; ?>&nbsp;</B></TD>
		</TR>
	<TR>
		<TD COLSPAN=6 HEIGHT="17" ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
		</TR>
	<TR>
		<TD class="topbotleftright" HEIGHT="17" ALIGN="CENTER"><B>Date</B></TD>
		<TD class="topbotleftright" ALIGN="CENTER"><B>Time In</B></TD>
		<TD class="topbotleftright" ALIGN="CENTER"><B>Time Out</B></TD>
		<TD class="topbotleftright" COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><B>Sub Total Hours</B></TD>
		</TR>
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
             
	<TR>
		<TD class="topbotleftright" HEIGHT="17" ALIGN="CENTER"><?php echo $date; ?>&nbsp;</TD>
		<TD class="topbotleftright" ALIGN="CENTER"><?php echo $showtimein; ?>&nbsp;</TD>
		<TD class="topbotleftright" ALIGN="CENTER"><label><?php echo $showtimeout; ?>&nbsp;</TD>
		<TD class="topbotleft" ALIGN="CENTER"><?php echo $showhrsday; ?>&nbsp;</TD>
		<TD class="topbot" ALIGN="CENTER" ><?php echo $showminday; ?>&nbsp;</TD>
		<TD class="topbotright" ALIGN="LEFT">Minutes</TD>
	</TR>
	  <?php } ?>
	<TR>
		<TD class="topbotleftright" COLSPAN=6 HEIGHT="17" ALIGN="CENTER" VALIGN=MIDDLE ><BR></TD>
		</TR>
	<TR>
		<TD class="topbotleftright" COLSPAN=3 HEIGHT="17" ALIGN="CENTER" VALIGN=MIDDLE><B>TOTAL HOURS</B></TD>
		<TD class="topbotleft" ALIGN="CENTER" ><?php echo $hrtotal; ?>&nbsp;</TD>
		<TD class="topbot" ALIGN="CENTER"><?php echo $mintotal; ?>&nbsp;</TD>
		<TD class="topbotright" ALIGN="LEFT">Minutes</TD>
	</TR>
	<TR>
		<TD COLSPAN=6 ROWSPAN=2 HEIGHT="34" ALIGN="CENTER" VALIGN=MIDDLE ><BR></TD>
		</TR>
	<TR>
		</TR>
	<TR>
		<TD HEIGHT="14" ALIGN="LEFT" ><FONT SIZE=1><BR></FONT></TD>
		<TD ALIGN="CENTER"><FONT SIZE=1>Prepared by:</FONT></TD>
		<TD ALIGN="CENTER" ><FONT SIZE=1><BR></FONT></TD>
		<TD COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><FONT SIZE=1>Certified True and Correct by:</FONT></TD>
		<TD ALIGN="LEFT"><FONT SIZE=1><BR></FONT></TD>
	</TR>
	<TR>
		<TD COLSPAN=6 ROWSPAN=2 HEIGHT="34" ALIGN="CENTER" VALIGN=MIDDLE ><BR></TD>
		</TR>
	<TR>
		</TR>
	<TR>
		<TD ROWSPAN=2 HEIGHT="34" ALIGN="CENTER" VALIGN=MIDDLE><B><BR></B></TD>
		<TD STYLE="border-bottom: 1px solid #000000" ALIGN="CENTER"><B>Ma. Reyna Moya</B></TD>
		<TD ROWSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><B><BR></B></TD>
		<TD STYLE="border-bottom: 1px solid #000000" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><B>Allan de Guzman</B></TD>
		<TD ROWSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
	</TR>
	<TR>
		<TD ALIGN="CENTER"><FONT SIZE=1>Admin and Business Support</FONT></TD>
		<TD COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><FONT SIZE=1>Research and Dev. Officer</FONT></TD>
		</TR>
</TABLE>
          <?php }
           else{
            ?>
               <div id="alert" class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span><strong>0 result.</strong> No record Found</span>
                </div>
            <?php } ?>

</BODY>

</HTML>


<script>
//var pfHeaderImgUrl = '';
//var pfHeaderTagline = '';
var pfdisableClickToDel = 0;
var pfHideImages = 0;
var pfImageDisplayStyle = 'none';
var pfDisablePDF = 0;
var pfDisableEmail = 0;
var pfDisablePrint = 0;
var pfCustomCSS = '';
var pfBtVersion='1';

(function(){
	var js, pf;pf = document.createElement('script');
	pf.type = 'text/javascript';
	if('https:' == document.location.protocol){
		//js='<?php echo base_url();?>assets/js/main.js'
	}

	else{
		//js='<?php echo base_url();?>assets/js/printfriendly.js'
	}

	pf.src=js;document.getElementsByTagName('head')[0].appendChild(pf)

})
();

</script>
