<template>
	<div>
		<table class='table table-stripped table-hover'>
			<caption><h1>Working with lists in Vue ({{events.length}}) </h1></caption>
			<thead>
				<tr>
					<th>ID</th>
					<th>Student Id</th>
					<th>Course Id</th>
					<th>Score ca/20</th>
					<th>Score exam /20</th>
					<th>Status</th>			
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<event-item 
					v-for="event in events"
					:event ='event'
					:key='event.id'
					ref='event.student_id' 
					v-on:delete='prepareDelete(event.id)'>
				</event-item>
			</tbody>
		</table>

		<h1>{{ events.length }} Events</h1>
		<ul>
			<li v-for='event in events'>
				{{ event.id }}
			</li>
		</ul>
		<ul>
			<li>
			<button  @click="submit">Using $refs</button>
			</li><br>
			<li>
				<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#deleteModal" ref="my_reference">Launch Delete modal
				</button>
			</li>
		</ul>

			<div>
				<div class="modal fade" id="deleteModal">
					<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">DELETE STUDENT</h4>
								<button type="button" class="close" data-dismiss="modal">&times</button>

							</div>
							
							<div class="modal-body">
								<slot name="body"></slot>
								<p>
									Are you sure you want to delete this student?<br>
									This action is irreversible.<br>
									Click <b style="color:red">YES</b> to continue or <b>NO</b> to cancel.
									<br>
								</p>
								<p>
									<form id='deleteStudentForm' ref='deleteStudentForm' :action='deleteUrl' @submit.prevent='deleteStudent'>
										<button type="submit" class="btn btn-sm btn-danger">YES</button>
										<button class="btn btn-sm btn-success" data-dismiss="modal">NO</button>		
									</form>
								</p>

							</div>

							<div class="modal-footer">
								<button class="btn btn-sm btn-success" data-dismiss="modal">OK</button>				
							</div>
						</div>
					</div>								
				</div>
			</div>

	</div>
</template>
<script>
	import EventItem from './EventItem'

	export default{
		components:{
			'event-item': EventItem
		},
		data() {
			return {
			deleteUrl:'',
			error:'',
			events:''
			}
		},
		methods:{
			submit(){
				console.log(this.$refs)
			},
			deleteStudent(e){
				console.log(e)
				console.log(this.deleteUrl)
			},
			prepareDelete(score_id){

				console.log('Eventlist.vue/PrepareDelete. Delete url '+'/score/'+score_id);
				this.deleteUrl = '/score_sheet/'+score_id
				this.$refs.my_reference.click()				
			}

		},
		mounted(){
			
				axios.get('/vue/all_students').then(response => (this.events = response.data)).catch(e => (this.error = "An error Occured"))			

		}
	}
</script>
