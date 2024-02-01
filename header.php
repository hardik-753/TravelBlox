<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">


    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">



    <style>
        .justifytext {
            text-align: justify;
        }

        .myicon {
            font-size: 30px;

        }

        .margin {
            margin-left: 10px;
        }

        .dropdown-toggle::after {
            display: none !important;
        }
    </style>
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <!-- nav -->
            <nav class="py-md-4 py-3 d-lg-flex">
                <div id="logo">
                    <h1 class="mt-md-0 mt-2"> <a href="main.php"><span class="fa fa-map-signs"></span>TravelBlox</a>
                    </h1>
                </div>
                <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
                <input type="checkbox" id="drop" />
                <ul class="menu ml-auto mt-1">
                    <li <?php if ($currentPage == 'home')
                        echo 'class="active"'; ?>><a href="main.php">Home</a></li>
                    <li <?php if ($currentPage == 'about')
                        echo 'class="active"'; ?>><a href="about.php">About Us</a></li>
                    <li <?php if ($currentPage == 'package')
                        echo 'class="active"'; ?>><a href="packages.php">Packages</a>
                    </li>
                    <li <?php if ($currentPage == 'Cuspackage')
                        echo 'class="active"'; ?>><a
                            href="custom.php">CustomPackages</a></li>

                    <li class="booking"><a href="welcome.php">Creat / Join Group</a></li>

                    <!-- =============================================================== -->

                    <li class="dropdown">
                        <a href="user.php" class="dropdown-toggle" data-bs-toggle="dropdown" id="profileDropdown">
                            <i class="fa-solid fa-circle-user myicon"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="userpro.php">
                                <i class="fas fa-cog"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                    <!-- =============================================================== -->
                </ul>
            </nav>
            <!-- //nav -->
        </div>
    </header>
    <!-- //header -->

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>