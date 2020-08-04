@extends('layouts.app-bv4')

@section('content')
		<div class="row">
			<div class="col-md-8 offset-md-1">

				@if (session('status'))
					<div class="alert alert-success">{{ session('status') }}</div>
				@endif

				<h1>GENERAL INFORMATION</h1><hr>

				<table id='infoTable' class="table table-hover">
					<thead class="thead-dark">
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Information</th>
							<th>Edit</th>
							<th>View</th>
							<th>Delete</th>
						</tr>						
					</thead> 

					<tbody>
					<?php $i = 0; ?>
				
					@forelse($infos as $info)
					<tr>
						<td><?php echo ++$i; ?></td>
						<td>{{ $info->info_name }}</td>
						<td>{{ $info->info }}</td>

						<td><a href="{{ route('info.edit', $info) }}"><span class="fas fa-edit"></span></a></td>
						<td><a class='view' href="{{ route('info.show', $info) }}"><span class="fas fa-search"></span></a></td>
						<td>
							<a >
								<button href="{{ route('info.show', $info) }}" type="button" class="deleteInfoButton btn btn-danger" >
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
				<h4 class="modal-title">DELETE GENRAL INFORMATION</h4>
				<button type="button" class="close" data-dismiss="modal">&times</button>

			</div>
			
			<div class="modal-body">
				<p>Are you sure you want to delete this information?<br>
					This action is irreversible.<br>
					Click <b>YES</b> to continue or <b>NO</b> to cancel.

				</p>
				{!! Form::open(['route'=>['info.destroy', '$id'], 'id'=>"deleteInfoForm", 'method'=>'delete']) !!}

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
					<a href="{{route('info.create')}}">ADD INFO&nbsp<span class="fas fa-book"></span></a>				
			</div>
		</div>

@endsection

@section ('scripts')
	<script type="text/javascript" src="{!! asset('js/info/delete.js') !!}"></script>
@endsection