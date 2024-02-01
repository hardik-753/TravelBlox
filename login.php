<?php

require_once("database.php");

if (isset($_POST['submit'])) {

    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    if (isset($_POST['remember'])) {
        setcookie("Email", $Email, time() + 86400);
        setcookie('Pass', $Password, time() + 86400);
    } else {
        setcookie('Email', "");
        setcookie('Pass', "");
    }

    $query = "select User_id from user_mst where Email='$Email' AND Password='$Password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_row($result);
        session_start();
        $_SESSION['uid'] = $row[0];
        echo "<script>alert('Login Succesfull')</script>";
        echo "<script>window.location.href = 'main.php'</script>";
    } else {
        echo "<script>alert('Invalid Email OR Password')</script>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelBlox | Login</title>

    <!-- css files -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
    <link href="css/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->
    <link href="css/font-awesome.min.css" rel="stylesheet"><!-- fontawesome css -->
    <!-- //css files -->

    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <link
        href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- //google fonts -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">


    <style>
        .mydiv {
            margin: auto;
        }

        .mydiv2 {
            margin: auto;
            width: 700px;
            text-align: center;
            padding: 10px;
            margin-top: 15px;
        }

        .mydiv2 p {
            padding: 10px;
            margin: 5px;
        }

        .mydiv1 {
            margin-left: 0;
            margin-right: 0;
            margin-top: -30px;
        }

        .title {
            text-align: center;
            padding: 5px;
            margin: auto;
            margin-top: 15px;
        }

        .title h1 {
            background-color: #007BFF;
            color: #fff;
            padding: 20px;
            margin: 0;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .clear {
            all: unset;
        }

        .clear:hover {
            all: unset;
        }

        .password-container {
            position: relative;
        }

        .password-container .fa-eye {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .password-container .fa-eye-slash {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>

</head>

<body>

    <div class="title">
        <h1>Your Journey Begins with a Login</h1>
    </div>

    <div class="contact-grids mt-5">
        <div class="row mydiv1">
            <div class="col-lg-6 col-md-6 contact-left-form mydiv">
                <form action="#" method="post">
                    <div class="form-group contact-forms">
                        <input type="email" class="form-control" placeholder="Email" required="" name="Email" value="<?php if (isset($_COOKIE['Email'])) {
                            echo $_COOKIE['Email'];
                        } ?>">
                    </div>
                    <div class="form-group contact-forms password-container">
                        <input type="password" class="form-control" placeholder="Password" required="" name="Password"
                            id="Password" maxlength="10" value="<?php if (isset($_COOKIE['Pass'])) {
                                echo $_COOKIE['Pass'];
                            } ?>">
                        <i class="fas fa-eye" id="show-password"></i>
                    </div>
                    <div class="form-group contact-forms">
                        <p><input type="checkbox" name="remember" value="rem"> Keep me signed in.</p>
                    </div>
                    <button class="btn btn-block sent-butnn" name="submit" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
    <div class="mydiv2">
        <strong><a href="registration.php">Don't have an account? Create Now.</a></strong>
    </div>

    <script>

        var passwordInput = document.getElementById('Password');
        var showPasswordIcon = document.getElementById('show-password');

        showPasswordIcon.addEventListener('click', function () {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showPasswordIcon.classList.remove('fa-eye');
                showPasswordIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                showPasswordIcon.classList.remove('fa-eye-slash');
                showPasswordIcon.classList.add('fa-eye');
            }
        });

    </script>

</body>

</html>