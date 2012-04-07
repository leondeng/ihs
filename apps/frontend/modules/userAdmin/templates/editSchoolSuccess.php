<form action="<?php echo url_for('@edit_school') ?>" method="post">
	<?php echo $form->renderHiddenFields() . $form->renderGlobalErrors(); ?>
	<div class="box edit_dojang">
		<div class="title_login">Welcome Dojang,</div>
		<div class="inner_dojang">
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
		<div class="button_cancel">
			<a href="<?php echo url_for('@userAdmin'); ?>"><input type="button"
				name="Submit" value="Cancel" class="button" /> </a>
		</div>
		<div class="button_login">
			<input class="button" value="Submit" type="submit" />
		</div>
	</div>
	<div class="img_right">
		<?php echo content_tag('img', '', array('src' => 'images/blackbelt.png', 'width' => 300, 'height' => 576)); ?>
	</div>
</form>
