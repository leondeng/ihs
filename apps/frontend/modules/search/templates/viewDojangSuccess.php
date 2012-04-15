<?php use_helper(/* 'Javascript', */'GMap') ?>
<?php $instructorSlug = Doctrine_Inflector::urlize($dojang->getLeadingInstructor());?>
<div id="ContentLeft">
	<div id="Goback">
		<a href="<?php echo url_for('@dojang_list'); ?>">GO BACK TO
			SEARCH RESULTS</a>
	</div>
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
			<span class="label">Leading Instructor</span><br> <span
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
			<table>
				<tbody>
					<tr>
						<td><span class="label">Phone: </span></td>
						<td><span class="value"><?php echo $dojang->getPhone(); ?> </span><br>
						</td>
					</tr>
					<tr>
						<td><span class="label">Website: </span></td>
						<td><a href="http://<?php echo $dojang->getWebsite(); ?>"><span
								class="value"><?php echo $dojang->getWebsite(); ?> </span> </a><br>
						</td>
					</tr>
					<tr>
						<td><span class="label">Email: </span></td>
						<td><a href="mailto:<?php echo $dojang->getEmailAddress(); ?>"><span
								class="value"><?php echo $dojang->getEmailAddress(); ?> </span>
						</a></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="classtime">
			<span class="label">Class Times:</span> <span class="value"><xmp><?php echo $dojang->getClassTime(); ?></xmp>
			</span>
		</div>
		<?php include_partial('likeit', array('currentUrl' => $currentUrl)); ?>
	</div>
	<div id="Map">
		<?php include_map($gMap, array('width'=>'320px','height'=>'320px')); ?>
	</div>
</div>
<?php use_stylesheet('dojang'); ?>
<?php include_map_javascript($gMap); ?>
