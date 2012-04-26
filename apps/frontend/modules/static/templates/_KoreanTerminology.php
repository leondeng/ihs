<?php
$path = sfConfig::get( 'sf_root_dir' ) . '/apps/frontend/modules/static/config/app.yml';
include ( sfContext::getInstance()->getConfigCache()->checkConfig($path));

$sections = sfConfig::get('app_KoreanTerms_sections');
?>
<div id="KoreanTerms" class="black_background">
	<div class="page_title">
		Korean Terminology - <a href="PDF_Download/IHA_Korean_Terminology.pdf">DOWNLOAD AS PDF</a>
	</div>
	<div class="terms_close">
		<a href="javascript:;"><img src="images/sample_close.png"
			id="KoreanTerms_close" class="close_button" title="Close" /> </a>
	</div>
	<div class="clear"></div>
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
<script type="text/javascript">
$( "#KoreanGrid" ).click(function(){
	$("#KoreanTerms").css('display', 'block').css('height', $(document).height());
	$("#Background").addClass('grey_background').css('height', $(document).height());
});
$( "#KoreanTerms_close" ).click(function(){
	$("#KoreanTerms").css('display', 'none').css('height', 0);
	$("#Background").removeClass('grey_background').css('height', 0);
});
</script>
