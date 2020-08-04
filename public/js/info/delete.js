$(function(){

	$('button.deleteInfoButton').click(
		function(e){
			e.stopPropagation();
			e.preventDefault(); 
			//deleteStudentForm

			
			$('#deleteInfoForm').attr('action', $(this).attr('href'));
			//alert(link);
			$('#deleteModal').modal();

		}
	);
});