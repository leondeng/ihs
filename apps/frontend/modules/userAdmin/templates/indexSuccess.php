<div id="ContentLeft">
	<?php if ($sf_user->hasFlash('notice')): ?>
	<div class="flash_notice">
		<?php echo $sf_user->getFlash('notice') ?>
	</div>
	<?php endif ?>

	<?php if ($sf_user->hasFlash('error')): ?>
	<div class="flash_error">
		<?php echo $sf_user->getFlash('error') ?>
	</div>
	<?php endif ?>
	<div class="title">
		<h1>
			<?php echo $username; ?>
			- User Administration
		</h1>
	</div>
	<div>
		<a href="<?php echo url_for('@change_password'); ?>">Change your password</a><br>
		<a href="<?php echo url_for('@change_email'); ?>">Change your email address</a><br>
		<a href="<?php echo url_for('@edit_profile'); ?>">Edit your profile</a><br>
		<a href="<?php echo url_for('@edit_school'); ?>">Edit school profile</a><br>
		<a href="<?php echo url_for('@sf_guard_signout'); ?>">Logout</a>
	</div>
</div>
