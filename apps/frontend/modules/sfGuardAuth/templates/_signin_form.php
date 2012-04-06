<?php use_helper('I18N') ?>

<form action="<?php echo url_for('@sf_guard_signin') ?>"
	method="post">
	<div class="box login">
		<div class="title_login">
			Please login to create or update your profile.
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

	<!-- <table>
    <tbody>
      <?php echo $form ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
          <input type="submit" value="<?php //echo __('Signin', null, 'sf_guard') ?>" />
          
          <?php //$routes = $sf_context->getRouting()->getRoutes() ?>
          <?php //if (isset($routes['sf_guard_forgot_password'])): ?>
            <a href="<?php //echo url_for('@sf_guard_forgot_password') ?>"><?php //echo __('Forgot your password?', null, 'sf_guard') ?></a>
          <?php //endif; ?>

          <?php //if (isset($routes['sf_guard_register'])): ?>
            &nbsp; <a href="<?php //echo url_for('@sf_guard_register') ?>"><?php //echo __('Want to register?', null, 'sf_guard') ?></a>
          <?php //endif; ?>
        </td>
      </tr>
    </tfoot>
  </table> -->
</form>
