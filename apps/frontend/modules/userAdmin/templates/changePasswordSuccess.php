<form action="<?php echo url_for('@change_password') ?>" method="post">
	<div class="box login">
		<div class="title_login">
			<?php echo $username; ?>, please change your password.
		</div>
		<div class="inner_login">
			<?php echo $form; ?>
			<div class="button_cancel">
				<a href="<?php echo url_for('@userAdmin'); ?>"><input
					type="button" name="Submit" value="Cancel" class="button" />
				</a>
			</div>
			<div class="button_login">
				<input class="button" value="Confirm" type="submit" />
			</div>
		</div>
	</div>
</form>
