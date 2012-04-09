<form action="<?php echo url_for('@change_email') ?>" method="post">
	<div class="box login">
		<div class="title_login">
			<?php echo sprintf('%s, please input your new email address.', $username); ?>
		</div>
		<div class="inner_login">
			<?php echo $form; ?>
		</div>
		<?php include_partial('buttons'); ?>
	</div>
</form>
