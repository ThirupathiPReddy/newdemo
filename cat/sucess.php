<?php
$sucess = "";

if (isset($_GET["s"])) {
	$sucess = "Data added sucessfully";
}
else{
	header('Location:index.php');
}
?>
<!doctype html>

<html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


  <body style="background:#cdcdcd;background-image: url(img/splash_screen_bg.jpg); background-attachment: fixed;">
  
<div class="container-fluid">
<div class="row">
  <div class="col-md-8 mx-auto pt-5">
    <div class="p-2" style="box-shadow: 0 0 11px 5px rgba(0, 0, 0, 0.08);background-color:#fff;">
	
	<img src="img/wedobest_logo.png" class="img-fluid mx-auto d-block pt-3" style="height:10em;" />
	<div class="col-7 mx-auto">
	<div class="alert alert-success " role="alert">
	<h5 class="text-center pt-3 pb-4"><?php echo $sucess ?></h5>
	</div>
	<div>
	<a class="btn btn btn-primary text-right" href="index.php">ADD</a> 
	</div>
	</div>
	
</div>
</div>
</div>
</div>



</body>
</html>
