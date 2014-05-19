
<!DOCTYPE HTML >

<HTML>
<HEAD>
	<link href="<?php echo base_url();?>assets/css/printForm.css" rel="stylesheet" >
	<link href="<?php echo base_url();?>assets/css/print.css" rel="stylesheet" media="print">
	<STYLE>
		<!-- 
		BODY,DIV,TABLE,THEAD,TBODY,TFOOT,TR,TH,TD,P { font-family:"Nimbus Sans L"; font-size:x-small }
		 -->
	</STYLE>
	
</HEAD>

 <div class="print">
 <a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly" onclick="window.print();return false;" title="Printer Friendly and PDF">
	<img style="border:none;" src="<?php echo base_url();?>assets/images/print.png" style="position: relative; top: 10px; left: 500px;" alt="Print Friendly and PDF"/></a>
</div>


<BODY TEXT="#000000">




<TABLE CELLSPACING="0" COLS="9" BORDER="0" id="testTable">
	<colgroup WIDTH="11"></colgroup>
	<colgroup WIDTH="114"></colgroup>
	<colgroup WIDTH="77"></colgroup>
	<colgroup WIDTH="96"></colgroup>
	<colgroup WIDTH="98"></colgroup>
	<colgroup WIDTH="104"></colgroup>
	<colgroup WIDTH="88"></colgroup>
	<colgroup WIDTH="74"></colgroup>
	<colgroup WIDTH="10"></colgroup>
	<TR>
		<TD HEIGHT="76" ALIGN="LEFT"><div class="font"></TD>
		<TD COLSPAN=7 ALIGN="CENTER" VALIGN=MIDDLE><div class="fontleave"><BR><IMG SRC="<?php echo base_url();?>assets/images/logo.jpg" WIDTH=598 HEIGHT=67 HSPACE=30 VSPACE=4>
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
		<TD class="botleft" HEIGHT="20" ALIGN="LEFT"><div class="font"></div></TD>
		<TD class="botright" COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><B><div id="nameleave" value=""><?php echo $firstname.' '.$lastname;?></div></B></TD>
		<TD class="botleftright" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><B><div id="designation" value=""><?php echo $position;?></div></B></TD>
		<TD class="botleftright" COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><B><div id="date"><?php if($status=="none"){ echo date('Y-m-d'); }else{ echo $dateprep;}  ?></TD>
		</TR>
	<TR>
		<TD class="topleft" HEIGHT="20" ALIGN="LEFT"><div class="font"></TD>
		<TD class="top" COLSPAN=7 ALIGN="LEFT" VALIGN=MIDDLE><B><div class="fontleave">Type of Leave</div></B></TD>
		<TD class="topright" ALIGN="LEFT"><div class="font"></TD>
	</TR>
	<TR>
		<TD class="botleft" HEIGHT="20" ALIGN="LEFT" VALIGN=MIDDLE><div class="font"></TD>
		 <td class="bot" ALIGN="RIGHT" VALIGN=MIDDLE><label class="checkbox" id="absent" ><input  name="typeofleave" <?php if($typeofleave == "authorized"){ echo "checked"; }?> checked type="radio" value="authorized "  > Authorized Absent</label></td>
		 <td class="bot" COLSPAN=2 ALIGN="LEFT" VALIGN=MIDDLE><label class="checkbox" id="serv"><input name="typeofleave" <?php if($typeofleave == "vl"){ echo "checked"; }?> type="radio"  value="vl" > Serv. Incentive Leave</label></td>
		 <td class="bot" ALIGN="LEFT" VALIGN=MIDDLE><div class="font"></td>
		 <td class="bot" ALIGN="LEFT" VALIGN=MIDDLE><label class="checkbox" id="sick" ><input name="typeofleave"  <?php if($typeofleave == "sl"){ echo "checked"; }?> type="radio" value="sl" > Sick Leave</label></td>
		 <td class="bot" ALIGN="LEFT" VALIGN=MIDDLE><label class="checkbox" ><input name="typeofleave" <?php if($typeofleave == "undertime"){ echo "checked"; }?> type="radio"  value="undertime" > Undertime</label></td>	
		 <td class="bot" ALIGN="LEFT" VALIGN=MIDDLE><div class="fontleave"></div></B></td>
		 <td class="botright" ALIGN="LEFT" VALIGN=MIDDLE><div class="font"></td>
	</TR>
	<TR>
		<TD class="topleft" HEIGHT="20" ALIGN="LEFT"><div class="font"></TD>
		<TD class="top" COLSPAN=7 ALIGN="LEFT" VALIGN=MIDDLE><B><div class="fontleave">Cover Period</div></B></TD>
		<TD class="topright" ALIGN="LEFT"><div class="font"></TD>
	</TR>

 		


	<TR>
		<TD class="botleft" HEIGHT="20" ALIGN="LEFT" VALIGN=MIDDLE><div class="font"></TD>
		<TD class="bot" ALIGN="LEFT" VALIGN=MIDDLE><label class="checkbox"><input checked class="coverperiod" <?php if($cover_period == "am"){ echo "checked";}?> name="cover_period" type="radio" value="am">AM</label></td>
		<TD class="bot" ALIGN="LEFT" VALIGN=MIDDLE><label class="checkbox"><input class="coverperiod" <?php if($cover_period == "pm"){ echo "checked";}?> name="cover_period" type="radio" value="pm" > PM</label></td>
		<TD class="bot" ALIGN="LEFT" VALIGN=MIDDLE><div id="whole"><label class="checkbox"><input class="coverperiod" name="cover_period" <?php if($cover_period == "wholeday"){ echo "checked";}?> type="radio" value="wholeday"> Whole Day</label></td>
		


		<TD class="bot"  ALIGN="LEFT" VALIGN=MIDDLE><label class="checkbox"><input class="coverperiod" <?php if($cover_period == "days"){ echo "checked";}?> name="cover_period" type="radio" id="days" value="days">Days, from</label></TD>
		<TD class="bot" ALIGN="LEFT" VALIGN=BOTTOM><B><div id="from"><?php if($cover_period == "days"){  echo $daysfrom;} ?>     to </div></b></td>
		<TD class="bot" ALIGN="LEFT" VALIGN=BOTTOM><B><div id="to"><?php if($cover_period == "days"){  echo $daysto;} ?></div></b></td>
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
		<TD class="botright" COLSPAN=8 ROWSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><FONT COLOR="#0000FF"><?php echo $reason;?></div></TD>
		</TR>
	<TR>
		<TD class="botleft" HEIGHT="20" ALIGN="LEFT"><div class="font"></TD>
		</TR>
	<TR>
		<TD class="topleft" HEIGHT="20" ALIGN="LEFT"><div class="font"></TD>
		<TD class="topright" COLSPAN=2 ALIGN="LEFT" VALIGN=MIDDLE><B><div class="fontleave">Status</div></B></TD>
		<TD class="topleft" ALIGN="LEFT"><B><div class="fontleave">Remaining Credits</div></B></TD>
		<TD class="top" ALIGN="RIGHT"><B><div class="fontleave">VL:</div></B></TD>
		<TD class="top" ALIGN="CENTER"><div id="vl"><?php echo $vl;?></div></TD>
		<TD class="top" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><div class="font"></TD>
		<TD class="topright" ALIGN="LEFT"><div class="font"></TD>
	</TR>
	<TR>
		<TD class="left" HEIGHT="20" ALIGN="LEFT"><BR></TD>

		<td  ALIGN="LEFT"><label class="checkbox"><input type="radio" <?php if($status == "Approved"){ echo "checked";}?> > Approve</label></td>
      	<td  class="right" ALIGN="LEFT"><label class="checkbox"><input type="radio" >Disapprove</label></td>
		<TD class="left" ALIGN="LEFT"><B><div class="font"></B></TD>
		<TD ALIGN="RIGHT"><B><div class="fontleave">SL:</div></B></TD>
		<TD class="topbot" ALIGN="CENTER"><div id="sl"><?php echo $sl;?></div></TD>
		<td align="RIGHT"><b><font size="1">TOTAL:</font></b></td>
		<td align="CENTER" class="bot"><b><font size="1"><?php echo $vl+$sl;?></font></b></td>
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
		<TD class="bot" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><div id="prep"><?php echo $firstname.' '.$lastname;?></div></td>
		<TD ALIGN="LEFT"><div class="font"></TD>
		<TD ALIGN="LEFT"><div class="fontleave">Checked by:</div></TD>
		<TD class="bot" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><div id="check"><?php echo $checkedbyname; ?></div></td>
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
		<TD class="bot" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><div id="app"><?php echo $approvedbyname; ?></div></td>
		<TD ALIGN="LEFT"><div class="font"></TD>
		<TD ALIGN="LEFT"><div class="font"></TD>
		<TD ALIGN="LEFT"><div class="font"></TD>
		<TD ALIGN="LEFT"><div class="font"></TD>
		<TD ALIGN="LEFT"><div class="font"></TD>
	</TR>
</TABLE>
<!-- ************************************************************************** -->
</BODY>

</HTML>



<script>
var pfHeaderImgUrl = '';
var pfHeaderTagline = '';
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

