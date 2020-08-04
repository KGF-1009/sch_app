@extends('layouts.app-bv4')

@section('content')
		<div class="row">
			<div class="col-md-8 offset-md-1">

				@if (session('status'))
					<div class="alert alert-success">{{ session('status') }}</div>
				@endif

				<h1>SCORE SHEET</h1><hr>

				<table id='score_sheetTable' class="table table-hover">
					<thead class="thead-dark">
						<tr>
							<th>#</th>
							<th>Student</th>
							<th>Course</th>
							<th>Score (on 20)</th>
							<th>Academic Year</th>
							<th>Semester</th>
							<th>Edit</th>
							<th>View</th>
							<th>Delete</th>
						</tr>						
					</thead> 

					<tbody>
					<?php $i = 0; ?> 
				
					@forelse($score_sheets as $score_sheet)
					<tr>
						<td><?php echo ++$i; ?></td>
						<td>
							<a href="{{ route('students.show', $score_sheet->student_id) }}">
							{{ $score_sheet->student_id }}								
							</a>
						</td>
						<td>
							<a href="{{ route('course.show', $score_sheet->course_id) }}">
							{{ $score_sheet->course_id }}									
							</a>
						</td>
						<td>{{ $score_sheet->score }}</td>
						<td>{{ $score_sheet->academic_year }}</td>
						<td>{{ $score_sheet->semester }}</td>
						<td><a href="{{ route('score_sheet.edit', $score_sheet) }}"><span class="fas fa-edit"></span></a></td>
						<td><a class='view' href="{{ route('score_sheet.show', $score_sheet) }}"><span class="fas fa-search"></span></a></td>
						<td>
							<a >
								<button href="{{ route('score_sheet.show', $score_sheet) }}" type="button" class="deleteScoreSheetButton btn btn-danger" >
									<!-- data-target="#deleteModal" data-toggle='modal'-->
									<span class="fas fa-ban"></span>
								</button>
							</a> 
						</td>


					@empty
						<td>No data to display</td>
					</tr>
						@endforelse()
				</tbody>
				<!-- Delete modal begin-->

	<div class="modal fade" id="deleteModal" >
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">DELETE SCORES</h4>
				<button type="button" class="close" data-dismiss="modal">&times</button>

			</div>
			
			<div class="modal-body">
				<p>Are you sure you want to delete this Score?<br>
					This action is irreversible.<br>
					Click <b>YES</b> to continue or <b>NO</b> to cancel.

				</p>
				{!! Form::open(['route'=>['score_sheet.destroy', '$id'], 'id'=>"deleteScoreSheetForm", 'method'=>'delete']) !!}

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
					<a href="{{route('score_sheet.create')}}">ADD SCORES&nbsp<span class="fas fa-book"></span></a>				
			</div>
		</div>

@endsection

@section ('scripts')
	<script type="text/javascript" src="{!! asset('js/score_sheet/delete.js') !!}"></script>
@endsection