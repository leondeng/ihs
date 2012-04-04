<div id="Pagination">
	<div class="first">
		<?php echo (1 == $pager->getPage()) ? 'first' : link_to('first', url_for($route, array('page' => $pager->getFirstPage()))); ?>
	</div>

	<div>
		<?php $links = $pager->getLinks(); foreach ($links as $page): ?>
		<div class="number">
			<?php echo ($page == $pager->getPage()) ? $page : link_to($page, url_for($route, array('page' => $page))); ?>
		</div>
		<?php endforeach; ?>

	</div>

	<div class="last">
		<?php echo ($pager->getLastPage() == $pager->getPage()) ? 'last' : link_to('last', url_for($route, array('page' => $pager->getLastPage()))); ?>
	</div>
</div>
