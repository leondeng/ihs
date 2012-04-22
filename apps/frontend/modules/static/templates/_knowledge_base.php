<div id="ContentLeft">
	<div id="KnowledgeGrids" class="content_all">
		<h1 class="page_title">Knowledge Base</h1>
		<div class="grid icon">
			<a href="javascript:;" id="DobokGrid" title="Click to learn"><img src="images/Dobok_Folding.png" /></a>
		</div>
		<div class="grid text">
			<div class="title">Dobok Folding</div>
			<div class="summary">We show you in detail the best way to fold you
				Dobok.</div>
		</div>

		<div class="grid icon">
			<a href="javascript:;" id="Korean" title="Coming soon..."><img src="images/Korean_Terminology.png" /></a>
		</div>
		<div class="grid text widen">
			<div class="title">Korean Terminology</div>
			<div class="summary">A basic guide to Korean words you should know in
				the exciting world of Hapkido.</div>
		</div>

		<div class="clear"></div>

		<div class="grid icon">
			<a href="javascript:;" id="BeltGrid" title="Click to learn"><img src="images/Belt_Tying.png" /></a>
		</div>
		<div class="grid text">
			<div class="title">Belt Tying</div>
			<div class="summary">The Preferred IHA Method to tye your belt and
				keep it on.</div>
		</div>

		<div class="grid icon">
			<a href="javascript:;" id="PathGrid" title="Click to learn"><img src="images/The_Path_to_Black_Belt.png" /></a>
		</div>
		<div class="grid text widen">
			<div class="title">The Path to Black Belt</div>
			<div class="summary">A little guide for the journey to Black Belt,
				but nothing can ever prepare you for this.</div>
		</div>

	</div>
</div>
<?php include_partial('DobokFolding'); ?>
<?php include_partial('BeltTying'); ?>
<?php include_partial('ThePathtoBlackBelt'); ?>

<?php include_partial('KoreanWord'); ?>
<?php use_stylesheet('knowledge_base'); ?>
<?php use_stylesheet('imageflow'); ?>
<?php use_javascript('imageflow')?>
<?php use_javascript('jquery-1.7.2.min.js'); ?>

<script type="text/javascript">
$( ".close_button" ).click(function(){
	$(".imageflow").css('display', 'none');
	$("#Background").removeClass('grey_background').css('height', 0);
});
</script>
