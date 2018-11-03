<?php
require_once('common_php/header_footer.php');
require_once('common_php/states.php');
require_once('../includes/conn.php');


printHeader("GEM - Create Artist");

$sql = 'SELECT count(*) as total from agent';
$result = $conn->query($sql) -> fetch();
if ($result['total'] == '0')
	$NO_AGENTS = true;
else
	$NO_AGENTS = false;


if (!empty($_POST)){
	$sql = "INSERT INTO artist (first_name, middle_initial, last_name, street, city, state, zip, email, cell_phone, concert_rate, agent_id, gender) VALUES ('{$_POST['firstName']}', '{$_POST['middleInitial']}', '{$_POST['lastName']}', '{$_POST['street']}', '{$_POST['city']}', '{$_POST['state']}', {$_POST['zip']}, '{$_POST['email']}', '{$_POST['cellNumber']}', '{$_POST['concertRate']}', '{$_POST['agent']}', '{$_POST['gender']}' )";
	echo $sql;
	$conn->exec($sql);
	
	header ('Location: ' . $_SERVER['REQUEST_URI']);
	exit();

}


createArtist($conn);
?>

<?php

printFooter();


function createArtist($conn){
?>
	<script>
	function validateArtist(){
		var form = document.forms['artistForm']
		var invalid = false
		let ERROR_TEXT = '#eb2260'
		let NORMAL_TEXT = '#000000'


		/*
			Change all labels to normal text color
		*/
		document.getElementById('firstNameLabel').style.color = NORMAL_TEXT
		document.getElementById('lastNameLabel').style.color = NORMAL_TEXT
		document.getElementById('streetLabel').style.color = NORMAL_TEXT
		document.getElementById('cityLabel').style.color = NORMAL_TEXT
		document.getElementById('zipLabel').style.color = NORMAL_TEXT
		document.getElementById('emailLabel').style.color = NORMAL_TEXT
		document.getElementById('cellNumberLabel').style.color = NORMAL_TEXT
		document.getElementById('concertRateLabel').style.color = NORMAL_TEXT

		if (form['firstName'].value == ""){
			invalid = true
			document.getElementById('firstNameLabel').style.color = ERROR_TEXT
		}
		if (form['lastName'].value == ""){
			invalid = true
			document.getElementById('lastNameLabel').style.color = ERROR_TEXT
		}
		if (form['street'].value == ""){
			invalid = true
			document.getElementById('streetLabel').style.color = ERROR_TEXT
		}
		if (form['city'].value == ""){
			invalid = true
			document.getElementById('cityLabel').style.color = ERROR_TEXT
		}
		if (form['zip'].value == ""){
			invalid = true
			document.getElementById('zipLabel').style.color = ERROR_TEXT
		}
		if (form['email'].value == ""){
			invalid = true
			document.getElementById('emailLabel').style.color = ERROR_TEXT
		}
		if (form['cellNumber'].value == ""){
			invalid = true
			document.getElementById('cellNumberLabel').style.color = ERROR_TEXT
		}
		if (form['concertRate'].value == ""){
			invalid = true
			document.getElementById('concertRateLabel').style.color = ERROR_TEXT
		}

		if (invalid){
			alert('Correct data')
			return false
		}
	}
	</script>

 
	<div style='margin-left: 15px; margin-right: 15px; margin-top: 15px'>
		<div>
			<h1 style='display: inline; font-size: 45px'>Create New Artist</h4>
			<h6 style='display: inline; margin-left: 8px; font-size: 25px;'>Artist ID</h6>
		</div>
		<br><br>
			<form class='form' name='artistForm' onSubmit='return validateArtist()' action="create_artist.php" method="post">


			<div class='card'>
				<div class='card-body container-fluid'>
					<h4 class='card-title'>Artist Name</h4>
					<div class='row' style='margin-top: 15px; margin-bottom: 15px'>

						<div class='col-md-2'>
							<p class='label' id='firstNameLabel'>First Name:</p>
						</div>
						<div class='col-md-2'>
							<input type='text' name='firstName' autofocus class='label' type='text' maxLength='25' required>
						</div>

						<div class='col-md-2'>
								<p class='label' id='middleInitialLabel'>Middle Initial:</p>
						</div>
						<div class='col-md-1'>
							<input type='text' name='middleInitial' maxLength='1' class='label'>
						</div>

						<div class='col-md-2 offset-md-1'>
							<p class='label' id='lastNameLabel'>Last Name:</p>
						</div>
						<div class='col-md-2'>
							<input type='text' name='lastName' class='label' maxLength='25' required>
						</div>

					</div>
				</div>
			</div>



			<div class='card' style='margin-top: 30px;'>
				<div class='card-body container-fluid'>
					<h4 class='card-title'>Contact Information</h4>

					<div class='row' style='margin-top: 15px; margin-bottom: 15px;'>
						<div class='col-md-2'>
							<p class='label' id='streetLabel'>Street:</p>
						</div>
						<div class='col-md-6'>
							<input type='text' name='street' class='label' maxLength='50' required>
						</div>
					</div>


					<div class='row' style='margin-top: 15px; margin-bottom: 15px;'>

						<div class='col-md-2'>
							<p class='label' id='cityLabel'>City:</p>
						</div>
						<div class='col-md-2'>
							<input type='text' name='city' class='label' maxLength='25' required>
						</div>


						<div class='col-md-2'>
							<p class='label'>State:</p>
						</div>
						<div class='col-md-2'>
							<select name='state' class='custom-select form-control-sm'>
								<?php printStatesDropDown() ?>
							</select>
						</div>



						<div class='col-md-2'>
							<p class='label' id='zipLabel'>Zip Code:</p>
						</div>
						<div class='col-md-2'>
							<input type='text' name='zip' maxLength='5' minLength='5' class='label' required>
						</div>

					</div>
	

					<div class='row' style='margin-top: 15px; margin-bottom: 15px;'>

						<div class='col-md-2'>
							<p class='label' id='emailLabel'>Email:</p>
						</div>
						<div class='col-md-2'>
							<input type=email name='email' class='label' required>
						</div>



						<div class='col-md-2'>
							<p class='label' id='cellNumberLabel'>Cell Number:</p>
						</div>
						<div class='col-md-2'>
							<input name='cellNumber' type='tel' class='label' maxLength='10' required>
						</div>

					</div>
				</div>
			</div>



			<div class='card' style='margin-top: 30px;'>
				<div class='card-body container-fluid'>
					<h4 class='card-title'>Performance Information</h4>
					<div class='row' style='margin-top: 15px; margin-bottom: 15px'>


						<div class='col-md-2'>
							<p class='label' id='concertRateLabel'>Concert Rate:</p>
						</div>
						<div class='col-md-2'>
							<input type='text' name='concertRate' autofocus class='label' type='number' maxLength='10' required>
						</div>


						<div class='col-md-2'>
								<p class='label' id='agentNameLabel'>Agent Name:</p>
						</div>
						<div class='col-md-2'>
							<select name='agent' class='custom-select form-control-sm'>
								<?php
									$sql = 'SELECT agent_id, first_name, middle_initial, last_name from agent';
									$query = $conn->query($sql);
									while ($result = $query->fetch()) {
										echo "<option value='{$result['agent_id']}'>{$result['first_name']} {$result['middle_initial']} {$result['last_name']}</option>";
									}
								?>
								
							</select>
						</div>
	

					</div>
				</div>
			</div>


			<div class='card' style='margin-top: 30px;'>
				<div class='card-body container-fluid'>
					<h4 class='card-title'>Performance Information</h4>
					<div class='row' style='margin-top: 15px; margin-bottom: 15px'>

						<div class='col-md-2'>
								<p class='label' id='genderLabel'>Gender:</p>
						</div>
						<div class='col-md-2'>
							<select name='gender' class='custom-select form-control-sm'>
								<option value='No Agent'>Male</option>
								<option value='No Agent'>Female</option>
								<option value='No Agent'>Non-Binary</option>
							</select>
						</div>

					</div>
				</div>
			</div>


			<div class='row container-fluid' style='margin-top: 30px;'>
				<div class='col-md-2'>
					<input class='btn btn-outline-danger' id="btntest" type="button" value="Cancel" onclick="window.location.href='index.php'">
				</div>
				<div class='col-md-2 offset-md-8'>
					<input type='submit' class='btn btn-success' value='Create Artist'>
				</div>
			</div>

  		<input type="hidden" name="submitted" value="true" />
		</form>
	
	
		<br><br>



        </div>

	<?php

}
?>
