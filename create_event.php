<?php
require_once('common_php/header_footer.php');

printHeader("Home");
createAgent();

?>

<?php

printFooter();


function createAgent(){
?>
	<div style='margin-left: 15px; margin-right: 15px; margin-top: 15px'>
		<div>
			<h4 style='display: inline; font-size: 45px'>Create New Event</h4>
			<h6 style='display: inline; margin-left: 8px; font-size: 30px;'>Event ID</h6>
		</div>
		<br><br>
		<form class='form'>

			<div class='card'>
				<div class='card-body container-fluid'>
					<h4 class='card-title'>Performer</h4>
					<div class='row' style='margin-top: 16px; margin-bottom: 16px'>

						
						<div class='col-md-2 offset-md-2'>
							<label class="form-check-label">
								<input class="form-check-input" type="radio" name="performer" checked='true'>
								Artist
							</label>
						</div>
						<div class='col-md-2'>
							<label class="form-check-label">
								<input class="form-check-input" type="radio" name="performer" value="">
								Band
							</label>
						</div>
					</div>

				
					<div class='row' style='margin-top: 16px; margin-bottom: 16px'>

						<div class='col-md-2'>
							<p class="label">Name:</p>
						</div>
						<div class='col-md-6'>
							<select name='state' class='custom-select form-control-sm'>
								<option value='IL'>Artist/Band Name</option>
							</select>
						</div>

					</div>
				</div>
			</div>

			<div class='card' style='margin-top: 30px;'>
				<div class='card-body container-fluid'>
					<h4 class='card-title'>Event Details</h4>

					<div class='row' style='margin-top: 16px; margin-bottom: 16px'>

						<div class='col-md-2'>
							<p class='label'>Date Created:</p>
						</div>
						<div class='col-md-4'>
							<input input='text' name='datecreated' value="<?php echo date('m/d/Y', round(microtime(true)));?>"  readonly>
						</div>

					</div>


					<div class='row' style='margin-top: 16px; margin-bottom: 16px'>
						<div class='col-md-2'>
							<p class='label'>Event Date:</p>
						</div>
						<div class='col-md-4'>
							<input type='date' id="datepicker" name='eventdate' value="<?php echo date('m/d/Y', round(microtime(true) + 604800));?>" />
						</div>
					</div>


					<div class='row' style='margin-top: 16px; margin-bottom: 16px'>
						<div class='col-md-2'>
							<p class='label'>Start Time:</p>
						</div>
						<div class='col-md-4'>
							<input type='time' name='starttime' value='<?php echo date("h:i:sa");?>' >
						</div>
					</div>



					<div class='row' style='margin-top: 16px; margin-bottom: 16px;'>

						<div class='col-md-2'>
							<p class='label'>Location:</p>
						</div>
						<div class='col-md-6'>
							<select name='location' class='custom-select form-control-sm'>
								<option value='event'>The Event Center, 483 Block St. Aurora, IL</option>
							</select>
						</div>


						<div class='col-md-2'>
							<p class='label'>Capacity:</p>
						</div>
						<div class='col-md-2'>
							<input input='text' name='capacity' class='label'>
						</div>


					</div>
	
					<div class='row' style='margin-top: 16px; margin-bottom: 16px;'>

							<div class='col-md-2'>
								<p class='label'>Vendors:</p>
							</div>
							<div class='col-md-6'>
								<select name='agenttype' class='custom-select form-control-sm'>
									<option value='for_artist'>For Artist</option>
									<option value='for_band'>For Band</option>
									<option value='other'>Other</option>
								</select>
							</div>

					</div>

					<div class='row' style='margin-top: 16px; margin-bottom: 16px;'>

							<div class='col-md-2'>
								<p class='label'>Manager:</p>
							</div>
							<div class='col-md-6'>
								<select name='agenttype' class='custom-select form-control-sm'>
									<option value='for_artist'>For Artist</option>
									<option value='for_band'>For Band</option>
									<option value='other'>Other</option>
								</select>
							</div>

					</div>
				</div>
			</div>


			<div class='card' style='margin-top: 30px;'>
				<div class='card-body container-fluid'>
					<h4 class='card-title'>Special Notes</h4>
					<div class='row' style='margin-top: 16px; margin-bottom: 16px'>

						<textarea name='comment' class='col-md-10 offset-md-2' rows='5'> </textarea>

					</div>
				</div>

			</div>


			<div class='row container-fluid' style='margin-top: 30px;'>
				<div class='col-md-2'>
					<input class='btn btn-outline-danger' id="btntest" type="button" value="Cancel" onclick="window.location.href='index.php'">
				</div>
				<div class='col-md-2 offset-md-8'>
					<input type='submit' class='btn btn-success' value='Create Agent'>
				</div>
			</div>


		</form>


		<br><br>



		</div>

	<?php

}
?>
