<?php echo $form->renderFormTag(url_for('search_dojang')); ?>
<div class="box dojang">
	<div class="title_dojang">
		<h2>DOJANG</h2>
	</div>
	<div class="inner_dojang">
		<?php echo $form['byName']->renderRow(); ?>
	</div>
	<input type="submit" />
</div>
<div class="img_right">
	<?php echo content_tag('img', '', array('src' => 'images/blackbelt.png', 'width' => 195, 'height' => 375)); ?>
</div>
</form>
<?php use_stylesheet('dojang'); ?>