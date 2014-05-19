
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">

<HTML>
<HEAD>
	<link href="<?php echo base_url();?>assets/css/printForm.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/print.css" rel="stylesheet" media="print">

	<STYLE>
		<!-- 
		BODY,DIV,TABLE,THEAD,TBODY,TFOOT,TR,TH,TD,P { font-family:"Liberation Sans"; font-size:x-small }
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
 <?php if($result7){ ?> 
<TABLE CELLSPACING="0" COLS="7" BORDER="0">
	<colgroup WIDTH="96"></colgroup>
	<colgroup WIDTH="85"></colgroup>
	<colgroup SPAN="2" WIDTH="96"></colgroup>
	<colgroup WIDTH="85"></colgroup>
	<colgroup SPAN="2" WIDTH="96"></colgroup>
	<TR>
		<TD COLSPAN=7 HEIGHT="80" ALIGN="CENTER" VALIGN=MIDDLE><BR><IMG SRC="<?php echo base_url();?>assets/images/logo.jpg" WIDTH=597 HEIGHT=67 HSPACE=29 VSPACE=6>
		</TD>
		</TR>
	<TR>
		<TD COLSPAN=7 HEIGHT="16" ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
		</TR>
	<TR>
		<TD COLSPAN=7 HEIGHT="17" ALIGN="CENTER" VALIGN=MIDDLE><B>OFFICIAL BUSINESS REPORT</B></TD>
		</TR>
	<TR>
		<TD COLSPAN=7 HEIGHT="17" ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
		</TR>
	<TR>
		<TD HEIGHT="17" ALIGN="CENTER"><B>USER:</B></TD>
		<TD class="bot" COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><?php echo $lastname." ".$firstname;?></TD>
		<TD COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
		</TR>
	<TR>
		<TD HEIGHT="17" ALIGN="CENTER"><B>DATE:</B></TD>
		<TD class="bot" COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><?php echo $from; ?><? echo "     to     ";?><?php echo $to;?></TD>
		<TD COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
		</TR>
	<TR>
		<TD COLSPAN=7 HEIGHT="17" ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
		</TR>
	<TR>
		<TD class="topbotleftright" HEIGHT="17" ALIGN="CENTER"><B>DATE</B></TD>
		<TD class="topbotleftright" ALIGN="CENTER"><B>TIME IN</B></TD>
		<TD class="topbotleftright" ALIGN="CENTER"><B>LOCATION 1</B></TD>
		<TD class="topbotleftright" ALIGN="CENTER"><B>CLIENT 1</B></TD>
		<TD class="topbotleftright" ALIGN="CENTER"><B>TIME OUT</B></TD>
		<TD class="topbotleftright" ALIGN="CENTER"><B>LOCATION 2</B></TD>
		<TD class="topbotleftright" ALIGN="CENTER"><B>CLIENT 2</B></TD>
	</TR>
<?php foreach ($result7 as $row ) { ?>
	<TR>
		<TD class="topbotleftright" HEIGHT="17" ALIGN="CENTER"><?php echo $row->date;?>&nbsp;</TD>
		<TD class="topbotleftright" ALIGN="CENTER"><?php echo strftime("%I:%M %p",strtotime($row->timeappo_start));?>&nbsp;</TD>
		<TD class="topbotleftright" ALIGN="CENTER"><?php echo $row->location_start;?>&nbsp;</TD>
		<TD class="topbotleftright" ALIGN="CENTER"><?php echo $row->client_start;?>&nbsp;</TD>
		<TD class="topbotleftright" ALIGN="CENTER"><?php  echo strftime("%I:%M %p",strtotime($row->timeappo_end)); ?>&nbsp;</TD>
		<TD class="topbotleftright" ALIGN="CENTER"><?php echo $row->location_end;?>&nbsp;</TD>
		<TD class="topbotleftright" ALIGN="CENTER"><?php echo $row->client_end;?>&nbsp;</TD>
	</TR>
<?php } ?>

	<TR>
		<TD COLSPAN=7 HEIGHT="17" ALIGN="CENTER" VALIGN=MIDDLE><BR></TD>
		</TR>
	<TR>
		<TD COLSPAN=3 HEIGHT="17" ALIGN="CENTER" VALIGN=MIDDLE><B>Prepared By:</B></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><B>Acknowledged By:     </B></TD>
		</TR>
	<TR>
		<TD COLSPAN=7 HEIGHT="37" ALIGN="CENTER" VALIGN=MIDDLE><B><BR></B></TD>
		</TR>
	<TR>
		<TD class="bot" COLSPAN=3 HEIGHT="17" ALIGN="CENTER" VALIGN=MIDDLE><?php echo $lastname." ".$firstname;?></TD>
		<TD ALIGN="CENTER"><BR></TD>
		<TD class="bot" COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><?php echo $checkedbyname;?></TD>
		</TR>
	<TR>
		<TD COLSPAN=3 HEIGHT="17" ALIGN="CENTER" VALIGN=MIDDLE><b><?php echo $position;?></b></TD>
		<TD ALIGN="CENTER"><BR></TD>
		<TD COLSPAN=3 ALIGN="CENTER" VALIGN=MIDDLE><b><?php echo $checkedbyposition;?></b></TD>
		</TR>
</TABLE>
      <?php }else{?>
            <div id="alert" class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span><strong>0 result.</strong> No reord Found</span>
                </div>
      <?php }?>
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
