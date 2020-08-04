
<div class="form-row mb-3">
	<div class="col-md-4">
		{!!Form::label('course_id','Course ID') !!}
		{!!Form::text('course_id', null, ['class'=>'form-control', 'placeholder'=>'Course Code', 'required'=>'required', 'minlength'=>'2', 'maxlength'=>'8']) !!}
		
		@error('course_id')
			<div class="alert alert-danger">{{$message}}</div>
		@enderror
	</div>
	<div class="col-md-4">
		{!!Form::label('cname','Course Name') !!}
		{!!Form::text('cname', null, ['class'=>'form-control', 'placeholder'=>'Course Name', 'required'=>'required', 'minlength'=>'2','maxlength'=>'20']) !!}

		@error('cname')
			<div class="alert alert-danger">{{$message}}</div>
		@enderror

	</div>
	<div class="col-md-4">			
		{!! Form::label('department_id', 'Select department') !!}
		{!! Form::select('department_id', collect(['0'=>'Enter department'])->union($departments->pluck('name', 'id')), null, ['class' => 'form-control', 'min'=> 0]) !!}
	</div>

	</div>
<div class="form-row mb-3">

	<div class="col-md-6">
		{!!Form::label('teacher_id','Teacher ID') !!}
		{!!Form::select('teacher_id', $teachers->pluck('matricule', 'id')->toArray(), null, ['class' => 'form-control']) !!}

		@error('teacher_id')
			<div class="alert alert-danger">{{$message}}</div>
		@enderror
	</div>

	<div class="col-md-3">
		{!!Form::label('coeff','Coefficient') !!}
		{!!Form::number('coeff', null, ['class'=>'form-control', 'placeholder'=>'Coefficient', 'required'=>'required', 'step'=>'1', 'min'=>1, 'max'=>'4']) !!}

		@error('coeff')
			<div class="alert alert-danger">{{$message}}</div>
		@enderror
	</div>
	<div class="col-md-3">
		{!!Form::label('level','level') !!}
		{!!Form::number('level', null, ['class'=>'form-control', 'placeholder'=>'level', 'required'=>'required', 'step'=>'1' , 'min'=>1, 'max'=>'7']) !!}<br>
		@error('level')
			<div class="alert alert-danger">{{$message}}</div>
		@enderror
	</div>
</div>
<hr>
<div class="col-md-3">
	{!! Form::submit('SUBMIT', ['class'=>'btn btn-success']) !!}	
</div>