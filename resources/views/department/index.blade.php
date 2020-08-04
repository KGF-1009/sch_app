
@extends('layouts.app-bv4')

@section('content')
	<div class="row">
		<div class="col-md-8 offset-md-1">

			@if (session('status'))
				<div class="alert alert-success">{{ session('status') }}</div>
			@endif

			<button class="float-right btn btn-sm btn-outline-primary">
				<a href="{{ route('department.create')}}">ADD Department&nbsp<span class="fas fa-user-plus"></span></a>
			</button>

			<table id='departmentTable' class="table table-hover m-t-3">
				<caption>
					<h2>DEPARTMENTS TABLE</h2>
				</caption>
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>HOD</th>
						<th>Description</th>
						<th colspan="2">Modify</th>
					</tr>
				</thead>
						
				<tbody id="body_department_table">
					@include('shared.indexDepartmentTable')
				</tbody>
		</table>

	<!-- begin department Delete modal begin-->

<div class="modal fade" id="deleteModal" >
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">DELETE Department</h4>
				<button type="button" class="close" data-dismiss="modal">&times</button>

			</div>
			
			<div class="modal-body">
				<p>Are you sure you want to delete this department?<br>
					This action is irreversible.<br>
					Click <b>YES</b> to continue or <b>NO</b> to cancel.

				</p>
				{!! Form::open(['route'=>['department.destroy', '$id'], 'id'=>"deleteDepartmentForm", 'method'=>'delete']) !!}

				{!! Form::submit('YES', ['class'=>'btn btn-danger']) !!}&nbsp

				<button class="btn btn-success" data-dismiss="modal">NO</button>

				{!! Form::close() !!}

				
			</div>

			<div class="modal-footer">
				
			</div>
		</div>
	</div>								
</div>
<!-- end department Delete modal end-->	
		</div>
	</div>
<style>
	#body_department_table{
		transition: all 3s linear;
	}

</style>
@endsection
@section ('scripts')
	<script type="text/javascript" src="{!! asset('js/department/delete.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('js/departments/ajax/indexdepartment.js') !!}"></script>
@endsection