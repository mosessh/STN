<?php include'db_connect2.php' ?>
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th>#</th>
						<th>Phone</th>
						<th>SMS Status</th>
							<th>Code Delivery Status</th>
						<th>amount Paid</th>
						<th>Package</th>
						<th>Purchase Date</th>
						<th>SMS cost</th>
						 
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * from sms_status ORDER BY Datec desc");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo ucwords($row['phone']) ?></b></td>
						
						<td><b><?php echo $row['status'] ?></b></td>	
						<td>
						
							<?php if($row['status'] =='Success'): ?>
								<span class="badge badge-success">Done</span>
							<?php elseif($row['status']): ?>
								<span class="badge badge-danger">failed</span>
							<?php else: ?>
								<span class="badge badge-danger">Closed</span>
							<?php endif; ?>
						</td>
						
						
						
						<td><b><?php echo $row['amount'] ?></b></td>
						
							<td>
						
							<?php if($row['amount'] =='0'): ?>
								<span class="badge badge-info">1hr Free Plan</span>
							<?php elseif($row['amount'] =='30'): ?>
								<span class="badge badge-info">3mbps for 6hrs</span>
							<?php elseif($row['amount'] =='50'): ?>
								<span class="badge badge-info">4mbps for 10hrs</span>
							<?php elseif($row['amount'] =='90'): ?>
								<span class="badge badge-info">5mbps for 24hrs</span>
							<?php endif; ?>
						</td>
						
							<td><b><?php echo $row['Datec'] ?></b></td>
						<td><b><?php echo $row['cost'] ?></b></td>

						<td class="text-center">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
		                      <a class="dropdown-item" href="./index.php?page=edit_sms&id=<?php echo $row['id'] ?>">View</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item view_staff" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Resend</a>
		                    </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#list').dataTable()
	$('.delete_staff').click(function(){
	_conf("Are you sure to delete this staff?","delete_staff",[$(this).attr('data-id')])
	})
	})
	function delete_staff($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_staff',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>