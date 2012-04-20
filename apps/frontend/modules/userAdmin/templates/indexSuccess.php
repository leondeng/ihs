<div id="ContentLeft">
	<div class="title">
		<h1>
			<?php echo $username; ?>
			- User Administration
		</h1>
	</div>
	<div>
		<a href="<?php echo url_for('@change_password'); ?>">Change Password</a><br>
		<a href="<?php echo url_for('@change_email'); ?>">Change Email Address</a><br>
		
		
		<a href="<?php echo url_for('@edit_profile'); ?>">Update Profile</a>
		<?php echo sprintf(' - %s', $profileStatus); ?><br>
		
		<a href="<?php echo url_for('@edit_school'); ?>">Update Dojang</a>
		<?php echo sprintf(' - %s', $schoolStatus); ?><br> 
		<a href="<?php echo url_for('@sf_guard_signout'); ?>">Logout</a>
	</div>
</div>
