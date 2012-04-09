<form action="<?php echo url_for('@edit_profile') ?>" method="post">
	<?php echo $form->renderHiddenFields() . $form->renderGlobalErrors(); ?>
	<div class="box profile">
		<div class="title">
			<div class="row">Welcome,</div>
			<?php echo $form['is_instructor']->renderRow(); ?>
		</div>
		<div class="inner">
			<div class="column">
				<?php echo $form['title']->renderRow(); ?>
				<?php echo $form['first_name']->renderRow(); ?>
				<?php echo $form['last_name']->renderRow(); ?>
				<?php echo $form['philosophy']->renderRow(); ?>
			</div>
			<div class="column">
				<?php echo $form['dob']->renderRow(); ?>
				<?php echo $form['year_started']->renderRow(); ?>
				<?php echo $form['belt_grade']->renderRow(); ?>
				<?php echo $form['idSchool']->renderRow(); ?>
				<?php echo $form['image_name']->renderRow(); ?>
				<div class="terms">
					Click <a href="#" id="sample_open">here</a> for image guidelines.
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="buttons">
			<div class="button_item">
				<a href="<?php echo url_for('@userAdmin'); ?>"><input type="button"
					name="Submit" value="Cancel" class="button" /> </a>
			</div>
			<div class="button_item">
				<input class="button" value="Submit" type="submit" />
			</div>
		</div>
		<div class="terms">
			By submitting you agree to our <a
				href="<?php echo url_for('@static?content=term_of_use'); ?>">Terms
				of Use</a>.<br>The Headquarter will evaluate your details before
			they appear online.
		</div>
	</div>
	<div class="img_left img_profile">
		<?php echo content_tag('img', '', array('src' => 'images/BlackBelt_Standing.png', 'width' => 220, 'height' => 532)); ?>
	</div>
	<div id="SamplePopup">
		<div class="sample_image">
			<?php echo content_tag('img', '', array('src' => 'images/jimmytrith.png', 'width' => 274, 'height' => 370)); ?>
		</div>
		<div class="sample_guidelines">
			<div class="guidelines_title">Sample Image</div>
			<div class="guidelines_terms">
				To keep the look-and-feel of the site consistent, we ask you follow
				these few guidelines to upload your photo
				<ul class="">
					<li>Size: 430 pixel wide x 580 pixel high</li>
					<li>Background white, no shadow or patterns</li>
					<li>Use soft lighting, no hard shadows</li>
					<li>Fill the frame with similar pose as shown on the left, cross
						arms, friendly, but no smile</li>
				</ul>
			</div>
		</div>
		<div class="sample_close">
			<img src="images/sample_close.png" id="sample_close" />
		</div>
	</div>
</form>
<div class="clear"></div>
<?php use_stylesheet('sample_image'); ?>
<?php use_javascript('jquery-1.7.2.min.js'); ?>
<script type="text/javascript">
$( "#sample_close" ).click(function(){
	$("#SamplePopup").css('display', 'none');
});

$( "#sample_open" ).click(function(){
	$("#SamplePopup").css('display', 'block');
});
</script>
