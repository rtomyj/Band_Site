<?php
/*
	Contains two methods - printHeader, printFooter.
	Both methods will print the header and footer part of each web page as all pages will be similar in structure.
*/


/*
	Prints the title of the page, the navigation bar and sets up Bootstrap and custom CSS attributes/scripts.
	Parameter title should be a string that describes what the page is. If a user opens multiple tabs the title will be the text displayed on our tabs. Should be unique per page.
*/
function printHeader($title){
?>
	<!DOCTYPE html>
	<html lang='en-US'>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel='stylesheet' href='styles/bootstrap.css'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

		<link rel='stylesheet' type='text/css' href='styles/styles.css'>
	</head>
	<body class='body'>
		<div class='w3-dark-grey' class='justify-content-center'>
				<nav class='navbar navbar-expand-sm navbar-dark' >
					<a class="navbar-brand" href="index.php">Acr-Aca DB</a>
					<ul class='navbar-nav'>
						<li class='nav-item active'>
							<a HREF='index.php' class='nav-link'>Home</a>
						</li>
						<li class='nav-item active'>
							<a HREF='download.php' class='nav-link'>Search</a>
						</li>
						<li class='nav-item active'>
							<a HREF='usage.php' class='nav-link'>Usage</a>
						</li>
						<li class='nav-item active'>
							<a HREF='about_us.php' class='nav-link'>About</a>
						</li>
					</ul>
				</nav>
		</div>

<?php
}

/*
	Prints inormation on each page such as copyright info and provides links to Yin's website.
	Also ends the html document.
*/
function printFooter(){
?>
<footer class='footer'>
		<p>Copyright 2018 &copy;
				<a href='http://cys.bios.niu.edu'>YIN LAB</a>,
				<a href='http://www.niu.edu/index.shtml'>NIU</a>.
				All rights reserved. <br>
				Designed and maintained by Javi Gomez.
		</p>
</footer>
</body>
</html>
<?php

}

?>
