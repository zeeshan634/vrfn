<?php 
$this->load->view('include/header.php');
?>

<div class="content">
		<div class="container">
			<h2 class="text-center"><i class="fa fa-user"></i> ACCOUNT</h2>
			<div class="card-register card-container-register text-center">
            <p id="profile-name" class="profile-name-card"></p>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group text-left">
							<label>Name</label>
							<p><?php echo $company->Name; ?></p>
						</div>
						<div class="form-group text-left">
							<label>Company Name</label>
							<p><?php echo $company->CompanyName; ?><p>
						</div>
						<div class="form-group text-left">
							<label>Email</label>
							<p><?php echo $company->Email; ?><p>
						</div>
						<div class="form-group text-left">
							<label>Phone</label>
							<p><?php echo $company->Phone; ?><p>
						</div>
						<div class="form-group text-left">
							<label>Country</label>
							<p><?php if($company->countryname != '0'){ echo $company->countryname;}  //if($company->Country > 0){ echo $this->db->query("select name from countries where id = ".$company->Country)->row()->name; } ?><p>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group text-left">
							<label>Address 1</label>
							<p><?php echo $company->Address1; ?><p>
						</div>
						<div class="form-group text-left">
							<label>Address 2</label>
							<p><?php echo $company->Address2; ?><p>
						</div>
						<div class="form-group text-left">
							<label>City</label>
							<p><?php echo $company->City; ?><p>
						</div>
						<div class="form-group text-left">
							<label>State</label>
							<p> <?php echo $company->State; ?><p>
						</div>
						<div class="form-group text-left">
							<label>ZIP</label>
							<p><?php echo $company->Zip; ?><p>
						</div>
						
					</div>
				</div>
        </div><!-- /card-container -->
		</div>
	</div>
	

<?php 
$this->load->view('include/footer.php');
?>