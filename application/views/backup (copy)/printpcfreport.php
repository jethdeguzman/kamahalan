
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
		<TD class="bot" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE>Reyna Moya</TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
	<TR>
		<TD HEIGHT="17" ALIGN="CENTER"><B>Date:</B></TD>
		<TD class="bot" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE>From 10/12/2013 to 11/12/2013 </TD>
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
	<TR>
		<TD class="topbotleftright" HEIGHT="17" ALIGN="CENTER">C1</TD>
		<TD class="topbotleftright" ALIGN="CENTER" SDVAL="1" SDNUM="13321;">1</TD>
		<TD class="topbotleftright" ALIGN="CENTER" SDVAL="1" SDNUM="13321;">1</TD>
		<TD class="topbotleftright" ALIGN="CENTER" SDVAL="100" SDNUM="13321;">100</TD>
	</TR>
	<TR>
		<TD class="topbotleftright" COLSPAN=3 HEIGHT="17" ALIGN="CENTER" VALIGN=MIDDLE><B>Total</B></TD>
		<TD class="topbotleftright" ALIGN="CENTER" SDVAL="100" SDNUM="13321;">100</TD>
	</TR>
	<TR>
		<TD HEIGHT="17" ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
	<TR>
		<TD HEIGHT="17" ALIGN="CENTER"><B>Submitted To:</B></TD>
		<TD class="bot" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE>Rosiliza</TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
	<TR>
		<TD HEIGHT="17" ALIGN="CENTER"><B>Through:</B></TD>
		<TD class="bot" COLSPAN=2 ALIGN="CENTER" VALIGN=MIDDLE>Mitchie</TD>
		<TD ALIGN="LEFT"><BR></TD>
	</TR>
</TABLE>
<!-- ************************************************************************** -->
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
