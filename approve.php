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
	showNeedsApproval($conn, $_SESSION['manager']);
}

function showNeedsApproval($conn, $username){
	$sql = "SELECT * FROM event, manager WHERE event_manager = manager_id and email = '{$username}' and event_status='created'";
        
	echo "<div style='margin-left: 15px; margin-right: 15px; margin-top: 15px' class='container-fluid'>";
	echo "<div>";
	echo "<h4 style='display: inline; font-size: 30px'>Approve Events</h4>";
	echo "<h6 style='display: inline; margin-left: 8px; font-size: 18px;'>Signed In As: {$_SESSION['manager']}</h6>";
	foreach($conn->query($sql) as $res){
	?>

			
			<div class='row'>
				<div class='col-md-6 card'>
					<div class='card-body'>
					<h4 class='card-title'>Details</h4> <h5>(Event ID: <?php echo $res['event_id']; ?>)</h5>

						<div class='row mx-auto' style='margin-top: 16px; margin-bottom: 16px'>

							<div class='col-md-6'>
								<label>
									Event Name:
								</label>
							</div>

							<div class='col-md-6'>
							<input type='text'readonly value="<?php echo $res['event_name'] ?>">
							</div>
							<div class='col-md-6'> <label> ID: </label></div>
							<div class='col-md-6'> 
							<input type='text'readonly value="<?php echo $res['event_id'] ?>">
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



		<div class='row'>
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


			<div class='row'>
				<div class='col-md-12 card'>
					<div class='card-body'>
					<h4 class='card-title'>Notes</h4> <p> <?php echo $res['notes']; ?>
					</div>
				</div>
			</div>


		<form > <input class = 'btn btn-success' type='submit' name='stat' value='approve'> </form>

		</div>
		<br><br>



	<?php
	}

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
								echo "<span style='color:red; margin-top:8px'>Wrong password, try again</span>";
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

printFooter();

?>
