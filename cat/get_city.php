<?php
include('dbconfig.php');
if($_POST['id'])
{
	$id=$_POST['id'];
	
	$stmt = $DB_con->prepare("SELECT * FROM city WHERE state_id=:id");
	$stmt->execute(array(':id' => $id));
	?><option selected="selected">Select Ward :</option>
	<?php while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
		<option value="<?php echo $row['city_id']; echo ":"; echo $row['city_name'];   ?>"><?php echo $row['city_name']; ?></option>
		<?php
	}
}
?>