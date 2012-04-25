<div id="ContentLeft">
	<div class="title">
		<h1>
			Welcome,
			<?php echo $username; ?>
			- Account Management
		</h1>
	</div>
	<div>
		<p>
			<a href="<?php echo url_for('@change_email'); ?>">Change Email
				Address</a>
		</p>
		<p>
			<a href="<?php echo url_for('@change_password'); ?>">Change Password</a>
		</p>
		<p>
			<a href="<?php echo url_for('@edit_profile'); ?>"> <?php echo $profileIsEmpty ? 'Create' : 'Edit'; ?>
				Profile
			</a>
		</p>
		<?php if (!$profileIsEmpty && !$profileIsInVerification) { ?>
		<p>
			<a href="<?php echo url_for('@edit_school'); ?>"> <?php echo $schoolIsEmpty ? 'Create a new' : 'Edit'; ?>
				Dojang
			</a>
		</p>
		<?php } ?>
		<p>
			<a href="<?php echo url_for('@sf_guard_signout'); ?>">Logout</a>
		</p>
	</div>
</div>
