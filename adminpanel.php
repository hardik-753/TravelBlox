<?php

require_once("database.php");

session_start();
if (!isset($_SESSION['Admin_ID'])) {
    echo "<script>alert('Pls Login First')</script>";
    echo "<script>window.location.href = 'adminlogin.php'</script>";
    // header("Location: login.php");
} else {
    $Aid = $_SESSION['Admin_ID'];

    $Pquery = "SELECT * from prepackage_mst";
    $Presult = mysqli_query($con, $Pquery);

    $Cquery = "SELECT * from cuspackage_mst";
    $Cresult = mysqli_query($con, $Cquery);

    $bookquery = "SELECT * from booking_mst";
    $bookresult = mysqli_query($con, $bookquery);

    $cancelquery = "SELECT * FROM  cancellation_mst";
    $cancelresult = mysqli_query($con, $cancelquery);

    // $feedbackquery = "SELECT *  FROM feedback_mst";
    $feedbackquery = "SELECT feedback_mst.feedback_id, feedback_mst.feedback, user_mst.FullName FROM feedback_mst INNER JOIN user_mst ON feedback_mst.User_ID = user_mst.User_ID";
    $feedbackresult = mysqli_query($con, $feedbackquery);
}

if (isset($_POST["change_password"])) {
    // echo "<script> alert ('Password!') </script>";

    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $renewpass = $_POST['renewpass'];

    if ($oldpass === $newpass) {
        echo "<script> alert ('Old Password and New Password Not Be Same..!') </script>";
    } else {
        if ($newpass === $renewpass) {
            $query = "UPDATE admin_mst SET Password='$newpass' where Admin_id=$Aid";
            $result = mysqli_query($con, $query);
            if (mysqli_affected_rows($con) == 1) {
                echo "<script> alert ('Your Password Has Been Changed..!') </script>";
                echo "<script>window.location.href = 'adminlogin.php'</script>";
            }
        } else {
            echo "<script> alert ('Password and Retype Password Not Matched..!') </script>";
        }
    }
} elseif (isset($_POST["addAdmin"])) {
    // echo "<script> alert ('Password!') </script>";

    $adminName = $_POST["AdminName"];
    $adminEmail = $_POST["AdminEmail"];
    $adminPassword = $_POST["AdminPassword"];
    $adminMO = $_POST["MobileNo"];
    $adminDOB = $_POST["DOB"];
    $adminAddress = $_POST["Address"];
    $admincity = $_POST["City"];
    $adminPincode = $_POST["Pincode"];
    $NDOB = strtotime($adminDOB);
    $FDOB = date('Y-m-d', $NDOB);

    $query = "INSERT INTO admin_mst (FullName,Email,Password,MobileNo,DOB,Address,City,Pincode) VALUES ('$adminName','$adminEmail','$adminPassword',$adminMO,'$FDOB','$adminAddress','$admincity',$adminPincode)";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script> alert ('New Admin Added Succesfully') </script>";
        echo "<script>window.location.href = 'adminpanel.php'</script>";
    }

} elseif (isset($_POST["Addpreprackage"])) {

    $prepackName = $_POST["prepackname"];
    $prepackFrom = $_POST["fromplace"];
    $prepackTo = $_POST["toplace"];
    $prepackDuration = $_POST["duration"];
    $prepackActivites = $_POST["activites"];
    $prepackAccomodetion = $_POST["accommodations"];
    $prepackTransportetion = $_POST["transportation"];
    $prepackPrice = $_POST["price"];
    $NDOB = strtotime($prepackDuration);
    $FDOB = date('Y-m-d', $NDOB);
    $addquery = "INSERT INTO prepackage_mst (Admin_id, PackageName, FromPlace, PlaceTo, Duration, Activity, Accommodations, Transportation, Price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $addquery);

    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "isssssssi", $Aid, $prepackName, $prepackFrom, $prepackTo, $prepackDuration, $prepackActivites, $prepackAccomodetion, $prepackTransportetion, $prepackPrice);
        $addresult = mysqli_stmt_execute($stmt);

        if ($addresult) {
            echo "<script> alert ('New Pre Package Added Successfully') </script>";
            echo "<script>window.location.href = 'adminpanel.php'</script>";
        } else {
            echo "<script> alert ('Error adding pre package: " . mysqli_error($con) . "') </script>";
        }
    
        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "<script> alert ('Error preparing statement: " . mysqli_error($con) . "') </script>";
    }

    $addresult = mysqli_query($con, $addquery);
    if ($addresult) {
        echo "<script> alert ('New Pre Package Added Succesfully') </script>";
        echo "<script>window.location.href = 'adminpanel.php'</script>";
    }
}

if (isset($_GET['fid'])) {
    $fid = $_GET['fid'];
    $delfeed = "DELETE FROM feedback_mst WHERE feedback_id = $fid";
    $result = mysqli_query($con, $delfeed);
    if ($result) {
        echo "<script> alert('Feddback Delete Succesfully') </script>";
        echo "<script>window.location.href = 'adminpanel.php'</script>";
    } else {
        echo "<script> alert('Feddback Not Delete Succesfully') </script>";

    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TravelBlox | Admin Dashboard</title>

    <!-- =======Other Links Styles ====== -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- css files -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Bootstrap Css -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- fontawesome css -->
    <!-- //css files -->

    <link href="css/css_slider.css" type="text/css" rel="stylesheet" media="all">

    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <link
        href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- //google fonts -->

    <link href="css/adminstyle.css" rel='stylesheet' type='text/css' />

    <style>
        .myicon {
            font-size: 30px;
        }

        .mytitle {
            font-size: 25px;
        }

        .myh2 {
            color: var(--white);
            text-align: right;
            padding: 10px;
            font-size: 20px;
        }

        .myh3 {
            color: var(--blue);
            text-align: center;
            padding: 10px;
            font-size: 30px;
        }

        .mydiv {
            background-color: var(--blue);
            width: 100%;
            height: 2.7rem;
            border-radius: 20px 0px 0px 20px;
        }

        .head1 {
            background-color: var(--blue);
            width: 100%;
            height: 4.7rem;
            border-radius: 20px 20px 20px 20px;
        }

        .cusdiv {
            border: 2px solid var(--blue);
            border-radius: 20px;
            padding: 10px;
            margin: 9px;
            height: calc(100vh - 79px);
            overflow-y: auto;
            overflow-x: auto;
            box-shadow: 0 0 10px var(--blue);
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

        .buttondiv {
            /* border: 2px solid red; */
            padding: 10px 10px;
            width: 90%;
            margin: auto;
            text-align: center !important;
        }
    </style>


</head>

<body>

    <!-- =============== Navigation ================ -->
    <div class="mycontainer">
        <div class="mynavigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <i class="fa fa-map-signs myicon"></i>
                        </span>
                        <span class="title mytitle">TravelBlox</span>
                    </a>
                </li>

                <li class="hovered">
                    <a class="active" id="dashboard-tab" data-toggle="pill" href="#dashboard">
                        <span class="icon">
                            <i class="fa-solid fa-house myicon"></i>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a id="prepackage-tab" data-toggle="pill" href="#prepackage">
                        <span class="icon">
                            <i class="fa-solid fa-box myicon"></i>
                        </span>
                        <span class="title">Pre Packages</span>
                    </a>
                </li>
                <li>
                    <a id="Addprepackage" data-toggle="pill" href="#Add-Pre-Package">
                        <span class="icon">
                            <i class='fas fa-plus myicon'></i>
                        </span>
                        <span class="title"> Add Pre Packages</span>
                    </a>
                </li>
                <li>
                    <a id="cuspackage-tab" data-toggle="pill" href="#cuspackage">
                        <span class="icon">
                            <i class="fa-solid fa-box-open myicon"></i>
                        </span>
                        <span class="title">Custom Packages</span>
                    </a>
                </li>
                <li>
                    <a id="booking-tab" data-toggle="pill" href="#booking">
                        <span class="icon">
                            <i class="fa-solid fa-clipboard-check myicon"></i>
                        </span>
                        <span class="title">Booking</span>
                    </a>
                </li>
                <li>
                    <a id="cancellation-tab" data-toggle="pill" href="#cancellation">
                        <span class="icon">
                            <i class="fa-solid fa-xmark myicon"></i>
                        </span>
                        <span class="title">Cancellation</span>
                    </a>
                </li>
                <li>
                    <a id="feedback-tab" data-toggle="pill" href="#feedback">
                        <span class="icon">
                            <i class="fa-solid fa-comments myicon"></i>
                        </span>
                        <span class="title">Feedback</span>
                    </a>
                </li>
                <li>
                    <a id="password-tab" data-toggle="pill" href="#password">
                        <span class="icon">
                            <i class="fa-solid fa-lock myicon"></i>
                        </span>
                        <span class="title">Password</span>
                    </a>
                </li>
                <li>
                    <a href="adminlogout.php">
                        <span class="icon">
                            <i class="fas fa-sign-out-alt myicon"></i>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">

            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="mydiv">
                    <h2 class="myh2">Welcome To Admin Panel</h2>
                </div>

            </div>

            <hr class="border-light m-0" />

            <div class="tab-content cusdiv">
                <div class="tab-pane fade show active" id="dashboard">
                    <div class="card mt-3">
                        <div class="card-body">

                            <h1 class="myh3">Add New Admin</h1>

                            <form id="addAdminForm" method="post" action="adminpanel.php#dashboard">
                                <div class="form-group">
                                    <label for="adminName">Admin Name:</label>
                                    <input type="text" class="form-control" id="adminName"
                                        placeholder="Enter admin name" required name="AdminName">
                                </div>

                                <div class="form-group">
                                    <label for="adminEmail">Admin Email:</label>
                                    <input type="email" class="form-control" id="adminEmail"
                                        placeholder="Enter admin email" required name="AdminEmail">
                                </div>

                                <div class="form-group">
                                    <label for="adminPassword">Admin Password:</label>
                                    <input type="password" class="form-control" id="adminPassword"
                                        placeholder="Enter admin password" required name="AdminPassword">
                                </div>

                                <div class="form-group">
                                    <label for="adminmoblie">Admin MobileNo:</label>
                                    <input type="number" class="form-control" placeholder="Enter Your Mobile No"
                                        required="" oninput="this.value = this.value.slice(0, 10);" name="MobileNo">
                                </div>

                                <div class="form-group">
                                    <label for="adminDOB">Admin Date Of Birth:</label>
                                    <input type="date" class="form-control" id="datepicker"
                                        placeholder="Enter Your DOB (dd-mm-yyy)" required="" oninput="formatDate(this);"
                                        name="DOB">
                                </div>

                                <div class="form-group">
                                    <label for="adminaddress">Admin Address:</label>
                                    <input type="text" class="form-control" placeholder="Enter Your Address" required=""
                                        name="Address">
                                </div>

                                <div class="form-group">
                                    <label for="admincity">Admin City:</label>
                                    <input type="text" class="form-control" placeholder="Enter Your City" required=""
                                        name="City">
                                </div>

                                <div class="form-group">
                                    <label for="adminPin">Admin Pincode:</label>
                                    <input type="number" class="form-control" placeholder="Enter Your Pincode"
                                        required="" oninput="this.value = this.value.slice(0, 6);" name="Pincode">
                                </div>
                                <button type="submit" class="btn btn-primary" name="addAdmin">Add Admin</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="cuspackage">
                    <h1 class="myh3">Custom-Prepackage Details</h1>
                    <div class="card-body pb-2">
                        <table class="table">
                            <tr>
                                <th>CusPackage ID</th>
                                <th>User ID</th>
                                <th>Package Name</th>
                                <th>State</th>
                                <th>From Place</th>
                                <th>TO Place</th>
                                <th>Duration</th>
                                <th>Date</th>
                                <th>Accommodation</th>
                                <th>Travelers</th>
                                <th>Transportetion</th>
                                <th>Price</th>
                            </tr>
                            <?php

                            while ($Cusrow = mysqli_fetch_array($Cresult)) {
                                $CusPackId = $Cusrow['CusPackage_ID'];
                                $Userid = $Cusrow['User_ID'];
                                $Cusname = $Cusrow['Package_Name'];
                                $Cusstate = $Cusrow['state'];
                                $CusFrPlace = $Cusrow['From_place'];
                                $CusToplace = $Cusrow['To_place'];
                                $CusDuration = $Cusrow['Duration'];
                                $CusDate = $Cusrow['date'];
                                $CusAcco = $Cusrow['Accommodations'];
                                $CusTravelers = $Cusrow['travelers'];
                                $CusTrans = $Cusrow['Transportation'];
                                $Cusprice = $Cusrow['Price'];

                                echo "<tr>";
                                echo "<td> $CusPackId</td>";
                                echo "<td> $Userid </td>";
                                echo "<td> $Cusname </td>";
                                echo "<td> $Cusstate </td>";
                                echo "<td> $CusFrPlace </td>";
                                echo "<td> $CusToplace </td>";
                                echo "<td> $CusDuration </td>";
                                echo "<td> $CusDate </td>";
                                echo "<td> $CusAcco </td>";
                                echo "<td> $CusTravelers </td>";
                                echo "<td> $CusTrans </td>";
                                echo "<td> $Cusprice </td>";
                            }
                            ?>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="prepackage">
                    <h1 class="myh3">Pre-Prepackage Details</h1>

                    <div class="card-body pb-2">
                        <table class="table">
                            <tr>
                                <th>PrePackage ID</th>
                                <th>Admin ID</th>
                                <th>Package Name</th>
                                <th>From Place</th>
                                <th>TO Place</th>
                                <th>Duration</th>
                                <th>Activity</th>
                                <th>Accommodation</th>
                                <th>Transportetion</th>
                                <th>Price</th>
                                <th>Delete</th>

                            </tr>
                            <?php
                            while ($Prerow = mysqli_fetch_array($Presult)) {
                                $PrePackId = $Prerow['PrePackage_id'];
                                $Adminid = $Prerow['Admin_id'];
                                $Prename = $Prerow['PackageName'];
                                $FrPlace = $Prerow['FromPlace'];
                                $Toplace = $Prerow['PlaceTo'];
                                $Duration = $Prerow['Duration'];
                                $PreAct = $Prerow['Activity'];
                                $PreAcco = $Prerow['Accommodations'];
                                $PreTrans = $Prerow['Transportation'];
                                $Preprice = $Prerow['Price'];
                                $maxLength = 100;
                                $shortText = substr($PreAct, 0, $maxLength);

                                echo "<tr>";
                                echo "<td> $PrePackId</td>";
                                echo "<td> $Adminid </td>";
                                echo "<td> $Prename </td>";
                                echo "<td> $FrPlace </td>";
                                echo "<td> $Toplace </td>";
                                echo "<td> $Duration </td>";
                                echo "<td> $shortText <a href=#> .... </a> </td>";
                                echo "<td> $PreAcco </td>";
                                echo "<td> $PreTrans </td>";
                                echo "<td> $Preprice </td>";
                                echo "<td> <a target='_self' href='javascript:void(0)' onclick='confirmDelete()'> Delete </a> </td>";
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="Add-Pre-Package">
                    <div class="card-body">
                        <h1 class="myh3">Add-Pre-Prepackage Details</h1>
                        <form id="Add-Pre-package" method="post" action="adminpanel.php#Addprepackage">
                            <div class="form-group">
                                <label for="prepackname">Pre-Package Name:</label>
                                <input type="text" class="form-control" name="prepackname"
                                    placeholder="Enter Pre-Package Name" required>
                            </div>
                            <div class="form-group">
                                <label for="fromplace">From:</label>
                                <input type="text" class="form-control" name="fromplace" placeholder="Enter Location"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="toplace">To:</label>
                                <input type="text" class="form-control" name="toplace" placeholder="Enter Location"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="duration">Duration:</label>
                                <input type="text" class="form-control" name="duration"
                                    placeholder="Enter Days And Nights" required>
                            </div>
                            <div class="form-group">
                                <label for="activites">Activites:</label>
                                <textarea  class="form-control" name="activites" placeholder="Enter Activites"
                                    required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="accommodations">Accommodations:</label>
                                <input type="text" class="form-control" name="accommodations"
                                    placeholder="Enter Accommodations" required>
                            </div>
                            <div class="form-group">
                                <label for="transportation">Transportation:</label>
                                <input type="text" class="form-control" name="transportation"
                                    placeholder="Enter Transportation" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" name="price" placeholder="Enter Price" required>
                            </div>

                            <button type="submit" class="btn btn-primary" name="Addpreprackage">Add Pre Package</button>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="booking">
                    <div class="card-body pb-2">
                        <h1 class="myh3">Booking Details</h1>
                        <table class="table">
                            <tr>
                                <th>Booking ID</th>
                                <th>Package Type</th>
                                <th>Pre-package Id</th>
                                <th>Custom-Package Id</th>
                                <th>Payment Id</th>
                                <th>view</th>

                            </tr>
                            <?php
                            while ($bookrow = mysqli_fetch_array($bookresult)) {
                                $bookId = $bookrow['Booking_ID'];
                                $bookPackType = $bookrow['Package_Type'];
                                $Book_PreId = $bookrow['PrePackage_ID'];
                                $Book_CusId = $bookrow['CusPackage_ID'];
                                $Book_PayId = $bookrow['Payment_ID'];

                                echo "<tr>";
                                echo "<td> $bookId </td>";
                                echo "<td> $bookPackType </td>";
                                echo "<td> $Book_PreId </td>";
                                echo "<td> $Book_CusId </td>";
                                echo "<td> $Book_PayId </td>";
                                echo "<td> <a target='_self' href='invoice.php?bid=$bookId'> view </a> </td>";

                            }
                            ?>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="feedback">
                    <div class="card-body pb-2">
                        <h1 class="myh3">FeedBack Details</h1>

                        <table class="table">
                            <tr>
                                <th>Feedback ID</th>
                                <th>User Name</th>
                                <th>Feedback</th>
                                <th>Delete</th>
                            </tr>
                            <?php
                            while ($feedbackrow = mysqli_fetch_array($feedbackresult)) {
                                $feedbackId = $feedbackrow['feedback_id'];
                                $uname = $feedbackrow['FullName'];
                                $feedback = $feedbackrow['feedback'];

                                echo "<tr>";
                                echo "<td> $feedbackId </td>";
                                echo "<td> $uname </td>";
                                echo "<td> $feedback </td>";
                                echo "<td> <a target='_self' href='adminpanel.php?fid=$feedbackId'> Delete </a> </td>";
                                echo "</tr>";
                            }
                            ?>
                        </table>

                    </div>
                </div>

                <div class="tab-pane fade" id="password">
                    <form id="passwordForm" method="post" action="adminpanel.php#password">
                        <div class="card-body pb-2">
                            <div class="form-group">
                                <label class="form-label">Current password</label>
                                <input type="password" class="form-control" name="oldpass" />
                            </div>
                            <div class="form-group">
                                <label class="form-label">New password</label>
                                <input type="password" class="form-control" name="newpass" />
                            </div>
                            <div class="form-group">
                                <label class="form-label">Repeat new password</label>
                                <input type="password" class="form-control" name="renewpass" required />
                            </div>
                        </div>
                        <hr class="border-light m-0" />
                        <div class="text-right mt-3 buttondiv">
                            <button type="submit" class="btn btn-primary" name="change_password">Save
                                changes</button>&nbsp;
                            <button type="reset" class="btn btn-default cancel">Cancel</button>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="cancellation">
                        <div class="card-body pb-2">
                            <h1 class="myh3">Cancellation Details</h1>

                                <table class="table">
                                    <tr>
                                        <th>Cancellation ID</th>
                                        <th>Boking ID</th>
                                        <th>User ID</th>
                                        <th>User Name</th>
                                        <th>Package Type</th>
                                        <th>PackageName</t
                                        \h>
                                        <th>Payment</th>
                                    </tr>
                                    <?php
                                    while ($cancelrow = mysqli_fetch_array($cancelresult)) {
                                        $cancelID= $cancelrow['Cancellation_ID'];
                                        $cancelbookid = $cancelrow['Booking_ID'];
                                        $cancelUSerid = $cancelrow['User_ID'];
                                        $cancelusername = $cancelrow['User_name'];
                                        $cancelPackagetype = $cancelrow['Package_Type'];
                                        $cancelpackagename = $cancelrow['PackageName'];
                                        $cancelpayid = $cancelrow['Payment_ID'];

                                        echo "<tr>";
                                        echo "<td> $cancelID</td>";
                                        echo "<td> $cancelbookid </td>";
                                        echo "<td> $cancelUSerid </td>";
                                        echo "<td> $cancelusername </td>";
                                        echo "<td> $cancelPackagetype </td>";
                                        echo "<td> $cancelpackagename </td>";
                                        echo "<td> $cancelpayid </td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </table>
                        </div>
                </div>
            </div>
        </div>

        <!-- =========== Scripts =========  -->

        <script>
            // add hovered class to selected list item
            let list = document.querySelectorAll(".mynavigation li");


            function activeLink() {
                list.forEach((item) => {
                    item.classList.remove("hovered");
                });
                this.classList.add("hovered");
            }

            list.forEach((item) => item.addEventListener("click", activeLink));

            // Menu Toggle
            let toggle = document.querySelector(".toggle");
            let navigation = document.querySelector(".mynavigation");
            let main = document.querySelector(".main");

            toggle.onclick = function () {
                navigation.classList.toggle("active");
                main.classList.toggle("active");
            };

        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Menu Toggle
                let toggle = document.querySelector(".toggle");
                let navigation = document.querySelector(".mynavigation");
                let main = document.querySelector(".main");

                toggle.onclick = function () {
                    navigation.classList.toggle("active");
                    main.classList.toggle("active");
                };

                // Handle tab switching
                let tabs = document.querySelectorAll('.mynavigation li a[data-toggle="pill"]');
                tabs.forEach(tab => {
                    tab.addEventListener('click', function (e) {
                        e.preventDefault();
                        let targetTab = this.getAttribute('href');
                        showTab(targetTab);
                    });
                });

                function showTab(tabId) {
                    // Manually remove the 'active' class from all tabs and tab content
                    tabs.forEach(tab => {
                        tab.classList.remove('active');
                        document.querySelector(tab.getAttribute('href')).classList.remove('show', 'active');
                    });

                    // Add the 'active' class to the clicked tab and show the corresponding content
                    this.classList.add('active');
                    $(tabId).tab('show');
                }
            });
        </script>


        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>

        <!-- ====== ionicons ======= -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>