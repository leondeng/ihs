
<p>
	If you did NOT request an account with
	<?php echo $site; ?>
	, DO NOTHING.
</p>
<p>
	If you requested an account under
	<?php echo $site; ?>
	with the following information:
</p>
<p>
	Username:
	<?php echo $user->getUserName(); ?>
	<br> Email:
	<?php echo $user->getEmailAddress(); ?>
</p>
<p>then please click on (or cut and paste into your browser window) this
	link to verify your acceptance and create your account</p>
<p>
	<?php echo $activationUrl; ?>
</p>
<p>Thank you!</p>
<p>
	International Hapkido Alliance -
	<?php echo $site; ?>
</p>
