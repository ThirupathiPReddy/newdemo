
<?php
session_start();
?>
<div class="p-4 text-right">
<a href="Excel.php" class="btn btn-primary">Download Excel File <i class="fa fa-file-excel-o pl-2" aria-hidden="true"></i></a>
<a href="signout.php" class="btn btn-primary">SignOut</a>
</div>
<?php
if(isset($_SESSION['id']))
{
$id=$_SESSION['id'];
include_once('dbconnection.php');



if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$sql = "SELECT sno,Date,Time,Agent, Company_Name, Contact_Person,Mobile_Number,Alternate_Mobile_Number,Email_Address,Zone,circle,ward,Branches, cat FROM cat ORDER BY `sno` DESC" ;
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<table class='table' ><thead class='thead-inverse'><tr><th>S.NO</th><th>Date</th><th>Time</th><th>Agent</th><th>Company Name</th><th>Contact Person</th><th>Mobile Number</th><th>Alternate Mobile Number</th><th>Email Address</th><th>Zone</th><th>Circle</th><th>Ward</th><th>Branches</th><th>CAT</th></tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["sno"]."</td><td>". $row["Date"]."</td><td>". $row["Time"]."</td><td>". $row["Agent"]."</td><td>". $row["Company_Name"]."</td><td>". $row["Contact_Person"]."</td><td>". $row["Mobile_Number"]."</td><td>". $row["Alternate_Mobile_Number"]."</td><td>". $row["Email_Address"]."</td><td>". $row["Zone"]."</td><td>". $row["circle"]."</td><td>". $row["ward"]."</td><td>". $row["Branches"]."</td><td>". $row["cat"]."</td></tr><tbody>";
        /*echo "<br> id: ". $row["sno"]. " - Name: ". $row["user"]. " " . $row["cat"] . "<br>";*/
    }

		echo "</tbody></table>";

		} else {
    echo "0 results";
}
?>

<?php mysqli_close($con); 
}

else
{
header('Location:index.php?e=1');	
}
?>