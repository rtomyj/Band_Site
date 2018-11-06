<?php
require_once('common_php/header_footer.php');
require_once('common_php/states.php');
require_once('../includes/conn.php');

printHeader("GEM - Create Agent");


if (!empty($_POST)){
	$sql = "INSERT INTO agent (first_name, middle_initial, last_name, street, city, state, zip, email, office_phone, cell_phone, agent_type) VALUES ('{$_POST['firstName']}', '{$_POST['middleInitial']}', '{$_POST['lastName']}', '{$_POST['street']}', '{$_POST['city']}', '{$_POST['state']}', {$_POST['zip']}, '{$_POST['email']}', '{$_POST['officeNumber']}', '{$_POST['cellNumber']}', '{$_POST['agentType']}')";
	echo $sql;
	$conn->exec($sql);
	
	header ('Location: ' . $_SERVER['REQUEST_URI']);
	exit();

}


$result = $conn -> query("SHOW TABLE STATUS LIKE 'agent'") -> fetch();
$agentID = $result['Auto_increment'];

createAgent($agentID);

?>

<?php

printFooter();


function createAgent($agentID){
	?>
	<script>

	function validateAgent(){
		var form = document.forms['agentForm']
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
		document.getElementById('officeNumberLabel').style.color = NORMAL_TEXT
		document.getElementById('cellNumberLabel').style.color = NORMAL_TEXT

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
		if (form['officeNumber'].value == ""){
			invalid = true
			document.getElementById('officeNumberLabel').style.color = ERROR_TEXT
		}
		if (form['cellNumber'].value == ""){
			invalid = true
			document.getElementById('cellNumberLabel').style.color = ERROR_TEXT
		}

		if (invalid){
			alert('Correct data')
			return false
		}
	}
	</script>


	<div style='margin-left: 15px; margin-right: 15px; margin-top: 15px'>
		<div>
			<h4 style='display: inline; font-size: 30px'>Create Agent</h4>
			<h6 style='display: inline; margin-left: 8px; font-size: 18px;'><?php echo "Agent ID({$agentID})"; ?></h6>
		</div>
		<br><br>
		<form class='form' name='agentForm' id='agentForm' onSubmit='return validateAgent()' method='post' action='create_agent.php'>


			<div class='card'>
				<div class='card-body container-fluid'>
					<h4 class='card-title'>Agent Name</h4>
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
							<p class='label' id='officeNumberLabel'>Office Number:</p>
						</div>
						<div class='col-md-2'>
							<input name='officeNumber' type='tel' class='label' maxLength='10' required>
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
					<h4 class='card-title'>Other</h4>

					<div class='row' style='margin-top: 15px; margin-bottom: 15px'>

						<div class='col-sm-2'>
							<p class='label'>Agent Type:</p>
						</div>
						<div class='col-sm-2'>
							<select name='agentType' id='agentType' form='agentForm' class='custom-select form-control-sm'>
								<option value='For Artist'>For Artist</option>
								<option value='For Band'>For Band</option>
								<option value='Other'>Other</option>
							</select>
						</div>

					</div>
				</div>
			</div>
	
	
			<div class='row container-fluid' style='margin-top: 25px;'>
				<div class='col-md-2'>
					<input class='btn btn-outline-danger' id="btntest" type="button" value="Cancel" onclick="window.location.href='index.php'">
				</div>
				<div class='col-md-2 offset-md-8'>
					<input type='submit' class='btn btn-success' value='Create Agent'>
				</div>
			</div>

  		<input type="hidden" name="submitted" value="true" />
		</form>
	
	
		<br><br>
	
	

	</div>
	
		<?php
	
	}
?>
