
@extends('layouts.app-bv4')

@section('content')
 
		<div class="row d-flex flex-row ml-3">
			<div class="col-md-2 student_image">
				<div class="student_image float-right ">
					<img src="{{route('studentImage', $student->student_id)}} " style='border: red 1px' alt="Profile Pic Student" class='profile-pic' width="150" height="200">					
				</div>
			</div>
			<div class="col-md-8 mb-3">
				<h1>					
				<strong>STUDENT&nbsp#</strong>{{$student->student_id}}<br> <hr>
				</h1>
				<strong>Full Name:</strong> {{$student->fname}}&nbsp{{$student->sname}}
				<br>
				<strong>Place of Birth:</strong> {{$student->placeOfBirth}}<br>
				<strong>Date of Birth:</strong> {{$student->dateOfBirth}}<br>
				<strong>Sex:</strong> {{$student->sex}}<br>
				<strong>Enrollement date:</strong> {{$student->enrollement_date}}<br>
				<strong>Level:</strong> {{$student->level}}<br>
				<strong>Live In:</strong> {{$student->address}}<br><br>

				<div style="display:inline">
					
				<a title ='see all students' href="{{ route('students.index') }}"><button class="btn btn-sm btn-outline-success"><span class="fas fa-arrow-left"></span>&nbspBack</button></a>
				<a title="update" href="{{ route('students.edit', $student) }}"><button class="btn btn-sm btn-outline-primary"><span class="fas fa-edit"></span></button></a>
				<a title ="delete">
					<button href="{{ route('students.show', $student) }}" type="button" class="deleteStudentButton btn btn-sm btn-outline-danger" >
						<!-- data-target="#deleteModal" data-toggle='modal'-->
						<span class="fas fa-trash"></span>
					</button>
				</a>
				</div>
				
			</div>
			<hr>
		</div>

		<div class="row">
			<!-- choose course modal -->
			<div class="col-md-11 offset-md-1">
				<button type="button" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#addCourse">
			  		Add Courses
				</button>
				<table id='score_sheet_body-1' class="table table-hover">					
				</table>
				<button semester='1' type="button"  class="btn btn-sm btn-primary score_sheet_refresh" mat='{{$student->student_id}}'>
					Refresh Semester 01<span class="fas fa-search"></span>
				</button>
			</div>
			
		</div>

		<div class="row">
			<div class="col-md-11 offset-md-1">
				<hr>
				<table id='score_sheet_body-2' class="table table-hover">					
				</table>
				<button semester='2' type="button"  class="btn btn-sm btn-primary score_sheet_refresh" mat='{{$student->student_id}}'>
					Refresh Semester 02<span class="fas fa-search"></span>
				</button>
			</div>
			
		</div>

		<div class="row">
			<div class="col-md-11 offset-md-1">
				<hr>
				<table id='score_sheet_body-3' class="table table-hover">					
				</table>
				<button semester='3' type="button"  class="btn btn-sm btn-primary score_sheet_refresh" mat='{{$student->student_id}}'>
					Refresh Semester 03<span class="fas fa-search"></span>
			</button>
			</div>
		</div>




<!--  Student Delete modal  begin-->

<div class="modal fade" id="deleteModal" >
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">DELETE STUDENT #{{$student->student_id}}</h4>
				<button type="button" class="close" data-dismiss="modal">&times</button>

			</div>
			
			<div class="modal-body">
				<p>Are you sure you want to delete this student?<br>
					This action is irreversible.<br>
					Click <b class='red'>YES (<span class="fas fa-trash"></span>)</b> to continue or <b>NO</b> to cancel.

				</p>
				{!! Form::open(['route'=>['students.destroy', '$id'], 'id'=>"deleteStudentForm", 'method'=>'delete']) !!}

				{!! Form::submit('YES', ['class'=>'btn btn-danger']) !!}&nbsp<button class="btn btn-success" data-dismiss="modal">NO</button>
			</div>

				{!! Form::close() !!}

				

			<div class="modal-footer">
				
			</div>

		</div>
	</div>								
</div> 
<!-- end Student Delete modal end-->


<!-- begin score_sheet Delete modal  -->

<div class="modal fade" id="ScoreSheetDeleteModal" >
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">DELETE SCORE.</h4>
				<button type="button" class="close" data-dismiss="modal">&times</button>

			</div>
			
			<div class="modal-body">
				<p>Are you sure you want to delete this score?<br>
					This action is irreversible.<br>
					Click <b>YES</b> to continue or <b>NO</b> to cancel.

				</p>
				{!! Form::open(['route'=>['score_sheet.show', '$id'], 'id'=>"deleteScoreSheetForm", 'method'=>'delete']) !!}

				{!! Form::submit('YES', ['class'=>'btn btn-danger']) !!}&nbsp<button class="btn btn-success" data-dismiss="modal">NO</button>
			</div>

				{!! Form::close() !!}

				

			<div class="modal-footer">
				
			</div>

		</div>
	</div>								
</div> 
<!-- end score_sheet Delete modal end-->


<div class="modal fade" id="addCourse" tabindex="-1" role="dialog" aria-labelledby="addCourseModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="addCourseModal">Attribute Courses to #{{$student->student_id}}</h4>
        
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		 
		 <div class="row">
		      <p class="pull-right"></p>
		 </div>

		 <div class="row">
		 	<h5 class="text-weight-bold">Level #{{ $student->level }} Courses </h5><hr>

			 	<div id="ajaxMessages" class="col-md-12">
			 		
			 	</div>
		 	<div class="col-md-12">

			 		{!! Form::open(['route'=>'score_sheet.store', 'id'=>'createScore_sheet', 'class'=>'form', 'method'=>'POST']) !!}


			 		<div class="form-group">
			 			
				 		{!! Form::text('student_id', $student->student_id, ['hidden'=>'hidden', 'class'=>'form-check-input']) !!}
				 		{!! Form::text('academic_year', $current_ay,  ['hidden'=>'hidden', 'class'=>'form-check-input']) !!}		 			
			 		</div>
		 		<?php $i=0 ?>
		 		@forelse ($courses as $course)
		 		<?php $i++?>
		 		<hr>

			 		<div class="form-group">

			 			<input type="checkbox" name="courses_id[]" value="{{ $course->course_id }}" >
			 			<label for="courses_id[]">{{$course->course_id}}-{{ $course->cname }}</label><br> 			
			 		</div>


		 		@empty

			 		<div class="col-md-12 md-3">
			 			<p>
							<ul>
								<li>
						 			No course to display. Please create course(s) for level #{{ $student->level }}.
								</li>
								<li>
									Click to <a href="{{ route('course.create')}}" > add courses.</a>								
								</li>
							</ul>
			 		</p>
			 	</div>

		 		@endforelse

			 		<div class="form-group">
				 		{!! Form::label('semester', 'Semester', ['class'=>'control-label']) !!}
				 		{!! Form::select('semester', ['1'=>'1','2'=>'2', '3'=>'3', '4'=>'4'], null, ['placeholder'=>'Select Semester', 'class'=>'form-control', 'required'=>'required']) !!}
			 		</div>

			 		<div class="form-group">
			 		</div>

			 		{!! Form::close() !!}
		 	</div>	 	
		 </div>


      </div>
      <div class="modal-footer">     	       

		<button <?php if ($i==0){echo ('disabled');} ?> form='createScore_sheet' id='createScoreButton'  type = <?php if(($i==0)) { echo 'hidden';} else{ echo 'submit';} ?>  class="btn btn-success">ADD SCORES</button>

      </div>
    </div>
  </div>
</div>

<!-- End choose course modal -->
<style>
	.profile-pic
	{
		border: 5px solid red;
		border-radius: 1rem 2rem !important;
	}
	.red
	{
		color:red;
	}
</style>
@endsection
@section ('scripts')
	<script type="text/javascript" src="{!! asset('js/students/show.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('js/score_sheet/ajax/ajaxScoreSheet.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('js/info/create.js') !!}"></script>
@endsection
