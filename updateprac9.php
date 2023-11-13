<?php

$con = mysqli_connect("localhost", "root", "", "test");
if (!$con)
    die("Connection failed");

    function showdata()
    {
        global $con, $val;
        $rid = $_GET['no'];
        $query = "select * from registration_master where rid=$rid";
        $result = mysqli_query($con, $query);
        if (mysqli_affected_rows($con) == 0)
        echo "Not Found..?";
        $val = mysqli_fetch_row($result);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>