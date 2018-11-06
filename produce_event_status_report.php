<?php
require_once('common_php/header_footer.php');
require_once('../includes/conn.php');

printHeader("Home");

if (!empty($_POST)){
	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];

	$sql = "select count(*) as total from ((select event_id, performer_type, concert_rate, event_status, event_date, capacity, event_name, tickets_sold from event, artist where event.artist_id = artist.artist_id) UNION (select event_id, performer_type, concert_rate, event_status, event_date, capacity, event_name, tickets_sold from event, band where event.band_id = band.band_id)) as BigBoy WHERE event_date BETWEEN '{$startDate}' AND '{$endDate}'";


	$result = $conn -> query($sql) -> fetch();
	$totalRows = $result['total'];

	if ($totalRows == '0')
		showNoRows();
	else
		produceEventStatus($conn);
}

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

		// select * from ((select event_id, performer_type, concert_rate, event_status, event_date, capacity, event_name, tickets_sold from event, artist where event.artist_id = artist.artist_id) UNION (select event_id, performer_type, concert_rate, event_status, event_date, capacity, event_name, tickets_sold from event, band where event.band_id = band.band_id)) as BigBoy where event_status = 'Created'


		$sql = "select * from ((select event_id, performer_type, concert_rate, event_status, event_date, capacity, event_name, tickets_sold from event, artist where event.artist_id = artist.artist_id) UNION (select event_id, performer_type, concert_rate, event_status, event_date, capacity, event_name, tickets_sold from event, band where event.band_id = band.band_id)) as BigBoy";
		$total = count($_POST['generate']);
		$current = 1;

		if ($total >= 1)
			$sql .= " where ";

		$startDate = $_POST['startDate'];
		$endDate = $_POST['endDate'];

		foreach($_POST['generate'] as $filter){
			$sql = $sql . " event_status = '{$filter}'";

			if ($current != $total)
				$sql .= " OR";

			$current = $current + 1;
		}

		$sql .= " AND event_date BETWEEN '{$startDate}' AND '{$endDate}'";
		$sql = $sql . " ORDER BY event_status, event_id";


		?>
		<div class='table-responsive-md' >
		<table id='search_table' class='table table-borderless table-bordered'>
			<thead class='thead-light'><tr>
				<th>ID</th>
				<th>Status</th>
				<th>Name</th>
				<th>Date</th>
				<th>Capacity</th>
				<th>Tickets Sold</th>
				<th>Ticket Price</th>
				<th>Expected Revenue</th>
			</tr></thead>
			<tbody>

		<?php
		$delprev = "delete from status_report";
		$stmt = $conn->prepare($delprev);
		$stmt->execute();
		$intoreport = "insert into status_report (event_id, status, name, start_date, capacity, tickets_sold, ticket_price, revenue) values(?, ?, ?, ?, ?, ?, ?, ?)";
		$query = $conn -> query($sql);
		while ($result = $query -> fetch()){
			$revenue = intval($result['tickets_sold']) * intval($result['concert_rate']) * .3;
			$revenue = number_format($revenue, 2, '.', '');

			echo "
				<tr>
				<td>{$result['event_id']}</td>
				<td>{$result['event_status']}</td>
				<td>{$result['event_name']}</td>
				<td>{$result['event_date']}</td>
				<td>{$result['capacity']}</td>
				<td>{$result['tickets_sold']}</td>
				<td>\${$result['concert_rate']}</td>
				<td>\${$revenue}</td>
				</tr>
				";

			$stmt = $conn->prepare($intoreport);
			$stmt->execute(array($result['event_id'], $result['event_status'], $result['event_name'], $result['event_date'], $result['capacity'], $result['tickets_sold'], $result['concert_rate'], $revenue));
		}

		
		?>

		</tbody>
		</table>
		
		</div>
		
		</div>
<form method="post" action='print_pdf.php'>
<input type='hidden' name='newsql' value='select event_id, status, name, start_date, capacity, tickets_sold, ticket_price, revenue from status_report'>
			<div class='row container-fluid' style='margin-top: 30px; margin-bottom: 30px'>
				<div class='col-md-2'>
					<button class='btn btn-outline-danger' type="button" onclick="window.location.href='index.php'">
						Cancel
					</button>
				</div>
				<div class='col-md-2 offset-md-8'>
				<button class='btn btn-success' type="submit">
						Print
					</button>
				</div>
			</div>
</form>
		<?php
}


}

function showNoRows(){
	?>
		<div style='margin-left: 15px; margin-right: 15px; margin-top: 15px'>
		<div>
			<h4 style='display: inline; font-size: 45px'>Event Status Report</h4>
		</div>
		<br><br>

		<h6>No Events To Display With Given Filters.</h6>
		</div>

	<?php
}


?>
