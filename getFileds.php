<?php 

require_once("database.php");

$packageType = $_GET['packageType'];
$packageId = $_GET['packageId'];

$response = array();

if ($packageType == 'prePackage') {
    $query = "SELECT * FROM prepackage_mst WHERE PrePackage_id = $packageId";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    // Add package details to the response array
    $response['packageName'] = $row['PackageName'];
    $response['transportation'] = $row['Transportation'];
    $response['accommodation'] = $row['Accommodations'];
    $response['basePrice'] = $row['Price'];
    // Add other fields as needed
} else {
    $query = "SELECT * FROM cuspackage_mst WHERE CusPackage_ID = $packageId";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    // Add package details to the response array
    $response['packageName'] = $row['Package_Name'];
    $response['transportation'] = $row['Transportation'];
    $response['accommodation'] = $row['Accommodations'];
    $response['basePrice'] = $row['Price'];
    // Add other fields as needed
}

// Convert the response array to JSON and echo it
echo json_encode($response);

?>