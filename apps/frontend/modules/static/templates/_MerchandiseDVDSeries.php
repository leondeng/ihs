<div id="ContentLeft">
	<div class="content_all">

		<h1>2010 IHA - HOW TO - DVD SERIES</h1>
	</div>
	<div class="img_left">
		<img src="images/Hapkido_Series_01.png" />
	</div>
	<div class="content_right">
		<p>Released on December 6th, 2009 the 2010 IHA "How To" DVD Series
			takes the already great training series to a new level!</p>
		<p>The new series covers all the IHA curriculum requirements from
			White Belt through to 4th Degree Black Belt. The DVDs are filmed In
			1080p using 4 cameras to ensure every technique is clear and easy to
			understand. The DVDs are filmed with the focus being on the
			instructor teaching the camera the techniques required for each
			level. Each technique is personally demonstrated and explained by
			Grandmaster Geoff J. Booth - 8th Degree Black Belt and Chief
			Instructor for the International Hapkido Alliance.</p>
		<p>
			<span class="abig">How To Series</span> - (4 DVDs with Over 7 Hours
			of footage!)
		</p>
		<p>All techniques for the IHA Belt levels of White through to 3rd
			Degree Black. Including Dan Bong and Cane techniques, plus Bonus
			material.</p>
		<p>
			<span class="abig">Cost: 235 AUD$</span> (Includes Postage &amp;
			Handling)
		</p>
		<p></p>
		<form method="post" action="https://www.paypal.com/cgi-bin/webscr">
			<table width="85px" border="0">
				<tbody>
					<tr>
						<td class="tc"><input type="hidden" value="_s-xclick" name="cmd">
							<input type="hidden" value="10314842" name="hosted_button_id"> <input
							type="image" border="0"
							alt="PayPal - The safer, easier way to pay online." name="submit"
							src="https://www.paypal.com/en_AU/i/btn/btn_buynow_LG.gif"><br> <img
							width="1" height="1" border="0"
							src="https://www.paypal.com/en_AU/i/scr/pixel.gif" alt=""></td>
						<td rowspan="2"><a id="linkMoviePopup" class="menustyle"> <img
								src="images/watchtrailer.png" alt="Trailer" width="259"
								height="107" />
						</a></td>
					</tr>
					<tr>
						<td><input type="image" border="0" src="images/paypalCC.png">
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>

</div>
<?php include_partial('KoreanWord'); ?>
<div id="VideoBox">
	<div>
		<object width="640" height="390">
			<param value="http://www.youtube.com/v/CXtBJUrXcMU&hl=en&fs=1"
				name="movie">
			<param value="true" name="allowFullScreen">
			<param value="always" name="allowscriptaccess">
			<embed width="640" height="390" allowfullscreen="true"
				allowscriptaccess="always" type="application/x-shockwave-flash"
				src="http://www.youtube.com/v/CXtBJUrXcMU&hl=en&fs=1">
		</object>
	</div>
	<div class="box_close">
		<a href="javascript:;" id="box_close" title="Close"><img
			src="images/sample_close.png" /> </a>
	</div>
</div>
<div class="clear"></div>
<?php use_javascript('jquery-1.7.2.min.js'); ?>
<script type="text/javascript">
$( "#linkMoviePopup" ).click(function(){
	$("#VideoBox").css('display', 'block');
	$("#Background").addClass('grey_background').css('height', $(document).height());
});

$( "#box_close" ).click(function(){
	$("#VideoBox").css('display', 'none');
	$("#Background").removeClass('grey_background').css('height', 0);
});
</script>
