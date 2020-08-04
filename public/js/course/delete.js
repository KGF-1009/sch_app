$(function(){

	$('button.deleteCourseButton').click(
		function(e){
			e.stopPropagation();
			e.preventDefault(); 
			//deleteStudentForm

			
			$('#deleteCourseForm').attr('action', $(this).attr('href'));
			//alert(link);
			$('#deleteModal').modal();

		}
	);
});