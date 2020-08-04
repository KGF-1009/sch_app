<?php $i = 0; 
	$male=0;
	$female=0;?>
@forelse($students as $student)
<tr class="student_data">
	<td><?php echo ++$i; ?></td>
	<td><a href="{{ route('students.show', $student->student_id) }}">{{ $student->student_id }}</a></td>
	<td>{{ $student->fname }}</td>
	<td>{{ $student->sname }}</td>
	<td><a href="{{route('department.index')}}">{{ $student->name }}</a></td>
	<td>{{ $student->level }}</td>
	<td>{{ $student->sex == 'male' ? 'M': 'F' }}</td>
	 <?php $male = $student->sex == 'male' ? ++$male : $male ?>
	 <?php $female = $student->sex == 'female' ? ++$female : $female ?>
	<td ><a title="edit" href="{{ route('students.edit', $student->student_id) }}"><span class="fas fa-edit"></span></a></td>
	<td>
		<a title="delete">
			<button href="{{ route('students.show', $student->student_id) }}" type="button" class="deleteStudentButton btn  btn-sm btn-outline-danger" >
				<!-- data-target="#deleteModal" data-toggle='modal'-->
				<span  class="fas fa-trash red"></span>
			</button>
		</a> 
	</td>
</tr>


@empty
<tr class="student_data">
	<td>No data</td>
	<td>No data</td>
	<td>No data</td>
	<td>No data</td>
	<td>No data</td>
</tr>
@endforelse
<tr class="student_data text-info">
	<td colspan="3"></td>
	<td>Total:</td>
	<td><?php echo $i; ?></td>
	<td colspan="3"></td>
</tr>
<tr class="student_data text-info">
	<td colspan="3"></td>
	<td>Male:</td>
	<td><?php echo $male; ?></td>
	<td>
		<?php if($i != 0){echo number_format(100*$male/$i, 0).'%' ;} ?>
	</td>
	<td colspan="2"></td>
</tr>
<tr class="student_data text-info">
	<td colspan="3"></td>
	<td>Female:</td>
	<td><?php echo $female; ?></td>
	<td>
		<?php if($i != 0){echo number_format(100*$female/$i, 0).'%' ;} ?>
	</td>
	<td colspan="2"></td>
</tr>
