
@extends('layouts.app-bv4')
@section('content')
<div class="row">
	<div class="col-md-3">
	</div>
	<div class="col-md-3">
		<div class="card">
			<div class="card-block text-sm-center">
				<h4>{{$department->name}} DEPARTMENT</h4>
				<p>
					Description:{{$department->description}}<br>
					Head of Department: <a title = 'click to see head of department' href="{{route('teacher.show', $department->teacher_id)}}">{{$teacher->fname.' '.$teacher->sname}}</a>
				</p>
				<a href="{{ route('department.edit', $department->id) }}">
					<button title="Edit department" type="button" class="btn btn btn-outline-primary">
					<!-- data-target="#deleteModal" data-toggle='modal'-->
						Edit <span class="fas fa-edit"></span>
					</button>
				</a>
				<button title="Delete department" href="{{route('department.show', $department->id) }}" type="button" class="deleteDepartmentButton btn btn btn-outline-danger" >
					<!-- data-target="#deleteModal" data-toggle='modal'-->
					Delete<span class="fas fa-trash red"></span>
				</button>
			</div>
		</div>
	</div>		
	<div class="col-md-3"></div>
	<div class="col-md-3"></div>
</div>



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
	<script type="text/javascript" src="{!! asset('js/department/show.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('js/department/delete.js') !!}"></script>
@endsection
