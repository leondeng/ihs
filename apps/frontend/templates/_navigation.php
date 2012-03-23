<div class="Navigation">
	<?php
	$arr = sfConfig::get('app_menus_admin_menu');
	$menu = ioMenuItem::createFromArray($arr);
	echo $menu->render();
	?>
</div>
