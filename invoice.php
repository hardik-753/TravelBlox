<?php 
$con = mysqli_connect("localhost","root","","travelblox");

if(!$con)
die("error...");
session_start();

if(isset($_GET['bid'])){
    $bookid = $_GET['bid'];
    $query = " SELECT 
    booking_mst.Booking_ID,
    user_mst.FullName,
    booking_mst.Package_Type,
    booking_mst.PrePackage_ID,
    booking_mst.CusPackage_ID
    FROM 
        booking_mst
    INNER JOIN 
        user_mst ON booking_mst.User_ID = user_mst.User_id 
    WHERE booking_mst.Booking_ID = $bookid";
    $result = $con->query( $query );
}
?>

<html lang="en">

<head>
	
	<title>TravelBlox | Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">

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
            text-align: ;
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
            <th colspan="2" style="text-align: left;"><h2 class="myh3">Booking Details</h2></th colspan="2">
        </tr>
        <?php 

            while( $row = mysqli_fetch_row($result) )
            {
                echo "<tr> <td class=''> Booking Id :- </td>";
                echo  "<td> $row[0] </td> </tr>";
                echo "<tr> <td> User Name :- </td>";
                echo  "<td> $row[1] </td> </tr>";
                echo "<tr> <td> Package Type :- </td>";
                echo  "<td> $row[2] </td> </tr>";
                if ($row[2] == "customPackage"){
                    $Cquery = "SELECT `CusPackage_ID`, `Package_Name`, `From_place`, `To_place`, `Duration`, `Accommodations`, `Transportation`, `Price` 
                    FROM `cuspackage_mst` WHERE CusPackage_ID = $row[4]";
                    $Cresult = $con->query( $Cquery );
                    while($Crow = mysqli_fetch_array($Cresult) ){
                        echo "<tr> <td> Package name :- </td>";
                        echo "<td>".$Crow[1]."</td>";
                        echo "<tr> <td> From Place :- </td>";
                        echo "<td>".$Crow[2]."</td>";
                        echo "<tr> <td> To Place :- </td>";
                        echo "<td>".$Crow[3]."</td>";
                        echo "<tr> <td> Duration :- </td>";
                        echo "<td>".$Crow[4]." Days</td>";
                        echo "<tr> <td> Accommodetion :- </td>";
                        echo "<td>".$Crow[5]."</td>";
                        echo "<tr> <td> Transportetion :- </td>";
                        echo "<td>".$Crow[6]."</td>";
                        echo "<tr><td > Price </td>";
                        echo "<td >".$Crow[7]."</td></tr>";
                        echo "<tr> <td colspan='2'> <a class='mybtn' href='adminpanel.php#booking'>Back</a>
                </td></tr>";    
                    }
                   
                }
                elseif($row[2] == "prePackage"){
                    $Pquery= "SELECT `PrePackage_id`, `PackageName`, `FromPlace`, `PlaceTo`, `Duration`, `Accommodations`, `Transportation`, `Price` 
                    FROM `prepackage_mst` 
                    WHERE `PrePackage_id` = $row[3]";
                    $Presult = $con->query( $Pquery );
                    while($Prow = mysqli_fetch_array($Presult) ) {
                        echo "<tr> <td> Package name :- </td>";
                        echo "<td>".$Prow[1]."</td>";
                        echo "<tr> <td> From Place :- </td>";
                        echo "<td>".$Prow[2]."</td>";
                        echo "<tr> <td> To Place :- </td>";
                        echo "<td>".$Prow[3]."</td>";
                        echo "<tr> <td> Duration :- </td>";
                        echo "<td>".$Prow[4]."</td>";
                        echo "<tr> <td> Accommodetion :- </td>";
                        echo "<td>".$Prow[5]."</td>";
                        echo "<tr> <td> Transportetion :- </td>";
                        echo "<td>".$Prow[6]."</td>";
                        echo "<tr><td > Price </td>";
                        echo "<td >".$Prow[7]."</td></tr>";
                        echo "<tr> <td colspan='2'> <a class='mybtn' href='adminpanel.php#booking
                        
                        
                        '>Back</a>
                </td></tr>"; 
                }
                               
            }
        }
        ?>
    </table>
</body>
</html>