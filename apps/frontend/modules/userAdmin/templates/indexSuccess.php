<div id="ContentLeft">
	<div class="title">
		<h1>
			<?php echo $username; ?>
			- User Administration
		</h1>
	</div>
	<div>
		Password <a href="<?php echo url_for('@change_password'); ?>">change</a><br>
		Email Address <a href="<?php echo url_for('@change_email'); ?>">change</a><br>
		Personal Profile
		<?php echo $profile->getIsPublishable() ? '' : '(under verification)'; ?>
		<a href="<?php echo url_for('@edit_profile'); ?>">edit</a><br> Dojang
		Profile
		<?php echo $school->getIsPublishable() ? '' : '(under verification)'; ?>
		<a href="<?php echo url_for('@edit_school'); ?>">edit</a><br> <a
			href="<?php echo url_for('@sf_guard_signout'); ?>">Logout</a>
	</div>
</div>
