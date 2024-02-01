<?php

require_once("database.php");

session_start();
if (!isset($_SESSION['uid'])) {
	echo "<script>alert('Pls Login First')</script>";
	echo "<script>window.location.href = 'login.php'</script>";
}

if (isset($_POST['submit'])) {
	$uid = $_SESSION['uid'];
	$review = $_POST['review'];
	$query = "INSERT INTO feedback_mst (User_ID,feedback) VALUES ($uid,'$review')";
	$result = mysqli_query($con, $query);
	if ($result) {
		echo "<script>alert('Review Submitted..!!')</script>";
	}
}

// Fetch three latest reviews from the database
$fetchReviewsQuery = "SELECT feedback_mst.feedback, user_mst.FullName FROM feedback_mst INNER JOIN user_mst ON feedback_mst.User_ID = user_mst.User_ID ORDER BY feedback_mst.Feedback_ID DESC LIMIT 3";

$fetchReviewsResult = mysqli_query($con, $fetchReviewsQuery);

$existingReviews = [];
while ($row = mysqli_fetch_assoc($fetchReviewsResult)) {
	$existingReviews[] = $row;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>TravelBlox | About</title>
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

		.size {
			width: 100px;
			height: 100px;
		}

		.mtbtn {
			text-align: center;
			width: 90%;
		}
	</style>

</head>

<body>
	<!-- header -->
	<?php
	$currentPage = 'about';
	require_once("header.php");
	?>
	<!-- //header -->

	<!-- banner -->
	<section class="banner_inner" id="home">
		<div class="banner_inner_overlay">
		</div>
	</section>
	<!-- //banner -->

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
						where your wanderlust meets our expertise, and together, we craft your dream adventures."</p>
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


	<!-- tabs -->
	<section class="choose" id="choose">
		<div class="overlay-all py-5">
			<div class="container py-lg-5 py-sm-4">
				<h2 class="heading text-capitalize text-center mb-lg-5 mb-4"> Why Choose Us</h2>
				<div class="edu-exp-grids">
					<div class="tab-main">
						<input id="tab1" type="radio" name="tabs" class="w3pvt-sm" checked>
						<label for="tab1">We provide</label>
						<input id="tab2" type="radio" class="w3pvt-sm" name="tabs">
						<label for="tab2">We Offer</label>
						<section id="content1">
							<div class="row text-center">
								<div class="col-lg-4 col-md-6 inner-w3pvt-wrap">
									<div class="inner-sec-grid">
										<span class="fa fa-gift"></span>
										<h4 class="mt-md-4 mt-2">Predifined Packages</h4>
										<p class="mt-3 justifytext">Explore our carefully curated selection of
											predefined travel packages designed to offer hassle-free and memorable
											adventures.</p>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 inner-w3pvt-wrap">
									<div class="inner-sec-grid">
										<span class="fa fa-gift"></span>
										<h4 class="mt-md-4 mt-2">Group Travel Planning</h4>
										<p class="mt-3 justifytext"> Our platform empowers you to coordinate group trips
											effortlessly. Collaborate in real-time through group chat, discuss
											itineraries, share ideas, and take decisions.</p>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 inner-w3pvt-wrap">
									<div class="inner-sec-grid">
										<span class="fa fa-gift"></span>
										<h4 class="mt-md-4 mt-2">Low Prices</h4>
										<p class="mt-3 justifytext">At Travelblox, we understand that cost plays a
											significant role in travel decisions. Our commitment to providing affordable
											travel options allows you to explore the world without breaking the bank.
										</p>
									</div>
								</div>
							</div>
						</section>
						<section id="content2">
							<div class="row text-center">
								<div class="col-lg-4 col-md-6 inner-w3pvt-wrap">
									<div class="inner-sec-grid">
										<span class="fa fa-gift"></span>
										<h4 class="mt-md-4 mt-2">Customized Packages</h4>
										<p class="mt-3 justifytext">Tailor your travel experiences to match your unique
											preferences with our customized travel packages.</p>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 inner-w3pvt-wrap">
									<div class="inner-sec-grid">
										<span class="fa fa-gift"></span>
										<h4 class="mt-md-4 mt-2">Budget Tracking</h4>
										<p class="mt-3 justifytext">We believe that stress-free travel involves staying
											on top of your finances. Our budget tracking feature empowers you to manage
											your travel expenses.</p>
									</div>
								</div>
								<div class="col-lg-4 inner-w3pvt-wrap">
									<div class="inner-sec-grid">
										<span class="fa fa-gift"></span>
										<h4 class="mt-md-4 mt-2">Easy Booking</h4>
										<p class="mt-3 justifytext">We've simplified the booking process, By using Our
											user-friendly platform makes it a breeze to search, select, and secure your
											travel, From accommodations to activities and transportation.</p>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- tabs -->

	<!-- testimonials -->
	<section class="testimonials py-5" id="testi">
		<div class="container py-lg-5 py-md-3">
			<h3 class="heading text-capitalize text-center mb-lg-5 mb-4"> What Our Customers Say</h3>
			<div class="row pt-xl-4">


				<!-- <div class="col-md-4 test-grid px-lg-4">
					<div class="testi-info text-center">
						<p class="text-li">Exceptional service! Found the perfect package for my family vacation.
							Travelblox made our dream trip a reality.</p>
						<div class="test-img text-center mt-4">
							<img src="images/20231101_122755.jpg" class="img-fluid size" alt="user-image">
						</div>
						<h3 class="mt-md-4 mt-3">Hardik Chaudhary</h3>
					</div>
				</div>
				<div class="col-md-4 test-grid px-lg-4 my-md-0 my-5">
					<div class="testi-info text-center">
						<p class="text-li">Effortless booking and unbeatable prices. Travelblox is my go-to for all my
							travel plans.</p>
						<div class="test-img text-center mt-4">
							<img src="images/20231101_160440.jpg" class="img-fluid size" alt="user-image">
						</div>
						<h3 class="mt-md-4 mt-3">Jaimin Raval</h3>
					</div>
				</div>
				<div class="col-md-4 test-grid px-lg-4">
					<div class="testi-info text-center">
						<p class="text-li">Incredible customization options. Our group had a blast planning and enjoying
							our adventure, Thanks Travelblox!</p>
						<div class="test-img text-center mt-4">
							<img src="images/20231101_160501.jpg" class="img-fluid size" alt="user-image">
						</div>
						<h3 class="mt-md-4 mt-3">Honey Parmar</h3>
					</div>
				</div> -->


				<?php foreach ($existingReviews as $review): ?>
					<div class="col-md-4 test-grid px-lg-4">
						<div class="testi-info text-center">
							<p class="text-li">
								<?php echo $review['feedback']; ?>
							</p>
							<h3 class="mt-md-4 mt-3">
								<?php echo $review['FullName']; ?>
							</h3>
						</div>
					</div>
				<?php endforeach; ?>


			</div>
		</div>

		<!-- Button to trigger the modal -->
		<div class="text-center mt-4">
			<button id="addReviewBtn" class="btn btn-primary mt-4" data-toggle="modal" data-target="#reviewModal"
				style="width: 50%;">
				Add Your Review
			</button>
		</div>

		<!-- Bootstrap Modal for User Review -->
		<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="reviewModalLabel">Enter Your Review</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<!-- Review input form -->
						<form id="reviewForm" action="about.php" method="post">
							<div class="form-group">
								<label for="reviewText">Your Review:</label>
								<textarea class="form-control" id="reviewText" rows="4" required
									name="review"></textarea>
							</div>
							<button type="submit" class="btn btn-primary" name="submit">Submit Review</button>
						</form>
					</div>
				</div>
			</div>
		</div>

	</section>
	<!-- //testimonials -->

	<!-- footer -->
	<?php
	require_once("footer.php");
	?>
	<!-- //footer -->

	<!-- <script>
		document.addEventListener("DOMContentLoaded", function () {
			// Function to handle form submission
			function submitReview(event) {
				event.preventDefault();
				var review = document.getElementById("reviewText").value;

				// Check if the user entered a review
				if (review.trim() !== "") {
					// Send the review to the server (you need to implement the server-side logic)
					// For simplicity, we'll just display an alert with the entered review
					alert("Review submitted: " + review);

					// TODO: Send the review to the server using AJAX or fetch API
					// Update the database and retrieve the updated reviews to display on the page
					// You may need to use a server-side scripting language (e.g., PHP) for this part
				}

				// Close the modal
				$('#reviewModal').modal('hide');
			}

			// Attach submit event listener to the review form
			document.getElementById("reviewForm").addEventListener("submit", submitReview);
		});
	</script> -->


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>



</body>

</html>