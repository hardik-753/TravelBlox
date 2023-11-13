<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prac11</title>
</head>

<body>
    <form action="prace11.php" method="post" enctype="multipart/form-data">
        PId :- <input type="number" name="pid"><br><br>
        PName :- <input type="text" name="pname"><br><br>
        qty :- <input type="number" name="qty"><br><br>
        Rate :- <input type="number" name="rate"><br><br>
        Images :- <input type="file" name="file[]" multiple><br><br>
        <input type="submit" name="submit">
    </form>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $qty = $_POST['qty'];
    $rate = $_POST['rate'];
    $checkfile = array();
    $path = array();
    $count = count($_FILES['file']['name']);
    $flag=true;

    for ($i = 0; $i < $count; $i++) 
    {
        if (($_FILES['file']['type'][$i] == "image/jpeg" || $_FILES['file']['type'][$i] == "image/png") && $_FILES['file']['size'][$i] <= 1000000) 
        {
            if ($_FILES['file']['error'][$i] > 0)
            echo "<script> alert('Failed..!')</script>";
            else
            {
                move_uploaded_file($_FILES['file']["tmp_name"][$i], "img/" . $_FILES['file']['name'][$i]);
                $path[$i] = "img/" . $_FILES['file']['name'][$i];
            }
           
        }
        else
        {
            $checkfile[$i] = $_FILES['file']['name'][$i];
            $flag=false;
        }
    }


if($flag)
{
    $con = mysqli_connect("localhost", "root", "", "test");
    if (!$con)
        echo "<script> alert('Not Connect To Database..!')</script>";
    else {
        $query = "insert into product values ($pid,'$pname',$qty,$rate,'$path[0]','$path[1]','$path[2]')";
        $result = mysqli_query($con, $query);
        if (!$result)
            echo "<script> alert('Failed to insert..!')</script>";
        else {
            echo "Recoed Inserted..!!";
            $selectquery = "select * from product";
            $result = mysqli_query($con, $selectquery);
            echo "<table border='2'>";
            echo "<tr><th>Pid</th><th>Pname</th><th>qty</th><th>rate</th><th>img1</th><th>img2</th><th>img3</th></tr>";
            while ( $val = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td> $val[0] </td>";
                echo "<td> $val[1] </td>";
                echo "<td> $val[2] </td>";
                echo "<td> $val[3] </td>";
                echo "<td> <img src='$val[4]' height='100px' weidgth='100px'> </td>";
                echo "<td> <img src='$val[5]' height='100px' weidgth='100px'> </td>";
                echo "<td> <img src='$val[6]' height='100px' weidgth='100px'> </td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }
}
else
{
    foreach($checkfile as $files)
    {
        echo "<br> Error in This File :- ' ".$files ." ' Invalid Type Or Size";
    }
}
   
}
?>