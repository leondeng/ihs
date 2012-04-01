<div id="ContentLeft">
	<div class="title">
		<h1>DOJANG</h1>
	</div>
	<div>
		<div class="message">
			<?php echo sprintf('Your Search Results (%d)', count($dojangs))?>
		</div>
		<div class="searchagain">
			<input type="button" name="Submit" value="SEARCH AGAIN"
				class="button"
				onclick="location.href='<?php echo url_for('search/dojang'); ?>'" />
		</div>
	</div>
	<div class="table">
		<table width="100%">
			<tbody>
				<?php foreach ($dojangs as $dojang) : ?>
				<tr>
					<td class="leftborder"><a href=""><span class="label">NAME</span><br>
							<span class="value"><?php echo $dojang->getName(); ?> </span>
					</a></td>
					<td width="25%"><a href=""><span class="label">CITY</span><br> <span
							class="value"><?php echo $dojang->getCity(); ?> </span> </a>
					</td>
					<td width="25%"><span class="label">COUNTRY</span><br> <span
						class="value"><?php echo $dojang->getCountry(); ?> </span>
					</td>
					<td width="25%"><span class="label">LEADING INSTRUCTOR</span><br> <span
						class="value"><?php echo $dojang->getLeadingInstructor(); ?> </span>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>
<?php use_stylesheet('dojang'); ?>