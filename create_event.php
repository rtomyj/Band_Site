<?php
require_once('common_php/header_footer.php');
require_once('../includes/conn.php');

printHeader("GEM - Create Event");


if (!empty($_POST)){
	if ($_POST['performer'] == 'artist'){
		$sql = "INSERT INTO event(artist_id, performer_type, date_created, event_date, start_time, event_location, capacity, event_manager, stage_vendor, equipment_vendor, lighting_vendor, sound_vendor, notes, event_status) VALUES({$_POST['artist']}, 'A', '{$_POST['dateCreated']}', '{$_POST['eventDate']}', '{$_POST['startTime']}', {$_POST['location']}, {$_POST['capacity']}, {$_POST['manager']}, {$_POST['stageVendor']}, {$_POST['equipmentVendor']}, {$_POST['lightingVendor']}, {$_POST['soundVendor']}, '{$_POST['notes']}', 'Created'  )";
	}
	else{
		$sql = "INSERT INTO event(band_id, performer_type, date_created, event_date, start_time, event_location, capacity, event_manager, stage_vendor, equipment_vendor, lighting_vendor, sound_vendor, notes, event_status) VALUES({$_POST['band']}, 'B', '{$_POST['dateCreated']}', '{$_POST['eventDate']}', '{$_POST['startTime']}', {$_POST['location']}, {$_POST['capacity']}, {$_POST['manager']}, {$_POST['stageVendor']}, {$_POST['equipmentVendor']}, {$_POST['lightingVendor']}, {$_POST['soundVendor']}, '{$_POST['notes']}', 'Created'  )";
	}
	

	echo $sql;
	$conn->exec($sql);
	
	header ('Location: ' . $_SERVER['REQUEST_URI']);
	exit();

}


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
		<form class='form' name='eventForm' action="create_event.php" method="post">

			<div class='card'>
				<div class='card-body container-fluid'>
					<h4 class='card-title'>Performer</h4>
					<div class='row mx-auto' style='margin-top: 16px; margin-bottom: 16px'>

						
						<div class='col-md-2 offset-md-2'>
							<label class="form-check-label" id='artistLabel'>
								<input class="form-check-input" type="radio" name="performer" value='artist' onclick="switchArtistBand();" checked>
								Artist
							</label>
						</div>
						<div class='col-md-2'>
							<label class="form-check-label" id='bandLabel'>
								<input class="form-check-input" type="radio" name="performer" value="band" onclick="switchArtistBand();">
								Band
							</label>
						</div>
					</div>

				
					<div class='row' style='margin-top: 16px; margin-bottom: 16px'>

						<div class='col-md-2'>
							<p class="label">Name:</p>
						</div>
						<div class='col-md-6' id='artistDiv'>
							<select name='artist' class='custom-select form-control-sm'>
								<?php
								$sql = 'SELECT artist_id, first_name, middle_initial, last_name from artist ORDER BY first_name';
								$query = $conn -> query($sql);
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
							<select name='band' class='custom-select form-control-sm'>
								<?php
								$sql = 'SELECT band_id, band_name from band ORDER BY band_name';
								$query = $conn -> query($sql);

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
							<input type='date' name='dateCreated' value="<?php echo date('Y-m-d', round(microtime(true)));?>"  readonly>
						</div>

					</div>


					<div class='row' style='margin-top: 16px; margin-bottom: 16px'>
						<div class='col-md-2'>
							<p class='label'>Event Date:</p>
						</div>
						<div class='col-md-4'>
							<input type='date' id="datepicker" name='eventDate' value="<?php echo date('Y-m-d', round(microtime(true) + 604800));?>" />
						</div>
					</div>


					<div class='row' style='margin-top: 16px; margin-bottom: 16px'>
						<div class='col-md-2'>
							<p class='label'>Start Time:</p>
						</div>
						<div class='col-md-4'>
							<input type='time' name='startTime' value='<?php echo date("h:i");?>' >
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
							<input type='text' name='capacity' class='label' required>
						</div>


					</div>

					<div class='row' style='margin-top: 16px; margin-bottom: 16px;'>

						<div class='col-md-2'>
							<p class='label'>Manager:</p>
						</div>
						<div class='col-md-6'>
							<select name='manager' class='custom-select form-control-sm'>
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
							<select name='stageVendor' class='custom-select form-control-sm'>
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
							<select name='equipmentVendor' class='custom-select form-control-sm'>
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
							<select name='lightingVendor' class='custom-select form-control-sm'>
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
							<select name='soundVendor' class='custom-select form-control-sm'>
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
					<div class='row mx-auto' style='margin-top: 16px; margin-bottom: 16px'>

						<textarea name='notes' class='col-md-10 offset-md-2' rows='5'> </textarea>

					</div>
				</div>

			</div>


			<div class='row container-fluid' style='margin-top: 30px;'>
				<div class='col-md-2'>
					<input class='btn btn-outline-danger' id="btntest" type="button" value="Cancel" onclick="window.location.href='index.php'">
				</div>
				<div class='col-md-2 offset-md-8'>
					<input type='submit' class='btn btn-success'>
				</div>
			</div>

		<input type="hidden" name="submitted" value="true" />
		</form>


		<br><br>



		</div>

	<?php

}
?>
