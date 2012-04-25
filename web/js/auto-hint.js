$(document).ready(function() {
	// Focus auto-focus fields
	$('.auto-focus:first').focus();

	// Initialize auto-hint fields
	$('INPUT.auto-hint, TEXTAREA.auto-hint').focus(function() {
		if ($(this).val() == $(this).attr('hint')) {
			$(this).val('');
			$(this).removeClass('auto-hint');
		}
	});
	$('INPUT.auto-hint, TEXTAREA.auto-hint').blur(function() {
		if ($(this).val() == '' && $(this).attr('hint') != '') {
			$(this).val($(this).attr('hint'));
			$(this).addClass('auto-hint');
		}
	});
	$('INPUT.auto-hint, TEXTAREA.auto-hint').each(function() {
		if ($(this).attr('hint') == '') {
			return;
		}
		if ($(this).val() == '') {
			$(this).val($(this).attr('hint'));
		} else {
			$(this).removeClass('auto-hint');
		}
	});
});