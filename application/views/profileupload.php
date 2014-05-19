<div class="row">
	<div class="span10">
		<h3 class="module-title">My Profile </h3>
	</div>
</div>
<div id="profile-upload" >
	<div class="row">
		<div class="span9" style="padding:10px;">
			
			<?php echo form_open_multipart('post/do_upload');?>
			<div class="row">
					<div class="span2" >
					<img src="<?echo base_url()."uploads/".$picture;?>" class="img-circle" style="width:200px; height:175px;" >		<br><br>
					<input id="picture" name="userfile" class="input-small" type="file">
					<input id="id" type="hidden" value="<?php echo $id;?>">
				</div>
			</div>

		</div>
	</div>
	<div class="row">
	<div class="span9" style="padding-left:30px; padding-bottom:20px;">
		<a class="btn btn-inverse" id="upload-btn">Upload</a> <a  class="cancel-btn btn btn-danger ">Cancel</a>
	</div>
</div>
</div>
<script src="<?echo base_url();?>assets/js/jquery.form.js"></script>
<script src="<?echo base_url();?>assets/js/refresh.js"></script>
<script>

		$("#upload-btn").click(function(){
				$("#profile-upload").find("form").ajaxForm({

					success:  function(){
						var id = $("#id").val();
						profileupload(id);
						 $.pnotify({
                title: 'Success',
                text: 'You have successfully updated your profile picture',
                type: 'success'

              });
					}
				}).submit();
			//	window.location.href="/kamahalan/index.php/post/profilesave";

				//alert($("#picture").val());
				//alert($("#profile-form").serialize());
			});
</script>