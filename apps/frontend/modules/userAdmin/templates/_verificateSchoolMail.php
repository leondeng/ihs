<p>
	User <?php echo $user->getUserName(); ?> updated dojang with the following information:
</p>
<p>
	Dojang Name:
	<?php echo $school->getName(); ?>
	<br>Country:
	<?php echo $school->getCountry(); ?>
	<br>City:
	<?php echo $school->getCity(); ?>
	<br>Suburb:
	<?php echo $school->getSuburb(); ?>
	<br>Addr:
	<?php echo $school->getAddr1(); ?>&nbsp;<?php echo $school->getAddr2(); ?>
	<br>Phone:
	<?php echo $school->getPhone(); ?>
	<br>Email Address:
	<?php echo $school->getEmailAddress(); ?>
	<br>Website:
	<?php echo $school->getWebsite(); ?>
	<br>Leading Instructor:
	<?php echo $school->getLeadingInstructor(); ?>
	<br>Class Time:<br>
	<xmp><?php echo $school->getClassTime(); ?></xmp>
	</p>
<p>
	<a href="<?php echo $verificationUrl; ?>">Accept</a>&nbsp;
    <a href="mailto:<?php echo $user->getEmailAddress(); ?>">Deny</a>
</p>
