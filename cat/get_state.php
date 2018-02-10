<?php
include('dbconfig.php');
if($_POST['id'])
{
	$id=$_POST['id'];
		
	$stmt = $DB_con->prepare("SELECT * FROM state WHERE country_id=:id");
	$stmt->execute(array(':id' => $id));
	?><option selected="selected">Select Circle :</option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        	<option name="state"  value="<?php echo $row['state_id']; echo ":"; echo $row['state_name']; ?>"><?php echo $row['state_name']; ?></option>
        <?php
	}
}
?>