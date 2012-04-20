<p>
	User <?php echo $profile->getFullName(); ?> updated profile	with the following information:
</p>
<p>
	FirstName:
	<?php echo $profile->getFirstName(); ?>
	<br>LastName:
	<?php echo $profile->getLastName(); ?>
	<br>Title:
	<?php echo $profile->getTitle(); ?>
</p>
<p>
	<a href="<?php echo $verificationUrl; ?>">Accept</a>
</p>
<p>
    <a href="mailt:<?php $user->getEmailAddress(); ?>">Deny</a>
</p>
