<div id="ContentLeft">
	<div class="title">
		<h1>
			<?php echo $username; ?>
			- User Administration
		</h1>
	</div>
	<div>
		<a href="<?php echo url_for('@change_password'); ?>">Change password</a><br>
		<a href="<?php echo url_for('@change_email'); ?>">Change email address</a><br>
		<a href="<?php echo url_for('@edit_profile'); ?>">Edit personal profile</a><br>
		<a href="<?php echo url_for('@edit_school'); ?>">Edit dojang profile</a><br>
		<a href="<?php echo url_for('@sf_guard_signout'); ?>">Logout</a>
	</div>
</div>
