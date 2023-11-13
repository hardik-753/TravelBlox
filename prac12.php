<?php

$con = mysqli_connect("localhost", "root", "", "test");
if (!$con)
    die("Connection failed");


$sql = "SELECT
            sm.stid AS sid,
            sm.stname AS studentname,
            c.cname AS cityname,
            s.sname AS statename,
            cnt.cntname AS countryname
        FROM student_master AS sm
        JOIN city AS c ON sm.cid = c.cid
        JOIN state AS s ON c.sid = s.sid
        JOIN country AS cnt ON s.cntid = cnt.cntid";

$result = mysqli_query($con,$sql);

if (mysqli_affected_rows($con) > 0) {
    echo "<h2>Student Records</h2>";
    echo "<table border='1'>";
    echo "<tr><th>SID</th><th>Student Name</th><th>City Name</th><th>State Name</th><th>Country Name</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['sid'] . "</td>";
        echo "<td>" . $row['studentname'] . "</td>";
        echo "<td>" . $row['cityname'] . "</td>";
        echo "<td>" . $row['statename'] . "</td>";
        echo "<td>" . $row['countryname'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No student records found.";
}

?>
