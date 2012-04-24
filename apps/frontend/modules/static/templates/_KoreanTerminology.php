<?php
$path = sfConfig::get( 'sf_root_dir' ) . '/apps/frontend/modules/static/config/app.yml';
include ( sfContext::getInstance()->getConfigCache()->checkConfig($path));

$sections = sfConfig::get('app_KoreanTerms_sections');
?>
<div id="ContentLeft" class="alignleft">
	<div class="page_title">Korean Terminology</div>
	<?php foreach($sections as $section) :?>
	<div class="term_section  column<?php echo $section['column']; ?>">
		<div class="section_title">
			<?php echo $section['label']; ?>
		</div>
		<div class="section_body">
			<?php foreach($section['terms'] as $key => $term) : ?>
			<div class="column">
				<dl>
					<dt>
						<?php echo $key; ?>
					</dt>
					<dd>
						<?php echo $term; ?>
					</dd>
				</dl>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="clear"></div>
	</div>
	<?php endforeach; ?>
</div>
<?php include_partial('KoreanWord'); ?>