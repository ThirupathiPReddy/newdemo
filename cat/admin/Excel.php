<?php
header('Refresh: 3; URL=welcome.php');
session_start();
if(isset($_SESSION['id']))
{
$id=$_SESSION['id'];
include_once('dbconnection.php');
?>
<div class="p-4 text-right">
<a href="signout.php" class="btn btn-primary">SignOut</a>
</div>
<?php


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$sql = "SELECT sno,Date,Time,Agent, Company_Name, Contact_Person,Mobile_Number,Alternate_Mobile_Number,Email_Address,Zone,circle,ward,Branches, cat FROM cat ORDER BY `sno` DESC";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<table class='table table-bordered table2excel' ><thead><tr><th>S.NO</th><th>Date</th><th>Time</th><th>Agent</th><th>Company Name</th><th>Contact Person</th><th>Mobile Number</th><th>Alternate Mobile Number</th><th>Email Address</th><th>Zone</th><th>Circle</th><th>Ward</th><th>Branches</th><th>CAT</th></tr></thead>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><th>". $row["sno"]."</th><th>". $row["Date"]."</th><th>". $row["Time"]."</th><th>". $row["Agent"]."</th><th>". $row["Company_Name"]."</th><th>". $row["Contact_Person"]."</th><th>". $row["Mobile_Number"]."</th><th>". $row["Alternate_Mobile_Number"]."</th><th>". $row["Email_Address"]."</th><th>". $row["Zone"]."</th><th>". $row["circle"]."</th><th>". $row["ward"]."</th><th>". $row["Branches"]."</th><th>". $row["cat"]."</th></tr><tbody>";
        /*echo "<br> id: ". $row["sno"]. " - Name: ". $row["user"]. " " . $row["cat"] . "<br>";*/
    }

		echo "</tbody></table>";
} else {
    echo "0 results";
}

?>

<a href="signout.php">SignOut</a>
<?php mysqli_close($con); 
}

else
{
header('Location:index.php?e=1');	
}

header('Location:welcome.php?e=1');	
?>

<script src="js/jquery.table2excel.min.js"></script>
		<script>
			$(function() {
				$(".table2excel").table2excel({
					exclude: ".noExl",
					name: "Excel Document Name",
					filename: "myFileName",
					fileext: ".xls",
					exclude_img: true,
					exclude_links: true,
					exclude_inputs: true
				});
			});
		</script>
