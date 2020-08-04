$(function(){
	$.ajaxSetup({
		headers:{'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')},
		dataType:'html',
		type:'POST'
	});

	$('#searchTeacher').submit(function(e){
		e.preventDefault();
		e.stopPropagation();
		$('tr.teacher_data').remove();
		console.log('ok');

		$.ajax({
			url:'/teachers/refresh_teacher_index',
			dataType:'html',
			type:'POST',
			data:$(this).serializeArray(),
			timeout:300000,
			success:function(data){
				$('tbody#body_teacher_table').append(data);
				console.log('success: from js/teacher/ajax/indexTeacher.js');
			}

		});


	});

});