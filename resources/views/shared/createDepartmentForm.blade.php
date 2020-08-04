
<div class="form-group">
	<div>
		{!!Form::label('name','Department:') !!}
		{!!Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Department Name', 'required'=>'required', 'minlength'=>'2', 'maxlength'=>'25']) !!}		
	</div>
	@error('name')
		<div class="alert alert-danger">{{$message}}</div>
	@enderror
</div>

<div class="form-group">
	{!!Form::label('teacher_id', 'Select head of Department')!!}
	{!!Form::select('teacher_id', $teachers->pluck('matricule', 'id')->toArray(), null, ['class' => 'form-control']) !!}

	@error('teacher_id')
		<div class="alert alert-danger">{{$message}}</div>
	@enderror
</div>

<div class="form-group">
	<div>
		{!!Form::label('description','Description of Department:') !!}
		{!!Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'Enter a description for this department.:', 'minlength'=>'5', 'maxlength'=>'250']) !!}		
	</div>
	@error('description')
		<div class="alert alert-danger">{{$message}}</div>
	@enderror
</div>
<div class="form-group">
	{!! Form::submit('Submit', ['class'=>'btn btn-success']) !!}
</div>
<hr>