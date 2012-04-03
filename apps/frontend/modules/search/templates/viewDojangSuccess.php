<?php use_helper(/* 'Javascript', */'GMap') ?>
<?php $instructorSlug = Doctrine_Inflector::urlize($dojang->getLeadingInstructor());?>
<div id="ContentLeft">
	<div id="DojangTitle">
		<h2>
			<?php echo $dojang->getCountry(); ?>
		</h2>
		<div class="name">
			<?php echo strtoupper(sprintf('%s - %s', $dojang->getCity(), $dojang->getName())); ?>
		</div>
	</div>
	<div id="DojangDetails">
		<div class="leading">
			<span class="label">Leading Instructor:</span><br> <span
				class="value"><a
				href="<?php echo url_for('@instructor?slug='.$instructorSlug); ?>">
					<?php echo $dojang->getLeadingInstructor(); ?>
			</a> </span><br> <span class="label">click Name to go to Instructors
				page</span>
		</div>
		<div class="address">
			<span class="value"><?php echo $dojang->getAddr1(); ?> </span> <br> <span
				class="value"><?php echo $dojang->getAddr2(); ?> </span>
		</div>
		<div class="contactdetails">
			<span class="label">Phone: </span><span class="value"><?php echo $dojang->getPhone(); ?>
			</span><br> <span class="label">Website: </span><a
				href="http://<?php echo $dojang->getWebsite(); ?>"><span
				class="value"><?php echo $dojang->getWebsite(); ?> </span> </a><br>
			<span class="label">Email: </span><a
				href="mailto:<?php echo $dojang->getEmailAddress(); ?>"><span
				class="value"><?php echo $dojang->getEmailAddress(); ?> </span> </a>
		</div>
		<div class="classtime">
			<span class="value"><xmp>Class Times: <?php echo $dojang->getClassTime(); ?></xmp>
			</span>
		</div>
	</div>
	<div id="Map">
		<!-- <img
			src="http://maps.googleapis.com/maps/api/staticmap?center=20+Forest+Road,Hurstville&zoom=15&size=512x512&maptype=roadmap
&sensor=false"
			width="320" height="320" /> -->
        <?php include_map($gMap, array('width'=>'320px','height'=>'320px')); ?>
	</div>
</div>
<?php use_stylesheet('dojang'); ?>
<?php include_map_javascript($gMap); ?>
