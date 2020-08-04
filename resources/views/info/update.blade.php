@extends('layouts.app-bv4')
 
@section('content')


	<div class="row">
		<div class="col-md-9 offset-md-2">
			@if (session('status'))
				<div class="alert alert-success">{{ session('status') }}
				</div>
			@endif
			<h1>UPDATE INFORMATION #{{$info->id}}</h1>
			<div class="">
				{!! Form::Model($info, ['route' => ['info.update', $info], 'method'=>'PUT', 'id'=>'updateInfo', 'class'=>'form']) !!}

					@include('shared.createInfoForm')

				{!! Form::close() !!}
			</div>
			
		</div>
	</div>
	<a href="{{ route('info.index') }}">All INFORMATION &nbsp<span class="fas fa-search"></span></a>
<style type="text/css">
	label.error{
		color: red;
		font-style: italic;
		
	}
</style>
@endsection

@section ('scripts')
	<script type="text/javascript" src="{!! asset('js/jquery.validate.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('js/info/update.js') !!}"></script>
@endsection