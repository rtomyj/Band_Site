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
		<div>
			<h1 style='display: inline; font-size: 45px'>Create New Artist</h4>
			<h6 style='display: inline; margin-left: 8px; font-size: 25px;'>Artist ID</h6>
		</div>
		<br><br>
		<form class='form'>
			<div class='card'>
				<div class='card-body container-fluid'>
                               		<h4 class='card-title'>Artist Name</h4>
                                	<div class='row' style='margin-top: 20px; margin-bottom: 20px'>
                                        	<div class='row col-lg-4'>
                                                	<div class='col-sm-6'>
                                                        	<p class='label'>First Name:</p>
                                                	</div>
							<div class='col-sm-6'>
                                            			<input name='firstname' autofocus class='label'>
							</div>
						</div>
                                        
                                      		<div class='row col-lg-4'>
                                                	<div class='col-sm-6'>
                                                        	<p class='label'>Middle Initial:</p>
							</div>
							<div class='col-sm-3'>
								<input type='text' name='middleinitial' maxlength='1' class='label'>
							</div>
						</div>
                                        
                                        	<div class='row col-lg-4'>
                                                	<div class='col-sm-6'>
                                                        	<p class='label'>Last Name:</p>
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
                                                        	<p class='label'>Street:</p>
                                                	</div>
							<div class='col-sm-6'>
								<input type='text' name='street' class='label'>
							</div>
                                		</div>
					</div>

                                	<div class='row' style='margin-top: 20px; margin-bottom: 20px;'>
                                        	<div class='row col-lg-4'>
                                                	<div class='col-sm-6'>
                                                        	<p class='label'>City:</p>
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
                                                        		<option value='IL'>IL</option>
								</select>
							</div>
                                        	</div>
                                        	<div class='row col-lg-4'>
                                                	<div class='col-sm-6'>
                                                        	<p class='label'>Zip Code:</p>
							</div>
							<div class='col-sm-6'>
								<input type='text' name='zipcode' class='label'>
							</div>
                                        	</div>
                                	</div>



                                	<div class='row' style='margin-top: 20px; margin-bottom: 20px;'>
                                        	<div class='row col-lg-4'>
                                                	<div class='col-sm-6'>
                                                        	<p class='label'>Email:</p>
							</div>
							<div class='col-sm-6'>
								<input type='email' name='email' class='label'>
							</div>
                                        	</div>
                                        	<div class='col-lg-4 row'>
                                                	<div class='col-sm-6'>
                                                        	<p class='label'>Cell Phone Number:</p>
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
								<select name='agent'>
									<option value='agent1'>Example Agent</option>
									<option value='agent2'>Victor E. Husky</option>
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
                                        		<select	name='gender'>
                                                   		<option value='male'>Male</option>
                                                   		<option value='female'>Female</option>
                                                   		<option value='nonbinary'>Non-Binary</option>
                                      			</select>
						</div>
                             		</div>
                       		</div>
			</div>
                	<br><br>
			<div class="row container-fluid" style='margin-top: 55px;'> 
				<div class='col-sm-1'>
					<button class='btn btn-outline-danger'>
						Cancel
					</button>
				</div>
				<div class='col-sm-10'></div>
                               		<div class='col-sm-1'>
						<button class='btn btn-success'>
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
