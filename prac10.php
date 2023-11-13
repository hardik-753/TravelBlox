<!DOCTYPE html>
<html>

<head>
    <title>Search Records</title>
</head>

<body>
    <form action="prac10.php" method="POST">
        <label for="searchTerm">Search by Name or City:</label>
        <input type="text" id="searchTerm" name="searchTerm" required autofocus>
        <input type="submit" value="Search" name="submit">
    </form>
</body>

</html>

<?php

$con = mysqli_connect("localhost", "root", "", "test");
if (!$con)
    die("Connection failed");

if (isset($_POST['submit'])) {
    $searchTerm = $_POST['searchTerm'];

    $sql = "select * FROM registration_master WHERE name LIKE '%$searchTerm%' OR city LIKE '%$searchTerm%'";
    $result = mysqli_query($con, $sql);

    if (mysqli_affected_rows($con) > 0) {
        echo "<h2>Search Results</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Registration ID</th><th>Username</th><th>Name</th><th>Address</th><th>City</th><th>Pincode</th><th>Birthdate</th><th>Age</th><th>Mobile Number</th></tr>";
        while ($row = $result->fetch_assoc()) {            
            echo "<tr>";
            echo "<td>" . $row['rid'] . "</td>";
            echo "<td>" . $row['uid'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['city'] . "</td>";
            echo "<td>" . $row['pincode'] . "</td>";
            $mydate = strtotime($row['birthdate']);
            $mydate = date('d-m-Y', $mydate);
            echo "<td>$mydate</td>";
            $myyear = date('Y', strtotime($mydate));
            echo $myyear;
            $year = date('Y');
            $age = $year - $myyear;
            echo "<td>" . $age . "</td>";
            echo "<td>" . $row['mobileno'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";
    }
}
?>
