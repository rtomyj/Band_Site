<?php
require_once('common_php/header_footer.php');

printHeader("Home");
createAgent();

?>

<?php

printFooter();


function createAgent(){
?>
	<div style='margin-left: 20px; margin-right: 20px; margin-top: 20px'>
		<div>
			<h4 style='display: inline; font-size: 45px'>Create New Event</h4>
			<h6 style='display: inline; margin-left: 8px; font-size: 25px;'>Event ID</h6>
		</div>
		<br><br>
		<form class='form'>

			<div class='card'>
				<div class='card-body container-fluid'>
					<h4 class='card-title'>Performer</h4>
					<div class='row' style='margin-top: 16px; margin-bottom: 16px'>
						<div class='row col-lg-4'>
							<div class='col-sm-6'>
							</div>
							<div class='col-sm-3'>
								<input type='radio' name='performer' value='Artist' > Artist
							</div>
							<div class='col-sm-3'>
								<input type='radio' name='performer' value='Band' > Band
							</div>
						</div>
					</div>
					<div class='row' style='margin-top: 16px; margin-bottom: 16px'>
						<div class='row col-lg-4'>
							<div class='col-sm-6'>
								<p class="label">Name:</p>
							</div>
							<div class='col-sm-6'>
								<select name='state' class='label'>
									<option value='IL'>Artist/Band Name</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class='card' style='margin-top: 25px;'>
				<div class='card-body container-fluid'>
					<h4 class='card-title'>Event Details</h4>
					<div class='row' style='margin-top: 16px; margin-bottom: 16px;'>
						<div class='row col-lg-4'>
							<div class='col-sm-6'>
								<p class='label'>Date Created:</p>
							</div>
							<div class='col-sm-6'>
							<input input='text' name='datecreated' value="<?php echo date('m/d/Y');?>"  readonly>
							</div>
						</div>
						<div class='row col-lg-4'>
							<div class='col-sm-6'>
								<p class='label'>Event Date:</p>
							</div>
							<div class='col-sm-6'>
								<input type='date' id="datepicker" name='eventdate' size='9' value="" />
							</div>
						</div>
						<div class='row col-lg-4'>
							<div class='col-sm-6'>
								<p class='label'>Start Time:</p>
							</div>
							<div class='col-sm-6'>
								<input type='time' name='starttime' >
							</div>
						</div>
					</div>


					<div class='row' style='margin-top: 16px; margin-bottom: 16px;'>
						<div class='col-lg-4 row'>
							<div class='col-sm-6'>
								<p class='label'>Location:</p>
							</div>
							<div class='col-sm-6'>
								<select name='location' class='label'>
									<option value='event'>The Event Center, 483 Block St. Aurora, IL</option>
								</select>
							</div>
						</div>

						<div class='col-lg-4 row'>
							<div class='col-sm-6'>
								<p class='label'>Capacity:</p>
							</div>
							<div class='col-sm-6'>
								<input input='text' name='capacity' class='label'>
							</div>
						</div>

					</div>
	
					<div class='row' style='margin-top: 16px; margin-bottom: 16px;'>
						<div class='col-lg-4 row'>
							<div class='col-sm-6'>
								<p class='label'>Vendors:</p>
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

					<div class='row' style='margin-top: 16px; margin-bottom: 16px;'>
						<div class='col-lg-4 row'>
							<div class='col-sm-6'>
								<p class='label'>Manager:</p>
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


			<div class='card' style='margin-top: 25px;'>
				<div class='card-body container-fluid'>
					<h4 class='card-title'>Special Notes</h4>
					<div class='row' style='margin-top: 16px; margin-bottom: 16px'>
						<div class='col-lg-4 row'>
							<div class='col-sm-6'>
							</div>
							<div class='col-sm-6'>
								<textarea name='comment' cols="100" align="center"> </textarea>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class='row container-fluid' style='margin-top: 45px;'>
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
