$(function() {
	$('.btn-update-create-ajax').click(function() {
		$('#modalUpdateAjax').modal('show')
			.find('#modalUpdateContentAjax')
			.load($(this).attr('value'));		
	});
}); 

$(function() {
	$('.btn-create-ajax').click(function() {
		$('#modalAddAjax').modal('show')
			.find('#modalAddContentAjax')
			.load($(this).attr('value'));			
	});
}); 