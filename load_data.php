<?php
require_once("database.php");

if (isset($_GET['custom_id'])) {
    $custom_id = $_GET['custom_id'];
    
    // Modify the query accordingly based on your database structure
    $query = "SELECT * FROM cuspackage_mst WHERE cuspackage_ID = $custom_id";
    $result = mysqli_query($con, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        // Output the data as JSON
        echo json_encode($row);
    }
}
