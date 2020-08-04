
@extends('layouts.app-bv4')

@section('content')

		<div class="row">
			<div class="col-md-4"></div>

			<div class="col-md-3 col-sm-12">
				<div id='main_card' class="card text-left">
				  <img class="card-img-top" src="{{route('TeacherImage', $teacher->id)}}" alt="Profile Pic Teacher">
				  <div class="card-body">

				  	<div id='see_more' class="card-text data">
				  		<p>
				  			Tel&nbsp<span class="fas fa-phone"></span>&nbsp:{{$teacher->tel}}
				  		</p>
				  		<p>
				  			Diploma&nbsp<span class="fas fa-graduation-cap"></span>&nbsp:{{$teacher->diploma}}
				  		</p>
				  		<p>
				  			Email&nbsp<span class="fas fa-envelope-open"></span>&nbsp:{{$teacher->email}}
				  		</p>
				  		<p>
				  			Date of Birth&nbsp<span class="fas fa-calendar"></span>&nbsp:{{$teacher->dateOfBirth}}
				  		</p>
				  		<p>
				  			Place of Birth&nbsp<span class="fa fa-map-marker-alt"></span>&nbsp:{{$teacher->placeOfBirth}}
				  		</p>
				  	</div>

				    <div class="card-text data">
				    	<h4>TEACHER: {{$teacher->matricule}}</h4>
				    	<p>
				    		<span class="name">
				    		@if($teacher->sex == 'male')
				    			Mr:&nbsp{{$teacher->fname}}&nbsp{{$teacher->sname}}
				    		@else
				    			Madame:&nbsp{{$teacher->fname}}&nbsp{{$teacher->sname}}		
				    		@endif
				    		
				    		</span>
				    	</p>
				    	<p>
				    		<span class="fa fa-map-marker-alt fa-lg"></span> 
				    		{{$teacher->address}}
				    	</p>
<!-- begin assignedCourseSection -->
						<div id="assignedCourseSection">
							@include('teacher.assignedCourseSection')
						</div>						
<!-- end assignedCourseSection -->
				    	<p>
				    		<span class="fas fa-book"></span> H.O.D
				    		<ul>
					    		@forelse($departments as $department)
									<li>{{ $department->name }} </li>
					    		@empty
					    			<li>None</li>
					    		@endforelse				    			
				    		</ul>
				    	</p>
				    	<p  id='see_more_button' visible = 1>
				    		<span class="fas fa-plus"></span>
				    		<a href="#" title="click to see more">&nbspSee more<a>
				    	</p>
				    	<!-- begin div.card-button -->
				    	<hr>
				    	<div class="d-flex flex-row justify-content-between align-items-center card-buttons">
				    		<div>
				    			<a title="Assign Course" href="" data-toggle="modal" data-target="#assignCourseModal">
				    				<span class="fas fa-plus"></span>&nbspAssign 
				    			</a>
				    		</div>

				    		<div>
				    			<a href="{{ route('teacher.edit', $teacher) }}">
				    				<span class="fas fa-edit"></span>&nbspEdit
				    			</a>
				    		</div>
				    		<div>
				    			<a href="{{ route('teacher.index') }}">Teachers&nbsp	<span class="fas fa-search"></span>
				    			</a>
				    		</div>
				    		<div>
				    			<a >
				    				<button href="{{ route('teacher.show', $teacher) }}" type="button" class="deleteTeacherButton btn btn-sm btn-danger" >
				    					<!-- data-target="#deleteModal" data-toggle='modal'-->
				    					<span class="fas fa-trash"></span>
				    				</button>
				    			</a>
				    		</div>				    		
				    	</div> <!-- end card-button -->
				    </div>
				  </div>
				</div>
			</div>

			<div class="col-md-5"></div>

		</div>

		<div class="row d-flex flex-row ml-3">
			<div class="col-md-2 student_image">
				<div class="teacher_image ">
					<img src="{{route('TeacherImage', $teacher->id)}} " alt="Profile Pic Teacher" width="150" height="200" class="profile-pic">					
				</div>
			</div>
			<div class="col-md-8 mb-3">
				<h1>					
				<strong>TEACHER&nbsp#</strong>{{$teacher->matricule}}<br> <hr>
				</h1>
				<strong>Matricule: </strong> {{$teacher->matricule}}<br>
				<strong>Full Name: </strong> {{$teacher->fname}}&nbsp{{$teacher->sname}}
				<br>
				<strong>Diploma: </strong>{{$teacher->diploma}}<br>
				<strong>Department: </strong>{{$teacher->department_id}}<br>
				<strong>Telephone: </strong>{{$teacher->tel}}<br>
				<strong>Nationality: </strong>{{$teacher->nation}}<br>
				<strong>E-mail: </strong>{{$teacher->email}}<br>
				<strong>Place of Birth: </strong> {{$teacher->placeOfBirth}}<br>
				<strong>Date of Birth: </strong> {{$teacher->dateOfBirth}}<br>
				<strong>Sex: </strong> {{$teacher->sex}}<br>
				<strong>Role: </strong> {{$teacher->role}}<br>
				<strong>Live In: </strong> {{$teacher->address}}<br><br>

				<a href="{{ route('teacher.edit', $teacher) }}"><button class="btn btn-warning">UPDATE&nbsp<span class="fas fa-edit"></span></button></a>
				<a href="{{ route('teacher.index') }}"><button class="btn btn-success">All Teachers&nbsp<span class="fas fa-search"></span></button></a>
				<a >
					<button href="{{ route('teacher.show', $teacher) }}" type="button" class="deleteTeacherButton btn btn-danger" >
						<!-- data-target="#deleteModal" data-toggle='modal'-->
						Delete&nbsp<span class="fas fa-ban"></span>
					</button>
				</a>
			</div>
			<div class="col-md-2"></div>
		</div>

<div class="row">
	<div class="col-md-10">
		<hr>
		<table class="table table-hover">
			<caption>						
				<h3> OWNED COURSES</h3>
			</caption>
			<thead>
				<tr>
					<th>#</th>
					<th>Course Code</th>
					<th>Course Title</th>

				</tr>
			</thead>
			<tbody>
				<tr>
					<td>data1</td>
					<td>data2</td>
					<td>data3</td>

				</tr>
				<tr>
					<td>data1</td>
					<td>data2</td>
					<td>data3</td>

				</tr>
			</tbody>
		</table>
	</div>
</div>

<!-- assign course modal begin -->
<!-- Modal -->
<div class="modal fade" id="assignCourseModal" tabindex="-1" role="dialog" aria-labelledby="assignCourseModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="assignCourseModalLabel">Assign Course(s) to {{$teacher->fname}} #{{$teacher->matricule}}.</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- display assignment teacher course assignment form -->

        <div id="modal_body_test"></div>

        <form action="" id="assignCourseForm" method="post">
        	@csrf

        	<input type="number" hidden="true" name="teacher_id" value="{{$teacher->id}}">

	        @forelse( $all_courses as $level => $courses)

	  			<h3>Level #{{$level}} Courses ({{$courses->count()}}).</h3>

	  			@foreach($courses as $course)
	  				<div class="form-group">
	  					
		  				{{$loop->index + 1}}) <label for="{{$course->course_id}}">{{$course->cname}}</label>

		  				<input id="{{$course->course_id}}" type="checkbox"  name="assigned_course_id[]" value="{{$course->course_id}}">  					
	  				</div>
	  			@endforeach

	        @empty

				No course has been created yet. Please create courses before assigning to teachers.

	        @endforelse

	     <input type="submit" class="btn btn-sm btn-danger" id='assignCourseButton' value="Assign">
    	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- assign course modal end -->

<!-- Delete modal begin-->

<div class="modal fade" id="deleteModal" >
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">DELETE TEACHER</h4>
				<button type="button" class="close" data-dismiss="modal">&times</button>

			</div>
			
			<div class="modal-body">
				<p>Are you sure you want to delete this teacher?<br>
					This action is irreversible.<br>
					Click <b>YES</b> to continue or <b>NO</b> to cancel.

				</p>
				{!! Form::open(['route'=>['teacher.destroy', '$id'], 'id'=>"deleteTeacherForm", 'method'=>'delete']) !!}

				{!! Form::submit('YES', ['class'=>'btn btn-danger']) !!}&nbsp<button class="btn btn-success" data-dismiss="modal">NO</button>
			</div>

				{!! Form::close() !!}

				

			<div class="modal-footer">
				
			</div>
<!-- Delete modal end-->
		</div>
	</div>								
</div>
<style>
	.profile-pic
	{
		border: 1px dotted red;
		border-radius: 1rem 2rem !important;
	}
	#main_card
	{
		position:relative;
		overflow: hidden;	

	}
	.name{
		font-weight: 350;
		font-size: 1.1rem;
	}
	#see_more
	{
		position:absolute;
		top:100%;
		left:0%;
		width: 100%;
		height:auto;
		transition:all 0.5s ease-out;
		font-weight: 400;
		font-size: 1.1rem;
		font-family: "Segoe UI Symbol";
		background-color:rgb(40, 167, 69);
		color:white; 
/*		background: linear-gradient(240deg, #66bb6a, #43a047);
		color:rgba(255,255,255,1);*/
		border: 0.1px solid lightgray;
		font-family: "Nunito",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";

	}
/*	#see_more:click
	{
		top:45%;
		left:0%;

	}*/
</style>
@endsection
@section ('scripts')
<script>
	$('#see_more_button').click(function(e){
		e.preventDefault();
		e.stopPropagation();



		if ($(this).attr('visible') == 0) 
		{
			//invisible. make it visible
			$(this).attr('visible', 1);
			$('#see_more').css('top', '25%');
		}else
		{
			//visible. make it invisible
			$(this).attr('visible', 0);
			$('#see_more').css('top', '100%');
		}
	})
</script>

<!-- remove courses attributed to a teacher -->
<script type="text/javascript" src="{!! asset('js/teacher/show.js') !!}"></script>

<script type="text/javascript">

	function unAssignCourse(course_id)
	{
		//from line 55
		// a click on the trash icon in show teacher page against the code of the subject will deactivate unassociate the course.

//setup Ajax
		$.ajaxSetup({
			headers:{'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')},
			dataType:'html',
			type:'POST'
		});

//end ajax set up

//Begin launch Ajax
		var dataArray = {'course_id':course_id, 'teacher_id':'{{$teacher->id}}'};
		$.ajax({
			url:"{{route('unAssign_course')}}",
			data:dataArray,
			timeout:300000,
			type:'Post',
			dataType:'html',
			success:function(data){
				$('#assignedCourseSection').empty().append(data);
				console.log('success: from Teacher/show.blade.php line 356');
			}
		});
//End launch Ajax
	}

	$(document).ready(function(){
		console.log('Jquery Ready');
//setup Ajax
		$.ajaxSetup({
			headers:{'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')},
			dataType:'html',
			type:'POST'
		});
//end ajax set up


		$('#assignCourseForm').submit(function(e){

		e.preventDefault();

		//if no courses have been chosen exit. Do not send ajax request
		//var assigned_coursed = document.forms['assignCourseForm'].elements[ 'assigned_course_id[]'];
		var k = 0;

		var data = $(this).serializeArray();

		for( var i = 0; i < data.length; i++)
		{
			k = (data[i].name == 'assigned_course_id[]') ? ++k : k ;

		}

		if (k == 0)
		{
			alert('Please choose a course to proceed or click cancel to exit.');
			return true;
		}

		alert('You are about to attribute '+ k +' Course\(s\)' );

		

		$.ajax({
			url:"{{route('assign_course')}}",
			data:$(this).serializeArray(),
			timeout:300000,
			success:function(data){
				$('#assignedCourseSection').empty().append(data);
				console.log('success: from Teacher/show.blade.php line 346');
			}
		});

	}); // end of $('#assignCourseForm').submit(function(e){})
}); //end Jquery initialisation
</script>


@endsection