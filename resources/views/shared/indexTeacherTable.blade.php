<?php $i = 0; 
	$male=0;
	$female=0;?>

@forelse($teachers as $teacher)
<tr class="teacher_data">
	<td><?php echo ++$i; ?></td>
	<td><a href="{{ route('teacher.show', $teacher->id) }}">{{ $teacher->matricule }}</a></td>						
	<td>{{ $teacher->fname }}</td>
	<td>{{ $teacher->sname }}</td>
	<td>{{ $departments->get($teacher->department_id) }}</td>
	<td>{{ $teacher->role }}</td>
	<td>{{ $teacher->sex == 'male' ? 'M': 'F' }}</td>
	<?php $male = $teacher->sex == 'male' ? ++$male : $male ?>
	 <?php $female = $teacher->sex == 'female' ? ++$female : $female ?>
	<td><a title="edit" href="{{ route('teacher.edit', $teacher->id) }}"><span class="fas fa-edit"></span></a></td>
	<td>
		<a title="delete" >
			<button href="{{route('teacher.show', $teacher->id) }}" type="button" class="deleteTeacherButton btn btn-sm btn-outline-danger" >
				<!-- data-target="#deleteModal" data-toggle='modal'-->
				<span class="fas fa-trash red"></span>
			</button>
		</a> 
	</td>
</tr>

@empty

<tr class="teacher_data">
	<td>No data</td>
	<td>No data</td>
	<td>No data</td>
	<td>No data</td>
	<td>No data</td>
	<td>No data</td>
	<td colspan="3"></td>
</tr>

@endforelse
<tr class="teacher_data text-info">
	<td colspan="4"></td>
	<td>Total:</td>
	<td><?php echo $i; ?></td>
	<td colspan="3"></td>
</tr>
<tr class="teacher_data text-info">
	<td colspan="4"></td>
	<td>Male:</td>
	<td><?php echo $male; ?></td>
	<td>
		<?php if($i != 0){echo number_format(100*$male/$i, 0).'%' ;} ?>
	</td>
	<td colspan="2"></td>
</tr>
<tr class="teacher_data text-info">
	<td colspan="4"></td>
	<td>Female:</td>
	<td><?php echo $female; ?></td>
	<td>
		<?php if($i != 0){echo number_format(100*$female/$i, 0).'%' ;} ?>
	</td>
	<td colspan="2"></td>
</tr>
