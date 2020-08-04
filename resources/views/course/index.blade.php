@extends('layouts.app-bv4')

@section('content')

		<div class="row">
			<div class="col-md-10 offset-md-1">

				@if (session('status'))
					<div class="alert alert-success">{{ session('status') }}</div>
				@endif

				<h1>COURSES</h1><hr>

				<table id='courseTable' class="table table-hover">
					<thead class="thead-dark">
						<tr>
							<th>#</th>
							<th>Course ID</th>
							<th>Course Name</th>
							<th>Coeff</th>
							<th>Course Teacher</th>
							<th>Level</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>						
					</thead>

					<tbody>
					<?php $i = 0; ?>
				
					@forelse($courses as $course)
					<tr>
						<td><?php echo ++$i; ?></td>
						<td><a href="{{ route('course.show', $course->course_id) }}">{{ $course->course_id }}</a></td>
						<td>{{ $course->cname }}</td>
						<td>{{ $course->coeff }}</td>
						<td>
							@if($course->teacher_id != NULL)

								<a href="{{ route('teacher.show', $course->teacher_id) }}">{{ $course->fname.' '.$course->sname}}
								</a>
							@else
								<a href="#">{{ $course->teacher_id }}
								</a>
							@endif



						</td>
						<td>{{ $course->level }}</td>

						<td><a href="{{ route('course.edit', $course->course_id) }}"><span class="fas fa-edit"></span></a></td>
						<td>
							<a >
								<button href="{{ route('course.show', $course->course_id) }}" type="button" class="deleteCourseButton btn btn-danger" >
									<!-- data-target="#deleteModal" data-toggle='modal'-->
									<span class="fas fa-ban"></span>
								</button>
							</a> 
						</td>


					@empty
						<td>No data to display</td>
					</tr>
						@endforelse
				</tbody>
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

											{!! Form::submit('YES', ['class'=>'btn btn-danger']) !!}&nbsp

											<button class="btn btn-success" data-dismiss="modal">NO</button>

											{!! Form::close() !!}

											
										</div>

										<div class="modal-footer">
											
										</div>
									</div>
								</div>								
							</div>				





				</table>
					<a href="{{route('course.create')}}">ADD COURSE&nbsp<span class="fas fa-book"></span></a>				
			</div>
		</div>


@endsection

@section ('scripts')
	<script type="text/javascript" src="{!! asset('js/course/delete.js') !!}"></script>
@endsection