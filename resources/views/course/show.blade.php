@extends('layouts.app-bv4')

@section('content')

		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				Marticule: {{$course->course_id}}<br>
				Course Name: {{$course->cname}}
				<br>
				Course Teacher: {{$course->teacher_id}}<br>
				Coefficient: {{$course->coeff}}<br>
				Level: {{$course->level}}<br>
				<a href="{{ route('course.edit', $course) }}"><button class="btn btn-warning">UPDATE&nbsp<span class="fas fa-edit"></span></button></a>
				<a href="{{ route('course.index') }}"><button class="btn btn-success">All Courses&nbsp<span class="fas fa-search"></span></button></a>
				<a >
					<button href="{{ route('course.show', $course) }}" type="button" class="deleteCourseButton btn btn-danger" >
						<!-- data-target="#deleteModal" data-toggle='modal'-->
						Delete&nbsp<span class="fas fa-ban"></span>
					</button>
				</a>
			</div>
			<div class="col-md-2"></div>
		</div>



				<!-- Delete modal begin-->

							<div class="modal fade" id="deleteModal" >
								<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">DELETE COURSE</h4>
											<button type="button" class="close" data-dismiss="modal">&times</button>

										</div>
										
										<div class="modal-body">
											<p>Are you sure you want to delete this Course?<br>
												This action is irreversible.<br>
												Click <b>YES</b> to continue or <b>NO</b> to cancel.
	
											</p>
											{!! Form::open(['route'=>['course.destroy', '$id'], 'id'=>"deleteCourseForm", 'method'=>'delete']) !!}

											{!! Form::submit('YES', ['class'=>'btn btn-danger']) !!}&nbsp<button class="btn btn-success" data-dismiss="modal">NO</button>
										</div>

											{!! Form::close() !!}

											

										<div class="modal-footer">
											
										</div>
									</div>
								</div>								
							</div>
@endsection
			<!-- Delete modal end-->
@section ('scripts')
	<script type="text/javascript" src="{!! asset('js/course/delete.js') !!}"></script>
@endsection