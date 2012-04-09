<form action="<?php echo url_for('@edit_profile') ?>" method="post">
	<?php echo $form->renderHiddenFields() . $form->renderGlobalErrors(); ?>
	<div class="box profile">
		<div class="title"><div class="row">Welcome, </div><?php echo $form['is_instructor']->renderRow(); ?></div>
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
				<div class="terms">Click <a href="">here</a> for image guidelines.</div>
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
			By submitting you agree to our <a href="<?php echo url_for('@static?content=term_of_use'); ?>">Terms of Use</a>.<br>The Headquarter will
			evaluate your details before they appear online.
		</div>
	</div>
	<div class="img_left img_profile">
		<?php echo content_tag('img', '', array('src' => 'images/BlackBelt_Standing.png', 'width' => 220, 'height' => 532)); ?>
	</div>
</form>
<div class="clear"></div>
