
	<div class="form-row mb-3">
		<div class="col-md-6">
			{!!Form::label('course_id', "Course id", ['class'=>'control-label'])  !!}
			{!!Form::text('course_id', null, ['class'=>'form-control', 'placeholder'=>"Course id", 'required'=>'required', 'maxlength'=>'25']) !!}
		</div>

		<div class="col-md-6">
			{!!Form::label('student_id', "Student id" ,['class'=>'control-label'] )!!}
			{!!Form::text('student_id', null, ['class'=>'form-control', 'placeholder'=>"Student id", 'required'=>'required', 'maxlength'=>'25']) !!}
		</div>
	</div>
	<div class="form-row mb-3">  

		<div class="col-md-3">
			{!! Form::label('score', 'Score ca /20', ['class'=>'control-label']) !!}
			{!! Form::number('score', null, ['class'=>'form-control', 'placeholder'=>'Score /20', 'min'=>0, 'step'=>'0.01', 'max'=>'20', 'required'=>'required']) !!}
		</div>

		<div class="col-md-3">
			{!! Form::label('confirmed', 'Confirm ca', ['class'=>'control-label']) !!}
			{!! Form::select('confirmed', ['1'=>'confirmed', '0'=>'not confirmed'], null, ['placeholder'=>'Confirm Score', 'class'=>'form-control']) !!}
		</div>

		<div class="col-md-3">
			{!! Form::label('score_ex', 'Score exam /20', ['class'=>'control-label']) !!}
			{!! Form::number('score_ex', null, ['class'=>'form-control', 'placeholder'=>'Score /20', 'min'=>0, 'step'=>'0.01', 'max'=>'20', 'required'=>'required']) !!}
		</div>

		<div class="col-md-3">	

			{!! Form::label('confirmed_ex', 'Confirm exam', ['class'=>'control-label']) !!}
			{!! Form::select('confirmed_ex', ['1'=>'confirmed', '0'=>'not confirmed'], null, ['placeholder'=>'Confirm Score', 'class'=>'form-control']) !!}
			<br>
			@error('confirmed_ex')
			<div class="alert alert-danger">{{$message}}</div>
		@enderror
		</div>
	</div>
	<div class="form-row mb-3">

		<div class="col-md-6">
			{!! Form::label('academic_year', 'Academic Year', ['class'=>'control-label']) !!}
			{!! Form::select('academic_year', ['2019/2020'=>'2019/2020','2020/2021'=>'2020/2021','2021/2022'=>'2021/2022','2023/2024'=>'2023/2024'], null, ['placeholder'=>'Academic Year', 'class'=>'form-control', 'required'=>'required']) !!}
		</div>

		<div class="col-md-6">
			{!! Form::label('semester', 'Semester', ['class'=>'control-label']) !!}
			{!! Form::number('semester', null, ['class'=>'form-control', 'placeholder'=>'Semester', 'step'=>'1', 'min'=>0, 'max'=>'4', 'required'=>'required']) !!}
			<br>
			{!! Form::submit('Submit', ['class'=>'btn btn-success']) !!}

		</div>
	</div><hr>
