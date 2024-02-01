<?php
require_once("database.php");
session_start();

if (!isset($_SESSION['uid'])) {
    echo "<script>alert('Pls Login First')</script>";
    echo "<script>window.location.href = 'login.php'</script>";
}

if (isset($_POST['submit'])) {

    $packagename = $_POST['Package_name'];
    $state = $_POST['state'];
    $from = $_POST['From_place'];
    $to = $_POST['To_place'];
    $accommodetion = $_POST['accommodation'];
    $travelers = $_POST['travelers'];
    $transportetion = $_POST['transport'];
    $date = $_POST['date'];
    $price = $_POST['totalp'];
    $duration = $_POST['days'];
    $uid = $_SESSION["uid"];

    if (isset($_POST['custom_id'])) {
        $cusid = $_POST['custom_id'];
        $query = "UPDATE cuspackage_mst set Package_Name='$packagename',state='$state',From_place='$from',To_place='$to',Duration='$duration',date='$date',Accommodations='$accommodetion',travelers='$travelers',Transportation='$transportetion',Price=$price where CusPackage_ID = $cusid ";

        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<script>alert('Your Custome Package Edited SuccessFully And Custom ID IS = $cusid');</script>";
        } else {
            echo "<script>alert('Error Pls Try Again..!');</script>";
        }

    } else {
        $query = "INSERT into cuspackage_mst (User_ID, Package_Name, state, From_place, To_place, Duration, date, Activities , Accommodations ,travelers ,Transportation, Price) values($uid,'$packagename','$state','$from','$to','$duration','$date','hill climbing','$accommodetion','$travelers','$transportetion',$price)";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<script>alert('Your Custome Package Saved SuccessFully and Package Id send via email pls check..!');</script>";
        } else {
            echo "<script>alert('Error Pls Try Again..!');</script>";
        }
    }
}

if (isset($_POST['booking'])) {
    header('location:http://localhost/travelblox/booking.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>TravelBlox | Custom Package</title>
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
        body{
        background-image: url("images/bgf2.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        }
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

        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-top: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        button:hover {
            background-color: #0056b3;
        }

        .center {
            width: 90%;
            margin: auto;
            text-align: center;
        }
    </style>

</head>

<body>
    <?php
    $currentPage = "Cuspackage";
    include("header.php");
    ?>
    <!-- //header -->

    <!-- banner -->
    <section class="banner_inner" id="home">
        <div class="banner_inner_overlay">
        </div>
    </section>
    <div class="container py-lg-5 py-sm-4 mydiv" id="bg">
        <div class="title">
            <h2 class="heading text-capitalize text-center mb-lg-5 mb-4">Create Your Custom Travel Package</h2>
        </div>
        <div class="contact-left-form">
            <form class="row" method="POST" onsubmit="return validateForm()" id="load-package-form">

                <div class="col-sm-6 form-group contact-forms">
                    <label for="Custom_id">Custom_id</label>
                    <!-- <input type="text" class="form-control" id="custom_id" name="custom_id" value=""> -->
                    <select id="custom_id" name="custom_id" class="form-control">
                        <?php
                        if (isset($_GET['edit_id'])) {
                            $cusid = $_GET['edit_id'];
                            echo "<option value='$cusid' selected>$cusid</option>";
                        } else {
                            echo "<option value='' selected disabled>---Load Your Previous Package---</option>";
                            $uid = $_SESSION['uid'];
                            $query = "SELECT cuspackage_ID FROM cuspackage_mst WHERE User_ID = $uid";

                            $result = mysqli_query($con, $query);
                            while ($row = mysqli_fetch_row($result)) {
                                echo "<option value='$row[0]'>$row[0]</option>";
                            }

                        }
                        ?>
                    </select>
                </div>
           
                <div class="col-sm-6 form-group contact-forms">
                    <label for="Package_name">Package name</label>
                    <input type="text" placeholder="Write Package Name here" id="Package_name" class="form-control"
                        name="Package_name" required>
                </div>

                <div class="col-sm-6 form-group contact-forms">
                    <label for="state">Select a state</label>
                    <select id="state" name="state" class="form-control" required>
                        <option value="" selected disabled>---In Which State You Want To Go---</option>
                        <?php
                        $query = "select * from state_mst";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_row($result)) {
                            echo "<option value='$row[1]'>$row[1]</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col-sm-6 form-group contact-forms">
                    <label for="From_place">From</label>
                    <input type="text" placeholder="Write Abort Place" id="From_place" class="form-control"
                        name="From_place" required>
                </div>

                <div class="col-sm-6 form-group contact-forms">
                    <label for="destination">Select a Destination</label>
                    <select id="destination" name="To_place" class="form-control" required>
                        <option value="" selected disabled>Select State First</option>
                    </select>
                </div>

                <div class="col-sm-6 form-group contact-forms">
                    <label for="check-in">Check-in Date</label>
                    <input type="date" class="form-control" id="check-in" name="date" required>
                </div>

                <div class="col-sm-6 form-group contact-forms">
                    <label for="accommodation">Select Accommodation</label>
                    <select id="accommodation" class="form-control" name="accommodation" required>
                        <option value="" selected disabled>---Where You Want To Stay---</option>
                        <option value="hotel">Hotel</option>
                        <option value="motels">Motels</option>
                        <option value="resorts">Resorts</option>
                        <option value="guesthouses">Guesthouses</option>
                        <option value="apartment">Apartment</option>
                        <option value="luxury_villas">Luxury Villas</option>
                        <option value="treehouse">Treehouse</option>
                    </select>
                </div>


                <div class="col-sm-6 form-group contact-forms">
                    <label for="travelers">Number of Travelers</label>
                    <select class="form-control" id="travelers" name="travelers" required>
                        <option value="" selected disabled>---Select Total Persons---</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5 or more</option>
                    </select>
                </div>

                <div class="col-sm-6 form-group contact-forms">
                    <label for="days">Number of Days For The Trip</label>
                    <select class="form-control" id="days" name="days" required>
                        <option value="" selected disabled>---Select Duration Of The Trip---</option>
                        <option value="1">1 Day</option>
                        <option value="2">2 Days</option>
                        <option value="3">3 Days</option>
                        <option value="4">4 Days</option>
                        <option value="5">5 or more Days</option>
                    </select>
                </div>

                <div class="col-sm-6 form-group contact-forms">
                    <label for="transport">Select Transportation</label>
                    <select id="transport" class="form-control" name="transport" required>
                        <option value="" selected disabled>---Where You Want To Stay---</option>
                        <option value="car">Car</option>
                        <option value="bus">Bus</option>
                        <option value="train">Train</option>
                        <option value="flight">Flight</option>
                    </select>
                </div>

                <div class="col-md-12 form-group contact-forms">
                    <label for="special-requests">Special Requests</label>
                    <textarea placeholder="Write Your special Requests Here..!!" id="special-requests"
                        class="form-control" name="special-requests" rows="3"></textarea>
                </div>

                <div class="center">
                    <button type="button" onclick="if(validateForm()) calculatePrice()" name="save"><i class="fa-solid fa-calculator"></i>  Calculate
                        Budget</button>
                    <input type="hidden" id="totalp_hidden" name="totalp" value="">
                    <button type="submit" name="submit"><i class="fa-solid fa-floppy-disk"></i>  Save Package</button>
                    <button type="button" name="Load" onclick="loadData()"><i class="fa-solid fa-truck-ramp-box"></i>  Load Package</button>
                    <button type="button" onclick="submitForm()" name="booking"><i class="fa-solid fa-handshake"></i>  Book Now</button>
                </div>
                <div id="error-message"></div>
            </form>
            <br>
            <h4 class="heading text-capitalize text-center">Total Budget Require : <span id="totalPrice"
                    name="totalp">0₹</span></h2>
        </div>
    </div>

    <script>

        const stateDropdown = document.getElementById('state');
        stateDropdown.addEventListener('change', function () {
            const selectedStateId = stateDropdown.value;

            var destinationDropdown = document.getElementById('destination');
            destinationDropdown.innerHTML = '<option value="" selected disabled>Select a state first</option>';

            if (selectedStateId) {
                fetch('get_destinations.php?Stateid=' + selectedStateId)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(function (destination) {
                            var option = document.createElement('option');
                            option.value = destination.DesName;
                            option.textContent = destination.DesName;
                            destinationDropdown.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching destination data:', error);
                    });
            }
        });

        function validateForm() {

            // Get form inputs
            var state = document.getElementById("state").value;
            var destination = document.getElementById("destination").value;
            var checkIn = document.getElementById("check-in").value;
            var accommodation = document.getElementById("accommodation").value;
            var travelers = document.getElementById("travelers").value;
            var days = document.getElementById("days").value;
            var transport = document.getElementById("transport").value;

            // Error message container
            var errorMessage = document.getElementById("error-message");

            // Reset previous error messages
            errorMessage.innerHTML = "";

            // Flag to check if there are any errors
            var hasErrors = false;

            // Validation logic
            if (state === "") {
                errorMessage.innerHTML += "Please select a state.<br>";
                hasErrors = true;
            }

            if (destination === "") {
                errorMessage.innerHTML += "Please select a destination.<br>";
                hasErrors = true;
            }

            if (checkIn === "") {
                errorMessage.innerHTML += "Please enter a check-in date.<br>";
                hasErrors = true;
            }

            if (accommodation === "") {
                errorMessage.innerHTML += "Please select accommodation.<br>";
                hasErrors = true;
            }

            if (travelers === "") {
                errorMessage.innerHTML += "Please select the number of travelers.<br>";
                hasErrors = true;
            }

            if (days === "") {
                errorMessage.innerHTML += "Please select the number of days for the trip.<br>";
                hasErrors = true;
            }

            if (transport === "") {
                errorMessage.innerHTML += "Please select transportation.<br>";
                hasErrors = true;
            }

            // If there are errors, prevent form submission
            if (hasErrors) {
                errorMessage.style.color = "red";
                return false;
            }

            // If there are no errors, continue with form submission
            return true;
        }

        function loadData() {
            var customIdInput = document.getElementById("custom_id").value;

            // Check if the custom ID is not empty
            if (customIdInput !== "") {
                // Use AJAX to fetch data based on the custom ID
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Parse the JSON response and populate the form fields
                        var data = JSON.parse(xhr.responseText);
                        if (data) {
                            document.getElementById("Package_name").value = data.Package_Name;
                            document.getElementById("state").value = data.state;
                            document.getElementById("From_place").value = data.From_place;
                            document.getElementById("destination").value = data.To_place;
                            document.getElementById("check-in").value = data.date;
                            document.getElementById("accommodation").value = data.Accommodations;
                            document.getElementById("travelers").value = data.travelers;
                            document.getElementById("transport").value = data.Transportation;
                            document.getElementById("days").value = data.Duration;

                            updateDestinationDropdown(data.state, data.To_place);
                        }
                    }
                };

                // Send a request to a PHP script that fetches the data
                xhr.open("GET", "load_data.php?custom_id=" + customIdInput, true);
                xhr.send();
            }
            else {
                alert("Custom ID cannot be empty.");
            }
        }

        function updateDestinationDropdown(selectedState, selectedDestination) {

            var stateDropdown = document.getElementById("state");
            var destinationDropdown = document.getElementById("destination");

            // Set the selected state in the state dropdown
            stateDropdown.value = selectedState;

            // Trigger the "change" event to dynamically populate the destination dropdown
            var event = new Event("change");
            stateDropdown.dispatchEvent(event);

            // Set the selected destination in the destination dropdown
            // destinationDropdown.value = selectedDestination;
            setTimeout(function () {
                destinationDropdown.value = selectedDestination;
            }, 100);

        }

        function calculatePrice() {
            // Get user selections
            var accommodation = document.getElementById("accommodation").value;
            // var travelers = parseInt(document.getElementById("travelers").value);
            var days = parseInt(document.getElementById("days").value);
            var transport = document.getElementById("transport").value;

            // Perform calculations based on user selections
            var basePrice = 1000; // Set a base price
            var accommodationPrice = 0;
            var transportPrice = 0;

            if (accommodation === "hotel") {
                accommodationPrice = 100;
            } else if (accommodation === "motels") {
                accommodationPrice = 80;
            } // Add more options as needed

            // var totalPrice = basePrice * travelers * days;
            var totalPrice = basePrice * days;

            if (transport === "car") {
                transportPrice = 500;
            } else if (transport === "bus") {
                transportPrice = 300;
            } else if (transport === "train") {
                transportPrice = 200;
            } else if (transport === "flight") {
                transportPrice = 1000;
            }

            // Calculate the total budget
            totalPrice += accommodationPrice;
            totalPrice += transportPrice;

            // Display the total price
            document.getElementById("totalPrice").textContent = totalPrice + "₹";

            document.getElementById("totalp_hidden").value = totalPrice;
        }

        function submitForm() {
            if (validateForm()) {
                calculatePrice(); // Make sure to calculate the price before submission

                // Get form inputs
                var ctype = "customPackage";
                var cid = document.getElementById("custom_id").value;
                var cname = document.getElementById("Package_name").value;
                var cTransportaion = document.getElementById("transport").value;
                var cAccommodations = document.getElementById("accommodation").value;
                var cprice = document.getElementById("totalp_hidden").value;
                var cdate = document.getElementById("check-in").value;


                // Create a URL with parameters
                var url = "booking.php?" +
                    "ctype=" + encodeURIComponent(ctype) +
                    "&cid=" + encodeURIComponent(cid) +
                    "&cname=" + encodeURIComponent(cname) +
                    "&cTransportaion=" + encodeURIComponent(cTransportaion) +
                    "&cAccommodations=" + encodeURIComponent(cAccommodations) +
                    "&cprice=" + encodeURIComponent(cprice)+
                    "&cdate=" + encodeURIComponent(cdate);

                // Redirect to booking.php with parameters
                window.location.href = url;
            }
        }

    </script>

    <script>
        // Function to extract the custom ID from the URL
        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }

        // Check if the "edit_id" parameter exists in the URL
        var editId = getParameterByName('edit_id');
        if (editId) {
            // Simulate the "Load" button click
            document.querySelector('[name="Load"]').click();


            // Set a timeout to ensure that the click event is handled
            setTimeout(function () {
                // Fill the custom ID in the input field
                document.getElementById("custom_id").value = editId;

                // Load data based on the custom ID
                loadData();

            }, 100);

        }
    </script>


    <!-- footer -->
    <?php
    require_once("footer.php");
    ?>
    <!-- //footer -->

</body>

</html>