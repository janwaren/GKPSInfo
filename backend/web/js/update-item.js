$(function() {
	$('.btn-update-create').click(function() {
		$('#modalUpdate').modal('show')
			.find('#modalUpdateContent')
			.load($(this).attr('value'));		
	});
}); 

$(function() {
	$('.btn-create').click(function() {
		$('#modalAdd').modal('show')
			.find('#modalAddContent')
			.load($(this).attr('value'));			
	});
}); 

$(function() {
	$('.btn-view').click(function() {
		$('#modalView').modal('show')
			.find('#modalViewContent')
			.load($(this).attr('value'));
	});
}); 