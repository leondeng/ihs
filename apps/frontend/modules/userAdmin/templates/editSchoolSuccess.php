<form action="<?php echo url_for('@edit_school') ?>" method="post">
	<?php echo $form->renderHiddenFields() . $form->renderGlobalErrors(); ?>
	<div class="box edit">
		<div class="title">Welcome Dojang,</div>
		<div class="inner">
			<div class="column">
				<?php echo $form['name']->renderRow(); ?>
				<?php echo $form['country']->renderRow(); ?>
				<?php echo $form['city']->renderRow(); ?>
				<?php echo $form['suburb']->renderRow(); ?>
				<?php echo $form['addr1']->renderRow(); ?>
				<?php echo $form['addr2']->renderRow(); ?>
				<?php echo $form['phone']->renderRow(); ?>
				<?php echo $form['email_address']->renderRow(); ?>
				<?php echo $form['website']->renderRow(); ?>
			</div>
			<div class="column">
				<?php echo $form['leading_instructor']->renderRow(); ?>
				<?php echo $form['class_time']->renderRow(); ?>
			</div>
		</div>
		<div class="clear"></div>
		<div class="button_cancel">
			<a href="<?php echo url_for('@userAdmin'); ?>"><input type="button"
				name="Submit" value="Cancel" class="button" /> </a>
		</div>
		<div class="button_edit">
			<input class="button" value="Submit" type="submit" />
		</div>
		<div class="terms">
			By submitting you agree to our <a href="<?php echo url_for('@static?content=term_of_use'); ?>">Terms of Use</a>.<br>The Headquarter will
			evaluate your details before they appear online.
		</div>
	</div>
	<div class="img_edit">
		<?php echo content_tag('img', '', array('src' => 'images/blackbelt.png', 'width' => 273, 'height' => 524)); ?>
	</div>
	
</form>
<div class="clear"></div>
