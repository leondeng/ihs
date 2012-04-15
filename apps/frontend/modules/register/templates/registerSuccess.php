<?php echo $form->renderFormTag(url_for('@sf_guard_register')) ?>
	<div class="box register">
		<div class="title_login">
			Please register to create an accoount.
		</div>
		<div class="inner_login"><?php echo $form; ?>
			<div class="button_login">
				<input class="button" value="Register" type="submit" />
			</div>
		</div>
	</div>
</form>