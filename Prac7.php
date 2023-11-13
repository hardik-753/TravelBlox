<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prac7</title>
</head>

<body>
    <form action="Prac7.php" method="post">
        Enroll No :- <input type="text" name="eno" required><br><br>
        Name :- <input type="text" name="name"><br><br>
        Address :- <input type="text" name="address"><br><br>
        City :- <select name="city" id="">
            <option value="" disabled selected>---Select City---</option>
            <option value="ahmedabad">Ahmedabad</option>
            <option value="mehsana">Mehsana</option>
            <option value="patan">Patan</option>
        </select><br><br>
        Gender :- <input type="radio" name="gen" value="Male"> Male <input type="radio" name="gen" value="FeMale"> Female <br><br>
        <input type="submit" name="submit">
    </form>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $eno = $_POST['eno'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $gender = $_POST['gen'];
    $check = true;

    $length = strlen($eno);
    if ($length != 11) {
        echo "Please Enter Valid Enrollment Number";
        $check = false;
    } elseif ($eno < 18082221001 || $eno > 18082221025) {
        echo "Not Valid Enrollment Number";
        $check = false;
    }


    if (!preg_match("/^[a-zA-Z]*$/", $name)) {
        echo "<br> Enter Valid Name";
        $check = false;
    }

    if ($check) 
    {
        echo "<table border='2'> <tr> <th>Eno</th> <th>Name</th> <th>Address</th> <th>City</th> <th>Gender</th></tr>";
        echo "<tr>";
        echo "<td>" . $eno . "</td>";
        echo "<td>" . $name . "</td>";
        echo "<td>" . $address . "</td>";
        echo "<td>" . $city . "</td>";
        echo "<td>" . $gender . "</td>";
        echo "</tr>";
        echo "</table>";
    }
    
}

?>