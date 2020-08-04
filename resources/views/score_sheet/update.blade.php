@extends('layouts.app-bv4')

@section('content')
		<div class="row"> 
			<div class="col-md-6 offset-md-2">
				@if (session('status'))
					<div class="alert alert-success">{{ session('status') }}</div>
				@endif
			<h1>UPDATE SCORE #{{$score_sheet->_id}}</h1><hr>
				<div>
					{!! Form::Model($score_sheet, ['route' => ['score_sheet.update', $score_sheet], 'method'=>'PUT', 'id'=>'updateStudent', 'class'=>'form', 'files'=>true]) !!}

						@include('shared.createScoreSheetForm')

					{!! Form::close() !!}

				</div>
				<a href="{{ route('score_sheet.index') }}">All SCORES &nbsp<span class="fas fa-search"></span></a>
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
	<script type="text/javascript" src="{!! asset('js/score_sheet/update.js') !!}"></script>
@endsection
