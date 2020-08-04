$(function(){

	$('button.deleteDepartmentButton').click(
		function(e){
			e.stopPropagation();
			e.preventDefault(); 
			//deleteStudentForm
			$('#deleteDepartmentForm').attr('action', $(this).attr('href'));
			//alert(link);
			$('#deleteModal').modal();

		}
	);
});