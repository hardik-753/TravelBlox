<?php

require_once("database.php");

session_start();
if (!isset($_SESSION['uid'])) {
  echo "<script>alert('Pls Login First')</script>";
  echo "<script>window.location.href = 'login.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome to Chat App</title>

  <!-- css files -->
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
  <!-- bootstrap css -->
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <!-- custom css -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- fontawesome css -->
  <!-- //css files -->

  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
    rel="stylesheet" />
  <link
    href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet" />
  <!-- //google fonts -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

  <style>
    body {
      text-align: center;
    }

    /* Form container styles */
    #create-group-form,
    #join-group-form {
      display: none;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 20px;
      margin: 20px auto;
      max-width: 300px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .myh2 {
      font-size: 18px;
      margin-bottom: 10px;
    }

    .mylabel {
      display: block;
      margin-bottom: 5px;
    }

    .myinput {
      width: 90%;
      padding: 5px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      cursor: pointer;
    }

    /* Buttons to toggle forms */
    button.select-option {
      margin: 10px;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .title {
      text-align: center;
      padding: 5px;
      margin: auto;
      margin: 15px;
    }

    .title h1 {
      background-color: #007bff;
      color: #fff;
      padding: 20px;
      margin: 0;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }

    .mydiv {
      width: 90%;
      /* border: 2px solid red; */
      margin: auto;
      padding: 10px;
      text-align: center;
    }
  </style>

</head>

<body>

  <!-- header -->
  <?php
  $currentPage = '';
  require_once("header.php");
  ?>
  <!-- //header -->

  <!-- banner -->
  <section class="banner_inner" id="home">
    <div class="banner_inner_overlay">
    </div>
  </section>
  <!-- //banner -->

  <section class="py-5 mysec">

    <div class="title">
      <h1>Welcome to Group Chat</h1>
    </div>

    <!-- Create a New Group Form -->
    <div id="create-group-form" style="display: block">
      <h2 class="myh2">Create a New Group</h2>
      <form action="create_group.php" method="post">

        <label for="group-name" class="mylabel">Group Name:</label>
        <input type="text" id="group-name" name="group-name" class="myinput" required />

        <label for="user-number" class="mylabel">Your Mobile No:</label>
        <input type="number" id="user-number" oninput="this.value = this.value.slice(0, 10);" name="user-number"
          class="myinput" required />
        <button type="submit" name="submit">Create Group</button>

      </form>
    </div>

    <!-- Join an Existing Group Form -->
    <div id="join-group-form" style="display: none">
      <h2 class="myh2">Join an Existing Group</h2>

      <form action="chat.html" method="post">
        <label for="group-code" class="mylabel">Group Code:</label>
        <input type="text" id="group-code" name="group-code" class="myinput" required />

        <label for="user-number" class="mylabel">Your Mobile No:</label>
        <input type="number" id="user-number" oninput="this.value = this.value.slice(0, 10);" name="user-number"
          class="myinput" required />
        <button type="submit" name="submit">Join Group</button>

      </form>
    </div>

    <div class="mydiv">
      <!-- Buttons to toggle forms -->
      <p>Please select an option:</p>
      <button onclick="showCreateGroupForm()">Create a New Group</button>
      <button onclick="showJoinGroupForm()">Join an Existing Group</button>
    </div>

  </section>

  <script>
    function showCreateGroupForm() {
      document.getElementById("create-group-form").style.display = "block";
      document.getElementById("join-group-form").style.display = "none";
    }

    function showJoinGroupForm() {
      document.getElementById("create-group-form").style.display = "none";
      document.getElementById("join-group-form").style.display = "block";
    }

  </script>

  <!-- footer -->
  <?php
  include("footer.php");
  ?>
  <!-- //footer -->

</body>

</html>