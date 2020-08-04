<template>	
	<tr>
		<td>
			{{ event.id }}
		</td>
		<td>
			{{ event.student_id }}
		</td>
		<td>
			{{ event.course_id }}
		</td>
		<td>
			{{ event.score }}
		</td>
		<td>
			{{ event.score_ex }}
		</td>
		<td>
			<button v-bind:class="[counter%2 == 0 ? attend : notAttend ]" @click="ToggleStatus">{{ status }}</button>
		</td>
		<td>
			<button class='btn btn-sm btn-danger' @click.prevent="$emit('delete', event.student_id)">Delete</button>
		</td>
	</tr>
</template>
<script>
	export default {

		data(){
			return {
			status:'Attending',
			counter:0,
			notAttend:'btn btn-sm btn-danger',
			attend:'btn btn-sm btn-success'
			}
		},
		methods:{
			ToggleStatus(){

				this.status = ++this.counter % 2 == 0 ? "Attending" : "Not attending"
			}
		
		},
		props:{
			event: Object
		}
	}
</script>
<style>
	isAttending:
</style>