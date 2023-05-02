<?php include 'db_connect.php' ?>
<style>
	td p {
		margin:unset;
	}
</style>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">Danh sách sinh viên</div>
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Thông tin sinh viên</th>
							
						</tr>
					</thead>
					<tbody>
						<?php 
						$i = 1;
						$types = $conn->query("SELECT * FROM leave_type");
						while($row=$types->fetch_assoc()){
							$lt[$row['id']] = ucwords($row['name']);
						}
					


						$qry = $conn->query("SELECT ll.*,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name,e.employee_id as eID FROM leave_list ll inner join employee_details e on e.id = ll.employee_id  ");
						while($row=$qry->fetch_assoc()):
							$days = abs(strtotime($row['date_to'].' +1 day') - strtotime($row['date_from']));
							$days = floor($days / (60*60*24));
							$action_by = 'N/A';
							
						?>
						<tr>
							<td class="text-center"><?php echo $i++ ?></td>
							<td>
								<p>Thông tin sinh viên: <b><?php echo ucwords($row['name']). " (".$row['eID'].")" ?></b></p>
								<p>Khóa học: <b><?php echo $lt[$row['leave_type_id']] ?></b></p>
								
							</td>
							
	
							
						</tr>
					<?php endwhile;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	$('table').dataTable()
	$('.approved_leave').click(function(){
		_conf("Are you sure to this leave application?","action_leave",[$(this).attr('data-id'),1])
		
	})
	$('.decline_leave').click(function(){
		_conf("Are you sure to decline this leave application?","action_leave",[$(this).attr('data-id'),2])
	})
	function action_leave($id,$status){
		start_load()
		$.ajax({
			url:'ajax.php?action=action_leave',
			method:'POST',
			data:{id:$id,status:$status},
			success:function(resp){
				if(resp==1){
					alert_toast("Leave application succesffuly updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>