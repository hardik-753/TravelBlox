<?php

$con = mysqli_connect("localhost","root","","travelblox");

if(!$con)
die("error...");

if (!isset($_GET['package']))
{
    echo "No package selected.";
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>More Info</title>

    <script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>

	<!-- css files -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
	<link href="css/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->
	<link href="css/font-awesome.min.css" rel="stylesheet"><!-- fontawesome css -->
	<!-- //css files -->

	<link href="css/css_slider.css" type="text/css" rel="stylesheet" media="all">

	<!-- google fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
		rel="stylesheet">
	<link
		href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">
	<!-- //google fonts -->

    <style>
        /* table{
            background-color: white;
            border-color: blue;
            border-radius: 10px;
            width: 900px;
            margin: auto;
            margin-top: 10px;
        } */
        table {
        width: 100%;
        max-width: 800px; /* Optional: Set a maximum width for the table */
        margin: 0 auto; /* Center the table horizontally */
        background-color: rgba(255, 255, 255, 0.8);
        border-color: blue;
        border-radius: 10px;
        }
        table td{
            padding: 7px;
        }
        .mybtn {
			color: white;
			background: var(--blue);
            border-radius: 10px;
			padding: 10px 25px;
			display: block;
			margin-top: 10px;
			text-transform: uppercase;
			letter-spacing: 1px;
			font-size: 14px;
			text-align: center;
		}
        .mybtn:hover{
            background-color: white;
        }
        .myh3 {
            color: var(--blue);
            text-align: center;
            padding: 10px;
            font-size: 30px;
        }
        html, body {
        height: 100%;
        margin: 0;
        }

        body {
        background-image: url('images/Gujrat.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        }

    </style>

</head>
<body>
    <table class="table-hover" #fff>
        <tr>
            <th colspan="2" style="text-align: center;"><h2 class="myh3">Package Details</h2></th colspan="2">
        </tr>
        <?php 
        if (isset($_GET['package'])) {
   
            $selectedPackage = $_GET['package'];
            $ptype = "prePackage";
            $query = "select * from prepackage_mst where PrePackage_id=$selectedPackage";
            $result = mysqli_query($con,$query);
        
            while( $row = mysqli_fetch_row($result) )
            {
                echo "<tr> <td class=''> Package Name Is :- </td>";
                echo  "<td> $row[2] </td> </tr>";
                echo "<tr> <td> Starting Place Is :- </td>";
                echo  "<td> $row[3] </td> </tr>";
                echo "<tr> <td> Ending Place Is :- </td>";
                echo  "<td> $row[4] </td> </tr>";
                echo "<tr> <td> Duration Of This Trip Is Around :- </td>";
                echo  "<td> $row[5] </td> </tr>";
                echo "<tr> <td> We Do this Activities During the Trip :- </td>";
                echo  "<td> $row[6] </td> </tr>";
                echo "<tr> <td> Accommodations Details :- </td>";
                echo  "<td> $row[7] </td> </tr>";
                echo "<tr> <td> Transportaion Details :- </td>";
                echo  "<td> $row[8] </td> </tr>";
                echo "<tr> <td> Total Price Is :- </td>";
                echo  "<td> $row[9] ₹ </td> </tr>";
                // echo "<tr> <td colspan='2'> <a class='mybtn' href='booking.php'>Book Now</a></td></tr>";
                echo "<tr> <td colspan='2'> <a class='mybtn' href='booking.php?ptype=$ptype&pid=$row[0]&pname=$row[2]&Transportaion=$row[8]&Accommodations=$row[7]&price=$row[9]'>Book Now</a>
                </td></tr>";
                
            }
        } 
        ?>
    </table>
</body>
</html>



