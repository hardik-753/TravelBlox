<?php
require_once("database.php");

if (isset($_GET["bid"])) {
    $bid = $_GET["bid"];
    $sel = "SELECT 
    booking_mst.Booking_ID,
    user_mst.User_id,
    user_mst.FullName,
    booking_mst.Package_Type,
    booking_mst.PrePackage_ID,
    booking_mst.CusPackage_ID,
    booking_mst.Payment_ID
    FROM booking_mst INNER JOIN user_mst ON booking_mst.User_ID = user_mst.User_id 
    WHERE Booking_ID = $bid";
    $bookresult = mysqli_query($con, $sel);
    $bookrow = mysqli_fetch_assoc($bookresult);
    
    $Booking_ID = $bookrow['Booking_ID'];
    $User_ID = $bookrow['User_id'];
    $username = $bookrow['FullName'];
    $Package_Type = $bookrow['Package_Type'];
    $PrePackage_ID = $bookrow['PrePackage_ID'];
    $CusPackage_ID = $bookrow['CusPackage_ID'];
    $Payment_ID = $bookrow['Payment_ID'];
    
    if ($Package_Type == "customPackage") {
        $Cquery = "SELECT `Package_Name` FROM `cuspackage_mst` WHERE CusPackage_ID = $CusPackage_ID";
        $Cresult = $con->query($Cquery);
        $Crow = $Cresult->fetch_assoc();
        $PackageName = $Crow['Package_Name'];
    } elseif ($Package_Type == "prePackage") {
        $pquery = "SELECT `PackageName` FROM `prepackage_mst` WHERE  `PrePackage_id` = $PrePackage_ID";
        $presult = $con->query($pquery);
        $prow = $Cresult->fetch_assoc();
        $PackageName = $prow['PackageName'];
    }
    
    $insert = "INSERT INTO cancellation_mst(Booking_ID,User_ID,User_name,Package_Type,PrePackage_ID,CusPackage_ID,PackageName,Payment_ID)
         VALUES($Booking_ID,$User_ID,'$username','$Package_Type',$PrePackage_ID,$CusPackage_ID,'$PackageName',$Payment_ID)";
}

echo $insert;
if (mysqli_query($con, $insert)) {
    $del = "DELETE FROM booking_mst WHERE Booking_ID = $bid";
    if (mysqli_query($con, $del)) {
        echo 'true';
    } else {
        echo 'false';
    }
} else {
    echo 'false';
}
?>