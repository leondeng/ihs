<?php echo $form->renderFormTag(url_for('@dojang_list')); ?>
<div class="box search dojang">
	<div class="title_dojang">
		<h2>DOJANG</h2>
	</div>
	<div class="inner_dojang">
		<div class="column">
			<?php echo $form['byName']->renderRow(); ?>
			<?php echo $form['byCity']->renderRow(); ?>
		</div>
		<div class="column">
		    <?php echo $form['byInstructor']->renderRow(); ?>
		    <?php echo $form['byCountry']->renderRow(); ?>
		</div>
	</div>
		<div class="button_left">
			<input class="button" value="Search" type="submit" />
		</div>
</div>
<div class="img_right">
	<?php echo content_tag('img', '', array('src' => 'images/blackbelt.png', 'width' => 195, 'height' => 375)); ?>
</div>
</form>
<?php use_stylesheet('dojang'); ?>