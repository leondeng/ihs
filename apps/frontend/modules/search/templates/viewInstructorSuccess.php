<?php $school = $instructor->getSchool();?>
<div id="ContentLeft">
	<div id="Goback">
		<a href="<?php echo url_for('@instructors_list'); ?>">GO BACK TO
			SEARCH RESULTS</a>
	</div>
	<div id="Portrait">
		<img src="../<?php echo basename(sfConfig::get('sf_upload_dir')).'/'.$instructor->getImageName(); ?>" />
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
			<span class="label">STARTED HAPKIDO:</span><br> <span class="value"><?php echo $instructor->getYearStarted(); ?>
			</span>
		</div>
		<div class="">
			<span class="label">BELT GRADE:</span><br> <span class="value"><?php echo $instructor->getBeltGrade(); ?>
			</span>
		</div>
		<div class="">
			<span class="label">INSTRUCTOR AT:</span><br> 
			<span class="value">
			<?php if (is_null($school) : ?>
			  N/A
			<?php else : ?>
        <a href="<?php echo url_for('@dojang?slug='.$school->getSlug()); ?>">
          <?php echo sprintf('%s / %s / %s', $school->getSuburb(), $school->getCity(), $school->getCountry()); ?>
        </a>
			<?php endif; ?>
			</span><br> <span class="label">CLICK DOJANG TO GO TO LINK</span>
		</div>
		<?php include_partial('likeit', array('currentUrl' => $currentUrl)); ?>
	</div>
</div>
<?php use_stylesheet('instructor'); ?>