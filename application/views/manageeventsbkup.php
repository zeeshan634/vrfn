<?php 
$this->load->view('include/header.php');
?>

<div class="content">
		<div class="container">
			<h2 class="text-center"><i class="fa fa-cogs"></i> EVENTS</h2>
			<div class="manage">
				<div class="row">
					<!--<a href="<?php //echo base_url(); ?>profile/create_event"  class="btn btn-lg btn-success pull-right btn-block btn-signin" style="margin:0 auto;" >Create Events</a>-->
					<div class="col-md-8 col-md-offset-2">
						<div class="table-responsiv">
							<table class="table">
								<thead>
									<tr>
										<th>Event Name</th>
										<th>Event Date</th>
										<th>Event Address</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								
								<?php if(count($events) > 0){ 
								
									foreach($events as $event){?>
								
									<tr>
										<td><?php echo $event->EventName; ?></td>
										<td><?php echo date('d-m-y', strtotime($event->EventDate)); ?></td>
										<td><?php echo $event->EventAddress; ?></td>
										<td> <a href="<?php echo base_url().'profile/edit_event/'.$event->ID; ?>" class="btn-edit"><i class="fa fa-pencil"></i></a>  <a href="<?php echo base_url().'profile/event_detail/'.$event->ID; ?>" class="btn-edit"><i class="fa fa-eye"></i></a>  <a href="" class="btn-edit"><i class="fa fa-tasks"></i></a></td>
									</tr>
									
									<?php } 
									
								}else{ ?>
								
									<tr><td colspan="4"><h4> No Record </h4></td></td></tr>
								
								<?php } ?>
								
									<!--<tr>
										<td>Concert</td>
										<td>10-05-2017</td>
										<td>Convention Hall, 62nd venue, Main Boulevard, New York</td>
										<td><a href="edit-event.html" class="btn-edit"><i class="fa fa-pencil"></i></a></td>
									</tr>
									<tr>
										<td>Concert</td>
										<td>10-05-2017</td>
										<td>Convention Hall, 62nd venue, Main Boulevard, New York</td>
										<td><a href="edit-event.html" class="btn-edit"><i class="fa fa-pencil"></i></a></td>
									</tr>
									<tr>
										<td>Concert</td>
										<td>10-05-2017</td>
										<td>Convention Hall, 62nd venue, Main Boulevard, New York</td>
										<td><a href="edit-event.html" class="btn-edit"><i class="fa fa-pencil"></i></a></td>
									</tr>
									<tr>
										<td>Concert</td>
										<td>10-05-2017</td>
										<td>Convention Hall, 62nd venue, Main Boulevard, New York</td>
										<td><a href="edit-event.html" class="btn-edit"><i class="fa fa-pencil"></i></a></td>
									</tr>-->
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
$this->load->view('include/footer.php');
?>