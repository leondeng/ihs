<div id="ContentLeft">
	<div class="title">
		<h1>DOJANG</h1>
	</div>
	<div>
		<div class="message">
			<?php echo sprintf('Your Search Results (%d)', count($pager->getResults()))?>
		</div>
		<div class="searchagain">
			<a href="<?php echo url_for('search/dojang'); ?>"><input
				type="button" name="Submit" value="SEARCH AGAIN" class="button" /> </a>
		</div>
	</div>
	<div class="table">
		<table width="100%">
			<tbody>
				<?php foreach ($pager->getResults() as $dojang) : ?>
				<?php $instructorSlug = Doctrine_Inflector::urlize($dojang->getLeadingInstructor()); ?>
				<tr>
					<td class="leftborder"><a
						href="<?php echo url_for('@dojang?slug='.$dojang->getSlug()); ?>"><span
							class="label">NAME</span><br> <span class="value"><?php echo $dojang->getName(); ?>
						</span> </a>
					</td>
					<td width="25%"><a href=""><span class="label">CITY</span><br> <span
							class="value"><?php echo $dojang->getCity(); ?> </span> </a></td>
					<td width="25%"><span class="label">COUNTRY</span><br> <span
						class="value"><?php echo $dojang->getCountry(); ?> </span></td>
					<td width="25%"><a
						href="<?php echo url_for('@instructor?slug='.$instructorSlug); ?>"><span
							class="label">LEADING INSTRUCTOR</span><br> <span class="value"><?php echo $dojang->getLeadingInstructor(); ?>
						</span> </a>
					</td>
				</tr>
				<?php endforeach;?>
				<?php if ($pager->haveToPaginate()): ?>
				<tr>
					<td colspan="4" class="pagination"><?php include_partial('paginator', array('route' => 'dojang_list', 'pager' => $pager)); ?>
					</td>
				</tr>
				<?php endif; ?>

			</tbody>
		</table>
	</div>
</div>
<?php use_stylesheet('dojang'); ?>