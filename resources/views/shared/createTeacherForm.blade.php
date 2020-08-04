<div class="form-row mb-3">
	<div class="col-md-2">
		{!!Form::label('matricule', "Matricule") !!}
		{!!Form::text('matricule', null, ['class'=>'form-control', 'placeholder'=>"Matricule", 'required'=>'required', 'minlength'=>'2','maxlength'=>'5']) !!}

		@error('matricule')
			<div class="alert alert-danger">{{$message}}</div>
		@enderror
	</div>

	<div class="col-md-3">
		{!!Form::label('fname', "First Name") !!}
		{!!Form::text('fname', null, ['class'=>'form-control', 'placeholder'=>"First name", 'required'=>'required', 'maxlength'=>'25']) !!}
	</div>
	<div class="col-md-4">
		{!!Form::label('sname', "Second Name") !!}
		{!!Form::text('sname', null, ['class'=>'form-control', 'placeholder'=>"Second name", 'maxlength'=>'50']) !!}
	</div>
	<div class="col-md-3">
		<div class="form-check form-check-inline col-md-3">
			{!! Form::label('male', 'Male') !!} &nbsp
			{!! Form::radio('sex', 'male', ['id'=>'male', 'class'=>'form-check-input']) !!} &nbsp &nbsp
			{!! Form::label('female', 'Female') !!} &nbsp
			{!! Form::radio('sex', 'female', ['id'=>'female', 'class'=>'form-check-input', 'required'=>'required']) !!}
		</div>
		</div>		
</div>

<div class="form-row mb-3">
	<div class="col-md-2">
		{!! Form::label('role', 'Role', ['class'=>'control-label']) !!}
		{!! Form::select('role', ['no role'=>'no role','Principal'=>'Principal', 'Vice Principal'=>'Vice Principal', 'Discipline Master'=>'Discipline Master', 'Bursar' => 'Bursar','HOD'=> 'HOD','Dean'=>'Dean'], null, ['placeholder'=>'Select Role', 'class'=>'form-control', 'required'=>'required']) !!}
	</div>
	

	<div class="col-md-3">
		{!! Form::label('department_id', 'Select department (dummy field)') !!}
		{!! Form::select('department_id', collect(['0'=>'Enter department'])->union($departments->pluck('name', 'id')), null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-md-2">
		{!! Form::label('diploma', 'Diploma', ['class'=>'control-label']) !!}
		{!! Form::select('diploma',  ['none'=>'none', '1st degree'=>'1st degree','masters'=>'masters','Phd'=>'Phd','Doc'=>'Doc'], null, ['placeholder'=>'Select Diploma', 'class'=>'form-control', 'required'=>'required']) !!}
	</div>				

	<div class="col-md-3">
		{!! Form::label('nation', 'Nationality', ['class'=>'control-label']) !!}
		{!! Form::select('nation', ['cameroon'=> 'Cameroon','nigeria'=>'Nigeria','ghana'=>'Ghana'], 'cameroon', ['placeholder'=>'Select Nationality', 'class'=>'form-control', 'required'=>'required']) !!}
	</div>

	<div class="col-md-2">
		{!! Form::label('address', 'Address') !!}
		{!! Form::text('address', null,['class'=>'form-control', 'required'=>'required', 'minlength'=>'2', 'maxlength'=>'25', 'placeholder'=>'Address']) !!}
	</div>
</div>

<div class="form-row mb-3">
	<div class="col-md-3">
		{!! Form::label('email', 'Email') !!}
		{!! Form::email('email', null, ['class'=>'form-control', 'required'=>'required', 'placeholder'=>'Email']) !!}
	</div>

	<div class="col-md-3">
		{!! Form::label('tel', 'Telephone') !!}
		{!! Form::text('tel', null, ['class'=>'form-control', 'required'=>'required', 'placeholder'=>'Telephone']) !!}
	</div>			
	<div class="col-md-3">
		{!! Form::label('dateOfBirth', 'Date of Birth') !!}
		{!! Form::date('dateOfBirth', null, ['class'=>'form-control', 'required'=>'required']) !!}
	</div>
	<div class="col-md-3">
		{!! Form::label('placeOfBirth', 'Place of Birth') !!}	{!! Form::text('placeOfBirth', null, ['class'=>'form-control', 'required'=>'required', 'minlength'=>'2', 'maxlength'=>'25', 'placeholder'=>'Place of Birth']) !!}
	</div>
				<br>
</div>


<div class="form-row mb-3">
	<div class="col-md-12 flex-column py-2">
		{!! Form::label('image', 'Profile Image', ['class'=>'form-label']) !!}<br>
		{!! Form::file('image', null, ['class'=>'form-control', 'placeholder'=>'Profile Image']) !!}
		<input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
		<!-- max file size in bytes -->
		<br>
	</div>

</div>

<div class="form-row mb-3">
	<div class="col-md-12">
		{!! Form::submit('Submit', ['class'=>'btn btn-success']) !!}		
	</div>
	
</div>
<hr>
