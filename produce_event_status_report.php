<?php
require_once('common_php/header_footer.php');
require_once('../includes/conn.php');


printHeader("Home");
produceEventStatus($conn);

printFooter();

function produceEventStatus($conn){
	if (!empty($_POST)){
		?>
		<div style='margin-left: 15px; margin-right: 15px; margin-top: 15px'>
		<div>
			<h4 style='display: inline; font-size: 45px'>Event Status Report</h4>
		</div>
		<br><br>
		
		
		<?php


		$sql = "SELECT * FROM event, artist WHERE";
		$total = count($_POST['generate']);
		$current = 1;

		foreach($_POST['generate'] as $filter){
			$sql = $sql . " event_status = '{$filter}'";

			if ($current != $total)
				$sql .= " OR";

			$current = $current + 1;
		}
		$sql = $sql . " AND event.artist_id = artist.artist_id ORDER BY event_status";

		$sql .= " UNION ALL ";
		
		// combining previous query with new query for bands
		$sql .= "SELECT * FROM event, band WHERE";
		$current = 1;

		foreach($_POST['generate'] as $filter){
			$sql = $sql . " event_status = '{$filter}'";

			if ($current != $total)
				$sql .= " OR";

			$current = $current + 1;
		}
		$sql = $sql . " AND event.band_id = artist.band_id ORDER BY event_status";

		echo $sql;
		//$conn->exec($sql);

		?>
		<div class='table-responsive-md' >
		<table id='search_table' class='table table-borderless table-bordered'>
			<thead class='thead-light'><tr>
				<th>Status</th>
				<th>Event Name</th>
				<th>Event Date</th>
				<th>Capacity</th>
			</tr></thead>
			<tbody>

		<?php

		$query = $conn -> query($sql);
		while ($result = $query -> fetch()){
			echo "
				<tr>
				<td>{$result['event_status']}</td>
				<td>Event Name</td>
				<td>{$result['event_date']}</td>
				<td>{$result['capacity']}</td>
				</tr>
				";
		}

		
		?>

		</tbody>
		</table>
		</div>
		</div>
		<?php
}


}

