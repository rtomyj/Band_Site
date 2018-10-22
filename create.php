<?php
require_once('common_php/header_footer.php');

printHeader("Home");
createAgent();

?>

<?php

printFooter();


function createAgent(){
?>
	<div style='margin-left: 25px; margin-right: 25px; margin-top: 8px'>
		<div >
			<h1 style='display: inline; font-size: 45px'>New Agent</h4>
			<h6 style='display: inline; margin-left: 8px; font-size: 25px;'>Agent ID</h6>
		</div>
		<br><br>
                        <form class='form' role='form'>
                                <div class='container-fluid'>
                                <h6 style='font-size: 22px'>Agent Name</h6>
                                <div class='row' style='margin-top: 16px;'>
                                        <div class='col-sm-4 row'>
                                                <div class='col-sm-6 float-right'>
                                                        <p style='font-size: 18px'>First Name:</p>
                                                </div>
                                                <input class='col-sm-6' style='font-size' name='firstname'>
                                        </div>
                                        <div class='col-sm-4 row'>
                                                <div class='col-sm-6 float-right'>
                                                        <p style='font-size: 18px'>Middle Initial:</p>
                                                </div>
                                                <input class='col-sm-3' type='text' name='middleinitial'>
                                        </div>
                                        <div class='col-sm-4 row'>
                                                <div class='col-sm-6 float-right'>
                                                        <p style='font-size: 18px'>Last Name:</p>
                                                </div>
                                                <input class='col-sm-6' type='text' name='lastname'>
                                        </div>
                                </div>

                                <h6 style='font-size: 22px; margin-top: 55px'>Contact Information</h6>
                                <div class='row' style='margin-top: 16px;'>
                                        <div class='col-sm-8 row'>
                                                <div class='col-sm-3 float-right'>
                                                        <p style='font-size: 18px'>Street:</p>
                                                </div>
                                                <input class='col-sm-8' style='font-size' name='lastname'>
                                        </div>
                                </div>


                                <div class='row' style='margin-top: 16px;'>
                                        <div class='col-sm-4 row'>
                                                <div class='col-sm-6 float-right'>
                                                        <p style='font-size: 18px'>City:</p>
                                                </div>
                                                <input class='col-sm-6' style='font-size' name='city'>
                                        </div>
                                        <div class='col-sm-4 row'>
                                                <div class='col-sm-6 float-right'>
                                                        <p style='font-size: 18px'>State:</p>
                                                </div>
                                                <select name='state'>
                                                        <option value='IL'>IL</option>
                                                </select>
                                        </div>
                                        <div class='col-sm-4 row'>
                                                <div class='col-sm-6 float-right'>
                                                        <p style='font-size: 18px'>Zip Code:</p>
                                                </div>
                                                <input class='col-sm-6' type='text' name='zipcode'>
                                        </div>
                                </div>



                                <div class='row' style='margin-top: 16px;'>
                                        <div class='col-sm-4 row'>
                                                <div class='col-sm-6 float-right'>
                                                        <p style='font-size: 18px'>Email:</p>
                                                </div>
                                                <input class='col-sm-6' style='font-size' name='email'>
                                        </div>
                                        <div class='col-sm-4 row'>
                                                <div class='col-sm-6 float-right'>
                                                        <p style='font-size: 18px'>Office Phone Number:</p>
                                                </div>
                                                <input class='col-sm-6' style='font-size' name='officenumber'>
                                        </div>
                                        <div class='col-sm-4 row'>
                                                <div class='col-sm-6 float-right'>
                                                        <p style='font-size: 18px'>Cell Phone Number:</p>
                                                </div>
                                                <input class='col-sm-6' type='text' name='cellnumber'>
                                        </div>
                                </div>
                                <div class='row card' style='margin-top: 55px;'>
                                        <div class='card-body'>
                                                <h4 class='card-title'>Other</h4>
                                                <div class='col-sm-8 row'>
                                                        <div class='col-sm-3 float-right'>
                                                                <p style='font-size: 18px'>Agent Type:</p>
                                                </div>
                                                        <select name='state'>
                                                                <option value='for_artist'>For Artist</option>
                                                                <option value='for_band'>For Band</option>
                                                                <option value='other'>Other</option>
                                                </select>
                                        </div>
                                        </div>
                                </div>
                        </form>


		<br><br>



		</div>

	<?php

}
?>
