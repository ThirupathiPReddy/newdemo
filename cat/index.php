<?php
include_once 'dbconfig.php';



$agent_error = " ";

if (isset($__REQUEST['submit'])) {
  if (empty($_POST["agent"])) {
    $agent_error = "Name is required";
  }
  }









?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
*{
	font-family: 'Lato', sans-serif;
}

::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  font-family: 'Lato', sans-serif;
  color: pink;
  font-size:15px;
}
::-moz-placeholder { /* Firefox 19+ */
  font-family: 'Lato', sans-serif;
  color: pink;
}
:-ms-input-placeholder { /* IE 10+ */
  font-family: 'Lato', sans-serif;
  color: pink;
}
:-moz-placeholder { /* Firefox 18- */
  font-family: 'Lato', sans-serif;
  color: pink;
}
.btn-primary{
	background-color: #3e5b9d;
}
.btn-primary:hover{
	background-color: #2c406d;
}
.card {
    padding-bottom: 5px;
}
.card-header{
	background-color: #ffffff;
	border:none;
}
</style>
 </head>
  <script>
  $(document).ready(function()
{

	$(".zone").change(function()
	{
		
		var id=$(this).val();
		var dataString = 'id='+ id;
		console.log(dataString);
		$(".circle").find('option').remove();
		$(".ward").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "get_state.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".circle").html(html);
			} 
		});
	});
	
	
	$(".circle").change(function()
	{
		
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_city.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".ward").html(html);
			} 
		});
	});
	
	
	$('.form-check-input').change(function() {
    if ($('.form-check-input:checked').length > 0) {
        $('#submit').removeAttr('disabled');
    } else {
        $('#submit').attr('disabled', 'disabled');
    }
});
	
	
	
	
});



function validateForm() {
   var x = document.forms["myForm"]["Email_Address"].value;
   var atpos = x.indexOf("@");
   var dotpos = x.lastIndexOf(".");
   if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
	   document.forms["myForm"]["Email_Address"].focus();
       alert("Not a valid e-mail address");
       return false;
   }
   
   
   var a = document.forms["myForm"]["Mobile_Number"].value;
if(a=="")
{
alert("please Enter the Contact Number");
document.forms["myForm"]["Mobile_Number"].focus();
return false;
}
if(isNaN(a))
{
alert("Enter the valid Mobile Number(Like : 9566137117)");
document.forms["myForm"]["Mobile_Number"].focus();
return false;
}
if((a.length < 1) || (a.length > 10))
{
alert(" Your Mobile Number must be 1 to 10 Integers");
document.forms["myForm"]["Mobile_Number"].select();
return false;
}
 
}




 
</script>


  <body style="background:#cdcdcd;background-image: url(img/splash_screen_bg.jpg); background-attachment: fixed;">
  
<div class="container-fluid">
<div class="row">
  <div class="col-md-8 mx-auto pt-5">
    <div class="p-2" style="box-shadow: 0 0 11px 5px rgba(0, 0, 0, 0.08);background-color:#fff;">
	
	<img src="img/wedobest_logo.png" class="img-fluid mx-auto d-block pt-3" style="height:10em;">
	
	<h5 class="text-center pt-3 pb-4">We are always happy to help you, Feel free to contact us</h5>

	<div class="row p-4">

		<div class="col-sm-12 col-md-7 mx-auto" >
<form action="demo.php" method="post" onsubmit="return validateForm();" name="myForm" id="myForm" >
<!--user info-->
  <div class="form-group">
    <label for="Agent ">Agent Name <span><?php echo $agent_error; ?></span></label>
    <input type="text" class="form-control" id="Agent" name="agent" placeholder="Agent Name"  title="Agent Name is Required!" required>
  </div>
  <div class="form-group">
    <label for="Company-Name ">Company Name </label>
    <input type="text" class="form-control" id="Company-Name" name="Company_Name" placeholder="Enter Company Name" required >
  </div>
  <div class="form-group">
    <label for="Contact-Person">Contact Person</label>
    <input type="text" class="form-control" id="Contact-Person" name="Contact_Person" placeholder="Contact Person Name " required >
  </div>
  <div class="form-group">
    <label for="Mobile-Number">Mobile Number</label>
    <input type="text" class="form-control" id="Mobile-Number" name="Mobile_Number" pattern=".{0}|.{10,}"   required title="(10 chars minimum)" placeholder="Enter Mobile Number" >
  </div>
  <div class="form-group">
    <label for="Alternate-Mobile-Number">Alternate Mobile Number</label>
    <input type="text" class="form-control" id="Alternate-Mobile-Number" name="Alternate_Mobile_Number" placeholder="Enter Mobile Number" required >
  </div>
  <div class="form-group">
    <label for="Email-Address">Email Address</label>
    <input type="text" class="form-control" id="Email-Address" name="Email_Address" placeholder="Enter Email-Address" required >
  </div>
  
  
  <div class="form-group">
    <label>Select Zone :</label> 
<select name="zone" class="form-control zone"  required >
<option selected="selected">-- Select Zone --</option>
<?php
	$stmt = $DB_con->prepare("SELECT * FROM country");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['country_id']; echo ":"; echo $row['country_name']; ?>"><?php echo $row['country_name']; ?></option>
        <?php
	} 
?>
</select>
  </div>
  
  
  
  <div class="form-group">
  
    <label>Select Circle :</label> 
	<select name="circle" class="form-control circle" required >
<option selected="selected">-- Select Circle --</option>
  
  </div>

  
    <style>
    .none{display: none;}
	</style>
  
  <div class="form-group none">
  
    <label>Ward :</label> 
	<select name="city" class="form-control city" ></select>
  </div>  
  
  <div class="form-group">
  
    <label>Select Ward :</label> 
	<select name="ward" class="form-control ward" required >
<option selected="selected">-- Select Circle Ward --</option>
  </div> 

  <div class="form-group">
  
    <label>Ward :</label> 
	<select name="ward" class="form-control ward">


  </div>  

  
  
  

  
  
  <div class="form-group">
    <label for="Branches">No. of Branches (if any)</label>
    <input type="text" class="form-control" id="Branches" name="Branches" placeholder="No. of Branches (if any)">
  </div>



	<h5 class="text-center">Select A Category</h5>
	<hr class="mx-auto" style="width:5em;"/>
	 <label for="subjects" id="subject_error"></label>
<div id="accordion" role="tablist" aria-multiselectable="true">
  <div class="card">
    <div class="card-header" role="tab" id="headingOne">
      
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"  >
          Home Services
        </a>
      
    </div>

    <div id="collapseOne" class="collapse " role="tabpanel" aria-labelledby="headingOne">
      <div class="card-block">
        <a class="card card-block" data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
			<!-- <input class="form-check-input" type="checkbox" name="maincat[]" value="Interior Designing & Home Improvements"/> -->
			Interior Designing & Home Improvements
		</a>
		<div class="collapse" id="collapseExample1">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Modular Kitchen"> Modular Kitchen
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Interior Designers"> Interior Designers
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Painting"> Painting
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Flooring"> Flooring
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Furniture"> Furniture
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Metal Fabrication"> Metal Fabrication
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
		Home Help
		</a>
		<div class="collapse" id="collapseExample2">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Home HelpCook">Cook
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Baby Sitter"> Baby Sitter
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Driver"> Driver
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Maid"> Maid
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Home Nurse"> Home Nurse
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Home_Repair" aria-expanded="false" aria-controls="collapseExample">
		Home Repair
		</a>
		<div class="collapse" id="Home_Repair">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Carpenter">Carpenter
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Electrician"> Electrician
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Plumber"> Plumber
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Water Proofing"> Water Proofing
					</label>
				</div>
				
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Appliance_Repair" aria-expanded="false" aria-controls="collapseExample">
		Appliance Repair
		</a>
		<div class="collapse" id="Appliance_Repair">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Air Conditioner">Air Conditioner
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Television"> Television
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Washing Machine"> Washing Machine
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Refrigerator"> Refrigerator
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Air Cooler Repair"> Air Cooler Repair
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Geyser Repair">Geyser Repair
					</label>
				</div>
				
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Packers_and_Movers" aria-expanded="false" aria-controls="collapseExample">
		Packers and Movers
		</a>
		<div class="collapse" id="Packers_and_Movers">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Within City">Within City
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Between Cities"> Between Cities
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="International">International
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Computer_Repair_pest_control_Home_Cleaning" aria-expanded="false" aria-controls="collapseExample">
		Computer Repair pest control Home Cleaning
		</a>
		<div class="collapse" id="Computer_Repair_pest_control_Home_Cleaning">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Full Home Deep Cleaning">Full Home Deep Cleaning
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Basic Home Cleaning">Basic Home Cleaning
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Bathroom Cleaning">Bathroom Cleaning
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Sofa-Carpet Cleaning">Sofa-Carpet Cleaning
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Kitchen Cleaning">Kitchen Cleaning
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Water Tank Cleaning">Water Tank Cleaning
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#DTH" aria-expanded="false" aria-controls="collapseExample">
		DTH & Set-Top Boxes
		</a>
		<div class="collapse" id="DTH">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="DTH & Set-Top Boxes">DTH & Set-Top Boxes
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Internet" aria-expanded="false" aria-controls="collapseExample">
		Internet Broadband
		</a>
		<div class="collapse" id="Internet">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Internet Broadband">Internet Broadband
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Tiffin" aria-expanded="false" aria-controls="collapseExample">
		Tiffin & Catering Services
		</a>
		<div class="collapse" id="Tiffin">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Tiffen Services">Tiffen Services
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Catering Services">Catering Services
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Kitchen_Appliances_Repair" aria-expanded="false" aria-controls="collapseExample">
		Kitchen Appliances Repair
		</a>
		<div class="collapse" id="Kitchen_Appliances_Repair">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Microwave - Oven Repair">Microwave - Oven Repair
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="RO - Water Purifier">RO - Water Purifier
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Electric Chimney">Electric Chimney
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Hob - Stove">Hob - Stove
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Mobile_Tablet_Repair" aria-expanded="false" aria-controls="collapseExample">
		Mobile - Tablet Repair
		</a>
		<div class="collapse" id="Mobile_Tablet_Repair">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Mobile Repair">Mobile Repair
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Tablet Repair">Tablet Repair
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="iPhone - iPad Repair">iPhone - iPad Repair
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Laundry_Dry_Cleaning" aria-expanded="false" aria-controls="collapseExample">
		Laundry & Dry Cleaning
		</a>
		<div class="collapse" id="Laundry_Dry_Cleaning">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Wash Only">Wash Only
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Wash and Iron">Wash and Iron
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Dry Cleaning">Dry Cleaning
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Commercial Laundry">Commercial Laundry
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Invertor_Batteries" aria-expanded="false" aria-controls="collapseExample">
		Invertor & Batteries
		</a>
		<div class="collapse" id="Invertor_Batteries">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Inverter Installation">Inverter Installation
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Inverter Repair & Maintenance">Inverter Repair & Maintenance
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Battery Repair & Service">Battery Repair & Service
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Courier_Service" aria-expanded="false" aria-controls="collapseExample">
		Courier_Service
		</a>
		<div class="collapse" id="Courier_Service">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Local Courier">Local Courier
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="National Courier">National Courier
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="International Courier">International Courier
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Tailor_Serivces" aria-expanded="false" aria-controls="collapseExample">
		Tailor Serivces
		</a>
		<div class="collapse" id="Tailor_Serivces">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Stitching Service">Stitching Service
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Alteration Service">Alteration Service
					</label>
				</div>
			</div>
		</div>
		
		
		
		
      </div>
    </div>
	
	
	
	
	
	
  </div>
  

	<div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      
        <a data-toggle="collapse" data-parent="#accordion" href="#Beauty"  >
          Beauty & Wellness
        </a>
      
    </div>

    <div id="Beauty" class="collapse " role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-block">
        <a class="card card-block" data-toggle="collapse" href="#Beauty_1" aria-expanded="false" aria-controls="collapseExample">
			Beauty
		</a>
		<div class="collapse" id="Beauty_1">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Parlors and Salons">Parlors and Salons
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Mehendi & Make-up Artists">Mehendi & Make-up Artists
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Tattoo - Body Art">Tattoo - Body Art
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Spa Salons">Spa Salons
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Personal_Fitness" aria-expanded="false" aria-controls="collapseExample">
			Personal Fitness
		</a>
		<div class="collapse" id="Personal_Fitness">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Yoga & Meditation">Yoga & Meditation
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Dieticians & Weight Loss">Dieticians & Weight Loss
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Fitness & Gym Trainers">Fitness & Gym Trainers
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Sports Coach">Sports Coach
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Zumba Classes">Zumba Classes
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Aerobics Classes">Aerobics Classes
					</label>
				</div>
			</div>
		</div>
		
		
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      
        <a data-toggle="collapse" data-parent="#accordion" href="#Business_Opportunities"  >
          Business Opportunities
        </a>
      
    </div>

    <div id="Business_Opportunities" class="collapse " role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-block">
        <a class="card card-block" data-toggle="collapse" href="#Business_Opportunities_1" aria-expanded="false" aria-controls="collapseExample">
			Franchising, Distribution & Dealership
		</a>
		<div class="collapse" id="Business_Opportunities_1">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Franchising">Franchising
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Distribution">Distribution
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Dealership">Dealership
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Business_Opportunities_2" aria-expanded="false" aria-controls="collapseExample">
			New Business Opportunities
		</a>
		<div class="collapse" id="Business_Opportunities_2">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Start your own Business">Start your own Business
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Partnership Opportunities">Partnership Opportunities
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Investment Opportunities">Investment Opportunities
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Part Time Working Opportunitie">Part Time Working Opportunitie
					</label>
				</div>
			</div>
		</div>
		
		
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      
        <a data-toggle="collapse" data-parent="#accordion" href="#Financial_Services"  >
          Financial Services
        </a>
      
    </div>

    <div id="Financial_Services" class="collapse " role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-block">
        <a class="card card-block" data-toggle="collapse" href="#Loan" aria-expanded="false" aria-controls="collapseExample">
			 Loan
		</a>
		<div class="collapse" id="Loan">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Home Loan">Home Loan
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Car & Bike Loan">Car & Bike Loan
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Personal Loan">Personal Loan
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Education Loan">Education Loan
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Loan against Property">Loan against Property
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Business Loans">Business Loans
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Credit" aria-expanded="false" aria-controls="collapseExample">
			Credit Card/Insurance
		</a>
		<div class="collapse" id="Credit">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Car & Bike Insurance">Car & Bike Insurance
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Health Insurance">Health Insurance
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Life Insurance">Life Insurance
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Unit Linked Insurance Plan">Unit Linked Insurance Plan
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Term Insurance">Term Insurance
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#CA_Services" aria-expanded="false" aria-controls="collapseExample">
			CA Services
		</a>
		<div class="collapse" id="CA_Services">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Tax Filing & Audits">Tax Filing & Audits
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Tax Registration of Businesses">Tax Registration of Businesses
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Audit and Assurance">Audit and Assurance
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="GST Compliance">GST Compliance
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Banking_Services" aria-expanded="false" aria-controls="collapseExample">
			Banking Services
		</a>
		<div class="collapse" id="Banking_Services">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Bank Accounts">Bank Accounts
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="PoS Payment Solutions">PoS Payment Solutions
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Investment" aria-expanded="false" aria-controls="collapseExample">
			Investment & Financial Planning
		</a>
		<div class="collapse" id="Investment">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Investment Planning & Advice">Investment Planning & Advice
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Trading Accounts">Trading Accounts
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Credit Score Management">Credit Score Management
					</label>
				</div>
			</div>
		</div>
		
		
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      
        <a data-toggle="collapse" data-parent="#accordion" href="#Event"  >
          Event Services
        </a>
      
    </div>

    <div id="Event" class="collapse " role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-block">
        <a class="card card-block" data-toggle="collapse" href="#Event1" aria-expanded="false" aria-controls="collapseExample">
			 Event Venues
		</a>
		<div class="collapse" id="Event1">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Wedding Banquet Halls & Venues">Wedding Banquet Halls & Venues
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Corporate Function Venues">Corporate Function Venues
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Small Function Venues">Small Function Venues
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Event2" aria-expanded="false" aria-controls="collapseExample">
			Wedding & Event Planners
		</a>
		<div class="collapse" id="Event2">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Wedding Planners">Wedding Planners
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Corporate Event Planners">Corporate Event Planners
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Party Planners">Party Planners
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Event3" aria-expanded="false" aria-controls="collapseExample">
			Photographers & Videographers
		</a>
		<div class="collapse" id="Event3">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Pre Wedding Shoot">Pre Wedding Shoot
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Wedding Photographers">Wedding Photographers
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Event Photographers">Event Photographers
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Maternal & Baby Photoshoot">Maternal & Baby Photoshoot
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Event4" aria-expanded="false" aria-controls="collapseExample">
			Event Arrangements
		</a>
		<div class="collapse" id="Event4">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Florists & Decorators">Florists & Decorators
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Bar Counter">Bar Counter
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Valet Parking">Valet Parking
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="DJs">DJs
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Live Musicians">Live Musicians
					</label>
				</div>
			</div>
		</div>
		
		
		
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      
        <a data-toggle="collapse" data-parent="#accordion" href="#Travel"  >
          Travel Services
        </a>
      
    </div>

    <div id="Travel" class="collapse " role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-block">
        <a class="card card-block" data-toggle="collapse" href="#Travel1" aria-expanded="false" aria-controls="collapseExample">
			 Travel Agents And Planners
		</a>
		<div class="collapse" id="Travel1">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Tour Packages">Tour Packages
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Vehicle Rentals">Vehicle Rentals
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Outstation Drivers">Outstation Drivers
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Bus - Train Tickets">Bus - Train Tickets
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Flight Tickets">Flight Tickets
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Travel2" aria-expanded="false" aria-controls="collapseExample">
			International Travel
		</a>
		<div class="collapse" id="Travel2">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Visa & Immigration">Visa & Immigration
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Passport Agent">Passport Agent
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="International SIM Cards">International SIM Cards
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Forex - Currency Exchanges">Forex - Currency Exchange
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Travel3" aria-expanded="false" aria-controls="collapseExample">
			Hotels - Resorts
		</a>
		<div class="collapse" id="Travel3">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Domestic Hotels - Resorts">Domestic Hotels - Resorts
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="International Hotels - Resorts">International Hotels - Resorts
					</label>
				</div>
			</div>
		</div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      
        <a data-toggle="collapse" data-parent="#accordion" href="#Security"  >
          Security,Legal & Agencies
        </a>
      
    </div>

    <div id="Security" class="collapse " role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-block">
        <a class="card card-block" data-toggle="collapse" href="#Security1" aria-expanded="false" aria-controls="collapseExample">
			 Security Services
		</a>
		<div class="collapse" id="Security1">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Security Guards">Security Guards
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Security Devices Installation">Security Devices Installation
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Security Devices Repair">Security Devices Repair
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Detective Service">Detective Service
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Event Security">Event Security
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="GPS Tracking Systems">GPS Tracking Systems
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Security2" aria-expanded="false" aria-controls="collapseExample">
			Lawyers & Legal Consultants
		</a>
		<div class="collapse" id="Security2">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Property Lawyer">Property Lawyer
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Divorce Lawyer">Divorce Lawyer
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Corporate Lawyer - Company Law">Corporate Lawyer - Company Law
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="IP - Patents - Copyrights Lawyer">IP - Patents - Copyrights Lawyer
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Consumer Court Lawyers">Consumer Court Lawyers
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Child Adoption">Child Adoption
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Criminal Law">Criminal Law
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Security3" aria-expanded="false" aria-controls="collapseExample">
			Certificates - Documents
		</a>
		<div class="collapse" id="Security3">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="New Certificate - Document">New Certificate - Document
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Correction of Certificate - Document">Correction of Certificate - Document
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Digital Signature Certificate">Digital Signature Certificate
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Rental Agreements">Rental Agreements
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Security4" aria-expanded="false" aria-controls="collapseExample">
			RTO Consultants
		</a>
		<div class="collapse" id="Security4">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="NOC (No Objection Certificate)">NOC (No Objection Certificate)
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Duplicate RC">Duplicate RC
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Ownership Transfer">Ownership Transfer
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Registration - Re-Registration">Registration - Re-Registration
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Hypothecation Removal">Hypothecation Removal
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Tax Payment - Tax Refund">Tax Payment - Tax Refund
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Commercial RTO Services">Commercial RTO Services
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Security5" aria-expanded="false" aria-controls="collapseExample">
			Licenses
		</a>
		<div class="collapse" id="Security5">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Shop - Gumasta License">Shop - Gumasta License
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Labour Registration">Labour Registration
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Food Licence Consultants">Food Licence Consultants
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Security6" aria-expanded="false" aria-controls="collapseExample">
			Fire & Safety Services
		</a>
		<div class="collapse" id="Security6">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Fire Safety Audit">Fire Safety Audit
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Fire Safety Consultation">Fire Safety Consultation
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Fire Fighting System">Fire Fighting System
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Fire & Safety Devices">Fire & Safety Devices
					</label>
				</div>
			</div>
		</div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      
        <a data-toggle="collapse" data-parent="#accordion" href="#Astrology"  >
          Astrology & Devotional
        </a>
      
    </div>

    <div id="Astrology" class="collapse " role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-block">
        <a class="card card-block" data-toggle="collapse" href="#Astrology1" aria-expanded="false" aria-controls="collapseExample">
			 Astrology - Numerology
		</a>
		<div class="collapse" id="Astrology1">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="General astrology consultation">General astrology consultation
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Numerology">Numerology
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Tarot Card - Psychic Reading">Tarot Card - Psychic Reading
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Horoscope Services">Horoscope Services
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Astrology2" aria-expanded="false" aria-controls="collapseExample">
			Vaastu And Feng Shui
		</a>
		<div class="collapse" id="Astrology2">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Vaastu Consultation">Vaastu Consultation
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Feng Shui Consultation">Feng Shui Consultation
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Vaastu - Feng Shui Products">Vaastu - Feng Shui Products
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Astrology3" aria-expanded="false" aria-controls="collapseExample">
			Pooja & Devotional Service
		</a>
		<div class="collapse" id="Astrology3">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Pooja Services">Pooja Services
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Yagna - Havan - Homa">Yagna - Havan - Homa
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Pandit - Pujari - Ceremonies">Pandit - Pujari - Ceremonies
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Pilgrimage - Theerth Yatra">Pilgrimage - Theerth Yatra
					</label>
				</div>
			</div>
		</div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      
        <a data-toggle="collapse" data-parent="#accordion" href="#Commercial"  >
          Commercial Services
        </a>
      
    </div>

    <div id="Commercial" class="collapse " role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-block">
        <a class="card card-block" data-toggle="collapse" href="#Commercial1" aria-expanded="false" aria-controls="collapseExample">
			 Software Development
		</a>
		<div class="collapse" id="Commercial1">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Website Developer">Website Developer
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Mobile App Developer">Mobile App Developer
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Standalone Software">Standalone Software
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Commercial2" aria-expanded="false" aria-controls="collapseExample">
			Marketing Service
		</a>
		<div class="collapse" id="Commercial2">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Digital Marketing">Digital Marketing
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Advertising Solutions">Advertising Solutions
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Marketing Materials - Collaterals">Marketing Materials - Collaterals
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Stalls and Tents">Stalls and Tents
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Graphics & Logo Designer">Graphics & Logo Designer
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Commercial3" aria-expanded="false" aria-controls="collapseExample">
			Architects & Civil Contractors
		</a>
		<div class="collapse" id="Commercial3">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Architect">Architect
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Civil Contractor">Civil Contractor
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Building Plan - Design & Sanction">Building Plan - Design & Sanction
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Construction Material Supply">Construction Material Supply
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Borewell Drilling">Borewell Drilling
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Material Handling Services">Material Handling Services
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Commercial4" aria-expanded="false" aria-controls="collapseExample">
			Gardening And Landscaping
		</a>
		<div class="collapse" id="Commercial4">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Residential gardening">Residential gardening
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Commercial gardening">Commercial gardening
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Commercial5" aria-expanded="false" aria-controls="collapseExample">
			Cargo - Warehouse - Logistics
		</a>
		<div class="collapse" id="Commercial5">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Warehouse">Warehouse
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Cargo - Shipping">Cargo - Shipping
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Commercial6" aria-expanded="false" aria-controls="collapseExample">
			Other Corporate Services
		</a>
		<div class="collapse" id="Commercial6">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Corporate Gifting Solutions">Corporate Gifting Solutions
					</label>
				</div>
			</div>
		</div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      
        <a data-toggle="collapse" data-parent="#accordion" href="#Healthcare"  >
          Healthcare Services
        </a>
      
    </div>

    <div id="Healthcare" class="collapse " role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-block">
        <a class="card card-block" data-toggle="collapse" href="#Healthcare1" aria-expanded="false" aria-controls="collapseExample">
			 Doctor Consultation
		</a>
		<div class="collapse" id="Healthcare1">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Doctor on Call - Home Visit">Doctor on Call - Home Visit
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Hospitals & Clinics">Hospitals & Clinics
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Chemists">Chemists
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Healthcare2" aria-expanded="false" aria-controls="collapseExample">
			Medical Diagnostics - Lab Tests
		</a>
		<div class="collapse" id="Healthcare2">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Diagnostic Labs">Diagnostic Labs
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Diagnostics at Home">Diagnostics at Home
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Healthcare3" aria-expanded="false" aria-controls="collapseExample">
			Nursing
		</a>
		<div class="collapse" id="Healthcare3">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Ward Boy - Attendant">Ward Boy - Attendant
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Healthcare4" aria-expanded="false" aria-controls="collapseExample">
			Emergency Services
		</a>
		<div class="collapse" id="Healthcare4">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Ambulance Service">Ambulance Service
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Blood Bank">Blood Bank
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Healthcare5" aria-expanded="false" aria-controls="collapseExample">
			Physiotherapy
		</a>
		<div class="collapse" id="Healthcare5">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Physiotherapy Clinic">Physiotherapy Clinic
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Physiotherapy at Home">Physiotherapy at Home
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Healthcare6" aria-expanded="false" aria-controls="collapseExample">
			Cosmetic Healthcare
		</a>
		<div class="collapse" id="Healthcare6">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Cosmetic Dentist">Cosmetic Dentist
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Skin Clinic">Skin Clinic
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Hair Clinic">Hair Clinic
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Opticians">Opticians
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Healthcare7" aria-expanded="false" aria-controls="collapseExample">
			Medical Equipment
		</a>
		<div class="collapse" id="Healthcare7">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Ambulatory Aid">Ambulatory Aid
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Hospital Bed">Hospital Bed
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Oxygen Cylinder">Oxygen Cylinder
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Home ICU Setup">Home ICU Setup
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Other Medical Equipment">Other Medical Equipment
					</label>
				</div>
			</div>
		</div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      
        <a data-toggle="collapse" data-parent="#accordion" href="#Hobbies"  >
          Hobbies & Personal Development
        </a>
      
    </div>

    <div id="Hobbies" class="collapse " role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-block">
        <a class="card card-block" data-toggle="collapse" href="#Hobbies1" aria-expanded="false" aria-controls="collapseExample">
			 Music
		</a>
		<div class="collapse" id="Hobbies1">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Vocal - Indian">Vocal - Indian
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Vocal - Western">Vocal - Western
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Musical Instrument - Indian">Musical Instrument - Indian
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Musical Instrument - Western">Musical Instrument - Western
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Hobbies2" aria-expanded="false" aria-controls="collapseExample">
			Dance
		</a>
		<div class="collapse" id="Hobbies2">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Indian Dance Forms">Indian Dance Forms
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Western Dance">Western Dance
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Hobbies3" aria-expanded="false" aria-controls="collapseExample">
			Arts
		</a>
		<div class="collapse" id="Hobbies3">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Drawing - Painting">Drawing - Painting
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Performing Arts">Performing Arts
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Hobbies4" aria-expanded="false" aria-controls="collapseExample">
			Foreign Language
		</a>
		<div class="collapse" id="Hobbies4">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Foreign Language Classes">Foreign Language Classes
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Hobbies5" aria-expanded="false" aria-controls="collapseExample">
			Hobby Classes
		</a>
		<div class="collapse" id="Hobbies5">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Cooking Classes">Cooking Classes
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Baking Classes">Baking Classes
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Jewel Making Classes">Jewel Making Classes
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Craft & Modelling">Craft & Modelling
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Hobbies6" aria-expanded="false" aria-controls="collapseExample">
			Driving Schools & Classes
		</a>
		<div class="collapse" id="Hobbies6">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Driving Classes">Driving Classes
					</label>
				</div>
			</div>
		</div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      
        <a data-toggle="collapse" data-parent="#accordion" href="#Rental"  >
          Rental Services
        </a>
      
    </div>

    <div id="Rental" class="collapse " role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-block">
        <a class="card card-block" data-toggle="collapse" href="#Rental1" aria-expanded="false" aria-controls="collapseExample">
			 Appliance Rental
		</a>
		<div class="collapse" id="Rental1">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Projector Rentals">Projector Rentals
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Computer Rentals">Computer Rentals
					</label>	
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="TV - Screen Rentals">TV - Screen Rentals
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Refrigerator Rental">Refrigerator Rental
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Washing Machine Rental">Washing Machine Rental
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Air Conditioner Rental">Air Conditioner Rental
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Rental2" aria-expanded="false" aria-controls="collapseExample">
			Power Devices Rental
		</a>
		<div class="collapse" id="Rental2">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Inverter & Battery Rentals">Inverter & Battery Rentals
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Generator Rental">Generator Rental
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Rental3" aria-expanded="false" aria-controls="collapseExample">
			Computer Peripheral Rentals
		</a>
		<div class="collapse" id="Rental3">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Xerox Machine Rentals">Xerox Machine Rentals
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Printer - Scanner Rentals">Printer - Scanner Rentals
					</label>
				</div>
			</div>
		</div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      
        <a data-toggle="collapse" data-parent="#accordion" href="#Living"  >
          Green Living Social Welfare
        </a>
      
    </div>

    <div id="Living" class="collapse " role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-block">
        <a class="card card-block" data-toggle="collapse" href="#Living1" aria-expanded="false" aria-controls="collapseExample">
			 Waste Management
		</a>
		<div class="collapse" id="Living1">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Scrap Dealers">Scrap Dealers
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Waste Collection - Garbage Disposal">Waste Collection - Garbage Disposal
					</label>	
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Septic Tank - Drainage Cleaning">Septic Tank - Drainage Cleaning
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Sewage Water Treatment Plant">Sewage Water Treatment Plant
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Living2" aria-expanded="false" aria-controls="collapseExample">
			NGOs And Charitable Trusts
		</a>
		<div class="collapse" id="Living2">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="NGOs And Charitable Trusts">INGOs And Charitable Trusts
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Living3" aria-expanded="false" aria-controls="collapseExample">
			Green Energy
		</a>
		<div class="collapse" id="Living3">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Solar Panels">Solar Panels
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Solar Water Heater">Solar Water Heater
					</label>
				</div>
			</div>
		</div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      
        <a data-toggle="collapse" data-parent="#accordion" href="#Repairs"  >
          Repairs & Servicing
        </a>
      
    </div>

    <div id="Repairs" class="collapse " role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-block">
        <a class="card card-block" data-toggle="collapse" href="#Repairs1" aria-expanded="false" aria-controls="collapseExample">
			 Vehicle Repair & Servicing
		</a>
		<div class="collapse" id="Repairs1">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Two Wheeler Service - Repairs">Two Wheeler Service - Repairs
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Car Service - Repairs">Car Service - Repairs
					</label>	
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Heavy Vehicle Service - Repairs">Heavy Vehicle Service - Repairs
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Towing Service">Towing Service
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Repairs2" aria-expanded="false" aria-controls="collapseExample">
			Motor Repair & Servicing
		</a>
		<div class="collapse" id="Repairs2">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Electric Motor Repair">Electric Motor Repair
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Stepper Motor Repair">Stepper Motor Repair
					</label>	
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Servo Motor Repair">Servo Motor Repair
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Alternator Servicing">Alternator Servicing
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Repairs3" aria-expanded="false" aria-controls="collapseExample">
			Generator Repair & Servicing
		</a>
		<div class="collapse" id="Repairs3">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Residential Generator Repairs - Service">Residential Generator Repairs - Service
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Commercial Generator Repairs - Service">Commercial Generator Repairs - Service
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Industrial Generator Repairs - Service">Industrial Generator Repairs - Service
					</label>
				</div>
			</div>
		</div>
		<a class="card card-block" data-toggle="collapse" href="#Repairs4" aria-expanded="false" aria-controls="collapseExample">
			Lift - Escalator Repair & Servicing
		</a>
		<div class="collapse" id="Repairs4">
			<div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Lift Installation & Repair">Lift Installation & Repair
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Escalator Installation & Repair">Escalator Installation & Repair
					</label>
				</div>
			</div>
		</div>
		
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      
        <a data-toggle="collapse" data-parent="#accordion" href="#Products"  >
          Products
        </a>
    </div>
	<div id="Products" class="collapse " role="tabpanel" aria-labelledby="headingTwo">
      <div class="card card-block">
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Groceries">Groceries
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Restaurants"> Restaurants

					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Medical Supplies"> Medical Supplies
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Gifts"> Gifts
						</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Pet Supplies"> Pet Supplies
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Electronics"> Electronics
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Books & Stationary"> Books & Stationary
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Organic"> Organic
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Meat"> Meat
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Automobiles Spare parts"> Automobiles Spare parts
					</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="Pooja Items"> Pooja Items</label>
				</div>
				<div class="form-check mb-2 mr-sm-2 mb-sm-0">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="cat[]" value="others"> others</label>
				</div>
				
			</div>
	</div>
  </div>
  

  
  
  
  
  
  
  
  



  
  
</div>
<div class="pt-3">
<input type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit" disabled='disabled'/>
</div>
</form>
	</div>
	</div>


</div>
</div>
</div>
</div>








    <!-- jQuery first, then Tether, then Bootstrap JS. -->

    <!-- <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	
 </body>
</html>




