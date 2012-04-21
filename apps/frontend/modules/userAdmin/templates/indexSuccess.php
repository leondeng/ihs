<div id="ContentLeft">
	<div class="title">
		<h1>
			Welcome,
			<?php echo $username; ?>
			- Account Management
		</h1>
	</div>
	<div>
		<a href="<?php echo url_for('@change_email'); ?>">Change Email Address</a><br>
		<a href="<?php echo url_for('@change_password'); ?>">Change Password</a><br>

		<a href="<?php echo url_for('@edit_profile'); ?>"> <?php echo $profileIsEmpty ? 'Create' : 'Edit'; ?>
			Profile
		</a><br>

		<?php if (!$profileIsEmpty && !$profileIsInVerification) { ?>
		<a href="<?php echo url_for('@edit_school'); ?>"> <?php echo $schoolIsEmpty ? 'Create a new' : 'Edit'; ?>
			Dojang
		</a><br>
		<?php } ?>

		<a href="<?php echo url_for('@sf_guard_signout'); ?>">Logout</a>
	</div>
</div>
