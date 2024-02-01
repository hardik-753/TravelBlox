<?php

require_once("database.php");


$packageType = $_GET['packageType'];

if ($packageType == 'prePackage') 
{
    $query = "SELECT PrePackage_id FROM prepackage_mst";
    $result = mysqli_query($con, $query);
    $options = '<option value="" selected disabled>Select Package ID</option>';
    while ($row = mysqli_fetch_assoc($result)) {
        $options .= '<option value="' . $row['PrePackage_id'] . '">' . $row['PrePackage_id'] . '</option>';
    }
}
else{
    $query = "SELECT CusPackage_ID FROM cuspackage_mst";
    $result = mysqli_query($con, $query);
    $options = '<option value="" selected disabled>Select Package ID</option>';
    while ($row = mysqli_fetch_assoc($result)) {
        $options .= '<option value="' . $row['CusPackage_ID'] . '">' . $row['CusPackage_ID'] . '</option>';
    }
}

echo $options;




// require_once("database.php");

// $packageType = $_GET['packageType'];
// $packageId = $_GET['packageId'];

// $response = array();

// if ($packageType == 'prePackage') {
//     $query = "SELECT * FROM prepackage_mst";
//     $result = mysqli_query($con, $query);
//     $row = mysqli_fetch_assoc($result);

//     // Add package details to the response array

//     $response['packageId'] = $row['PrePackage_id'];
//     $response['packageName'] = $row['PackageName'];
//     $response['transportation'] = $row['Transportation'];
//     $response['basePrice'] = $row['Price'];
//     // Add other fields as needed
// } else {
//     $query = "SELECT * FROM cuspackage_mst";
//     $result = mysqli_query($con, $query);
//     $row = mysqli_fetch_assoc($result);

//     // Add package details to the response array
//     $response['packageId'] = $row['CusPackage_ID'];
//     $response['packageName'] = $row['Package_Name'];
//     $response['transportation'] = $row['Transportation'];
//     $response['basePrice'] = $row['Price'];
//     // Add other fields as needed
// }

// // Convert the response array to JSON and echo it
// echo json_encode($response);


?>