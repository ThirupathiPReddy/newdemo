<?php 

include('pagination.php'); 

?>
<!DOCTYPE html>

<html>
<head>

</head>
<body>

<div>
	<div style="height: 20px;"></div>
<form method="post">
	<input type="date" name="sdate" />
	<input type="date" name="edate" />
	<input type="submit" name="sub" />
</form>
 
	<table  class="table table-striped table-bordered table-hover">
		<thead>
			<th>S.NO</th>
			<th>Date</th>
			<th>Time</th>
			<th>Agent</th>
			<th>Company Name</th>
			<th>Contact Person</th>
			<th>Mobile Number</th>
			<th>Alternate Mobile Number</th>
			<th>Email Address</th>
			<th>Zone</th>
			<th>Circle</th>
			<th>Ward</th>
			<th>Branches</th>
			<th>CAT</th>
		</thead>
		<tbody>
		<?php
			while($crow = mysqli_fetch_array($nquery)){
			?>
			<!--  $row["Zone"]."</td><td>". $row["circle"]."</td><td>". $row["ward"]."</td><td>". $row["Branches"]."</td><td>". $row["cat"]."</td></tr><tbody>"; -->
				<tr>
					<td><?php echo $crow['sno']; ?></td>
					<td><?php echo $crow['Date']; ?></td>
					<td><?php echo $crow['Time']; ?></td>
					<td><?php echo $crow['Agent']; ?></td>
					<td><?php echo $crow['Company_Name']; ?></td>
					<td><?php echo $crow['Contact_Person']; ?></td>
					<td><?php echo $crow['Mobile_Number']; ?></td>
					<td><?php echo $crow['Alternate_Mobile_Number']; ?></td>
					<td><?php echo $crow['Email_Address']; ?></td>
					<td><?php echo $crow['Zone']; ?></td>
					<td><?php echo $crow['circle']; ?></td>
					<td><?php echo $crow['ward']; ?></td>
					<td><?php echo $crow['Branches']; ?></td>
					<td><?php echo $crow['cat']; ?></td>

				</tr>
			<?php
			}		
		?>
		</tbody>
	</table>
	<div id="pagination_controls"><?php echo $paginationCtrls; ?></div>

</div>
</body>
</html>