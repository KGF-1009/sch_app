@extends('layouts.vue')

@section('content')
	<div id="app">
		<div class="row">
			<div class="col-md-8 offset-md-1">
				<button class="float-right btn btn-sm btn-outline-primary">
					<a href="{{ route('students.create')}}">ADD STUDENT&nbsp<span class="fas fa-user-plus"></span></a>
				</button>

				<!-- insert table here from here using Vue. -->
				<students-list></students-list>
				
			</div>
		</div>
		
	</div>
@endsection

