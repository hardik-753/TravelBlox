<?php
require_once("database.php");
session_start();
if (!isset($_SESSION["uid"])) {
    header("location:login.php");
} else {
    $uid = $_SESSION["uid"];
}
// Define the generateGroupCode function
function generateGroupCode($length = 6)
{
    $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $code = "";

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, strlen($characters) - 1);
        $code .= $characters[$randomIndex];
    }

    return $code;
}

if (isset($_POST['submit'])) {
    $GroupName = $_POST['group-name'];
    $CreatorNumber = $_POST['user-number'];

    $groupCode = generateGroupCode();

    $query = "INSERT into chatgroup (GroupName, CreatorNumber, Code) values ('$GroupName', $CreatorNumber, '$groupCode')";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_affected_rows($con) == 1) {

        $notificationMessage = "You Create A \"$GroupName\" Group and The Group Code Is \"$groupCode\"";
        $insertNotificationQuery = "INSERT INTO notification (User_ID, Message) VALUES ($uid, '$notificationMessage')";
        mysqli_query($con, $insertNotificationQuery);
        echo "<script>alert('Group Created And You Can See The Group Code In Your Profile Notification Tab')</script>";
        echo "<script>window.location.href = 'chat-app/MyGroup/index.html'</script>";

    } else {
        echo "Error: " . mysqli_error($con); // Display the error message for debugging
    }
}
?>
