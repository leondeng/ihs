<div class="Navigation">
	<?php
	$arr = sfConfig::get('app_menus_admin_menu');
	$menu = ioMenuItem::createFromArray($arr);
	echo $menu->render();
	?>
</div>
<div class="Navigation NavigationRight">
	<?php
	$menu = new ioMenu();
	$menu->addChild('WIKIKIDO', '@static?content=wikikido');
	echo $menu->render();
	?>
</div>
