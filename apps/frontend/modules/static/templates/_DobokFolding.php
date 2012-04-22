<div id="DobokSlides" class="imageflow">
    <div class="slides_title">Dobok Folding</div>
	<img src="images/Dobok_Images/Dobok_01.jpg" longdesc="javascript:;" width="781" height="401" alt="1. Lay the Dobok top flat on the ground and straighten each edge." />
	<img src="images/Dobok_Images/Dobok_02.jpg" longdesc="javascript:;" width="781" height="401" alt="2. Fold the left sleeve across the top of the Dobok." />
	<img src="images/Dobok_Images/Dobok_03.jpg" longdesc="javascript:;" width="781" height="401" alt="3. Fold the right sleeve across the top of the Dobok." />
	<img src="images/Dobok_Images/Dobok_04.jpg" longdesc="javascript:;" width="781" height="401" alt="4. Fold the bottom 1/3rd towards the top." />
	<img src="images/Dobok_Images/Dobok_05.jpg" longdesc="javascript:;" width="781" height="401" alt="5. Fold the bottom 1/2 over the top for form a rectangular shape." />
	<img src="images/Dobok_Images/Dobok_06.jpg" longdesc="javascript:;" width="781" height="401" alt="6. Fold the Dobok pants in half and straighten on the ground." />
	<img src="images/Dobok_Images/Dobok_07.jpg" longdesc="javascript:;" width="781" height="401" alt="7. Fold 1/3rd of the Dobok right to left." />
	<img src="images/Dobok_Images/Dobok_08.jpg" longdesc="javascript:;" width="781" height="401" alt="8. Fold other 1/3rd toward centre to create a bundle." />
	<img src="images/Dobok_Images/Dobok_09.jpg" longdesc="javascript:;" width="781" height="401" alt="9. Place the Dobok pants on top of the jacket." />
	<img src="images/Dobok_Images/Dobok_10.jpg" longdesc="javascript:;" width="781" height="401" alt="10. Fold 1/3rd of the Dobok jacket and pants towards the centre." />
	<img src="images/Dobok_Images/Dobok_11.jpg" longdesc="javascript:;" width="781" height="401" alt="11. Continue the folding and create a bundle." />
	<img src="images/Dobok_Images/Dobok_12.jpg" longdesc="javascript:;" width="781" height="401" alt="12. Lay the Dobok onto your belt, with a loop on one side." />
	<img src="images/Dobok_Images/Dobok_13.jpg" longdesc="javascript:;" width="781" height="401" alt="13. Wrap the belt around the Dobok and loop through itself." />
	<img src="images/Dobok_Images/Dobok_14.jpg" longdesc="javascript:;" width="781" height="401" alt="14. Loop the belt back around the Dobok and tighten." />
	<img src="images/Dobok_Images/Dobok_15.jpg" longdesc="javascript:;" width="781" height="401" alt="15. Place the Belt back through the second loop and tighten, Viola!" />
	<div class="slides_close">
			<a href="javascript:;"><img src="images/sample_close.png" id="BeltGrid_close" class="close_button" title="Close"/></a>
	</div>
</div>
<script type="text/javascript">
var $dobok_initialized = false;
$( "#DobokGrid" ).click(function(){
	$("#DobokSlides").css('display', 'block');
	$("#Background").addClass('grey_background').css('height', $(document).height());
	if(!$dobok_initialized) {
	  var instanceOne = new ImageFlow();
	  instanceOne.init({ ImageFlowID:'DobokSlides', imageFocusM: 1.8 });
	  $dobok_initialized = true;
	}
});
</script>
