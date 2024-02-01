<?php

session_start();

unset($_SESSION['uid']);
session_destroy();

echo "<script>alert('Logout Succesfully')</script>";
echo "<script>window.location.href = 'login.php'</script>";

?>