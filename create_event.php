<?php
require_once('common_php/header_footer.php');
require_once('../includes/conn.php');

printHeader("GEM - Create Event");
createAgent($conn);

?>

<?php

printFooter();


function createAgent($conn){
?>
	<script>
		function switchArtistBand() {
			var band = document.getElementById('bandDiv')
			var artist = document.getElementById('artistDiv')
			band.style.display = (band.style.display == 'block') ? 'none' : 'block'
			artist.style.display = (artist.style.display == 'none') ? 'block' : 'none'
		}

	</script>
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
								<input class="form-check-input" type="radio" name="performer" onclick="switchArtistBand();" checked='true'>
								Artist
							</label>
						</div>
						<div class='col-md-2'>
							<label class="form-check-label">
								<input class="form-check-input" type="radio" name="performer" value="" onclick="switchArtistBand();">
								Band
							</label>
						</div>
					</div>

				
					<div class='row' style='margin-top: 16px; margin-bottom: 16px'>

						<div class='col-md-2'>
							<p class="label">Name:</p>
						</div>
						<div class='col-md-6' id='artistDiv'>
							<select name='state' class='custom-select form-control-sm'>
								<?php
								$sql = 'SELECT artist_id, first_name, middle_initial, last_name from artist ORDER BY first_name';
								$query = $conn -> query($sql);
								echo $sql;
								while ($result = $query -> fetch()){
									if ($result['middle_initial'] != '')
										$name = "{$result['first_name']} {$result['middle_initial']}. {$result['last_name']}";
									else
										$name = "{$result['first_name']} {$result['last_name']}";

									echo "<option value='{$result['artist_id']}'>{$name}</option>";
								}
								?>
							</select>
						</div>

						<div class='col-md-6' style='display:none;' id='bandDiv'>
							<select name='state' class='custom-select form-control-sm'>
								<?php
								$sql = 'SELECT band_id, band_name from band ORDER BY band_name';
								$query = $conn -> query($sql);
								echo $sql;

								while ($result = $query -> fetch()){
									$name = "{$result['band_name']}";

									echo "<option value='{$result['band_id']}'>{$name}</option>";
								}
								?>
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
								<?php
								$sql = "SELECT location_id, location_name, street, zip FROM location ORDER BY location_name";
								$query = $conn -> query($sql);

								while ($result = $query -> fetch()){
									$name = "{$result['location_name']}: {$result['street']}, {$result['zip']}";
									echo "<option value='{$result['location_id']}'>{$name}</option>";

								}
								?>
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
							<p class='label'>Manager:</p>
						</div>
						<div class='col-md-6'>
							<select name='agenttype' class='custom-select form-control-sm'>
								<?php
								$sql = "SELECT manager_id, first_name, middle_initial, last_name FROM manager ORDER BY first_name";
								$query = $conn -> query($sql);

								while ($result = $query -> fetch()){
									if ($result['middle_initial'] != '')
										$name = "{$result['first_name']} {$result['middle_initial']}. {$result['last_name']}";
									else
										$name = "{$result['first_name']} {$result['last_name']}";

									echo "<option value='{$result['manager_id']}'>{$name}</option>";

								}
								?>
							</select>
						</div>

					</div>
				</div>
			</div>


			<div class='card' style='margin-top: 30px;'>
				<div class='card-body container-fluid'>
					<h4 class='card-title'>Vendors</h4>
					<div class='row' style='margin-top: 16px; margin-bottom: 16px;'>

						<div class='col-md-2'>
							<p class='label'>Stage Setup:</p>
						</div>
						<div class='col-md-6'>
							<select name='agenttype' class='custom-select form-control-sm'>
								<?php
									$sql = "SELECT vendor_id, vendor_name FROM vendor where vendor_type = 'Stage Setup' ORDER BY vendor_name";
									$query = $conn -> query($sql);

									while ($result = $query -> fetch()){
										$name = "{$result['vendor_name']}";

										echo "<option value='{$result['vendor_id']}'>{$name}</option>";
									}
								?>
							</select>
						</div>

						</div>

						<div class='row' style='margin-top: 16px; margin-bottom: 16px;'>

						<div class='col-md-2'>
							<p class='label'>Equipment:</p>
						</div>
						<div class='col-md-6'>
							<select name='agenttype' class='custom-select form-control-sm'>
								<?php
									$sql = "SELECT vendor_id, vendor_name FROM vendor where vendor_type = 'Equipment' ORDER BY vendor_name";
									$query = $conn -> query($sql);

									while ($result = $query -> fetch()){
										$name = "{$result['vendor_name']}";

										echo "<option value='{$result['vendor_id']}'>{$name}</option>";
									}
								?>
							</select>
						</div>

						</div>

						<div class='row' style='margin-top: 16px; margin-bottom: 16px;'>

						<div class='col-md-2'>
							<p class='label'>Lighting:</p>
						</div>
						<div class='col-md-6'>
							<select name='agenttype' class='custom-select form-control-sm'>
								<?php
									$sql = "SELECT vendor_id, vendor_name FROM vendor where vendor_type = 'Lighting' ORDER BY vendor_name";
									$query = $conn -> query($sql);

									while ($result = $query -> fetch()){
										$name = "{$result['vendor_name']}";

										echo "<option value='{$result['vendor_id']}'>{$name}</option>";
									}
								?>
							</select>
						</div>

						</div>


						<div class='row' style='margin-top: 16px; margin-bottom: 16px;'>

						<div class='col-md-2'>
							<p class='label'>Sound:</p>
						</div>
						<div class='col-md-6'>
							<select name='agenttype' class='custom-select form-control-sm'>
							<?php
								$sql = "SELECT vendor_id, vendor_name FROM vendor where vendor_type = 'Sound' ORDER BY vendor_name";
								$query = $conn -> query($sql);

								while ($result = $query -> fetch()){
									$name = "{$result['vendor_name']}";

									echo "<option value='{$result['vendor_id']}'>{$name}</option>";
								}
								?>
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
