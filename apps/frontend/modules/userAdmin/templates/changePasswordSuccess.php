<form action="<?php echo url_for('@change_password') ?>" method="post">
	<div class="box login">
		<div class="title_login">
			<?php echo $username; ?>, please change your password.
		</div>
		<div class="inner_login">
			<?php echo $form; ?>
		</div>
		<?php include_partial('buttons'); ?>
	</div>
</form>
