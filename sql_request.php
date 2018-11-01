<?php
require_once('common_php/header_footer.php');
require_once('../includes/conn.php');

printHeader('Confirmation');

?>
<script>
	window.setTimeout(function(){
		window.location.href = 'index.php';
	}, 5000);
</script>
<?php
if ($_GET['from'] == 'agent'){
	?>
	<p>i work</p>

	<?php
}

printFooter();

?>