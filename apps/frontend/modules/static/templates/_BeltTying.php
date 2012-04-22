<div id="BeltSlides" class="imageflow">
    <div class="slides_title">Belt Tying</div>
	<img src="images/Belt_Images/Belt_Tying_01.jpg" longdesc="javascript:;" width="600" height="485" alt="1. Start with the belt hanging the approximate length you want it to hang when tied." />
	<img src="images/Belt_Images/Belt_Tying_02.jpg" longdesc="javascript:;" width="600" height="485" alt="2. Wrap the longer end of the belt around your waist, maintaining the shorter end at the front." />
	<img src="images/Belt_Images/Belt_Tying_03.jpg" longdesc="javascript:;" width="600" height="485" alt="3. Cross the longer length over the shorter one. Leaving the shorter length hanging in front." />
	<img src="images/Belt_Images/Belt_Tying_04.jpg" longdesc="javascript:;" width="600" height="485" alt="4. Wrap the longer end of the belt around the waist a second time." />
	<img src="images/Belt_Images/Belt_Tying_05.jpg" longdesc="javascript:;" width="600" height="485" alt="5. Take the same end of belt and tuck it under the short end and behind both loops." />
	<img src="images/Belt_Images/Belt_Tying_06.jpg" longdesc="javascript:;" width="600" height="485" alt="6. Pull both ends to tighten to fit." />
	<img src="images/Belt_Images/Belt_Tying_07.jpg" longdesc="javascript:;" width="600" height="485" alt="7. Pull the ends to straighten the knot." />
	<img src="images/Belt_Images/Belt_Tying_08.jpg" longdesc="javascript:;" width="600" height="485" alt="8. Now take the first end and tuck it under the second." />
	<img src="images/Belt_Images/Belt_Tying_09.jpg" longdesc="javascript:;" width="600" height="485" alt="9. Take the same end up and across the second." />
	<img src="images/Belt_Images/Belt_Tying_10.jpg" longdesc="javascript:;" width="600" height="485" alt="10. Loop it through the knot that is forming." />
	<img src="images/Belt_Images/Belt_Tying_11.jpg" longdesc="javascript:;" width="600" height="485" alt="11. Pull to tighten the knot." />
	<img src="images/Belt_Images/Belt_Tying_12.jpg" longdesc="javascript:;" width="600" height="485" alt="12. If done correctly both ends should be the same length." />
	<img src="images/Belt_Images/Belt_Tying_13.jpg" longdesc="javascript:;" width="600" height="485" alt="13. The finished knot." />
	<div class="slides_close">
			<a href="javascript:;"><img src="images/sample_close.png" id="BeltGrid_close" class="close_button" title="Close"/></a>
	</div>
</div>
<script type="text/javascript">
var $belt_initialized = false;
$( "#BeltGrid" ).click(function(){
	$("#BeltSlides").css('display', 'block');
	$("#Background").addClass('grey_background').css('height', $(document).height());
	if(!$belt_initialized) {
	  var instanceOne = new ImageFlow();
	  instanceOne.init({ ImageFlowID:'BeltSlides', imageFocusM: 1.2 });
	  $belt_initialized = true;
	}
});
</script>
