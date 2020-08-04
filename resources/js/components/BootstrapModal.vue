<template>
<div>
	<div class="modal fade" id="deleteModal" >
		<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">DELETE STUDENT</h4>
					<button type="button" @click='showModal = false' class="close" data-dismiss="modal">&times</button>

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
						<form  ref='deleteStudentForm' action="">
							<button type="submit" class="btn btn-sm btn-danger">YES</button>
							<button class="btn btn-sm btn-success" data-dismiss="modal">NO</button>		
						</form>
					</p>

				</div>

				<div class="modal-footer">
					<slot name="footer"></slot>				
				</div>
			</div>
		</div>								
	</div>
		
</div>
</template>

<script>
	export default {
		
		 data(){
            return {
            showModal: false
            }
        },
        mounter(){console.log('Bs modal mounter')}
	}
</script>