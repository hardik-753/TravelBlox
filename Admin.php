<?php

global $con;
$val = array();
$con = mysqli_connect("localhost", "root", "", "test");

if (!$con)
    die(mysqli_connect_error());


if (isset($_POST['submit'])) 
{
    $eno = $_POST['eno'];
    $name = $_POST['sname'];
    $city = $_POST['city'];
    $pin = $_POST['pin'];
    $operation = $_POST['submit'];
    

    switch ($operation) {
        case "Insert":
            insert();
            break;

        case "Update":
            update();
            break;

        default:
            echo "Invalid";
            break;
    }
}

if(isset($_GET['sid']))
{
    delete();
}


function insert()
{
    global $eno, $name, $city, $pin, $con;
    $query = "insert into stud values($eno,'$name','$city',$pin)";

    $result = mysqli_query($con, $query);

    if ($result)
    echo "<script>alert('Recored Added Successfully')</script>";
    else
    echo "<script>alert('Error..!! Pls Try Again..!')</script>";
}
function update()
{
    global $con;
    $eno = $_POST['eno'];
    $name = $_POST['sname'];
    $city = $_POST['city'];
    $pin = $_POST['pin'];

    $query = "update stud set name='$name',city='$city',pin=$pin where sno=$eno";
    mysqli_query($con, $query);
    $count = mysqli_affected_rows($con);

    if ($count == 1)
        echo "Recored Updated Successfully";
    else
        echo "Not Updated";
}

function delete()
{
    global $eno, $con;
    $sid=$_GET['sid'];
    $dquery = "delete from stud where sno=$sid";

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
    $eno = $_GET['sno'];
    $query = "select * from stud where sno=$eno";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<style>
    a{
        text-decoration: none;
        color: blue;
    }
</style>
<body>
    <form action="Admin.php" method="post">

        <table>
            <tr>
                <td>Enter Your Eno</td>
                <td>
                    <input type="number" name="eno" value="<?php 
                    if(isset($_GET['sno']))
                    {
                        showdata();
                        echo $val[0];
                    }
                    ?>">
                </td>
            </tr>
            <tr>
                <td>Enter Your Name</td>
                <td><input type="text" name="sname" value="<?php 
                    if(isset($_GET['sno']))
                    {
                        showdata();
                        echo $val[1];
                    }
                    ?>"></td>
            </tr>
            <tr>
                <td>Enter Your City</td>
                <td><input type="text" name="city" value="<?php 
                    if(isset($_GET['sno']))
                    {
                        showdata();
                        echo $val[2];
                    }
                    ?>"></td>
            </tr>
            <tr>
                <td>Enter Your Pin</td>
                <td><input type="text" name="pin" value="<?php 
                    if(isset($_GET['sno']))
                    {
                        showdata();
                        echo $val[3];
                    }
                    ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Insert" name="submit"></td>
                <td><input type="submit" value="Update" name="submit"></td>
            </tr>

        </table>
    </form>


    <!-- Table For Data -->
    <table border="2">
        <tr>
            <th>Sno</th>
            <th>Sname</th>
            <th>City</th>
            <th>Pincode</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
            <?php
                global $eno, $con, $val;
                $query = "select * from stud";
                $result = mysqli_query($con, $query);
                if (mysqli_affected_rows($con) == 0)
                echo "Not Found..?";
                
                while($val = mysqli_fetch_row($result))
                {
                    echo "<tr>";
                    echo "<td>$val[0]</td>";
                    echo "<td>$val[1]</td>";
                    echo "<td>$val[2]</td>";
                    echo "<td>$val[3]</td>";
                    echo "<td><a target='_self' href='Admin.php?sno=$val[0]'>Edit</a></td>";
                    echo "<td><a target='_self' href='Admin.php?sid=$val[0]'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>
    </table>

</body>

</html>