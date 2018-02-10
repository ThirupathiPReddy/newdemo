


<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test";

$Company_Name = $_POST['Company_Name'];
$Contact_Person = $_POST['Contact_Person'];

$Mobile_Number = $_POST['Mobile_Number'];
$Alternate_Mobile_Number = $_POST['Alternate_Mobile_Number'];
$Email_Address = $_POST['Email_Address'];
$Area = $_POST['Area'];
$Branches = $_POST['Branches'];
$our_datedate = date("Y/m/d");


$checkbox1 = $_POST['cat'];
$chk=""; 
foreach($checkbox1 as $chk1) 
{ 
$chk.= $chk1.","; 
} 
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO cat (Date,Company_Name,Contact_Person,Mobile_Number,Alternate_Mobile_Number,Email_Address,Area,Branches,cat) 
					VALUES ('$our_datedate','$Company_Name','$Contact_Person','$Mobile_Number','$Alternate_Mobile_Number','$Email_Address','$Area','$Branches','$chk')";
if(mysqli_query($conn,$sql)) {
echo 'Data added sucessfully';
} 
else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>


