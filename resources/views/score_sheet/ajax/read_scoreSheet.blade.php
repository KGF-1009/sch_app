
<caption>						
	<h3> SEMESTER {{$semester}} SCORE SHEET FOR 2019/2020</h3>
</caption>
<thead>
	<tr>
		<th>#</th>
		<th>Course</th>
		<th>Course code</th>
		<th>Course master</th>
		<th>Score ca(on 20)</th>
		<th>Score Exam(on 20)</th>
		<th>Total (on 20)</th>
		<th>Coeff</th>
		<th colspan="2">Actions</th>
	</tr>
</thead>
<tbody>
<?php $n = 0; $total=0; $coeffs=0; ?>
@forelse($scoreSheets as $scoreSheet)

	<?php $total +=  $scoreSheet->score*$scoreSheet->coeff; $coeffs += $scoreSheet->coeff ;?>

	<tr>
		<td class="rang"> <?php echo ++$n; ?></td>
		<td class="course_id"><a href="{{route('course.show', $scoreSheet->course_id)}}">{{$scoreSheet->course_id}}</a></td>
		<td class="cname">{{ $scoreSheet->cname}}</td>
		<td class="fname">{{ $scoreSheet->fname}} {{ $scoreSheet->sname}}</td>
		<td class= <?php if ($scoreSheet->score >= 10) {echo 'score-pass';
			# code...
		}else{ echo 'score-fail';}  ?>> {{$scoreSheet->score}}
			
		</td>
		<td class= <?php if ($scoreSheet->score_ex >= 10) {echo 'score-pass';
			# code...
		}else{ echo 'score-fail';}  ?>> {{$scoreSheet->score_ex}}
			
		</td>
		<td class= <?php if ($scoreSheet->Total_score  >= 10) {echo 'score-pass';
			# code...
		}else{ echo 'score-fail';}  ?>> {{ $scoreSheet->Total_score}}
			
		</td>
		<td>{{ $scoreSheet->coeff}}</td>
		<td>
			<a title="edit" href="{{ route('score_sheet.edit', $scoreSheet->id) }}">
				<button  type="button" id="{{ $scoreSheet->id}}" class="updateScoreSheetButton btn btn-sm btn-outline-primary" >
					<!-- data-target="#deleteModal" data-toggle='modal'-->
					<span class="fas fa-edit"></span>
				</button>
			</a> 
		</td>
		<td>
			<a title="delete">
				<button onclick="deleteScoreSheet(this)" href="{{ route('score_sheet.show', $scoreSheet->id) }}" type="button" id="{{ $scoreSheet->id}}" class="deleteScoreSheetButton btn btn-sm btn-outline-danger" >
					<!-- data-target="#deleteModal" data-toggle='modal'-->
					<span class="fas fa-trash"></span>
				</button>
			</a> 
		</td>
	</tr>

@empty
	<tr>
		<td>No data</td>
		<td>No data</td>
		<td>No data</td>
		<td>No data</td>
		<td>No data</td>
	</tr>

@endforelse


@if(isset($recap))
	<tr>
		<td colspan="6" class="text-right text-weight-bold">Total Score:</td>
		<td><?php echo $recap->grand_total.'/'.$recap->total_coeff*20 ?></td>
		<td colspan="3"></td>
	</tr>
	<tr>
		<td colspan="6" class="text-right text-weight-bold">Total Coeff:</td>
		<td><?php echo $recap->total_coeff ?></td>
		<td colspan="3"></td>
	</tr>
	<tr>
		<td colspan="6" class="text-right text-weight-bold">Average:</td>
		@if($recap->total_coeff != 0)
			<td class=<?php if ($recap->grand_total/$recap->total_coeff >= 10){echo 'score-pass';}else{ echo 'score-fail';} ?> >
				<?php echo number_format($recap->grand_total/$recap->total_coeff, 2); ?>
			</td>
		@endif
		<td colspan="3"></td>
	</tr>

@endif



</tbody>

<script>
	function deleteScoreSheet(e){
		
			
			$('#deleteScoreSheetForm').attr('action', $(e).attr('href'));
			//alert(link);
			$('#ScoreSheetDeleteModal').modal();
			console.log('from read.scoreSheet.blade.php');
		
	}
</script>
<style>
	td.score-pass{
		color:green;
		font-weight: bold;
	}
	td.score-fail{
		color:red;
		font-weight: bold;
	}
</style>

