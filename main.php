<?php 
session_start();
if(!isset($_SESSION['uid']))
{
	echo "<script>alert('Pls Login First')</script>";
	echo "<script>window.location.href = 'login.php'</script>";
	// header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>TravelBlox | Home</title>
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

	<link href="css/css_slider.css" type="text/css" rel="stylesheet" media="all">

	<!-- google fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
		rel="stylesheet">
	<link
		href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">
	<!-- //google fonts -->

	<style>
		.justifytext {
			text-align: justify;
		}

		.mybtn {
			color: red;
			background: black;
			padding: 10px 25px;
			display: block;
			margin-top: 10px;
			text-transform: uppercase;
			color: #fff;
			letter-spacing: 1px;
			font-size: 14px;
			text-align: center;
		}
		.mydiv{
			border: 2px solid red;
		}
	</style>

</head>

<body>

	<!-- header -->
	<?php 
	$currentPage = 'home';
	include("header.php"); ?>
	<!-- //header -->

	<!-- banner -->
	<section class="banner_w3lspvt" id="home">
		<div class="csslider infinity" id="slider1">
			<input type="radio" name="slides" checked="checked" id="slides_1" />
			<input type="radio" name="slides" id="slides_2" />
			<input type="radio" name="slides" id="slides_3" />
			<input type="radio" name="slides" id="slides_4" />
			<ul>
				<li>
					<div class="banner-top">
						<div class="overlay">
							<div class="container">
								<div class="w3layouts-banner-info">
									<h3 class="text-wh">Never let your memories be greater than your dreams.</h3>
									<h4 class="text-wh"> Discover Your Next Adventure </h4>
									<div class="buttons mt-4">
										<a href="about.php" class="btn mr-2">About Us</a>
										<a href="booking.php" class="btn">Book a Tour</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="banner-top1">
						<div class="overlay">
							<div class="container">
								<div class="w3layouts-banner-info">
									<h3 class="text-wh"> Explore the World with Us Where Dreams Take Flight </h3>
									<h4 class="text-wh"> Discover Your Next Adventure </h4>
									<div class="buttons mt-4">
										<a href="about.html" class="btn mr-2">About Us</a>
										<a href="booking.html" class="btn">Book a Tour</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="banner-top2">
						<div class="overlay">
							<div class="container">
								<div class="w3layouts-banner-info">
									<h3 class="text-wh"> Travel with Us and Turn Every Vacation into a Story Worth
										Telling </h3>
									<h4 class="text-wh"> Discover Your Next Adventure </h4>
									<div class="buttons mt-4">
										<a href="about.html" class="btn mr-2">About Us</a>
										<a href="booking.html" class="btn">Book a Tour</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="banner-top3">
						<div class="overlay1">
							<div class="container">
								<div class="w3layouts-banner-info">
									<h3 class="text-wh"> Adventure Begins Here
										Let's Make Memories Together </h3>
									<h4 class="text-wh"> Discover Your Next Adventure </h4>
									<div class="buttons mt-4">
										<a href="about.html" class="btn mr-2">About Us</a>
										<a href="booking.html" class="btn">Book a Tour</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
			<div class="arrows">
				<label for="slides_1"></label>
				<label for="slides_2"></label>
				<label for="slides_3"></label>
				<label for="slides_4"></label>
			</div>
		</div>
	</section>
	<!-- //banner -->

	<!-- tour packages -->
	<section class="packages py-5">
		<div class="container py-lg-4 py-sm-3">
			<h3 class="heading text-capitalize text-center"> Discover our tour packages</h3>
			<p class="text mt-2 mb-5 text-center">Ready for your next adventure? Explore & customize our range of tour
				packages, each promising a unique and immersive exploration of your chosen destination..!!</p>
			<div class="row">
				<div class="col-lg-3 col-sm-6">
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
				<div class="col-lg-3 col-sm-6">
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
						<a href="tour-details.php?package=2" target="_blank">More Info <i class="fa fa-info-circle"></i></a>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 mt-lg-0 mt-5">
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
				<div class="col-lg-3 col-sm-6 mt-lg-0 mt-5">
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
			</div>
			<div class="view-package text-center mt-4">
				<a href="packages.php">View All Packages</a>
			</div>
		</div>
	</section>
	<!-- tour packages -->

	<!-- how to book -->
	<section class="book py-5">
		<div class="container py-lg-5 py-sm-3">
			<h2 class="heading text-capitalize text-center"> How to Plan Your Custom Trip </h2>
			<div class="row mt-5 text-center">
				<div class="col-lg-4 col-sm-6">
					<div class="grid-info">
						<div class="icon">
							<span class="fa fa-map-signs"></span>
						</div>
						<h4>Pick Destination</h4>
						<p class="mt-3 justifytext">The first step in planning your custom trip is selecting your
							desired destination. Explore our destination guides for inspiration, or simply pick a place
							that's been on your bucket list.</p>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 mt-sm-0 mt-5">
					<div class="grid-info">
						<div class="icon">
							<span class="fa fa-calendar"></span>
						</div>
						<h4>Select Date</h4>
						<p class="mt-3 justifytext">Determine your travel dates and the duration of your trip. Whether
							it's a weekend getaway or an extended vacation, make sure to choose dates that work for you.
						</p>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 mt-lg-0 mt-5">
					<div class="grid-info">
						<div class="icon">
							<span class="fa fa-money"></span>
						</div>
						<h4>Set Your Budget</h4>
						<p class="mt-3 justifytext">Define your budget range for the trip. This will help us recommend
							options that align with your financial preferences and provide you with a customized quote.
						</p>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 mt-lg-0 mt-5">
					<div class="grid-info">
						<div class="icon">
							<span class="fa fa-comment-dots"></span>
						</div>
						<h4>Group Chat</h4>
						<p class="mt-3 justifytext">To make planning even more enjoyable, you can create a group chat
							with your travel companions right here on our platform. Discuss the itinerary, share ideas,
							and finalize the details together.</p>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 mt-lg-0 mt-5">
					<div class="grid-info">
						<div class="icon">
							<span class="fa fa-check"></span>
						</div>
						<h4>Confirm and Book</h4>
						<p class="mt-3 justifytext">Once you're satisfied with your customized trip, confirm your
							booking, and our team will take care of the rest. We'll ensure a seamless travel experience
							from start to finish.</p>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 mt-lg-0 mt-5">
					<div class="grid-info">
						<div class="icon">
							<span class="fa fa-wrench"></span>
						</div>
						<h4>Customize Now..!!</h4>
						<p class="mt-3 justifytext">Finally, embark on your one-of-a-kind adventure and create lasting
							memories.<a class="mybtn" href="custom.php">Create Now</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //how to book -->

	<!-- about -->
	<section class="about py-5">
		<div class="container py-lg-5 py-sm-4">
			<div class="row">
				<div class="col-lg-6 about-left">
					<h3 class="mt-lg-3">We will take you to the Top destination in the world, <strong>Explore with
							us!</strong></h3>
					<p class="mt-4 justifytext">"At TravelBlox, we're more than just a travel website; we're your
						trusted companions on a journey to discover the world's hidden treasures. Founded by a team of
						passionate globetrotters, we understand the transformative power of travel. With years of travel
						expertise, we curate handcrafted itineraries, provide top-notch customer support, and prioritize
						safety and sustainability in every adventure we offer. Join us on this incredible journey, where
						each travel experience is a building block of unforgettable memories. Welcome to TravelBlox,
						where your wanderlust meets our expertise, and together, we craft your dream adventures."
					</p>
				</div>
				<div class="col-lg-6 about-right text-lg-right mt-lg-0 mt-5">
					<img src="images/about.jpg" alt="" class="img-fluid abt-image" />
				</div>
			</div>
			<div class="row mt-5 text-center">
				<div class="col-lg-3 col-6">
					<div class="counter">
						<span class="fa fa-smile-o"></span>
						<div class="timer count-title count-number">1000+</div>
						<p class="count-text text-uppercase">happy customers</p>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="counter">
						<span class="fa fa-ship"></span>
						<div class="timer count-title count-number">2271</div>
						<p class="count-text text-uppercase">Tours & Travels </p>
					</div>
				</div>
				<div class="col-lg-3 col-6 mt-lg-0 mt-5">
					<div class="counter">
						<span class="fa fa-users"></span>
						<div class="timer count-title count-number">200</div>
						<p class="count-text text-uppercase">destinations</p>
					</div>
				</div>
				<div class="col-lg-3 col-6 mt-lg-0 mt-5">
					<div class="counter">
						<span class="fa fa-gift"></span>
						<div class="timer count-title count-number">20+<span>years</span></div>
						<p class="count-text text-uppercase">experience</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //about -->


	<!-- text -->
	<section class="text-content">
		<div class="overlay-inner py-5">
			<div class="container py-md-3">
				<div class="test-info">
					<h4 class="tittle">Enjoy The Trip</h4>
					<p class="mt-3 justifytext">"As you navigate through our website, we want you to savor every moment
						of your journey, right from the very beginning. This space is dedicated to enhancing your travel
						planning experience. Whether you're customizing your dream adventure or discovering our curated
						tour packages, we invite you to immerse yourself in the excitement and anticipation of your
						upcoming travels. Your journey starts here, and we're here to make it truly enjoyable, from the
						first click to your final destination."</p>
					<div class="text-left mt-4">
						<a href="booking.php">Book Now</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //text -->

	<!-- footer -->
	<?php
	include("footer.php");
	?>
	<!-- //footer -->

</body>
</html>