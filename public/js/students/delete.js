$(function(){

	$('button.deleteStudentButton').click(
		function(e){
			e.stopPropagation();
			e.preventDefault(); 
			//deleteStudentForm

			
			$('#deleteStudentForm').attr('action', $(this).attr('href'));
			//alert(link);
			$('#deleteModal').modal();

		}
	);
});