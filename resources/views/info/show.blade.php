@extends('layouts.app-bv4')

@section('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				Name: {{$info->info_name}}<br>
				Information: {{$info->info}}
				<br>
				Author: {{$info->author}}<br>
				<a href="{{ route('info.edit', $info) }}"><button class="btn btn-warning">UPDATE&nbsp<span class="fas fa-edit"></span></button></a>
				<a href="{{ route('info.index') }}"><button class="btn btn-success">All Information&nbsp<span class="fas fa-search"></span></button></a>
				<a >
					<button href="{{ route('info.show', $info) }}" type="button" class="deleteInfoButton btn btn-danger" >
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
	</div> <!-- end container-fluid -->
@endsection
			<!-- Delete modal end-->
@section ('scripts')
	<script type="text/javascript" src="{!! asset('js/info/delete.js') !!}"></script>
@endsection