<?php
$con = mysqli_connect("localhost", "root", "", "travelblox");
if (!$con) {
    die("Error...!");
}

$id = $_GET['Stateid'];
$getid = "SELECT stateid from state_mst where statename = '$id'";
$result = mysqli_query($con, $getid);
$row = mysqli_fetch_array($result);
$stateid = $row[0];

$query = "SELECT Desid, DesName FROM destinations WHERE Stateid = $stateid"; 
$result = mysqli_query($con, $query);

$destinations = [];

while ($row = mysqli_fetch_assoc($result)) {
    $destinations[] = $row;
}

// Return the destinations as JSON
echo json_encode($destinations);

mysqli_close($con);
?>
