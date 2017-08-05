$(function() {
	$('.btn-update-create').click(function() {
		$('#modalFullTimerUpdate').modal('show')
			.find('#modalFullTimerUpdateContent')
			.load($(this).attr('value'));
	});
}); 

$(function() {
	$('.btn-view').click(function() {
		$('#modalFullTimerView').modal('show')
			.find('#modalFullTimerViewContent')
			.load($(this).attr('value'));
	});
}); 