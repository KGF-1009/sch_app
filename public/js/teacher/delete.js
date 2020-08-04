$(function(){

	$('button.deleteTeacherButton').click(
		function(e){
			e.stopPropagation();
			e.preventDefault(); 
			//deleteStudentForm

			
			$('#deleteTeacherForm').attr('action', $(this).attr('href'));
			//alert(link);
			$('#deleteModal').modal();

		}
	);
});