<?php
require_once('common_php/header_footer.php');

printHeader("Home");
createArtist();

?>

<?php

printFooter();


function createArtist(){
?>
	<div style='margin-left: 25px; margin-right: 25px; margin-top: 8px'>
		<div >
			<h1 style='display: inline; font-size: 45px'>Create New Artist</h4>
			<h6 style='display: inline; margin-left: 8px; font-size: 25px;'>Artist ID</h6>
		</div>
		<br><br>
                        <form class='form' role='form'>
                                <div class='container-fluid'>
                                <h6 style='font-size: 22px'>Artist Name</h6>
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
                                                <input class='col-sm-2' type='text' name='middleinitial' maxlength='1'>
                                        </div>
                                        <div class='col-sm-4 row'>
                                                <div class='col-sm-6 float-right'>
                                                        <p style='font-size: 18px'>Last Name:</p>
                                                </div>
                                                <input class='col-sm-6' type='text' name='lastname'>
                                        </div>
                                </div>

                                <h6 style='font-size: 22px; margin-top: 16px'>Contact Information</h6>
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
                                                        <p style='font-size: 18px'>Cell Phone Number:</p>
                                                </div>
                                                <input class='col-sm-6' type='text' name='cellnumber'>
                                        </div>
				</div>
                                <div class='row card' style='margin-top: 16px;'>
                                	<div class='card-body'>
                                		<h4 class="card-title">Performance Information</h4>
                                                <div class="row" style='margin-top: 16px;'>
                                        		<div class='col-sm-4 row'>
                                                		<div class='col-sm-6 float-right'>
                                                        		<p style='font-size: 18px'>Concert Rate:</p>
                                                		</div>
                                                		<input class='col-sm-6' style='font-size' name='concertrate'>
                                        		</div>
                                        		<div class='col-sm-4 row'>
                                                		<div class='col-sm-6 float-right'>
                                                        		<p style='font-size: 18px'>Agent Name:</p>
                                                	</div>
							<select class='col-sm-6' name='state'>
								<option value='agent1'>Example Agent</option>
								<option value='agent2'>Victor E. Husky</option>
							</select>
						</div>
                                        </div>
                                </div>
                                <div class='row card' style='margin-top: 16px;'>
                                        <div class='card-body'>
                                                <h4 class='card-title'>Other</h4>
                                                <div class='col-sm-8 row'>
                                                        <div class='col-sm-3 float-right'>
                                                                <p style='font-size: 18px'>Gender:</p>
                                                </div>
                                                        <select class='col-sm-2' name='state'>
                                                                <option value='male'>Male</option>
                                                                <option value='female'>Female</option>
                                                                <option value='nonbinary'>Non-Binary</option>
                                                	</select>
                                        	</div>
                                	</div>
				</div>
                                <br><br>
                               	<div class="row"> <div class='col-sm-3 float-left'>
					<input type="submit" value="Cancel">
                                </div>
                                <div class='col-sm-9 float-right'>
					<input type="submit" value="Submit">
                                </div></div>
                        </form>


		<br><br>



		</div>

	<?php

}
?>
