<p>
	User <?php echo $user->getUserName(); ?> updated profile with the following information:
</p>
<p>
	FirstName:
	<?php echo $profile->getFirstName(); ?>
	<br>LastName:
	<?php echo $profile->getLastName(); ?>
	<br>Title:
	<?php echo $profile->getTitle(); ?>
	<br>Philosophy:
	<?php echo $profile->getPhilosophy(); ?>
	<br>DOB:
	<?php echo $profile->getDateTimeObject('dob')->format('d. M Y'); ?>
	<br>Year Started:
	<?php echo $profile->getYearStarted(); ?>
	<br>Belt Grade:
	<?php echo $profile->getBeltGrade(); ?>
	<br>Is Instructor:
	<?php echo $profile->getIsInstructor()?'Yes':'No'; ?>
	<br>Dojang:
	<?php echo $profile->hasSchool()? $profile->getDojang()->getName() : 'N/A'; ?>
	<br>Image:<br>
	<img src="<?php echo $img_path.'/'.$profile->getImageName(); ?>" />
	</p>
<p>
	<a href="<?php echo $verificationUrl; ?>">Accept</a>&nbsp;
    <a href="mailto:<?php echo $user->getEmailAddress(); ?>">Deny</a>
</p>
