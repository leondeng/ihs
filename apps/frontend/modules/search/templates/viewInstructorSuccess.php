<?php $school = $instructor->getSchool();?>
<div id="ContentLeft">
	<div id="Portrait">
		<img src="../uploads/<?php echo $instructor->getImageName(); ?>" />
	</div>
	<div id="Profile">
		<h3>INSTRUCTOR</h3>
		<div class="name">
			<?php echo sprintf('%s %s', $instructor->getTitle(), $instructor->getFirstName()); ?>
		</div>
		<div class="philosophy">
			&ldquo;
			<?php echo $instructor->getPhilosophy(); ?>
			&rdquo;
		</div>
		<div class="">
			<span class="label">DOB:</span><br> <span class="value"><?php echo $instructor->getDateTimeObject('dob')->format('d. M Y'); ?>
			</span>
		</div>
		<div class="">
			<span class="label">STARTED HAPKIDO:</span><br> <span class="value"><?php echo $instructor->getDateTimeObject('year_started')->format('Y'); ?>
			</span>
		</div>
		<div class="">
			<span class="label">BELT GRADE:</span><br> <span class="value"><?php echo $instructor->getBeltGrade(); ?>
			</span>
		</div>
		<div class="">
			<span class="label">INSTRUCTOR AT:</span><br> <span class="value"><a
				href="<?php echo url_for('@dojang?slug='.$school->getSlug()); ?>"> <?php echo sprintf('%s / %s / %s', $school->getSuburb(), $school->getCity(), $school->getCountry()); ?>
			</a> </span><br> <span class="label">CLICK DOJANG TO GO TO LINK</span>
		</div>
	</div>
</div>
<?php use_stylesheet('instructor'); ?>