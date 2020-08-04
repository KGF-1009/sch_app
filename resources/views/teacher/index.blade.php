@extends('layouts.app-bv4')

@section('content')


	<div class="row">
		<div class="col-md-10 offset-md-1">

			@if (session('status'))
				<div class="alert alert-success">{{ session('status') }}</div>
			@endif
			<button type="button" class="btn btn-sm btn-outline-info float-right">
				<a href="{{ route('teacher.create')}}">ADD TEACHER&nbsp<span class="fas fa-user-plus"></span></a>
			</button>
			<table id='teacherTable' class="table table-hover">
			<caption>
				<h2>All Teachers</h2>
				<hr>
			</caption>

				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Matricule</th>
						<th>First Name</th>
						<th>Second Name</th>
						<th>Department Name</th>
						<th>Role</th>
						<th>Sex</th>
						<th colspan="2">Action</th>
						
					</tr>
				</thead>
						
				<tbody id="body_teacher_table">
					<tr>
						<form id='searchTeacher' action="{{route('refresh_teacher')}}" method="post">
							@csrf
						<td></td>
						<td>
							<input type="text" class="search form-control" id="tbl_teacher_id" placeholder="matricule...." name="tbl_teacher_id">
						</td>
						<td>
							<input type="text" class="search form-control" id="tbl_fname" placeholder="Search...." name="tbl_fname">
						</td>
						<td>
							<input type="text" class="search form-control" id="tbl_sname" placeholder="Search...." name="tbl_sname">
						</td>
						<td>

							{!! Form::select('tbl_department_id', collect(['xxx'=>'Search department...', ''=>'None'])->union($departments), null, ['class' => 'form-control']) !!}
						</td>
						<td>
							<input type="text" class="search form-control" id="tbl_role" placeholder="Search...." name="tbl_role">
						</td>
<!-- 						<td>
							<select name="tbl_sex" id="tbl_sex" class="form-control">
								<option>Select Gender</option>
								<option value="male">M</option>
								<option value="female">F</option>
							</select>
						</td> -->
						<td></td>
						<td colspan="2">
							<button form = 'searchTeacher' type="submit" class="btn btn-sm btn-outline-info">Refresh								
							</button>
						</td>
						</form>
					</tr>

					@include('shared.indexTeacherTable')
				</tbody>

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

				{!! Form::submit('YES', ['class'=>'btn btn-danger']) !!}&nbsp

				<button class="btn btn-success" data-dismiss="modal">NO</button>

				{!! Form::close() !!}

				
			</div>

			<div class="modal-footer">
				
			</div>
		</div>
	</div>								
</div>
			<!-- Delete modal end-->	
				
			</table>
			

		</div>
	</div>
@endsection
@section ('scripts')
	<script type="text/javascript" src="{!! asset('js/teacher/delete.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('js/teacher/ajax/indexTeacher.js') !!}"></script>
@endsection