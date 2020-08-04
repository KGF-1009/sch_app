$(function(){
	$('button.deleteStudentButton').click(function(e){
		e.preventDefault();
		e.stopPropagation();

		$('#deleteStudentForm').attr('action', $(this).attr('href'));

		$('#deleteModal').modal();
		//console.log('del show deleteStudentButton');

	});
});