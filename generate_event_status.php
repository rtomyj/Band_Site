<?php
require_once('common_php/header_footer.php');

printHeader("Home");


?>

	<div style='margin-left: 20px; margin-right: 20px; margin-top: 20px'>
		<div>
			<h4 style='display: inline; font-size: 45px'>Generate Event Report</h4>
		</div>
		<br><br>
		<form class='form'>

			<div class='card'>
				<div class='card-body container-fluid'>
					<h4 class='card-title'>Date Range</h4>

					<div class='row' style='margin-top: 16px; margin-bottom: 16px'>
						
						<div class='row col-lg-4'>
							<div class='col-sm-6'>
								<p class='label'>Start Date:</p>
							</div>
							<div class='col-sm-6'>
								<input name='startdate' type='date' class='label'>
							</div>
						</div>

					</div>


					<div class='row' style='margin-top: 16px; margin-bottom: 16px'>
						
						<div class='row col-lg-4'>
							<div class='col-sm-6'>
								<p class='label'>End Date:</p>
							</div>
							<div class='col-sm-6'>
								<input name='enddate' type='date' class='label'>
							</div>
						</div>

					</div>


				</div>
			</div>


			<div class='card' style='margin-top: 55px;'>
				<div class='card-body container-fluid'>
					<h4 class='card-title'>Filter By Status</h4>

					

					<div class="form-check-inline col-sm-4">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" value="">Approved
						</label>
					</div>
					<div class="form-check-inline col-sm-4">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" value="">Canceled
						</label>
					</div>
					<div class="form-check-inline col-sm-4">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" value="">Completed
						</label>
					</div>
					<div class="form-check-inline col-sm-4">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" value="">Sold Out
						</label>
					</div>
					<div class="form-check-inline col-sm-4">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" value="">Advertised
						</label>
					</div>
					<div class="form-check-inline col-sm-4">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" value="">Created
						</label>
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
						Generate
					</button>
				</div>
			</div>
		</form>
		
		<br><br>

	</div>

<?php

printFooter();
?>