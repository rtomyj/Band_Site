<?php
require_once('common_php/header_footer.php');
require('../includes/conn.php');
printHeader("Home");
$toSubmit = createArtist($conn);

if($_SERVER['REQUEST_METHOD']=='POST' && $toSubmit == true)
{
    //artist name
    $firstname = trim($_POST['firstname']);
    $middleinitial = trim($_POST['middleinitial']);
    $lastname = trim($_POST['lastname']);

    //artist address
    $street = trim($_POST['street']);
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    $zipcode = trim($_POST['zipcode']);

    //contact info
    $email = trim($_POST['email']);
    $cellnumber = trim($_POST['cellnumber']);

    //performance info
    $concertrate = trim($_POST['concertrate']);
    $agent = trim($_POST['agent']);

    //other
    $gender = trim($_POST['gender']);

    $sql = "insert into artist (first_name, middle_initial, last_name, street,
	                        city, state, zip_code, email, cell_phone,
				concert_rate, agent_id, gender)
				values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($firstname, $middleinitial, $lastname, $street,
			$city, $state, $zipcode, $email, $cellnumber,
			$concertrate, $agent, $gender));
}
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

	if (form['firstname'].value == ""){
		invalid = true
		document.getElementById('firstNameLabel').style.color = ERROR_TEXT
	}
	if (form['lastname'].value == ""){
		invalid = true
		document.getElementById('lastNameLabel').style.color = ERROR_TEXT
	}
	if (form['street'].value == ""){
		invalid = true
		document.getElementById('streeLabel').style.color = ERROR_TEXT
	}
	if (form['city'].value == ""){
		invalid = true
		document.getElementById('cityLabel').style.color = ERROR_TEXT
	}
	if (form['zipcode'].value == ""){
		invalid = true
		document.getElementById('zipcodeLabel').style.color = ERROR_TEXT
	}
	if (form['email'].value == ""){
		invalid = true
		document.getElementById('emailLabel').style.color = ERROR_TEXT
	}
	if (form['cellnumber'] == ""){
		invalid = true
		document.getElementById('cellNumberLabel').style.color = ERROR_TEXT
	}

	if (invalid){
		alert('Invalid Field Entries')
		return false
	}
	else{
		return true
	}
    }

    </script>

 
    <div style='margin-left: 25px; margin-right: 25px; margin-top: 8px'>
        <div>
            <h1 style='display: inline; font-size: 45px'>Create New Artist</h4>
            <h6 style='display: inline; margin-left: 8px; font-size: 25px;'>Artist ID</h6>
        </div>
        <br><br>
        <form class='form' name='artistForm' onSubmit='return validateArtist()' action="create_artist.php" method="post">
            <div class='card'>
                <div class='card-body container-fluid'>
                    <h4 class='card-title'>Artist Name</h4>
                        <div class='row' style='margin-top: 20px; margin-bottom: 20px'>
                            <div class='row col-lg-4'>
                                <div class='col-sm-6'>
                              	    <p class='label' id='firstNameLabel'>First Name:</p>
                                </div>
                                <div class='col-sm-6'>
                              	    <input name='firstname' autofocus class='label'>
                                </div>
                            </div>
                                        
                            <div class='row col-lg-4'>
                                <div class='col-sm-6'>
                                    <p class='label' id='middleInitialLabel'>Middle Initial:</p>
                                </div>
                                <div class='col-sm-3'>
                                    <input type='text' name='middleinitial' maxlength='1' class='label'>
                                </div>
                            </div>
                                        
                            <div class='row col-lg-4'>
                                <div class='col-sm-6'>
				    <p class='label' id='lastNameLabel'>Last Name:</p>
                                </div>	
                                <div class='row-sm-6'>
                                    <input type='text' name='lastname'>
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
		                    <input type='text' name='street' class='label'>
			        </div>
                            </div>
			</div>

                        <div class='row' style='margin-top: 20px; margin-bottom: 20px;'>
                            <div class='row col-lg-4'>
                                <div class='col-sm-6'>
                                    <p class='label' id='cityLabel'>City:</p>
			        </div>
			        <div class='col-sm-6'>
				    <input type='text' name='city' class='label'>
				</div>
                            </div>
                            <div class='row col-lg-4'>
                                <div class='col-sm-6'>
                                    <p class='label'>State:</p>
                                </div>
				<div class='col-sm-3'>
                                    <select name='state'>
                                        <option value='AL'>AL</option>
                                        <option value='AK'>AK</option>
                                        <option value='AZ'>AZ</option>
                                        <option value='AR'>AR</option>
                                        <option value='CA'>CA</option>
                                        <option value='CO'>CO</option>
                                        <option value='CT'>CT</option>
                                        <option value='DE'>DE</option>
                                        <option value='DC'>DC</option>
                                        <option value='FL'>FL</option>
                                        <option value='GA'>GA</option>
                                        <option value='HI'>HI</option>
                                        <option value='ID'>ID</option>
                                        <option value='IL'>IL</option>
                                        <option value='IN'>IN</option>
                                        <option value='IA'>IA</option>
                                        <option value='KS'>KS</option>
                                        <option value='KY'>KY</option>
                                        <option value='LA'>LA</option>
                                        <option value='ME'>ME</option>
                                        <option value='MD'>MD</option>
                                        <option value='MA'>MA</option>
                                        <option value='MI'>MI</option>
                                        <option value='MN'>MN</option>
                                        <option value='MS'>MS</option>
                                        <option value='MO'>MO</option>
                                        <option value='MT'>MT</option>
                                        <option value='NE'>NE</option>
                                        <option value='NV'>NV</option>
                                        <option value='NH'>NH</option>
                                        <option value='NJ'>NJ</option>
                                        <option value='NM'>NM</option>
                                        <option value='NY'>NY</option>
                                        <option value='NC'>NC</option>
                                        <option value='ND'>ND</option>
                                        <option value='OH'>OH</option>
                                        <option value='OK'>OK</option>
                                        <option value='OR'>OR</option>
                                        <option value='PA'>PA</option>
                                        <option value='PR'>PR</option>
                                        <option value='RI'>RI</option>
                                        <option value='SC'>SC</option>
                                        <option value='SD'>SD</option>
                                        <option value='TN'>TN</option>
                                        <option value='TX'>TX</option>
                                        <option value='UT'>UT</option>
                                        <option value='VT'>VT</option>
                                        <option value='VA'>VA</option>
                                        <option value='VI'>VI</option>
                                        <option value='WA'>WA</option>
                                        <option value='WV'>WV</option>
                                        <option value='WI'>WI</option>
                                        <option value='WY'>WY</option>
				    </select>
				</div>
                            </div>
                            <div class='row col-lg-4'>
                                <div class='col-sm-6'>
                                    <p class='label' id='zipcodeLabel'>Zip Code:</p>
			        </div>
				<div class='col-sm-6'>
				    <input type='text' name='zipcode' class='label'>
			        </div>
                            </div>
                        </div>



                        <div class='row' style='margin-top: 20px; margin-bottom: 20px;'>
                        <div class='row col-lg-4'>
                            <div class='col-sm-6'>
                                <p class='label' id='emailLabel'>Email:</p>
			    </div>
			    <div class='col-sm-6'>
		                <input type='email' name='email' class='label'>
			    </div>
                        </div>
                        <div class='col-lg-4 row'>
                            <div class='col-sm-6'>
                                <p class='label' id='cellNumberLabel'>Cell Phone Number:</p>
			    </div>
			    <div class='col-sm-6'>
                                <input type='tel' name='cellnumber' class='label'>
			    </div>
                        </div>
		    </div>
	        </div>
                <div class='card' style='margin-top: 55px;'>
                    <div class='card-body container-fluid'>
                        <h4 class="card-title">Performance Information</h4>
                        <div class="row" style='margin-top: 20px; margin-bottom: 20px;'>
                            <div class='col-lg-4 row'>
                                <div class='col-sm-6'>
                                    <p class='label'>Concert Rate:</p>
				</div>
				<div class='col-sm-6'>
				    <input type='currency' name='concertrate'>
				</div>
                            </div>
                            <div class='col-lg-4 row'>
                                <div class='col-sm-6'>
                                    <p class='label'>Agent Name:</p>
				</div>
				<div class='col-sm-6'>
                                <?php $sql = 'select * from agent where agent_type="artist"'; ?>
				    <select name='agent'>
					<option value=""> No Agent </option>
                                    <?php
					foreach($conn->query($sql) as $row){
				            echo '<option value="';
					    echo $row["agent_id"];
					    echo '">';
					    echo $row["first_name"]." ".$row["last_name"];
					    echo "</option>";
					}
                                    ?>
				    </select>
			        </div>
			    </div>
                        </div>
                    </div>
		</div>
                <div class='card' style='margin-top: 55px;'>
                    <div class='card-body container-fluid'>
                        <h4 class='card-title'>Other</h4>
                        <div class='col-lg-4 row'>
                            <div class='col-sm-6'>
                                <p class='label'>Gender:</p>
			    </div>
			    <div class='col-sm-6'>
                                <select name='gender'>
                                    <option value='m'>Male</option>
                                    <option value='f'>Female</option>
                                    <option value='o'>Non-Binary</option>
                                </select>
			    </div>
                        </div>
                    </div>
		</div>
                <br><br>
		<div class="row container-fluid" style='margin-top: 55px;'> 
		    <div class='col-sm-1'>
		        <button class='btn btn-outline-danger' type='reset'>
			    Cancel
			</button>
		    </div>
		    <div class='col-sm-10'></div>
                        <div class='col-sm-1'>
		            <button class='btn btn-success' type='submit'>
			        Create
			    </button>
			</div>
		    </div>
		</div>
            </form>
            

            <br><br>



        </div>

	<?php

}
?>
