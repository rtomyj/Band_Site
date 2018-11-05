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
	showNeedsApproval($_SESSION['manager']);
}

function showNeedsApproval(){
	?>

	<div style='margin-left: 15px; margin-right: 15px; margin-top: 15px'>
		<div>
			<h4 style='display: inline; font-size: 45px'>Approve Events</h4>
			<h6 style='display: inline; margin-left: 8px; font-size: 30px;'>Signed In As: <?php echo $_SESSION['manager']?></h6>
			<div class='container-fluid'>
			</div>
		</div>
		<br><br>



	</div>
	<?php
}

function login($showFailedLogin){
	?>

	<div style='margin-left: 15px; margin-right: 15px; margin-top: 15px'>
		<div>
			<h4 style='display: inline; font-size: 45px'>Approve Events</h4>
			<div class='container-fluid'>
			</div>
		</div>
		<br><br>



		<?php
		if ($showFailedLogin)
			echo "<p>Wrong password, try again</p>";
		?>
		<form action='approve.php' method='post'>
			<div class="container-fluid">
				<label for="uname"><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>

				<label for="psw"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				
				<button type="submit">Login</button>
			</div>
		</form>
	</div>
	<?php
}

printFooter();

?>
