<?php
session_start();
// Database connection
$con = mysqli_connect('localhost', 'root', '', 'mindmapproject');
if (!$con) {
    // $_SESSION['msg'] = "Registration Failed: Unable to connect to database.";
    // header('Location: register.php');
    // exit();
    echo "failed";
}

// Collect data from form
$name = $_POST['Name'];
$username = $_POST['Username'];
$password = $_POST['Password'];
$email = $_POST['Email'];
$phone_number = $_POST['PhoneNumber'];

// Insert data into the database
$sql = "INSERT INTO registration(Name, Username, Password, Email, PhoneNumber) VALUES('$name','$username', '$password', '$email', '$phone_number')";

$res= (mysqli_query($con, $sql));
if(!$res) {
    $_SESSION['msg'] = "Registration Failed: " . mysqli_error($con);
} else {
    $_SESSION['msg'] = "Registration Successful!";
}

// Redirect back to the registration page
header('Location: login.php');
?>