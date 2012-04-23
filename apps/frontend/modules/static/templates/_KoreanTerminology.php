<?php $sections = array(
    array('label' => 'Basic Terms', 'terms' => array(
        'Breathing' => 'Tan Jun',
        'School' => 'Dojang',
        'Attention' => 'Cha Ryuht',
        'Bow' => 'Kyung Neh',
        'Ready Stance' => 'Jhoon Bee',
        'Uniform' => 'Dobok',
        'Start' => 'Shi Jak',
        'Stop' => 'Koman',
        'Short Stick' => 'Dan Bong',
        'Spirit Yell' => 'Kiyap',
    )),


); ?>
<div id="ContentLeft" class="alignleft">
	<div class="page_title">Korean Terminology</div>
	<?php foreach($sections as $section) :?>
	<div class="term_section">
		<div class="section_title">
			<?php echo $section['label']; ?>
		</div>
		<?php foreach($section['terms'] as $key => $term) : ?>
		<div class="section_body">
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
		</div>

		<?php endforeach; ?>

		<?php endforeach; ?>

	</div>
</div>
<?php include_partial('KoreanWord'); ?>