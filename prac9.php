<?php

$con = mysqli_connect("localhost", "root", "", "test");
if (!$con)
die("Connection failed");

if (isset($_POST['submit'])) {
    $rid = $_POST['rid'];
    $uid = $_POST['uid'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $birthdate = $_POST['birthdate'];
    $mobileno = $_POST['mobileno'];
    $operation = $_POST['submit'];

    switch ($operation) {
        case "Register":
            insert();
            break;

        case "Update":
            update();
            break;
    }
}

if (isset($_GET['id'])) {
    delete();
}

function insert()
{
    global $rid, $uid, $password, $confirmpassword, $name, $address, $city, $pincode, $birthdate, $mobileno, $con;

    if ($password !== $confirmpassword) {
        echo "Password and confirm password do not match. Please try again...";
        exit();
    }

    $newdate = strtotime($birthdate);
    $newdate = date('Y-m-d', $newdate);

    $query = "insert INTO registration_master (rid, uid, password, name, address, city, pincode, birthdate, mobileno) VALUES ($rid, '$uid', '$password', '$name', '$address', '$city', $pincode, '$newdate', '$mobileno')";

    $result = mysqli_query($con, $query);

    if ($result)
    echo "<script>alert('Recored Inserted..!')</script>";

}

function update()
{
    global $rid, $uid, $password, $confirmpassword, $name, $address, $city, $pincode, $birthdate, $mobileno, $con;

    if ($password !== $confirmpassword) {
        echo "Password and confirm password do not match. Please try again.";
        exit();
    }

    $newdate = strtotime($birthdate);
    $newdate = date('Y-m-d', $newdate);

    $query = "update registration_master set uid='$uid', password='$password',name='$name',address='$address',city='$city' ,pincode=$pincode,birthdate='$newdate', mobileno='$mobileno' where rid=$rid";

    mysqli_query($con, $query);
    $count = mysqli_affected_rows($con);

    if ($count == 1)
    echo "<script>alert('Recored Updated Successfully...!!')</script>";
    else
    echo "<script>alert('Recored Not Updated...!!')</script>";

}
function delete()
{
    global $con;
    $id = $_GET['id'];
    $dquery = "delete from registration_master where rid=$id";

    mysqli_query($con, $dquery);
    $count = mysqli_affected_rows($con);

    if ($count == 1)
        echo "<script>alert('Recored Deleted Successfully')</script>";
    else
        echo "<script>alert('Not Deleted')</script>";
}

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
<html>

<head>
    <title>User Registration</title>
</head>

<body>
    <h2>User Registration</h2>
    <form action="prac9.php" method="POST">

        <label for="rid">Registration ID (rid):</label>
        <input type="number" id="rid" name="rid" required value="<?php
        if (isset($_GET['no'])) {
            showdata();
            echo $val[0];
        }
        ?>" <?php if (isset($_GET['no'])) {
            echo "readonly";
        } ?>><br><br>

        <label for="uid">Username (uid):</label>
        <input type="text" id="uid" name="uid" required value="<?php
        if (isset($_GET['no'])) {
            showdata();
            echo $val[1];
        }
        ?>"><br><br>

        <label for="password">Password:</label>
        <input type="text" id="password" name="password" required minlength="8" value="<?php
        if (isset($_GET['no'])) {
            showdata();
            echo $val[2];
        }
        ?>"><br><br>

        <label for="confirmpassword">Confirm Password:</label>
        <input type="text" id="confirmpassword" name="confirmpassword" required minlength="8" value="<?php
        if (isset($_GET['no'])) {
            showdata();
            echo $val[2];
        }
        ?>"><br><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required value="<?php
        if (isset($_GET['no'])) {
            showdata();
            echo $val[3];
        }
        ?>"><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required value="<?php
        if (isset($_GET['no'])) {
            showdata();
            echo $val[4];
        }
        ?>"><br><br>

        <label for="city">City:</label>
        <select id="city" name="city" required>
            <option value="" selected disabled>---Select City---</option>
            <?php
            $con = mysqli_connect("localhost", "root", "", "test");
            if (!$con)
                die("Connection failed");

            $cityQuery = "select City from city_names";
            $cityResult = mysqli_query($con, $cityQuery);

            $cityNames = array();
            $j = 0;
            while ($row = mysqli_fetch_row($cityResult)) {
                $cityNames[$j] = $row[0];
                $j++;
            }
            foreach ($cityNames as $cityName) {
                echo "<option value=\"$cityName\">" . $cityName . "</option>";
            }
            ?>
        </select><br><br>

        <label for="pincode">Pincode:</label>
        <input type="text" id="pincode" name="pincode" required value="<?php
        if (isset($_GET['no'])) {
            showdata();
            echo $val[6];
        }
        ?>"><br><br>

        <label for="birthdate">Birthdate:</label>
        <input type="date" id="birthdate" name="birthdate" required value="<?php
        if (isset($_GET['no'])) {
            showdata();
            echo $val[7];
        }
        ?>"><br><br>

        <label for="mobileno">Mobile Number:</label>
        <input type="text" id="mobileno" name="mobileno" required value="<?php
        if (isset($_GET['no'])) {
            showdata();
            echo $val[8];
        }
        ?>"><br><br>

        <input type="submit" value="Register" name="submit">
        <input type="submit" value="Update" name="submit">
    </form>
    <br>
    <table border="2">
        <tr>
            <th>RId</th>
            <th>UId</th>
            <th>Name</th>
            <th>Address</th>
            <th>City</th>
            <th>Pincode</th>
            <th>B'Date</th>
            <th>Age</th>
            <th>Mobile No</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        $query = "select * from registration_master";
        $result = mysqli_query($con, $query);
        if (mysqli_affected_rows($con) == 0)
            echo "Not Data Found..? <br><br>";

        while ($val = mysqli_fetch_row($result)) {
            echo "<tr>";
            echo "<td>$val[0]</td>";
            echo "<td>$val[1]</td>";
            echo "<td>$val[3]</td>";
            echo "<td>$val[4]</td>";
            echo "<td>$val[5]</td>";
            echo "<td>$val[6]</td>";
            $mydate = strtotime($val[7]);
            $mydate = date('d-m-Y', $mydate);
            echo "<td>$mydate</td>";
            $myyear = date('Y', strtotime($mydate));
            $year = date('Y');
            $age = $year - $myyear;
            echo "<td>$age</td>";
            echo "<td>$val[8]</td>";
            echo "<td><a target='_self' href='prac9.php?no=$val[0]'>Update</a></td>";
            echo "<td><a target='_self' href='prac9.php?id=$val[0]'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>