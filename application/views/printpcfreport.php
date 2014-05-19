
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

<TABLE CELLSPACING="0" COLS="4" BORDER="0">
	<COLGROUP SPAN="4" WIDTH="153"></COLGROUP>
	<TR>
		<TD COLSPAN=4 HEIGHT="75" ALIGN="CENTER" VALIGN=MIDDLE><BR><IMG SRC="<?php echo base_url();?>assets/images/logo.jpg" WIDTH=597 HEIGHT=67 HSPACE=9 VSPACE=4>
		</TD>
		</TR>
	<TR>
		<TD COLSPAN=4 HEIGHT="17" ALIGN="CENTER" VALIGN=MIDDLE><B>PCF REPORT</B></TD>
		</TR>
	<TR>
		<TD HEIGHT="17" ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
	<TR>
		<TD HEIGHT="17" ALIGN="CENTER"><B>User:</B></TD>
		<TD class="bot" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><?php echo $lastname." ".$firstname;?>&nbsp;</TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
	<TR>
		<TD HEIGHT="17" ALIGN="CENTER"><B>Date:</B></TD>
		<TD class="bot" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE>From <b><?php echo $from; ?></b><? echo "     to     ";?><b><?php echo $to;?>&nbsp;</TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
	<TR>
		<TD HEIGHT="17" ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
	<TR>
		<TD class="topbotleftright" HEIGHT="17" ALIGN="CENTER"><B>Category</B></TD>
		<TD class="topbotleftright" ALIGN="CENTER"><B>Ref No.</B></TD>
		<TD class="topbotleftright" ALIGN="CENTER"><B>Particulars</B></TD>
		<TD class="topbotleftright" ALIGN="CENTER"><B>Amount</B></TD>
	</TR>

	         <?php       $totalamount = 0;  
         foreach ($result as $row) { 
              $amount = $row->amount;
         
              $totalamount+=$amount;
          ?>
	<TR>
		<TD class="topbotleftright" HEIGHT="17" ALIGN="CENTER"><?php echo $row->category; ?>&nbsp;</TD>
		<TD class="topbotleftright" ALIGN="CENTER"><?php echo $row->refno; ?>&nbsp;</TD>
		<TD class="topbotleftright" ALIGN="CENTER"><?php echo $row->particulars; ?>&nbsp;</TD>
		<TD class="topbotleftright" ALIGN="CENTER"><?php echo $row->amount; ?>&nbsp;</TD>
	</TR>

	            <?php } ?>
	<TR>
		<TD class="topbotleftright" COLSPAN=3 HEIGHT="17" ALIGN="CENTER" VALIGN=MIDDLE><B>Total</B></TD>
		<TD class="topbotleftright" ALIGN="CENTER"><?php echo $totalamount;?>&nbsp;</TD>
	</TR>
	<TR>
		<TD HEIGHT="17" ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
	<TR>
		<TD HEIGHT="17" ALIGN="CENTER"><B>Submitted By:</B></TD>
		<TD class="bot" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><?php echo $lastname." ".$firstname;?>&nbsp;</TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
	<TR>
		<TD HEIGHT="17" ALIGN="CENTER"><B>Submitted To:</B></TD>
		<TD class="bot" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE><?php echo $checkedbyname;?></TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
</TABLE>
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
