<?php

require_once("database.php");
session_start();
if (!isset($_SESSION['method']) && !isset($_SESSION['amount'])) {
    echo "<script>window.location.href = 'booking.php' </script>";
}

if (isset($_POST['submit'])) {

    $uid = $_SESSION['uid'];
    $type = $_SESSION['method'];
    $amount = $_SESSION['amount'];


    $newamount = str_replace(['₹', '/-'], '', $amount);

    $query = "INSERT INTO payment_mst (User_ID,Amount,Payment_Type) VALUES ($uid,'$newamount','$type')";
    $result = mysqli_query($con, $query);

    if (mysqli_affected_rows($con) == 1) {

        unset($_SESSION['method']);
        unset($_SESSION['amount']);

        $packagetype = $_SESSION['Package_Type'];
        $prepackageid = 0;
        $cuspackageid = 0;

        if ($packagetype == 'prePackage') {
            $prepackageid = $_SESSION['Package_ID'];
        } else {
            $cuspackageid = $_SESSION['Package_ID'];
        }


        $payquery = "SELECT max(Payment_ID) FROM payment_mst where User_ID = $uid";
        $payresult = mysqli_query($con, $payquery);
        $row = mysqli_fetch_array($payresult);
        $payment_ID = $row[0];

        // Pre Package & customPackage


        $bookquery = "INSERT INTO booking_mst (User_ID,Package_Type,PrePackage_ID,CusPackage_ID,Payment_ID) VALUES ($uid,'$packagetype',$prepackageid,$cuspackageid,$payment_ID)";

        $bookresult = mysqli_query($con, $bookquery);

        if (mysqli_affected_rows($con) == 1) {

            $id = $_SESSION['Package_ID'];
            

            $notificationMessage = "You Book The $packagetype With Id = $id";
            $insertNotificationQuery = "INSERT INTO notification (User_ID, Message) VALUES ($uid, '$notificationMessage')";
            unset($_SESSION['Package_Type']);
            unset($_SESSION['Package_ID']);

            echo "<script> alert('Your Booking Is Done..Pls Check Your Profile For More Details..')</script>";
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
    <title>TravelBlox | Payment</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

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
        body {
            /* background: #f5f5f5; */
            background: #fff;

        }

        .rounded {
            border-radius: 1rem;
        }

        .nav-pills .nav-link {
            color: #555;
        }

        .nav-pills .nav-link.active {
            color: white;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        .bold {
            font-weight: bold;
        }

        .title {
            text-align: center;
            padding: 5px;
            margin: auto;
            background-color: #007BFF;
            color: #fff;
            margin-top: -40px !important;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        h1 {

            background-color: #007BFF;
            color: #fff;
            padding: 20px;
            margin: 0;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;

        }
    </style>
</head>

<body>
    <div class="container py-5">
        <!-- For demo purpose -->
        <div class="row mb-4 title">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-6">TravelBlox Payment Gateway</h1>
            </div>
        </div> <!-- End -->
        <div class="row mb-4">
            <div class="col-lg-6 mx-auto">
                <div class="card ">
                    <div class="card-header">
                        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                            <!-- Credit card form tabs -->
                            <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link <?php
                                if (isset($_SESSION['method']) && $_SESSION['method'] == 'card') {
                                    echo 'active';
                                } elseif (!isset($_SESSION['method']))
                                    echo 'active'; ?> "> <i class="fas fa-credit-card mr-2"></i> Credit Card
                                    </a> </li>
                                <!-- <li class="nav-item"> <a data-toggle="pill" href="#credit-card"
                                        class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit Card
                                    </a> </li> -->
                                <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link <?php
                                if (isset($_SESSION['method']) && $_SESSION['method'] == 'paypal') {
                                    echo 'active';
                                } ?>"> <i class="fab fa-paypal mr-2"></i> Paypal </a> </li>

                                <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link <?php
                                if (isset($_SESSION['method']) && $_SESSION['method'] == 'NetBank') {
                                    echo 'active';
                                } ?>"> <i class="fas fa-mobile-alt mr-2"></i> Net Banking </a> </li>
                            </ul>
                        </div> <!-- End -->
                        <hr class="border-light m-0" />
                        <hr class="border-light m-0" />
                        <hr class="border-light m-0" />
                        <hr class="border-light m-0" />
                        <hr class="border-light m-0" />

                        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                            <!-- Credit card form tabs -->
                            <h6>Amount Is :-
                                <?php if (isset($_SESSION['amount']))
                                    echo $_SESSION['amount'];
                                else
                                    echo "0 ₹" ?>
                                </h6>
                            </div> <!-- End -->

                            <!-- Credit card form content -->
                            <div class="tab-content">
                                <!-- credit card info-->
                                <!-- <div id="credit-card" class="tab-pane fade show active pt-3"> -->
                                <div id="credit-card" class="tab-pane fade <?php
                                if (isset($_SESSION['method']) && $_SESSION['method'] == 'card')
                                    echo "show active";
                                elseif (!isset($_SESSION['method']))
                                    echo "show active"; ?> pt-3">
                                <form role="form" action="newpayment.php" method="post">
                                    <div class="form-group"> <label for="username">
                                            <h6>Card Owner Name</h6>
                                        </label> <input type="text" name="username" placeholder="Card Owner Name"
                                            required class="form-control "> </div>
                                    <div class="form-group"> <label for="cardNumber">
                                            <h6>Card number</h6>
                                        </label>
                                        <div class="input-group"> <input type="number" name="cardNumber"
                                                placeholder="Valid card number" class="form-control " required
                                                oninput="this.value = this.value.slice(0, 16);">
                                            <div class="input-group-append"> <span class="input-group-text text-muted">
                                                    <i class="fab fa-cc-visa mx-1"></i> <i
                                                        class="fab fa-cc-mastercard mx-1"></i> <i
                                                        class="fab fa-cc-amex mx-1"></i> </span> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group"> <label><span class="hidden-xs">
                                                        <h6>Expiration Date</h6>
                                                    </span></label>
                                                <div class="input-group"> <input type="number" placeholder="MM" name=""
                                                        class="form-control" required
                                                        oninput="this.value = this.value.slice(0, 2);"> <input
                                                        type="number" placeholder="YY" name="" class="form-control"
                                                        required oninput="this.value = this.value.slice(0, 2);"> </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-4"> <label data-toggle="tooltip"
                                                    title="Three digit CV code on the back of your card">
                                                    <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                </label> <input type="number" required class="form-control"
                                                    oninput="this.value = this.value.slice(0, 3);"> </div>
                                        </div>
                                    </div>
                                    <div class="card-footer"> <button type="submit" name="submit"
                                            class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment
                                        </button>
                                </form>
                            </div>
                        </div> <!-- End -->
                        <!-- Paypal info -->
                        <!-- <div id="paypal" class="tab-pane fade pt-3"> -->
                        <div id="paypal" class="tab-pane fade <?php
                        if (isset($_SESSION['method']) && $_SESSION['method'] == 'paypal')
                            echo "show active";
                        ?> pt-3">
                            <h6 class="pb-2">Select your paypal account type</h6>
                            <div class="form-group "> <label class="radio-inline"> <input type="radio" name="optradio"
                                        checked> Domestic </label> <label class="radio-inline"> <input type="radio"
                                        name="optradio" class="ml-5">International </label></div>
                            <p> <button type="button" class="btn btn-primary "><i class="fab fa-paypal mr-2"></i> Log
                                    into my Paypal</button> </p>
                            <p class="text-muted"> Note: After clicking on the button, you will be directed to a secure
                                gateway for payment. After completing the payment process, you will be redirected back
                                to the website to view details of your order. </p>
                        </div> <!-- End -->
                        <!-- bank transfer info -->
                        <div id="net-banking" class="tab-pane fade <?php
                        if (isset($_SESSION['method']) && $_SESSION['method'] == 'NetBank')
                            echo "show active"; ?> pt-3">
                            <div class="form-group "> <label for="Select Your Bank">
                                    <h6>Select your Bank</h6>
                                </label> <select class="form-control" id="ccmonth">
                                    <option value="" selected disabled>--Please select your Bank--</option>
                                    <option>Bank Of Baroda</option>
                                    <option>State Bank Of India</option>
                                    <option>Punjab National Bank</option>
                                </select> </div>
                            <div class="form-group">
                                <p> <button type="button" class="btn btn-primary "><i
                                            class="fas fa-mobile-alt mr-2"></i> Proceed Payment</button> </p>
                            </div>
                            <p class="text-muted">Note: After clicking on the button, you will be directed to a secure
                                gateway for payment. After completing the payment process, you will be redirected back
                                to the website to view details of your order. </p>
                        </div> <!-- End -->
                        <!-- End -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>

</body>

</html>