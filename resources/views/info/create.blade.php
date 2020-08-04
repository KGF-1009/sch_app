@extends('layouts.app-bv4')

@section('content')

	<div class="row">
		<div class="col-md-9 offset-md-2">

			@if (session('status'))
				<div class="alert alert-success">{{ session('status') }}</div>
			@endif
			<h1>NEW INFO</h1>


				{!! Form::open(['route'=>'info.store','class' => 'form', 'id'=>'createInfo', 'method' => 'post']) !!}

					@include('shared.createInfoForm')

				{!! Form::close() !!}

		</div>
	</div>

<style type="text/css">
	label.error{
		color: red;
		font-style: italic;
		
	}
</style>
@endsection

@section ('scripts')
	<script type="text/javascript" src="{!! asset('js/jquery.validate.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('js/info/create.js') !!}"></script>
@endsection
