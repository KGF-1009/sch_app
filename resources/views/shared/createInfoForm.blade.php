
<div class="form-row mb-3">
	<div class="col-md-3">
		{!!Form::label('info_name','Name') !!}
		{!!Form::text('info_name', null, ['class'=>'form-control', 'placeholder'=>'Name', 'maxlength'=>'20', 'minlength'=>'2', 'required'=>'required']) !!}
		@error('info_name')
			<div class="alert alert-danger">{{$message}}</div>
		@enderror
	</div>

	<div class="col-md-9">
		{!!Form::label('info','Infomation') !!}
		{!!Form::text('info', null, ['class'=>'form-control', 'required'=>'required', 'maxlength'=>'100', 'minlength'=>'2','placeholder'=>'Value of Info']) !!}

		@error('info')
			<div class="alert alert-danger">{{$message}}</div>
		@enderror
	</div>

</div>

<div class="form-row mb-3">
	<div class="col-md-4">
		{!!Form::label('author','Author') !!}
		{!!Form::text('author', 'TBD', ['class'=>'form-control', 'placeholder'=>'Author of Info']) !!}

		@error('author')
			<div class="alert alert-danger">{{$message}}</div>
		@enderror
	</div>

</div>

<div class="form-row mb-3">
	<div class="col-md-3">
		{!! Form::submit('SUBMIT', ['class'=>'btn btn-success']) !!}
	</div>
</div>
<hr> 