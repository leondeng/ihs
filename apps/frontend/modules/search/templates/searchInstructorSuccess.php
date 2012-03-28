<?php echo $form->renderFormTag(url_for('search_instructor')); ?>
<div class="box">
	<div class="title">
		<h2>INSTRUCTORS / BLACK BELTS</h2>
	</div>
	<div class="inner">
		<?php echo $form['byName']->renderRow(); ?>
	</div>
	<input type="submit" />
</div>
<div class="img_left">
	<?php echo content_tag('img', '', array('src' => 'images/BlackBelt_Standing.png', 'width' => 200, 'height' => 484)); ?>
</div>
</form>
<?php use_stylesheet('instructor'); ?>