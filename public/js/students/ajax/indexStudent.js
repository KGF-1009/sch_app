$(function(){
	$.ajaxSetup({
		headers:{'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')},
		dataType:'html',
		type:'POST'
	});

	$('#searchStudent').submit(function(e){
		e.preventDefault();
		e.stopPropagation();
		$('tr.student_data').remove();

		$.ajax({
			url:'/students/refresh_student_index',
			dataType:'html',
			type:'POST',
			data:$(this).serializeArray(),
			timeout:300000,
			success:function(data){
				$('tbody#body_student_table').append(data);
				console.log('success: from js/students/ajax/indexStudent.js');
			}

		});


	});

});