<?php
require_once('common_php/header_footer.php');

printHeader("Create Agent");
createAgent();

?>

<?php

printFooter();


function createAgent(){
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


	<div style='margin-left: 20px; margin-right: 20px; margin-top: 20px'>
		<div>
			<h4 style='display: inline; font-size: 45px'>Create New Agent</h4>
			<h6 style='display: inline; margin-left: 8px; font-size: 25px;'>Agent ID</h6>
		</div>
		<br><br>
		<form class='form' name='agentForm' onSubmit='return validateAgent()' method='get' action='sql_request.php?from=agent'>


			<div class='card'>
				<div class='card-body container-fluid'>
					<h4 class='card-title'>Agent Name</h4>
					<div class='row' style='margin-top: 20px; margin-bottom: 20px'>

						<div class='row col-lg-4'>
							<div class='col-sm-6'>
								<p class='label' id='firstNameLabel'>First Name:</p>
							</div>
							<div class='col-sm-6'>
								<input type='text' name='firstName' autofocus class='label' type='text' maxLength='25'>
							</div>
						</div>

						<div class='row col-lg-4'>
							<div class='col-sm-6'>
									<p class='label' id='middleInitialLabel'>Middle Initial:</p>
							</div>
							<div class='col-sm-3'>
								<input type='text' name='middleInitial' maxLength='1' class='label'>
							</div>
						</div>
	
						<div class='row col-lg-4'>
							<div class='col-sm-6'>
								<p class='label' id='lastNameLabel'>Last Name:</p>
							</div>
							<div class='col-sm-6'>
								<input type='text' name='lastName' class='label' maxLength='25'>
							</div>
						</div>

					</div>
				</div>
			</div>
	
	
	
			<div class='card' style='margin-top: 55px;'>
				<div class='card-body container-fluid'>
					<h4 class='card-title'>Contact Information</h4>

					<div class='row' style='margin-top: 20px; margin-bottom: 20px;'>
						<div class='row col-lg-4'>
							<div class='col-sm-6'>
								<p class='label' id='streetLabel'>Street:</p>
							</div>
							<div class='col-sm-6'>
								<input type='text' name='street' class='label' maxLength='50'>
							</div>
						</div>
					</div>


					<div class='row' style='margin-top: 20px; margin-bottom: 20px;'>
						<div class='col-lg-4 row'>
							<div class='col-sm-6'>
								<p class='label' id='cityLabel'>City:</p>
							</div>
							<div class='col-sm-6'>
								<input type='text' name='city' class='label' maxLength='25'>
							</div>
						</div>

						<div class='col-lg-4 row'>
							<div class='col-sm-6'>
								<p class='label'>State:</p>
							</div>
							<div class='col-sm-3'>
								<select name='state' class='label'>
									<option value='IL'>IL</option>
								</select>
							</div>
						</div>
	
						<div class='col-lg-4 row'>
							<div class='col-sm-6'>
								<p class='label' id='zipLabel'>Zip Code:</p>
							</div>
							<div class='col-sm-6'>
								<input type='text' name='zip' maxLength='5' minLength='5' class='label'>
							</div>
						</div>
					</div>
	

					<div class='row' style='margin-top: 20px; margin-bottom: 20px;'>
						<div class='col-lg-4 row'>
							<div class='col-sm-6'>
								<p class='label' id='emailLabel'>Email:</p>
							</div>
							<div class='col-sm-6'>
								<input type=email name='email' class='label'>
							</div>
						</div>
	
						<div class='col-lg-4 row'>
							<div class='col-sm-6'>
								<p class='label' id='officeNumberLabel'>Office Number:</p>
							</div>
							<div class='col-sm-6'>
								<input name='officeNumber' type='tel' class='label' maxLength='10'>
							</div>
						</div>

						<div class='col-lg-4 row'>
							<div class='col-sm-6'>
								<p class='label' id='cellNumberLabel'>Cell Number:</p>
							</div>
							<div class='col-sm-6'>
								<input name='cellNumber' type='tel' class='label' maxLength='10'>
							</div>
						</div>
					</div>
				</div>
			</div>
	
	
			<div class='card' style='margin-top: 55px;'>
				<div class='card-body container-fluid'>
					<h4 class='card-title'>Other</h4>

					<div class='row' style='margin-top: 20px; margin-bottom: 20px'>
						<div class='col-lg-4 row'>
							<div class='col-sm-6'>
								<p class='label'>Agent Type:</p>
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
	
	
			<div class='row container-fluid' style='margin-top: 55px;'>
				<div class='col-sm-1'>
					<input class='btn btn-outline-danger' id="btntest" type="button" value="Cancel" onclick="window.location.href='index.php'">
				</div>
				<div class=col-sm-10>
				</div>
				<div class='col-sm-1'>
					<input type='submit' class='btn btn-success' value='Create Agent'>
				</div>
			</div>

  		<input type="hidden" name="from" value="agent" />
		</form>
	
	
		<br><br>
	
	

	</div>
	
		<?php
	
	}
?>
