<?php

session_start();

unset($_SESSION['Admin_ID']);
session_destroy();

echo "<script>alert('Logout Succesfully')</script>";
echo "<script>window.location.href = 'adminlogin.php'</script>";

?>