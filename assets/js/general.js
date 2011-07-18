$(document).ready(function(){
	$('input.search_field').live('keyup',function(){
		if($(this).val().length > 0) {
			$(this).siblings('.text_cross').show();
		} else {
			$(this).siblings('.text_cross').hide();
		}
	});
	
	$('a.text_cross').live('click',function(){
		$(this).siblings('input.search_field').val('');
		$(this).hide();
	});
	
	if($('#page_wrapper').length > 0) {
		var width = $(document).width() - 242;
		$('#page_wrapper').css('width', width+'px');
	}
	
	$('table.devices tbody tr td input[type=checkbox]').live('change', function(){
		
		if($('input.hidden_device_list').length > 0) {
			var id = $(this).val();
			var orig_str = $('input.hidden_device_list').val();
			var arr = [];
			if(orig_str.length > 0)
				arr = orig_str.split('|');
			if($(this).is(':checked')) {
				arr.push(id);
			} else {
				arr.splice(arr.indexOf(id),1);
			}
			$('input.hidden_device_list').val(arr.join('|'));
		}
	});
	if($('ul.options li a.devices_send_notification').length > 0) {
		$('ul.options li a.devices_send_notification').fancybox({
			'transitionIn':'elastic',
			'transitionOut':'elastic',
			'overlayColor':'#CCC'
		});
	}
});