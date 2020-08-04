<!-- $departments = department::all();
        $departments = DB::table('departments')
                        ->leftJoin('teachers','teachers.id', '=','departments.teacher_id')
                        ->select('departments.*','teachers.fname', 'teachers.sname')
                        ->get();
                        
        return view('department.index', compact('departments')); -->
<?php $i = 0 ?>
@forelse($departments as $department)
<tr class="department_data">
	<td><a href="{{route('department.show', $department->id) }}"><?php echo ++$i; ?></a></td>						
	<td>{{ $department->name }}</td>
	<td>

		@if($department->teacher_id != NULL)
			<a title="click to see teacher" href="{{route('teacher.show', $department->teacher_id)}}">
				{{$department->fname}}&nbsp{{$department->sname}}			
			</a>
		@else
			<a title="click to see teacher" href="#">
				{{$department->fname}}&nbsp{{$department->sname}}			
			</a>
		@endif
	</td>
	<td>{{ $department->description }}</td>

	<td><a title="edit" href="{{ route('department.edit', $department->id) }}"><span class="fas fa-edit"></span></a></td>
	<td>
		<a title="delete" >
			<button href="{{route('department.show', $department->id) }}" type="button" class="deleteDepartmentButton btn btn-sm btn-outline-danger" >
				<!-- data-target="#deleteModal" data-toggle='modal'-->
				<span class="fas fa-trash red"></span>
			</button>
		</a> 
	</td>
</tr>

@empty

<tr class="department_data">
	<td>No data</td>
	<td>No data</td>
	<td>No data</td>
	<td>No data</td>
	<td>No data</td>
	<td>No data</td>
	<td colspan="3"></td>
</tr>

@endforelse
