<?php

require_once("database.php");

session_start();
if (!isset($_SESSION['uid'])) {
    echo "<script>alert('Pls Login First')</script>";
    echo "<script>window.location.href = 'login.php'</script>";
} else {
    $uid = $_SESSION["uid"];
    $query = "SELECT * from user_mst WHERE User_id=$uid";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);


    $customquery = "SELECT * FROM cuspackage_mst where User_ID=$uid";
    $customqueryresult = mysqli_query($con, $customquery);

    $groupquery = "SELECT * FROM chatgroup where User_Id = $uid";
    $groupresult = mysqli_query($con, $groupquery);

    $bookquery = "SELECT * FROM booking_mst where User_ID = $uid";
    $bookresult = mysqli_query($con, $bookquery);

}

if (isset($_POST["save_general"])) {
    $name = $_POST['FullName'];
    $mail = $_POST['Email'];
    $mobile = $_POST['MobileNo'];
    $dob = $_POST['DOB'];
    $address = $_POST['Address'];
    $city = $_POST['City'];
    $pincode = $_POST['Pincode'];

    $query = "UPDATE user_mst set FullName='$name', Email='$mail', MobileNo=$mobile, DOB='$dob', Address='$address', City='$city', Pincode='$pincode' where User_id=$uid";
    $result = mysqli_query($con, $query);
    if (mysqli_affected_rows($con) == 1) {
        echo "<script> alert ('general info changed..!') </script>";
        echo "<script>window.location.href = 'userpro.php'</script>";

    }

} elseif (isset($_POST["change_password"])) {
    // echo "<script> alert ('Password!') </script>";

    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $renewpass = $_POST['renewpass'];

    if ($oldpass === $newpass) {
        echo "<script> alert ('Old Password and New Password Not Be Same..!') </script>";
        // echo "Old Password and New Password Not Be Same..!";
    } else {
        if ($newpass === $renewpass) {
            $query = "UPDATE user_mst SET Password='$newpass' where User_id=$uid";
            $result = mysqli_query($con, $query);
            if (mysqli_affected_rows($con) == 1) {

                $notificationMessage = "Your password was updated on " . date("d-m-Y");
                $insertNotificationQuery = "INSERT INTO notification (User_ID, Message) VALUES ($uid, '$notificationMessage')";
                mysqli_query($con, $insertNotificationQuery);
                echo "<script> alert ('Your Password Has Been Changed..!') </script>";
                echo "<script>window.location.href = 'login.php'</script>";
            }
        } else {
            echo "<script> alert ('Password and Retype Password Not Matched..!') </script>";
        }
    }
} elseif (isset($_POST['clearNotifications'])) {
    $query = "DELETE FROM notification WHERE User_ID=$uid";
    $result = mysqli_query($con, $query);
    if (mysqli_affected_rows($con) == 1) {

        echo "<script> alert ('All Notification Cleared..!!') </script>";
        echo "<script>window.location.href = 'userpro.php'</script>";

    }
}
if (isset($_GET['cid'])) {
    $cusid = $_GET['cid'];
    $query = "DELETE FROM cuspackage_mst WHERE CusPackage_ID=$cusid";
    $result = mysqli_query($con, $query);
    if (mysqli_affected_rows($con) == 1) {
        echo "<script> alert ('Your Custom Package Has Been Deleted..!') </script>";
        echo "<script>window.location.href = 'userpro.php'</script>";
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelBlox | UserProfile</title>

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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .mydiv {
            width: 100%;
            height: 100vh;
            background-color: #047ffc;
            display: flex;
            padding: 10px 10px;
            /* border: 2px solid red; */
            /* overflow-y: auto; */
        }

        .account-settings .user-profile {
            margin: 0 0 1rem 0;
            padding-bottom: 1rem;
            text-align: center;
        }

        .account-settings .user-profile .user-avatar {
            margin: 0 0 1rem 0;
        }

        .account-settings .user-profile .user-avatar img {
            width: 90px;
            height: 90px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            border-radius: 100px;
        }

        .account-settings .user-profile h5.user-name {
            margin: 0 0 0.5rem 0;
        }

        .account-settings .user-profile h6.user-email {
            margin: 0;
            font-size: 0.8rem;
            font-weight: 400;
            color: #9fa8b9;
        }

        .account-settings .about {
            margin: 2rem 0 0 0;
            text-align: center;
        }

        .account-settings .about h5 {
            margin: 0 0 15px 0;
            color: #007ae1;
        }

        .account-settings .about p {
            font-size: 0.825rem;
        }

        .form-control {
            border: 1px solid #cfd1d8;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            font-size: .825rem;
            background: #ffffff;
            color: #2e323c;
        }

        .card {
            background: #ffffff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
            /* border: 2px solid red !important; */
            overflow-y: auto;

        }

        .card1 {
            background: #ffffff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
            margin-left: 10px;
            width: 83%;
            /* border: 2px solid red !important; */
            overflow-y: auto;
        }

        .border {
            border: 2px solid red !important;
        }

        .buttondiv {
            /* border: 2px solid red; */
            padding: 10px 10px;
            width: 90%;
            margin: auto;
            text-align: center !important;
        }

        .cancel {
            border: 2px solid black;
        }
    </style>

</head>

<body>
    <div class="mydiv">
        <div class="card h-100">
            <div class="card-body">
                <div class="account-settings">
                    <div class="user-profile">
                        <div class="user-avatar">
                            <img src="images/UserProfile.png">
                        </div>
                        <h5 class="user-name">
                            <?php echo $row['FullName'] ?>
                        </h5>
                        <h6 class="user-email">
                            <?php echo $row['Email'] ?>
                        </h6>
                    </div>

                    <div class="about">
                        <div class="list-group list-group-flush account-settings-links">
                            <a class="list-group-item list-group-item-action active" data-toggle="list"
                                href="#account-general">General Info</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list"
                                href="#account-change-password">Change password</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list"
                                href="#account-notifications">Notifications</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list"
                                href="#account-custom">Custom
                                Packages</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list"
                                href="#account-group">Group</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list"
                                href="#account-booking">Booking</a>
                            <a href="main.php" class="list-group-item list-group-item-action">Go To Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
        <div class="card1 h-100">
            <div class="card-body">
                <div class="tab-content">

                    <!-- Genral Tab -->
                    <div class="tab-pane fade show active" id="account-general">
                        <form id="generalForm" method="post" action="userpro.php#account-general">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control mb-1" name="FullName"
                                        value="<?php echo $row['FullName'] ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" class="form-control" name="Email"
                                        value="<?php echo $row['Email'] ?>" />
                                    <!-- <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br />
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div> -->
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Mobile No</label>
                                    <input type="number" class="form-control mb-1"
                                        oninput="this.value = this.value.slice(0, 10);" name="MobileNo"
                                        value="<?php echo $row['MobileNo'] ?>" />

                                </div>
                                <div class="form-group">
                                    <label class="form-label">Date Of Birth</label>
                                    <input type="text" class="form-control" name="DOB"
                                        value="<?php echo $row['DOB'] ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="Address"
                                        value="<?php echo $row['Address'] ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" name="City"
                                        value="<?php echo $row['City'] ?>" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Pincode</label>
                                    <input type="number" class="form-control" name="Pincode"
                                        oninput="this.value = this.value.slice(0, 6);"
                                        value="<?php echo $row['Pincode'] ?>" />
                                </div>
                                <!-- <div class="form-group">
                                <label class="form-label">Profile Image</label>
                                <input type="file" class="form-control" />
                            </div> -->
                            </div>
                            <hr class="border-light m-0" />
                            <div class="text-right mt-3 buttondiv">
                                <button type="submit" class="btn btn-primary" name="save_general">Save
                                    changes</button>&nbsp;
                                <button type="reset" class="btn btn-default cancel">Cancel</button>
                            </div>
                        </form>
                    </div>

                    <!-- Password Tab -->
                    <div class="tab-pane fade" id="account-change-password">
                        <form id="passwordForm" method="post" action="userpro.php#account-change-password">
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
                                    <input type="password" class="form-control" name="renewpass" />
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

                    <!-- Notification Tab -->
                    <div class="tab-pane fade" id="account-notifications">
                        <h6 class="mb-4">Your Notifications display Here..!!</h6>
                        <?php
                        $notificationQuery = "SELECT * FROM notification WHERE User_ID = $uid ORDER BY timestamp DESC";
                        $notificationResult = mysqli_query($con, $notificationQuery);
                        if (mysqli_num_rows($notificationResult) >= 1) {
                            while ($notificationRow = mysqli_fetch_assoc($notificationResult)) {
                                echo "<div class='alert alert-info'>" . $notificationRow['Message'] . "</div>";
                            }
                        } else {
                            echo "<p>You don't have any notification right now..!</p>";
                        }

                        ?>
                        <hr class="border-light m-0" />
                        <div class="text-right mt-3 buttondiv">
                            <form action="userpro.php#account-notifications" method="post">
                                <button class="btn btn-danger" name="clearNotifications">Clear Notifications</button>
                            </form>
                        </div>
                        <div class="alert alert-danger" role="alert">
                            All deleted notifications are not recoverable.
                        </div>

                    </div>

                    <!-- Custom Package Tab -->
                    <div class="tab-pane fade" id="account-custom">
                        <div class="card-body pb-2">
                            <h6 class="mb-4">Your Custom Packages</h6>
                            <table class="table">
                                <tr>
                                    <th>Custom Package Id</th>
                                    <th>Custom Package Name</th>
                                    <th>Book</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                <?php
                                while ($customrow = mysqli_fetch_array($customqueryresult)) {
                                    $ctype = "customPackage";
                                    $cusid = $customrow['CusPackage_ID'];
                                    $cusName = $customrow['Package_Name'];
                                    $cTransportaion = $customrow['Transportation'];
                                    $cAccommodations = $customrow['Accommodations'];
                                    $cprice = $customrow['Price'];
                                    $cDate = $customrow['date'];
                                    $NDOB = strtotime($cDate);
                                    $FDOB = date('Y-m-d', $NDOB);

                                    echo "<tr>";
                                    echo "<td> $cusid </td>";
                                    echo "<td> $cusName </td>";

                                    echo "<td> <a target='_self' href='booking.php?ctype=$ctype&cid=$cusid&cname=$cusName&cTransportaion=$cTransportaion&cAccommodations=$cAccommodations&cprice=$cprice&cdate=$FDOB'> Book </a> </td>";

                                    echo "<td> <a target='_self' href='custom.php?edit_id=$cusid'> Edit </a> </td>";

                                    echo "<td> <a target='_self' href='javascript:void(0)' onclick='confirmDelete()'> Delete </a> </td> </tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>

                    <!-- Group Chat Tab -->
                    <div class="tab-pane fade" id="account-group">
                        <div class="card-body pb-2">
                            <h6 class="mb-4">Your Group Details</h6>
                            <table class="table">
                                <tr>
                                    <th>Group Name</th>
                                    <th>GroupCN</th>
                                    <th>GroupCode</th>
                                    <th>Add Member</th>
                                </tr>
                                <?php
                                while ($grouprow = mysqli_fetch_array($groupresult)) {
                                    $groupName = $grouprow['GroupName'];
                                    $groupCN = $grouprow['CreatorNumber'];
                                    $groupCode = $grouprow['Code'];

                                    echo "<tr>";
                                    echo "<td> $groupName </td>";
                                    echo "<td> $groupCN </td>";
                                    echo "<td> $groupCode </td>";
                                    echo "<td> <a target='_self' href=# > Add Member </a> </td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>

                    <!-- Booking Tab -->
                    <div class="tab-pane fade" id="account-booking">
                        <div class="card-body pb-2">
                            <h6 class="mb-4">Your Booking detais</h6>
                            <table class="table">
                                <tr>
                                    <th>Booking ID</th>
                                    <th>Package Type</th>
                                    <th>Pre-package Id</th>
                                    <th>Custom-Package Id</th>
                                    <th>Payment Id</th>
                                    <th>view</th>
                                    <th>Canceletion</th>
                                </tr>
                
                                <?php
                                while ($bookrow = mysqli_fetch_array($bookresult)) {
                                    $bookId = $bookrow['Booking_ID'];
                                    $bookPackType = $bookrow['Package_Type'];
                                    $Book_PreId = $bookrow['PrePackage_ID'];
                                    $Book_CusId = $bookrow['CusPackage_ID'];
                                    $Book_PayId = $bookrow['Payment_ID'];

                                    
                                    
                                    // echo "<tr id='$bookId'>";
                                    echo "<tr class='booking-row' data-booking-id='<?php echo $bookId; ?>'>";
                                    echo "<td> $bookId </td>";
                                    echo "<td> $bookPackType </td>";
                                    echo "<td> $Book_PreId </td>";
                                    echo "<td> $Book_CusId </td>";
                                    echo "<td> $Book_PayId </td>";

                                    
                                    echo "<td> <a target='_self' href='invoice.php?bid=$bookId'> view </a> </td>";
                                    echo "<td> <a target='_self' href='cancellation.php?bid=$bookId' > Cancellation </a> </td>";
                                    echo "</tr>";

                                }
                                ?>
                            </table>             

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!--  -->

    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this custom package?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <a href="userpro.php?cid=<?php echo $cusid; ?>&confirm=yes" class="btn btn-primary">Yes</a>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script> -->


    <script>
        function confirmDelete() {
            // Show Bootstrap Modal
            $('#confirmationModal').modal('show');
        }
        // function Cancellation(id) {
        //     $.ajax({
        //         type: "POST",
        //         url: "cancellation.php",
        //         data: { id: id },
        //         success: function (data) {
        //             console.log(data);
        //             if (data === 'true') {
        //                 // console.log($('#' + id));
        //                 $('.booking-row[data-booking-id="' + id + '"]').css('display', 'none');
        //             }
        //         }
        //     });
        // } 
    </script>

    <!--  -->

    <!-- <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script type="text/javascript"></script> -->

</body>

</html>