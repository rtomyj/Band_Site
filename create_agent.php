<?php
require_once('common_php/header_footer.php');

printHeader("Create Agent");
createAgent();

?>

<?php

printFooter();


function createAgent(){
	?>
	<div style='margin-left: 20px; margin-right: 20px; margin-top: 20px'>
		<div>
			<h4 style='display: inline; font-size: 45px'>New Agent</h4>
			<h6 style='display: inline; margin-left: 8px; font-size: 25px;'>Agent ID</h6>
		</div>
		<br><br>
		<form class='form'>


			<div class='card'>
				<div class='card-body container-fluid'>
					<h4 class='card-title'>Agent Name</h4>
					<div class='row' style='margin-top: 20px; margin-bottom: 20px'>

						<div class='row col-lg-4'>
							<div class='col-sm-6'>
								<p class='label'>First Name:</p>
							</div>
							<div class='col-sm-6'>
								<input name='firstname' autofocus class='label'>
							</div>
						</div>

						<div class='row col-lg-4'>
							<div class='col-sm-6'>
								<p class='label'>Middle Initial:</p>
							</div>
							<div class='col-sm-3'>
								<input type='text' name='middleinitial' maxLength='2' class='label'>
							</div>
						</div>
	
						<div class='row col-lg-4'>
							<div class='col-sm-6'>
								<p class='label'>Last Name:</p>
							</div>
							<div class='col-sm-6'>
								<input type='text' name='lastname' class='label'>
							</div>
						</div>

					</div>
				</div>
			</div>
	
	
	
			<div class='card' style='margin-top: 55px;'>
				<div class='card-body container-fluid'>
					<h4 class='card-title'>Contact Information</h4>

					<div class='row' style='margin-top: 20px; margin-bottom: 20px;'>
						<div class='row col-lg-4'>
							<div class='col-sm-6'>
								<p class='label'>Street:</p>
							</div>
							<div class='col-sm-6'>
								<input input='text' name='street' class='label'>
							</div>
						</div>
					</div>


					<div class='row' style='margin-top: 20px; margin-bottom: 20px;'>
						<div class='col-lg-4 row'>
							<div class='col-sm-6'>
								<p class='label'>City:</p>
							</div>
							<div class='col-sm-6'>
								<input input='text' name='city' class='label'>
							</div>
						</div>

						<div class='col-lg-4 row'>
							<div class='col-sm-6'>
								<p class='label'>State:</p>
							</div>
							<div class='col-sm-3'>
								<select name='state' class='label'>
									<option value='IL'>IL</option>
								</select>
							</div>
						</div>
	
						<div class='col-lg-4 row'>
							<div class='col-sm-6'>
								<p class='label'>Zip Code:</p>
							</div>
							<div class='col-sm-6'>
								<input type='text' name='zipcode' maxLength='10' class='label'>
							</div>
						</div>
					</div>
	

					<div class='row' style='margin-top: 20px; margin-bottom: 20px;'>
						<div class='col-lg-4 row'>
							<div class='col-sm-6'>
								<p class='label'>Email:</p>
							</div>
							<div class='col-sm-6'>
								<input type=email name='email' class='label'>
							</div>
						</div>
	
						<div class='col-lg-4 row'>
							<div class='col-sm-6'>
								<p class='label'>Office Number:</p>
							</div>
							<div class='col-sm-6'>
								<input name='officenumber' type='tel' class='label'>
							</div>
						</div>

						<div class='col-lg-4 row'>
							<div class='col-sm-6'>
								<p class='label'>Cell Number:</p>
							</div>
							<div class='col-sm-6'>
								<input name='cellnumber' type='tel' class='label'>
							</div>
						</div>
					</div>
				</div>
			</div>
	
	
			<div class='card' style='margin-top: 55px;'>
				<div class='card-body container-fluid'>
					<h4 class='card-title'>Other</h4>

					<div class='row' style='margin-top: 20px; margin-bottom: 20px'>
						<div class='col-lg-4 row'>
							<div class='col-sm-6'>
								<p class='label'>Agent Type:</p>
							</div>
							<div class='col-sm-6'>
								<select name='agenttype' class='label'>
									<option value='for_artist'>For Artist</option>
									<option value='for_band'>For Band</option>
									<option value='other'>Other</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
	
	
			<div class='row container-fluid' style='margin-top: 55px;'>
				<div class='col-sm-1'>
					<button class='btn btn-outline-danger'>
						Cancel
					</button>
				</div>
				<div class=col-sm-10>
				</div>
				<div class='col-sm-1'>
					<button class='btn btn-success'>
						Create
					</button>
				</div>
			</div>
		</form>
	
	
		<br><br>
	
	

	</div>
	
		<?php
	
	}
?>
