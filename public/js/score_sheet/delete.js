$(function(){
	$('button.deleteScoreSheetButton').click(function(e){
		e.preventDefault();
		e.stopPropagation();

		$('#deleteScoreSheetForm').attr('action', $(this).attr('href'));

		$('#deleteModal').modal();
	});
});
