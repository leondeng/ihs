<?php echo $form->renderFormTag(url_for('@instructors_list')); ?>
<div class="box search">
	<div class="title">
		<h2>INSTRUCTORS / BLACK BELTS</h2>
	</div>
	<div class="inner">
		<div class="column">
			<?php echo $form['byName']->renderRow(); ?>
			<?php echo $form['byBeltGrade']->renderRow(); ?>
			<?php echo $form['instructorOnly']->renderRow(); ?>
		</div>
		<div class="column">
		    <?php echo $form['byDojang']->renderRow(); ?>
		    <?php echo $form['byCountry']->renderRow(); ?>
		</div>
		<div class="button_right">
			<input class="button" value="Search" type="submit" />
		</div>
	</div>
</div>
<div class="img_left">
	<?php echo content_tag('img', '', array('src' => 'images/BlackBelt_Standing.png', 'width' => 200, 'height' => 484)); ?>
</div>
</form>
<?php use_stylesheet('instructor'); ?>