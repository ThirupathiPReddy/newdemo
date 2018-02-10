


<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test";
$agent = $_POST['agent'];
$Company_Name = $_POST['Company_Name'];
$Contact_Person = $_POST['Contact_Person'];

$Mobile_Number = $_POST['Mobile_Number'];
$Alternate_Mobile_Number = $_POST['Alternate_Mobile_Number'];
$Email_Address = $_POST['Email_Address'];
$zone = $_POST['zone'];
$circle = $_POST['circle'];
$ward = $_POST['ward'];
$zone = explode(':', $zone);
$zone_txt = $zone[1];
$circle = explode(':', $circle);
$circle_txt = $circle[1];
$ward = explode(':', $ward);
$ward_txt = $ward[1];
/*$Area = $_POST['Area'];*/
$Branches = $_POST['Branches'];
$our_datedate = date("Y/m/d");


date_default_timezone_set('Asia/Calcutta'); 
$our_time = date("h:i:s"); 

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
$sql = "INSERT INTO cat (Date,Time,Agent,Company_Name,Contact_Person,Mobile_Number,Alternate_Mobile_Number,Email_Address,Zone,circle,ward,Branches,cat) 
					VALUES ('$our_datedate','$our_time','$agent','$Company_Name','$Contact_Person','$Mobile_Number','$Alternate_Mobile_Number','$Email_Address','$zone_txt','$circle_txt','$ward_txt','$Branches','$chk')";
if(mysqli_query($conn,$sql)) {
header('Location:sucess.php?s=sucess');	
echo 'Data added sucessfully';
} 
else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>


