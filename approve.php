<?php
require_once('common_php/header_footer.php');
require_once('../includes/conn.php');

printHeader('GEM - Approve');


$failedAttempt = false;

if (!empty($_POST)){
	if(!isset($_SESSION['manager'])){
		$sql = "SELECT COUNT(*) AS total FROM manager WHERE email = '{$_POST['username']}' AND password = '{$_POST['password']}' ";
		$result = $conn -> query($sql) -> fetch();
		if ($result['total'] == '1'){
			session_start();
			$_SESSION['manager'] = $_POST['username'];
			$showLogin = false;
		}
		else{
			$showLogin = true;
			$failedAttempt = true;
		}
	}
	else
		$showLogin = true;
}

if(!isset($_SESSION['manager']))
	$showLogin = true;

if ($showLogin)
	login($failedAttempt);

else{
	$offset = 0;
	if (!isset($_POST['previous']) && !isset($_POST['next']) && isset($_POST['eventID'])){
		$offset = $_POST['offset'];
		$sql = "UPDATE event SET event_status = 'Approved' WHERE event_id = {$_POST['eventID']}";
		$conn -> exec($sql);
		$offset--;
		if ($offset < 0)
			$offset = 0;

	}
	if (isset($_POST['next'])){
		$offset = $_POST['offset'];
		$offset = intval($offset);
		$offset ++;
	}
	if (isset($_POST['previous'])){
		$offset = $_POST['offset'];
		$offset = intval($offset);
		$offset --;
	}

	$username = $_SESSION['manager'];
	$sql = "SELECT COUNT(*) AS total FROM event, manager WHERE event_manager = manager_id AND email = '{$username}' AND event_status='Created' ";
	$result = $conn -> query($sql) -> fetch();
	$total = $result['total'];
	$total = intval($total);

	if ($total != 0)
		showNeedsApproval($conn, $username, $offset, $total);
	else
		noEventsNeedApproval($username);
}


function showNeedsApproval($conn, $username, $offset, $total){
	$plusOne = $offset + 1;
	$sql = "SELECT * FROM event, manager WHERE event_manager = manager_id AND email = '{$username}' AND event_status='Created' LIMIT {$offset},{$plusOne}";

	echo "<div style='margin-left: 15px; margin-right: 15px; margin-top: 15px' class='container-fluid'>";
	echo "<div>";
	echo "<h4 style='display: inline; font-size: 30px'>Approve Events</h4>";
	echo "<h6 style='display: inline; margin-left: 8px; font-size: 18px;'>Signed In As: {$_SESSION['manager']}</h6>";
	echo '</div>';

	$res = $conn->query($sql) -> fetch();
	$eventID = $res['event_id'];

	?>

			<br><br>
			
			<div class='row' style='margin-right: 15px;'>
				<div class='col-md-6 card'>
					<div class='card-body'>
					<h4 class='card-title'>Details</h4>

						<div class='row mx-auto' style='margin-top: 16px; margin-bottom: 16px'>

							<div class='col-md-6'>
								<label>
									Event Name:
								</label>
							</div>

							<div class='col-md-6'>
								<input type='text' readonly value="<?php echo $res['event_name']; ?>">
							</div>
							
							<div class='col-md-6'>
								<label>Event ID: </label>
							</div>
							
							<div class='col-md-6'> 
								<input type='text' readonly value="<?php echo $res['event_id']; ?>">
							</div>
						</div>


						<div class='row mx-auto' style='margin-top: 16px; margin-bottom: 16px'>

							<div class='col-md-6'>
								<label>
									Event Date:
								</label>
							</div>

							<div class='col-md-6'>
								<input type='date' readonly value="<?php echo $res['event_date']; ?>">
							</div>

						</div>


						<div class='row mx-auto' style='margin-top: 16px; margin-bottom: 16px'>

							<div class='col-md-6'>
								<label>
									Event Time:
								</label>
							</div>

							<div class='col-md-6'>
								<input type='time' readonly value="<?php echo $res['start_time']; ?>">
							</div>

						</div>


						<div class='row mx-auto' style='margin-top: 16px; margin-bottom: 16px'>

							<div class='col-md-6'>
								<label >
									Capacity:
								</label>
							</div>

							<div class='col-md-6'>
								<input type='text' readonly value="<?php echo $res['capacity']; ?>">
							</div>

						</div>

					</div>
				</div>



				<div class='col-md-6 card'>
					<div class='card-body'>
						<h4 class='card-title'>Location</h4>
						<div class='row mx-auto' style='margin-top: 16px; margin-bottom: 16px'>
							<?php 
							$temp = $conn->query("select * from location where location_id = '{$res['event_location']}'");
							$temp = $temp->fetch();
							?>
							<div class='col-md-6'>
								<label>
									Street:
								</label>
							</div>

							<div class='col-md-6'>
								<input type='text' readonly value="<?php echo $temp['street']; ?>">
							</div>

						</div>


						<div class='row mx-auto' style='margin-top: 16px; margin-bottom: 16px'>

							<div class='col-md-6'>
								<label >
									City:
								</label>
							</div>

							<div class='col-md-6'>
								<input type='text' readonly value="<?php echo $temp['city']; ?>">
							</div>

						</div>


						<div class='row mx-auto' style='margin-top: 16px; margin-bottom: 16px'>

							<div class='col-md-6'>
								<label >
									State:
								</label>
							</div>

							<div class='col-md-6'>
								<input type='text' readonly value="<?php echo $temp['state']; ?>">
							</div>

						</div>


						<div class='row mx-auto' style='margin-top: 16px; margin-bottom: 16px'>

							<div class='col-md-6'>
								<label >
									Zip Code:
								</label>
							</div>

							<div class='col-md-6'>
							<input type='text' readonly value="<?php echo $temp['zip']; ?>">
							</div>

						</div>
					</div>
				</div>

			</div>



		<div class='row' style='margin-right: 15px; margin-top:30px'>
				<div class='col-md-6 card'>
					<div class='card-body'>
						<h4 class='card-title'>Performer</h4>

						<div class='row mx-auto' style='margin-top: 16px; margin-bottom: 16px'>

							<div class='col-md-6'>
								<label>
									Type:
								</label>
							</div>

							<div class='col-md-6'>
							<input type='text' readonly value="<?php if ($res['performer_type'] == 'B') echo 'Band'; else echo 'Artist'; ?>">
							</div>

						</div>

							<?php 
							if ($res['performer_type'] == 'B'){
								$temp = $conn->query("select * from band where band_id = '{$res['band_id']}'");
								$temp = $temp->fetch();
								$name = $temp['band_name'];
							}
							else{
								$temp = $conn->query("select * from artist where artist_id = '{$res['artist_id']}'");
								$temp = $temp->fetch();
								if($temp['middle_initial'] != "")
									$name = "{$temp['first_name']} {$temp['middle_initial']} {$temp['last_name']}";
								else 
									$name = "{$temp['first_name']} {$temp['last_name']}";
									
							}

							?>
						<div class='row mx-auto' style='margin-top: 16px; margin-bottom: 16px'>

							<div class='col-md-6'>
								<label>
									Name:
								</label>
							</div>

							<div class='col-md-6'>
							<input type='text' readonly value="<?php echo $name; ?>">
							</div>

						</div>

						<div class='row mx-auto' style='margin-top: 16px; margin-bottom: 16px'>

							<div class='col-md-6'>
								<label>
									Rate:
								</label>
							</div>

							<div class='col-md-6'>
							<input type='text' readonly value="<?php echo $temp['concert_rate']; ?>">
							</div>

						</div>

					</div>
				</div>

				<div class='col-md-6 card'>
					<div class='card-body'>
						<?php
							$temp = "select vendor_name from vendor where vendor_id = '{$res['stage_vendor']}'";
							$temp = $conn->query($temp);
							$temp = $temp->fetch();
						?>
						<h4 class='card-title'>Vendors</h4>
						<div class='row mx-auto' style='margin-top: 16px; margin-bottom: 16px'>

							<div class='col-md-6'>
								<label>
									Stage Setup:
								</label>
							</div>

							<div class='col-md-6'>
							<input type='text' readonly value="<?php echo $temp['vendor_name']; ?>">
							</div>

						</div>
						<?php
							$temp = "select vendor_name from vendor where vendor_id = '{$res['equipment_vendor']}'";
							$temp = $conn->query($temp);
							$temp = $temp->fetch();
						?>

						<div class='row mx-auto' style='margin-top: 16px; margin-bottom: 16px'>

							<div class='col-md-6'>
								<label >
									Equipment:
								</label>
							</div>

							<div class='col-md-6'>
							<input type='text' readonly value="<?php echo $temp['vendor_name']; ?>">
							</div>

						</div>
						<?php
							$temp = "select vendor_name from vendor where vendor_id = '{$res['lighting_vendor']}'";
							$temp = $conn->query($temp);
							$temp = $temp->fetch();
						?>

						<div class='row mx-auto' style='margin-top: 16px; margin-bottom: 16px'>

							<div class='col-md-6'>
								<label >
									Lighting:
								</label>
							</div>

							<div class='col-md-6'>
							<input type='text' readonly value="<?php echo $temp['vendor_name']; ?>">
							</div>

						</div>
						<?php
							$temp = "select vendor_name from vendor where vendor_id = '{$res['sound_vendor']}'";
							$temp = $conn->query($temp);
							$temp = $temp->fetch();
						?>

						<div class='row mx-auto' style='margin-top: 16px; margin-bottom: 16px'>

							<div class='col-md-6'>
								<label >
									Sound:
								</label>
							</div>

							<div class='col-md-6'>
							<input type='text' readonly value="<?php echo $temp['vendor_name']; ?>">
							</div>

						</div>
					</div>
				</div>

			</div>


			<div class='row' style='margin-right: 15px; margin-top: 30px;'> 
				<div class='col-md-12 card'>
					<div class='card-body'>
					<h4 class='card-title'>Notes</h4> <p> <?php echo $res['notes']; ?>
					</div>
				</div>
			</div>



			<form action='approve.php' method='post' id='approveForm'> 
				<input type='hidden' name='eventID' value='<?php echo $eventID; ?>' > 
				<input type='hidden' name='username' value='<?php echo $_POST['username']; ?>' > 
				<input type='hidden' name='password' value='<?php echo $_POST['password']; ?>' >
				<input type='hidden' name='offset' value='<?php echo $offset; ?>' >
			</form>
			<form action='approve.php' method='post' id='previousForm'> 
				<input type='hidden' name='eventID' value='<?php echo $eventID; ?>' > 
				<input type='hidden' name='username' value='<?php echo $_POST['username']; ?>' > 
				<input type='hidden' name='password' value='<?php echo $_POST['password']; ?>' >
				<input type='hidden' name='offset' value='<?php echo $offset; ?>' >
				<input type='hidden' name='previous' value='previous' >
			</form>
			<form action='approve.php' method='post' id='nextForm'> 
				<input type='hidden' name='eventID' value='<?php echo $eventID; ?>' > 
				<input type='hidden' name='username' value='<?php echo $_POST['username']; ?>' > 
				<input type='hidden' name='password' value='<?php echo $_POST['password']; ?>' >
				<input type='hidden' name='offset' value='<?php echo $offset; ?>' >
				<input type='hidden' name='next' value='next' >
			</form>



				<div class='row container-fluid' style='margin-top: 25px;'>
					<div class='col-md-2'>
						<?php
							if ($offset > 0)
								echo "<input type='submit' class='btn btn-outline-info' value='Previous' form='previousForm'>";
						?>
					</div>
					<div class='col-md-2 offset-md-8'>
						<?php
							if ($offset != $total -1 )
								echo "<input type='submit' class='btn btn-info' value='Next' form = 'nextForm'>";
						?>
					</div>
				</div>

				<div class='row container-fluid' style='margin-top: 10px;'>
					<div class='col-md-2'>
						<input class='btn btn-outline-danger' id="btntest" type="button" value="Cancel" onclick="window.location.href='index.php'">
					</div>
					<div class='col-md-2 offset-md-8'>
						<input type='submit' class='btn btn-success' value='Approve Event' form='approveForm'>
					</div>
				</div>
			</form>

		</div>
		<br><br>



	<?php
	

	echo "</div>";
}

function login($showFailedLogin){
	?>

	<div style='margin-left: 15px; margin-right: 15px; margin-top: 15px'>
		<div>
			<h4 style='display: inline; font-size: 30px'>Approve Events</h4>
			<div class='container-fluid'>
			</div>
		</div>
		<br><br>


		<div class='align-content-center align-items-center container-fluid'>
			<div class='card col-md-6'>
				<div class='card-body'>
					<div class='row mx-auto' style='margin-top: 16px; margin-bottom: 16px'>
				<form class='col-md-12' action='approve.php' method='post'>
					<div class='container'>
						<div class='form-group'>
							<label for="uname" style='margin-top:8px'><b>Username</b></label><br>
							<input class='col-md-12' style='margin-top:8px' type="text" placeholder="Enter Username" name="username" required>
						</div>

						<div class='form-group'>
							<label for="psw" style='margin-top:8px'><b>Password</b></label><br>
							<input class='col-md-12' style='margin-top:8px' type="password" placeholder="Enter Password" name="password" required>
						</div>
						<?php
							if ($showFailedLogin)
								echo "<span style='color:red; margin-top:8px'>Wrong username or password, try again</span>";
						?>
						<button style='margin-top:8px' class='btn btn-success col-md-12' type="submit">Login</button>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
	<br><br>
<?php
}

function noEventsNeedApproval($username){
	?>
		<div style='margin-left: 15px; margin-right: 15px; margin-top: 15px' class='container-fluid'>
		<div>
			<h4 style='display: inline; font-size: 30px'>Approve Events</h4>
			<h6 style='display: inline; margin-left: 8px; font-size: 18px;'>Signed In As: <?php echo $username; ?> </h6>
		</div>
		<br><br>

		<h6>No Events Need Approval.</h6>
		</div>

	<?php
}

printFooter();

?>
