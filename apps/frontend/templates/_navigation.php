<div class="Navigation">
	<?php
	$arr = sfConfig::get('app_menus_admin_menu');
	$menu = ioMenuItem::createFromArray($arr);
	echo $menu->render();
	?>
</div>
<div class="Navigation NavigationRight">
	<ul class="menu">
		<li class="first last"><a href="wikikido/index.php" target="_blank">WIKIKIDO</a>
		</li>
	</ul>
</div>
