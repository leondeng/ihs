<div id="PathSlides" class="imageflow">
    <div class="slides_title">The Path to Black Belt</div>
	<img src="images/Path_Images/Belt_A_White_01.jpg" longdesc="javascript:;" width="600" height="485" alt="White Belt - 8th Kup Stances, Tan Jun Breathing, Basic Punching, Basic Kicking, Striking Drill #1,
	Forward & Backward Breakfalls. Self Defence: Concept 1 (Evasion) & Concept 2 (Circular Releases)." />
	<img src="images/Path_Images/Belt_B_Orange_01.jpg" longdesc="javascript:;" width="600" height="485" alt="Orange Belt - 7th Kup Elbow Strikes, Basic Kicks, Striking Drill #2,
	Side Breakfalls. Self Defence: Concept 3 (Arm Bar Over), Concept 4 (Hand Attacks) & Multiple Opponent Defence." />
	<img src="images/Path_Images/Belt_C_Yellow_01.jpg" longdesc="javascript:;" width="600" height="485" alt="Yellow Belt - 6th Kup Hammer Strikes, Basic Kicks, Rolling into Side Breakfalls, Striking Drill #3.
	Self Defence: Concept 5 (S Locks) & Concept 6 (Arm Bar Under) & Multiple Opponent Defence." />
	<img src="images/Path_Images/Belt_D_Green_01.jpg" longdesc="javascript:;" width="600" height="485" alt="Green Belt - 5th Kup Palm & Backfist Strikes, Intermediate Kicks, Aerial Breakfalls, Striking Drill #4.
	Self Defence: Concept 7 (V Locks), Concept 8 (Balance 1) & Multiple Opponent Defence." />
	<img src="images/Path_Images/Belt_E_Blue_01.jpg" longdesc="javascript:;" width="600" height="485" alt="Blue Belt - 4th Kup Advanced Elbow Strikes, Intermediate Kicks, Back Fall, Striking Drill #5.
	Self Defence: Concept 9 (Chokes), Concept 10 (Arresting), Multiple Opponent Defence & Lock Flows." />
	<img src="images/Path_Images/Belt_F_Brown_01.jpg" longdesc="javascript:;" width="600" height="485" alt="Brown Belt - 3rd Kup Intermediate Strikes, Intermediate Kicks, Striking Drill #6.
	Self Defence: Concept 11 (Balance Motion), Concept 12 (Kick Defence), Multiple Opponent Defence & Lock Flows." />
	<img src="images/Path_Images/Belt_G_Red_01.jpg" longdesc="javascript:;" width="600" height="485" alt="Red Belt - 2nd Kup Advanced Strikes, Advanced Kicking, Striking Drill #7 + 1 Personal.
	Self Defence: Concept 13 (Ground Defence), Multiple Opponent Defence, Multiple Ground Defence & Lock Flows." />
	<img src="images/Path_Images/Belt_H_Provisional_Black_Belt_01.jpg" longdesc="javascript:;" width="600" height="485" alt="Provisional Black Belt - 1st Kup Revision & perfection of Basic Strikes & Kicks, Striking Drill #8 + 2 Personal.
	Self Defence: Concept 14 (Weapon Defence), Multiple Opponent Defence, Multiple Opponent Weapon Defence, Lock Flows, & Sparring." />
	<div class="slides_close">
			<a href="javascript:;"><img src="images/sample_close.png" id="PathGrid_close" class="close_button" title="Close"/></a>
	</div>
</div>
<script type="text/javascript">
var $path_initialized = false;
$( "#PathGrid" ).click(function(){
	$("#PathSlides").css('display', 'block');
	$("#Background").addClass('grey_background').css('height', $(document).height());
	if(!$path_initialized) {
	  var instanceOne = new ImageFlow();
	  instanceOne.init({ ImageFlowID:'PathSlides', imageFocusM: 1.2 });
	  $path_initialized = true;
	}
});
</script>
