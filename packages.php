<?php 

require_once("database.php");

session_start();
if(!isset($_SESSION['uid']))
{
	echo "<script>alert('Pls Login First')</script>";
	echo "<script>window.location.href = 'login.php'</script>";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>TravelBlox | Packages</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
	
	<!-- css files -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
    <link href="css/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->
    <link href="css/font-awesome.min.css" rel="stylesheet"><!-- fontawesome css -->
	<!-- //css files -->
	
	<!-- google fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<!-- //google fonts -->
	
</head>
<body>

<!-- header -->
<?php
$currentPage = 'package';
include("header.php");
?>
<!-- //header -->

<!-- banner -->
<section class="banner_inner" id="home">
	<div class="banner_inner_overlay">
	</div>
</section>
<!-- //banner -->


<!-- tour packages -->
<section class="packages pt-5">
	<div class="container py-lg-4 py-sm-3">
		<h2 class="heading text-capitalize text-center"> Discover our tour packages</h2>
		<p class="text mt-2 mb-5 text-center">Ready for your next adventure? Explore & customize our range of tour packages, each promising a unique and immersive exploration of your chosen destination..!!</p>
		<div class="row">
			
			<div class="col-lg-3 col-sm-6 mb-5">
				<div class="image-tour position-relative">
					<img src="images/Saputara.jpg" alt="" class="img-fluid" />
					<p><span class="fa fa-tags"></span> <span>2,999₹</span></p>
				</div>
				<div class="package-info">
					<h6 class="mt-1"><span class="fa fa-map-marker mr-2"></span>Saputara, Gujrat.</h6>
					<h5 class="my-2">Adventure Camp</h5>
					<p class="">Simply Kashmir of Gujarat!</p>
					<ul class="listing mt-3">
						<li><span class="fa fa-clock-o mr-2"></span>Duration : <span>3 Days, 2 Nights</span></li>
					</ul>
					<br>
					<a href="tour-details.php?package=1" target="_blank">More Info <i class="fa fa-info-circle"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 mb-5">
				<div class="image-tour position-relative">
					<img src="images/goa.jpg" alt="" class="img-fluid" />
					<p><span class="fa fa-tags"></span> <span>8,999₹</span></p>
				</div>
				<div class="package-info">
					<h6 class="mt-1"><span class="fa fa-map-marker mr-2"></span>Goa</h6>
					<h5 class="my-2">Beach Fun</h5>
					<p class="">Lost in the wa
						ves of ocean</p>
					<ul class="listing mt-3">
						<li><span class="fa fa-clock-o mr-2"></span>Duration : <span>9 Days, 8 Nights</span></li>
					</ul>
					<br>
					<a href="tour-details.php?package=2" target="_blank">More Info <i class="fa fa-info-circle"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 mb-5">
				<div class="image-tour position-relative">
					<img src="images/Jaislmair.jpg" alt="" class="img-fluid" />
					<p><span class="fa fa-tags"></span> <span>4,999₹</span></p>
				</div>
				<div class="package-info">
					<h6 class="mt-1"><span class="fa fa-map-marker mr-2"></span>Jaisalmer, Rajasthan</h6>
					<h5 class="my-2">Desert Camping</h5>
					<p class="">A date with the desert</p>
					<ul class="listing mt-3">
						<li><span class="fa fa-clock-o mr-2"></span>Duration : <span>4 Days, 3 Nights</span></li>
					</ul>
					<br>
					<a href="tour-details.php?package=3" target="_blank">More Info <i class="fa fa-info-circle"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 mb-5">
				<div class="image-tour position-relative">
					<img src="images/Kedarnath.jpg" alt="" class="img-fluid" />
					<p><span class="fa fa-tags"></span> <span>10,999₹</span></p>
				</div>
				<div class="package-info">
					<h6 class="mt-1"><span class="fa fa-map-marker mr-2"></span>Kedarnath, Uttarakhand</h6>
					<h5 class="my-2">Spiritual Journey</h5>
					<p class="">Where Faith Meets Majesty</p>
					<ul class="listing mt-3">
						<li><span class="fa fa-clock-o mr-2"></span>Duration : <span>9 Days, 8 Nights</span></li>
					</ul>
					<br>
					<a href="tour-details.php?package=4" target="_blank">More Info <i class="fa fa-info-circle"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 mb-5">
				<div class="image-tour position-relative">
					<img src="images/Saputara.jpg" alt="" class="img-fluid" />
					<p><span class="fa fa-tags"></span> <span>2,999₹</span></p>
				</div>
				<div class="package-info">
					<h6 class="mt-1"><span class="fa fa-map-marker mr-2"></span>Saputara, Gujrat.</h6>
					<h5 class="my-2">Adventure Camp</h5>
					<p class="">Simply Kashmir of Gujarat!</p>
					<ul class="listing mt-3">
						<li><span class="fa fa-clock-o mr-2"></span>Duration : <span>3 Days, 2 Nights</span></li>
					</ul>
					<br>
					<a href="">More Info <i class="fa fa-info-circle"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 mb-5">
				<div class="image-tour position-relative">
					<img src="images/Manali.jpg" alt="" class="img-fluid" />
					<p><span class="fa fa-tags"></span> <span>8,999₹</span></p>
				</div>
				<div class="package-info">
					<h6 class="mt-1"><span class="fa fa-map-marker mr-2"></span>Manali, HP</h6>
					<h5 class="my-2">Trekking Camp</h5>
					<p class="">Lost in Himalayas of Manali</p>
					<ul class="listing mt-3">
						<li><span class="fa fa-clock-o mr-2"></span>Duration : <span>9 Days, 8 Nights</span></li>
					</ul>
					<br>
					<a href="">More Info <i class="fa fa-info-circle"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 mb-5">
				<div class="image-tour position-relative">
					<img src="images/Jaislmair.jpg" alt="" class="img-fluid" />
					<p><span class="fa fa-tags"></span> <span>4,999₹</span></p>
				</div>
				<div class="package-info">
					<h6 class="mt-1"><span class="fa fa-map-marker mr-2"></span>Jaisalmer, Rajasthan</h6>
					<h5 class="my-2">Desert Camping</h5>
					<p class="">A date with the desert</p>
					<ul class="listing mt-3">
						<li><span class="fa fa-clock-o mr-2"></span>Duration : <span>4 Days, 3 Nights</span></li>
					</ul>
					<br>
					<a href="">More Info <i class="fa fa-info-circle"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 mb-5">
				<div class="image-tour position-relative">
					<img src="images/Kedarnath.jpg" alt="" class="img-fluid" />
					<p><span class="fa fa-tags"></span> <span>10,999₹</span></p>
				</div>
				<div class="package-info">
					<h6 class="mt-1"><span class="fa fa-map-marker mr-2"></span>Kedarnath, Uttarakhand</h6>
					<h5 class="my-2">Spiritual Journey</h5>
					<p class="">Where Faith Meets Majesty</p>
					<ul class="listing mt-3">
						<li><span class="fa fa-clock-o mr-2"></span>Duration : <span>9 Days, 8 Nights</span></li>
					</ul>
					<br>
					<a href="">More Info <i class="fa fa-info-circle"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 mb-5">
				<div class="image-tour position-relative">
					<img src="images/Saputara.jpg" alt="" class="img-fluid" />
					<p><span class="fa fa-tags"></span> <span>2,999₹</span></p>
				</div>
				<div class="package-info">
					<h6 class="mt-1"><span class="fa fa-map-marker mr-2"></span>Saputara, Gujrat.</h6>
					<h5 class="my-2">Adventure Camp</h5>
					<p class="">Simply Kashmir of Gujarat!</p>
					<ul class="listing mt-3">
						<li><span class="fa fa-clock-o mr-2"></span>Duration : <span>3 Days, 2 Nights</span></li>
					</ul>
					<br>
					<a href="">More Info <i class="fa fa-info-circle"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 mb-5">
				<div class="image-tour position-relative">
					<img src="images/Manali.jpg" alt="" class="img-fluid" />
					<p><span class="fa fa-tags"></span> <span>8,999₹</span></p>
				</div>
				<div class="package-info">
					<h6 class="mt-1"><span class="fa fa-map-marker mr-2"></span>Manali, HP</h6>
					<h5 class="my-2">Trekking Camp</h5>
					<p class="">Lost in Himalayas of Manali</p>
					<ul class="listing mt-3">
						<li><span class="fa fa-clock-o mr-2"></span>Duration : <span>9 Days, 8 Nights</span></li>
					</ul>
					<br>
					<a href="">More Info <i class="fa fa-info-circle"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 mb-5">
				<div class="image-tour position-relative">
					<img src="images/Jaislmair.jpg" alt="" class="img-fluid" />
					<p><span class="fa fa-tags"></span> <span>4,999₹</span></p>
				</div>
				<div class="package-info">
					<h6 class="mt-1"><span class="fa fa-map-marker mr-2"></span>Jaisalmer, Rajasthan</h6>
					<h5 class="my-2">Desert Camping</h5>
					<p class="">A date with the desert</p>
					<ul class="listing mt-3">
						<li><span class="fa fa-clock-o mr-2"></span>Duration : <span>4 Days, 3 Nights</span></li>
					</ul>
					<br>
					<a href="">More Info <i class="fa fa-info-circle"></i></a>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 mb-5">
				<div class="image-tour position-relative">
					<img src="images/Kedarnath.jpg" alt="" class="img-fluid" />
					<p><span class="fa fa-tags"></span> <span>10,999₹</span></p>
				</div>
				<div class="package-info">
					<h6 class="mt-1"><span class="fa fa-map-marker mr-2"></span>Kedarnath, Uttarakhand</h6>
					<h5 class="my-2">Spiritual Journey</h5>
					<p class="">Where Faith Meets Majesty</p>
					<ul class="listing mt-3">
						<li><span class="fa fa-clock-o mr-2"></span>Duration : <span>9 Days, 8 Nights</span></li>
					</ul>
					<br>
					<a href="">More Info <i class="fa fa-info-circle"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- tour packages -->

<!-- footer -->
<?php 
include("footer.php");
?>	
<!-- //footer -->
	
</body>
</html>