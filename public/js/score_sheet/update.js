$(function(){
	$("#updateStudent").validate({
		rules:{
			
			student_id:{
				required:true,
				minlength:2,
				maxlength:25
			},
			course_id:{
				required:true,
				minlength:2,
				maxlength:25
			},
			academic_year:{
				required:true
			},
			semester:{
				required:true,
				number:true
			},
			confirmed:{
				required:true
			} 


		}
	});
});