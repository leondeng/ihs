<?php use_helper('I18N') ?>

<form action="<?php echo url_for('@sf_guard_signin') ?>"
	method="post">
	<div class="box login">
		<div class="title_login">
			Please login to manage your account.
		</div>
		<div class="inner_login"><?php echo $form; ?>
			<!-- <div class="column">
				<?php //echo $form['username']->renderRow(); ?>
				<?php //echo $form['password']->renderRow(); ?>
			</div> -->
			<div class="button_login">
				<input class="button" value="Login" type="submit" />
			</div>
		</div>
	</div>
	<div class="img_login">
		<?php echo content_tag('img', '', array('src' => 'images/Jab_01_small.jpg', 'width' => 244, 'height' => 320)); ?>
	</div>
	<div class="img_bottom">
	</div>
    <div class="clear"></div>
	<div class="links_login terms">
		<?php $routes = $sf_context->getRouting()->getRoutes() ?>
		<?php if (isset($routes['sf_guard_forgot_password'])): ?>
		<a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?>
		</a>
		<?php endif; ?>

		<?php if (isset($routes['sf_guard_register'])): ?>Need an account? Please
		<a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Register', null, 'sf_guard') ?>.
		</a>
		<?php endif; ?>
	</div>
</form>
