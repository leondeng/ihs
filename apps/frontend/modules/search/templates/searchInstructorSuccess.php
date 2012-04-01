<div id="ContentLeft">
	<div class="title">
		<h1>INSTRUCTORS / BLACK BELTS</h1>
	</div>
	<div>
		<div class="message">
			<?php echo sprintf('Your Search Results (%d)', count($instructors))?>
		</div>
		<div class="searchagain">
			<input type="button" name="Submit" value="SEARCH AGAIN"
				class="button"
				onclick="location.href='<?php echo url_for('search/instructor'); ?>'" />
		</div>
	</div>
	<div class="table">
		<table width="100%">
			<tbody>
				<?php foreach ($instructors as $instructor) : ?>
				<tr>
					<td width="5%"><a href=""><img
							src="uploads/<?php echo $instructor->getImageName(); ?>"
							width="52" height="70" /> </a>
					</td>
					<td class="rightborder"><a href=""><span class="label">NAME</span><br>
							<span class="value"><?php echo $instructor->getFullName(); ?>
						</span> </a></td>
					<td class="rightborder" width="30%"><span class="label">COUNTRY</span><br>
						<span class="value"><?php echo $instructor->getSchool()->getCountry(); ?>
					</span></td>
					<td class="rightborder" width="30%"><span class="label">DOJANG</span><br>
						<span class="value"><?php echo $instructor->getSchool(); ?>
					</span></td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>
<?php use_stylesheet('instructor'); ?>