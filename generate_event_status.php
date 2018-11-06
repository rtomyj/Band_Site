<?php
require_once('common_php/header_footer.php');

printHeader("Home");
generateEvent();

printFooter();



function generateEvent(){
?>

	<script>
		function validateAgent(){
			var proceed = false

			if (document.getElementById('approvedBox').checked || document.getElementById('canceledBox').checked || document.getElementById('completedBox').checked || document.getElementById('soldOutBox').checked || document.getElementById('advertisedBox').checked || document.getElementById('createdBox').checked){
				proceed = true
			}

			if (! proceed)
				alert('At least one checkbox needs to be clicked')
			
			return proceed
		}

	</script>


	<div style='margin-left: 20px; margin-right: 20px; margin-top: 20px'>
		<div>
			<h4 style='display: inline; font-size: 30px'>Generate Event Report</h4>
		</div>
		<br><br>
		<form class='form' name='generateForm' action="produce_event_status_report.php" onSubmit='return validateAgent()' method="post">

			<div class='card'>
				<div class='card-body container-fluid'>
					<h4 class='card-title'>Date Range</h4>

					<div class='row' style='margin-top: 16px; margin-bottom: 16px'>
						
						<div class='row col-lg-4'>
							<div class='col-sm-6'>
								<p class='label'>Start Date:</p>
							</div>
							<div class='col-sm-6'>
								<input name='startDate' type='date' class='label' value="<?php echo date('Y-m-d', round(microtime(true) - (604800 * 2) ));?>">
							</div>
						</div>

					</div>


					<div class='row' style='margin-top: 16px; margin-bottom: 16px'>
						
						<div class='row col-lg-4'>
							<div class='col-sm-6'>
								<p class='label'>End Date:</p>
							</div>
							<div class='col-sm-6'>
								<input name='endDate' type='date' class='label' value="<?php echo date('Y-m-d');?>">
							</div>
						</div>

					</div>


				</div>
			</div>


			<div class='card' style='margin-top: 55px;'>
				<div class='card-body container-fluid'>
					<h4 class='card-title'>Filter By Status</h4>

					<div class='row mx-auto' style='margin-top: 15px; margin-bottom: 15px'>

					<div class="form-check col-md-4">
						<label class="form-check-label" for='approvedBox'>
							<input type="checkbox" class="form-check-input pull-right" id='approvedBox' checked name='generate[]' value="Approved">Approved
						</label>
					</div>
					<div class="form-check col-md-4">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" id='canceledBox' checked name='generate[]' value="Canceled">Canceled
						</label>
					</div>
					<div class="form-check col-md-4">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" id='completedBox' checked name='generate[]' value="Completed">Completed
						</label>
					</div>
					<div class="form-check col-md-4">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" id='soldOutBox' checked name='generate[]' value="Sold Out">Sold Out
						</label>
					</div>
					<div class="form-check col-md-4">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" name='generate[]' id='advertisedBox' checked value="Advertised">Advertised
						</label>
					</div>
					<div class="form-check col-md-4">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input" name='generate[]' id='createdBox' checked value="Created">Created
						</label>
					</div>
					</div>


				</div>
			</div>



			<div class='row container-fluid' style='margin-top: 25px;'>
				<div class='col-md-2'>
					<input class='btn btn-outline-danger' id="btntest" type="button" value="Cancel" onclick="window.location.href='index.php'">
				</div>
				<div class='col-md-2 offset-md-8'>
					<input type='submit' class='btn btn-success' value='Generate Report'>
				</div>
			</div>
		</form>
		
		<br><br>

	</div>

<?php
}
?>