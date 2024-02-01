<?php

require_once("database.php");

session_start();
if(!isset($_SESSION['uid']))
{
	echo "<script>alert('Pls Login First')</script>";
	echo "<script>window.location.href = 'login.php'</script>";
} else {
	$uid = $_SESSION["uid"];
	$query = "SELECT * from user_mst WHERE User_id=$uid";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
}

if(isset($_POST['submit'])){
	
	$_SESSION['method'] = $_POST['PayMethod'];
	$_SESSION['amount'] = $_POST['amount'];

	if(isset($_POST['PackageID'])){
		$_SESSION['Package_ID'] = $_POST['PackageID'];
	}

	$_SESSION['Package_Type'] = $_POST['Package_Type'];

	// echo $_SESSION['Package_ID'];
	// echo $_SESSION['Package_Type'];

	echo "<script>window.location.href = 'newpayment.php' </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>TravelBlox | Booking</title>
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
		.title {
			text-align: center;
			padding: 5px;
			margin: auto;
			margin-top: 15px;
		}

		.title h2 {

			background-color: #007BFF;
			color: #fff;
			padding: 20px;
			margin: 0;
			border-top-left-radius: 10px;
			border-top-right-radius: 10px;

		}

		.justify {
			text-align: justify;
		}

	</style>

</head>

<body>

	<!-- header -->
	<?php
	$currentPage = null;
	require_once("header.php");
	?>
	<!-- //header -->

	<!-- banner -->
	<section class="banner_inner" id="home">
		<div class="banner_inner_overlay">
		</div>
	</section>
	<!-- //banner -->


	<!-- Booking -->
	<section class="contact py-5">
		<div class="container py-lg-5 py-sm-4">
			<div class="title">
				<h2 class="heading text-capitalize text-center mb-lg-5 mb-4">Book Your Trip</h2>
			</div>
			<div class="contact-grids">
				<div class="row">
					<div class="col-lg-7 contact-left-form">
						<form action="booking.php" method="post" class="row">
							<div class="col-sm-6 form-group contact-forms">
								<label for="name">Name</label>
								<input type="text" id="name" class="form-control" placeholder="Name" required
									value="<?php echo $row['FullName'] ?>">
							</div>
							<div class="col-sm-6 form-group contact-forms">
								<label for="Emial">Email</label>
								<input type="email" class="form-control" placeholder="Email" required
									value="<?php echo $row['Email'] ?>">
							</div>
							<div class="col-sm-6 form-group contact-forms">
								<label for="MobileNo">Mobile No.</label>
								<input type="number" class="form-control" placeholder="Phone" required
									value="<?php echo $row['MobileNo'] ?>">
							</div>
							<div class="col-sm-6 form-group contact-forms">
								<label for="Address">Address</label>
								<input type="text" class="form-control" placeholder="Address" required
									value="<?php echo $row['Address'] ?>">
							</div>
							<div class="col-sm-6 form-group contact-forms">
								<label for="packageType">Package Type</label>
								<select class="form-control" id="packageType" required onchange="populatePackageIds()" name="Package_Type">
									<?php
									if (isset($_GET['ptype'])) {
										$type = $_GET['ptype'];
										echo "<option value='$type'>$type</option>";
									}elseif(isset($_GET['ctype'])) {
										$type = $_GET['ctype'];
										echo "<option value='$type'>$type</option>";
									}
									else {
										echo "
										<option value='' selected disabled>Select Package Type</option>
										<option value='prePackage'>Pre Package</option>
										<option value='customPackage'>custom Package</option>";
									}
									?>


								</select>
							</div>
							<div class="col-sm-6 form-group contact-forms">
								<label for="PackageId">Package ID</label>
								<select class="form-control" id="packageId" required disabled
									onchange="populateFileds()" name="PackageID">
									<?php
									if (isset($_GET['pid'])) {
										$id = $_GET['pid'];
										echo "<option value='$id'>$id</option>";
										$_SESSION['Package_ID'] = $id;
									}elseif(isset($_GET['cid'])) {
										$id = $_GET['cid'];
										echo "<option value='$id'>$id</option>";
										$_SESSION['Package_ID'] = $id;
									}
									else {
										echo "
										<option value='' selected disabled>Select Package Type First</option>
										";
									}
									?>
								</select>
							</div>
							<div class="col-sm-6 form-group contact-forms">
								<label for="PackageName">Package Name</label>
								<input type="text" class="form-control" id="packagename" placeholder="Package Name"
									required value="<?php 
									if(isset($_GET['pname'])){
										echo $_GET['pname'];
									}
									elseif(isset($_GET['cname'])){
										echo $_GET['cname'];
									}
									?>">
							</div>
							<div class="col-sm-6 form-group contact-forms">
								<label for="transport">Select Transportation</label>
								<select id="transport" class="form-control" name="transport" required>
									<?php
									if (isset($_GET['Transportaion'])) {
										$trans = $_GET['Transportaion'];
										echo "<option value='$trans' >$trans</option>";
									}elseif(isset($_GET['cTransportaion'])) {
										$trans = $_GET['cTransportaion'];
										echo "<option value='$trans' >$trans</option>";
									}
									else {
										echo "
										<option value='' selected disabled>By Which Vehical You Want To Transport</option>
										<option value='car'>Car</option>
										<option value='bus'>Bus</option>
										<option value='train'>Train</option>
										<option value='flight'>Flight</option>";
									}

									?>

								</select>
							</div>
							
							<div class="col-sm-6 form-group contact-forms">
								<label for="accommodation">Select Accommodation</label>
								<select id="accommodation" class="form-control" name="accommodation" required>
									<?php
									if (isset($_GET['Accommodations'])) {
										$acco = $_GET['Accommodations'];
										echo "<option value='$acco' >$acco</option>";
									} 
									elseif (isset($_GET['cAccommodations'])) {
										$acco = $_GET['cAccommodations'];
										echo "<option value='$acco' >$acco</option>";
									} 
									else {
										echo "
									<option value='' selected disabled>Where You Want To Stay</option>
									<option value='hotel'>Hotel</option>
									<option value='motels'>Motels</option>
									<option value='resorts'>Resorts</option>
									<option value='guesthouses'>Guesthouses</option>
									<option value='apartment'>Apartment</option>
									<option value='luxury_villas'>Luxury Villas</option>
									<option value='Tent'>Tent</option>
									<option value='treehouse'>Treehouse</option>";
									}
									?>
								</select>
							</div>
							<div class="col-sm-6 form-group contact-forms">
								<label for="check-in">Check-in Date</label>
								<input type="date" class="form-control" id="check-in" name="date" value="<?=$_POST['cdate'];?>" required>
							</div>
							<div class="col-sm-6 form-group contact-forms">
								<label for="Adults">No. of Adults</label>
								<select class="form-control" id="adults" onchange="calculateTotal()" required>
									<option value="" selected disabled>Adults</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5 or more</option>
								</select>
							</div>
							<div class="col-sm-6 form-group contact-forms">
								<label for="Kids">No. of Kids</label>
								<select class="form-control" id="kids" onchange="calculateTotal()" required>
									<option value="" selected disabled>Kids</option>
									<option>0</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5 or more</option>
								</select>
							</div>
							<div class="col-sm-6 form-group contact-forms">
								<label for="TotalPrice">Total Price</label>
								<input type="text" class="form-control" name="amount" id="totalPrice" placeholder="₹0/-" required
									readonly>

								(Price For Per Person is :- <span id="priceHint" name="baseprice"> <?php 
								if(isset($_GET['price'])){
									echo $_GET['price'];
								}
								elseif(isset($_GET['cprice'])){
									echo $_GET['cprice'];
								}
								else{
									echo "NAN";
								} ?>
								</span> ₹)
								

							</div>
							<div class="col-sm-6 form-group contact-forms">
								<label for="Pay Method">Payment Method</label>
								<select id="PayMethod" class="form-control" name="PayMethod" required>
									<option value="" selected disabled>Select Payment Method</option>
									<option value="card">Debit / Credit Card</option>
									<option value="paypal">Paypal</option>
									<option value="NetBank">Net Banking</option>
								</select>
							</div>
							<div class="col-md-12 form-group contact-forms">
								<label for="name">Special Request</label>
								<textarea class="form-control"
									placeholder="Please Mention Your Special Request Here If Any" rows="5"></textarea>
							</div>

							<div class="col-md-12 booking-button">
								<br>
								<br>
								<br>
								<button class="btn btn-block sent-butnn" name="submit">Payment</button>
							</div>
						</form>
					</div>
					<div class="col-lg-5 contact-right pl-lg-5">

						<div class="image-tour position-relative">
							<img src="images/Manali.jpg" alt="" class="img-fluid" />
							<p><span class="fa fa-tags"></span> <span>3,999₹ - 15% off</span></p>
						</div>

						<h4>Manali Trip</h4>
						<p class="mt-3 justify">Explore the breathtaking beauty of Manali with our all-inclusive tour
							package.
							Immerse yourself in the snow-capped mountains, lush green valleys, and serene landscapes,
							while enjoying comfortable accommodations and exciting activities. Create unforgettable
							memories in the heart of the Himalayas with our Manali tour package</p>
						<br>
						<div class="image-tour position-relative">
							<img src="images/kerala2.jpg" alt="" class="img-fluid" />
							<p><span class="fa fa-tags"></span> <span>3,499₹ - 20% off</span></p>
						</div>

						<h4>Kerala Trip</h4>
						<p class="mt-3 justify">Discover the enchanting beauty of Kerala with our all-inclusive tour
							package.
							Immerse yourself in the serene backwaters, lush tea plantations, and pristine beaches of
							this tropical paradise. Experience the rich culture and vibrant traditions of God's Own
							Country.</p>

					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- //Booking -->

	<!-- footer -->
	<?php
	include("footer.php");
	?>
	<!-- //footer -->

	<script>
		function calculateTotal() {
			// var basePrice = <?php #echo isset($_GET['price']) ? $_GET['price'] : 0; ?>;
			var basePrice = parseInt(document.getElementById("priceHint").textContent);
			var adults = document.getElementById("adults").value;
			var kids = document.getElementById("kids").value;

			var totalPrice = basePrice * (parseInt(adults) + parseInt(kids));
			document.getElementById("totalPrice").value = '₹' + totalPrice + '/-';
		}
	</script>

	<!-- Add this script in the head section or before the closing body tag -->
	<script>
		function populatePackageIds() {
			var packageType = document.getElementById("packageType").value;

			document.getElementById("totalPrice").value="";
			document.getElementById("adults").value="";
			document.getElementById("kids").value="";
			document.getElementById("priceHint").textContent="NAN";
			



			// Check if a package type is selected
			if (packageType !== "") {
				// Make an AJAX request to fetch package IDs based on the selected package type
				var xhr = new XMLHttpRequest();
				xhr.onreadystatechange = function () {
					if (xhr.readyState == 4 && xhr.status == 200) {
						// Update the Package ID dropdown with the received data
						document.getElementById("packageId").innerHTML = xhr.responseText;
						// Enable the Package ID dropdown
						document.getElementById("packageId").removeAttribute("disabled");
					}
				};

				// Adjust the URL to the actual server-side script that handles package ID retrieval
				xhr.open("GET", "getPackageIds.php?packageType=" + packageType, true);
				xhr.send();
			} else {
				// If no package type is selected, reset and disable the Package ID dropdown
				document.getElementById("packageId").innerHTML = '<option value="" selected disabled>Select Package Type First</option>';
				document.getElementById("packageId").setAttribute("disabled", "disabled");
			}
		}
		function populateFileds() {
			var packageType = document.getElementById("packageType").value;
			var packageId = document.getElementById("packageId").value;

			document.getElementById("totalPrice").value="";
			document.getElementById("adults").value="";
			document.getElementById("kids").value="";

			if (packageType !== "" && packageId !== "") {
				var xhr = new XMLHttpRequest();
				xhr.onreadystatechange = function () {
					if (xhr.readyState == 4 && xhr.status == 200) {
						var response = JSON.parse(xhr.responseText);

						// Populate other fields based on the response
						document.getElementById("packagename").value = response.packageName;
						document.getElementById("transport").value = response.transportation;
						document.getElementById("accommodation").value = response.accommodation; 
						document.getElementById("priceHint").textContent = response.basePrice;

						// Add other fields as needed
					}
				};

				xhr.open("GET", "getFileds.php?packageType=" + packageType + "&packageId=" + packageId, true);
				xhr.send();
			} else {
				// Reset other fields if package type or package ID is not selected
				document.getElementById("packagename").value = "";
				document.getElementById("transport").value = "";
				document.getElementById("accommodation").value = ""; 
				document.getElementById("priceHint").textContent = "Nothing";
				// Reset other fields as needed
			}
		}

	</script>



</body>

</html>