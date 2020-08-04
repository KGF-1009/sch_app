
@extends('layouts.app-bv4')

@section('content')
	<div class="row">
		<div class="col-md-8 offset-md-1">

			@if (session('status'))
				<div class="alert alert-success">{{ session('status') }}</div>
			@endif

			<button class="float-right btn btn-sm btn-outline-primary">
				<a href="{{ route('students.create')}}">ADD STUDENT&nbsp<span class="fas fa-user-plus"></span></a>
			</button>

			<table id='studentTable' class="table table-hover m-t-3">
				<caption>
					<h2>ALL STUDENTS TABLE</h2>
				</caption>
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Matricule</th>
						<th>First Name</th>
						<th>Second Name</th>
						<th>Department</th>
						<th>Level</th>
						<th>Sex</th>
						<th colspan="2">Modify</th>
					</tr>
				</thead>
						
				<tbody id="body_student_table">
					<tr>
						<form id='searchStudent' action="{{ route('refresh_student')}}" method="post">
							@csrf
						<td></td>
						<td>
							<input type="text" class="search form-control" id="tbl_student_id" placeholder="matricule...." name="tbl_student_id">
						</td>
						<td>
							<input type="text" class="search form-control" id="tbl_fname" placeholder="Search...." name="tbl_fname">
						</td>
						<td>
							<input type="text" class="search form-control" id="tbl_sname" placeholder="Search...." name="tbl_sname">
						</td>
						<td>
							<!-- <input type="text" class="search form-control" id="tbl_department_id" placeholder="Search...." name="tbl_department_id"> -->
							<select name="tbl_department_id" id="tbl_department_id" class="form-control">
								<option value="">Select Department</option>
								@forelse ($departments as $department)
									<option value="{{$department->id}}">{{ $department->name}}</option>
								@empty


								@endforelse
							</select>
						</td>
						<td>
							<input type="text" class="search form-control" id="tbl_level" placeholder="Search...." name="tbl_level">
						</td>
						<td colspan="3">
							<button form = 'searchStudent' type="submit" class="btn btn-sm btn-outline-info">Refresh								
							</button>
						</td>
						</form>
					</tr>
					@include('shared.indexStudentTable')
				</tbody>
		</table>

	<!-- begin Student Delete modal begin-->

<div class="modal fade" id="deleteModal" >
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">DELETE STUDENT</h4>
				<button type="button" class="close" data-dismiss="modal">&times</button>

			</div>
			
			<div class="modal-body">
				<p>Are you sure you want to delete this student?<br>
					This action is irreversible.<br>
					Click <b>YES</b> to continue or <b>NO</b> to cancel.

				</p>
				{!! Form::open(['route'=>['students.destroy', '$id'], 'id'=>"deleteStudentForm", 'method'=>'delete']) !!}

				{!! Form::submit('YES', ['class'=>'btn btn-danger']) !!}&nbsp

				<button class="btn btn-success" data-dismiss="modal">NO</button>

				{!! Form::close() !!}

				
			</div>

			<div class="modal-footer">
				
			</div>
		</div>
	</div>								
</div>
<!-- end Student Delete modal end-->	
		</div>
	</div>
<style>
	#body_student_table{
		transition: all 3s linear;
	}

</style>
@endsection
@section ('scripts')
	<script type="text/javascript" src="{!! asset('js/students/delete.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('js/students/ajax/indexStudent.js') !!}"></script>
@endsection