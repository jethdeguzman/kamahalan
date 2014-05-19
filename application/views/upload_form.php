<html>
<head>
<title>Upload Form</title>
<script src="<?echo base_url();?>assets/bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="<?echo base_url();?>assets/bootstrap/js/jquery-migrate-1.2.0.min.js"></script>
<script src="<?echo base_url();?>assets/js/jquery.form.js"></script>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('post/profilesave');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="submit">


<script>

$(document).ready(function(){

	$("#submit").click(function(){
		$("form").ajaxForm({
			success: function(){
				alert('hey');
			}
		}).submit();
	});
});
</script>
</body>
</html>