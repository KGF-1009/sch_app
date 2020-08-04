$(function(){
	$('#createScore_sheet').submit(function(e){
		e.preventDefault();
		e.stopPropagation();

		$('#ajaxMessages').empty();

		var dataPost = $(this).serializeArray();
		$.ajaxSetup({
			headers:{'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')},
			dataType:'html',
			type:'POST'
		});
		// Route::post('/scoreSheet', 'AjaxScoreSheetController@store');

		$.ajax({
			url:'/scoreSheet',
			dataType:'html',
			type:'POST',
			timeout:300000,
			data:$(this).serializeArray(),
			beforeSend: function(){
				$('#ajaxMessages').html("<img src='/img/ajax-loader-16-16.gif' width='30' height='30' alt='Loading...'/>");
			},
			success:function(data){
				$('#ajaxMessages').html(data);

				//after choosing courses refresh score sheet table
				$('#score_sheet').click();
			},
			error:function(xhr){
				$('#ajaxMessages').html("<h3><p class='error'>Sorry an error occured, The Request failed <br> Error: " + xhr.status +" <br> "+ xhr.responseText+ "</p></h3>");
			}
		});


		console.log('ajaxScoreSheet.js');
	}); //end On submit #createScore_sheet

// Route::get('/read_scoreSheet', 'AjaxScoreSheetController@read_scoreSheet');
//retrive data from score_sheet database and show.

	$('.score_sheet_refresh').click(function(e){

		e.preventDefault();
		e.stopPropagation();

		var semester = 1; //default value		
		semester = $(this).attr('semester');

		var semesterTableBody = {};

		switch (semester)
		{
			case '1':
				semesterTableBody = $('#score_sheet_body-1');
				break;
			case '2':
				semesterTableBody = $('#score_sheet_body-2');
				break;
			case '3':
				semesterTableBody = $('#score_sheet_body-3');
				break;
			default:
				semesterTableBody = $('#score_sheet_body-1');
		}

		$.ajax({
			url:'/read_scoreSheet',
			type:'GET',
			dataType:'html',
			timeout:300000, /*if no result after 5min fail ajax. and abort*/
			data:{id:$(this).attr('mat'), semester:semester}, /*matricule of the student in question*/
			beforeSend:function(){
				semesterTableBody.html("<img src='/img/ajax-loader-16-16.gif' width='30' height='30' alt='Loading...'/>");
			},
			success:function(data, status){
				semesterTableBody.html(data);
				console.log(semesterTableBody);
 			},

			error:function(xhr){
				semester_01.html("<h3><p class='error'>Sorry an error occured, The Request failed <br> Error: " + xhr.status +" <br> "+ xhr.responseText+ "</p></h3>");
			}

		});
		console.log('score_sheet.ajax.ajaxScoreSheet.js');
	}); /*end on click score_sheek click listener*/

});

