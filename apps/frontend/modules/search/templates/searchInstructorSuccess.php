<div id="ContentLeft">
	<div class="title">
		<h1>INSTRUCTORS / BLACK BELTS</h1>
	</div>
	<div>
		<div class="message">
			<?php echo sprintf('Your Search Results (%d)', count($pager->getResults()))?>
		</div>
		<div class="searchagain">
			<a href="<?php echo url_for('search/instructor'); ?>"><input
				type="button" name="Submit" value="SEARCH AGAIN" class="button" /> </a>
		</div>
	</div>
	<div class="table">
		<table width="100%">
			<tbody>
				<?php foreach ($pager->getResults() as $instructor) : ?>
				<tr>
					<td class="norightborder" width="5%"><a
						href="<?php echo url_for('@instructor?slug='.$instructor->getSlug()); ?>"><img
							src="uploads/<?php echo $instructor->getImageName(); ?>"
							width="52" height="70" /> </a></td>
					<td><a
						href="<?php echo url_for('@instructor?slug='.$instructor->getSlug()); ?>"><span
							class="label">NAME</span><br> <span class="value"><?php echo $instructor->getFullName(); ?>
						</span> </a></td>
					<td width="30%"><span class="label">COUNTRY</span><br> <span
						class="value"><?php echo $instructor->getSchool()->getCountry(); ?>
					</span>
					</td>
					<td width="30%"><a
						href="<?php echo url_for('@dojang?slug='.$instructor->getSchool()->getSlug()); ?>"><span
							class="label">DOJANG</span><br> <span class="value"><?php echo $instructor->getSchool(); ?>
						</span> </a>
					</td>
				</tr>
				<?php endforeach;?>
				<?php if ($pager->haveToPaginate()): ?>
				<tr>
					<td colspan="4" class="pagination"><?php include_partial('paginator', array('route' => 'instructors_list', 'pager' => $pager)); ?>
					</td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
<?php use_stylesheet('instructor'); ?>