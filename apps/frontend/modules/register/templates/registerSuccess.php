<?php echo $form->renderFormTag(url_for('@sf_guard_register')) ?>
<div class="box register">
	<div class="title_login">Please register to create your account.</div>
	<div class="inner_login">
		<?php echo $form; ?>
		<div class="button_login">
			<input class="button" value="Register" type="submit" />
		</div>
	</div>
</div>
<div class="img_register">
	<?php echo content_tag('img', '', array('src' => 'images/Register_01.jpg', 'width' => 314, 'height' => 440)); ?>
</div>
<div class="clear"></div>
</form>
