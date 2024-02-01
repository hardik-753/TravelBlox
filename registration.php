<?php

require_once("database.php");

if (isset($_POST['submit'])) {
    $FullName = $_POST['FullName'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $MobileNo = $_POST['MobileNo'];
    $DOB = $_POST['DOB'];
    $Address = $_POST['Address'];
    $City = $_POST['City'];
    $Pincode = $_POST['Pincode'];
    $NDOB = strtotime($DOB);
    $FDOB = date('Y-m-d', $NDOB);

    $duplicate = "select User_id from user_mst where Email='$Email'";
    $result = mysqli_query($con, $duplicate);
    if (mysqli_affected_rows($con) == 1) {
        echo "<script>alert('Email Is Already Register...')</script>";
    } else {
        $query = "insert into user_mst (FullName, Email, Password, MobileNo, DOB, Address, City, Pincode) values ('$FullName','$Email','$Password',$MobileNo,'$FDOB','$Address','$City',$Pincode)";

        $result = mysqli_query($con, $query);

        if ($result) {
            echo "<script>alert('You Have SuccessFully Registered At TravelBlox..!')</script>";
            echo "<script>window.location.href = 'login.php'</script>";
        } else {
            echo "<script>alert('Pls Try Again...!!')</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelBlox | Registration</title>

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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- Custom Css For Registeration -->
    <style>
        .mydiv {
            margin: auto;
        }

        .mydiv2 {
            margin: auto;
            width: 700px;
            text-align: center;
            padding: 10px;
            margin-top: 15px;
        }

        .mydiv2 p {
            padding: 10px;
            margin: 5px;
        }

        .mydiv1 {
            margin-left: 0;
            margin-right: 0;
            margin-top: -30px;
        }

        .title {
            text-align: center;
            padding: 5px;
            margin: auto;
            margin-top: 15px;
        }

        .title h1 {

            background-color: #007BFF;
            color: #fff;
            padding: 20px;
            margin: 0;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;

        }

        .password-container {
            position: relative;
        }

        .password-container .fa-eye {
            position: absolute;
            right: 25px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .password-container .fa-eye-slash {
            position: absolute;
            right: 25px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>

</head>

<body>

    <div class="title">
        <h1>Join TravelBlox - Register Now</h1>
    </div>

    <div class="container py-lg-5 py-sm-4 mydiv">
        <div class="contact-left-form">
            <form class="row" action="registration.php" method="post" onsubmit="return validateForm()">
                <div class="col-sm-6 form-group contact-forms">
                    <input type="text" class="form-control" placeholder="Enter Your Full Name" required=""
                        name="FullName">
                </div>

                <div class="col-sm-6 form-group contact-forms">
                    <input type="email" class="form-control" placeholder="Enter Your Email" required="" name="Email">
                </div>

                <div class="col-sm-6 form-group contact-forms">
                    <input type="number" class="form-control" placeholder="Enter Your Mobile No" required=""
                        oninput="this.value = this.value.slice(0, 10);" name="MobileNo">
                </div>

                <div class="col-sm-6 form-group contact-forms password-container">
                    <input type="password" class="form-control" placeholder="Enter Your Password" required=""
                        name="Password" id="Password" maxlength="10">
                    <i class="fas fa-eye" id="show-password"></i>
                </div>

                <div class="col-sm-6 form-group contact-forms">
                    <input type="text" class="form-control" id="datepicker" placeholder="Enter Your DOB (dd-mm-yyy)"
                        required="" oninput="formatDate(this);" name="DOB">
                </div>

                <div class="col-sm-6 form-group contact-forms">
                    <input type="text" class="form-control" placeholder="Enter Your Address" required="" name="Address">
                </div>

                <div class="col-sm-6 form-group contact-forms">
                    <input type="text" class="form-control" placeholder="Enter Your City" required="" name="City">
                </div>

                <div class="col-sm-6 form-group contact-forms">
                    <input type="number" class="form-control" placeholder="Enter Your Pincode" required=""
                        oninput="this.value = this.value.slice(0, 6);" name="Pincode">
                </div>
                <button class="btn btn-block sent-butnn" name="submit" type="submit">Create An Account</button>
            </form>
        </div>
    </div>

    <div class="mydiv2">
        <p><input type="checkbox" name="agree" id="agreement"> i accept the Travel Blox <a
                href="UserAgreement.html">User Agreement</a>
            and have read
            the <a href="Privacy.html">Privacy Statement</a></p>
        <strong><a href="login.php">Already Travel Blox User? Sign In.</a></strong>
    </div>

    <!-- Js For Validation and Some Other Operations -->
    <script>

        $(function () {
            $("#datepicker").datepicker({
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
            });
        });

        var passwordInput = document.getElementById('Password');
        var showPasswordIcon = document.getElementById('show-password');

        showPasswordIcon.addEventListener('click', function () {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showPasswordIcon.classList.remove('fa-eye');
                showPasswordIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                showPasswordIcon.classList.remove('fa-eye-slash');
                showPasswordIcon.classList.add('fa-eye');
            }
        });

        function validateForm() {
            // Get input values
            var fullName = document.getElementsByName("FullName")[0].value;
            var email = document.getElementsByName("Email")[0].value;
            var mobileNo = document.getElementsByName("MobileNo")[0].value;
            var password = document.getElementsByName("Password")[0].value;
            var dob = document.getElementsByName("DOB")[0].value;
            var address = document.getElementsByName("Address")[0].value;
            var city = document.getElementsByName("City")[0].value;
            var pincode = document.getElementsByName("Pincode")[0].value;
            var agreement = document.getElementById("agreement");

            // Regular expressions for validation
            var nameRegex = /^[A-Za-z\s]+$/;
            var emailRegex = /^[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
            var mobileNoRegex = /^\d{10}$/; // 10-digit mobile number
            var dobRegex = /^\d{2}-\d{2}-\d{4}$/; // dd-mm-yyyy format
            var pincodeRegex = /^\d{6}$/; // 6-digit pincode

            if (fullName === "") {
                alert("Please enter your Full Name.");
                return false;
            }

            if (!nameRegex.test(fullName)) {
                alert("Full Name can only contain letters and spaces.");
                return false;
            }

            if (!email.match(emailRegex)) {
                alert("Please enter a valid email address.");
                return false;
            }

            if (!mobileNo.match(mobileNoRegex)) {
                alert("Please enter a valid 10-digit mobile number.");
                return false;
            }

            if (password.length < 6) {
                alert("Password must be at least 6 characters long.");
                return false;
            }

            if (!dob.match(dobRegex)) {
                alert("Please enter a valid date of birth in dd-mm-yyyy format.");
                return false;
            }

            if (address === "") {
                alert("Please enter your address.");
                return false;
            }

            if (city === "") {
                alert("Please enter your city.");
                return false;
            }

            if (!nameRegex.test(city)) {
                alert("City can only contain letters and spaces.");
                return false;
            }

            if (!pincode.match(pincodeRegex)) {
                alert("Please enter a valid 6-digit pincode.");
                return false;
            }

            if (!agreement.checked) {
                alert("Please accept the User Agreement and Privacy Statement.");
                return false;
            }

            return true; // Form is valid
        }

        // Function to format the date input
        function formatDate(input) {
            var value = input.value;
            if (value.length === 2 || value.length === 5) {
                input.value += '-';
            }
        }

    </script>

</body>

</html>

