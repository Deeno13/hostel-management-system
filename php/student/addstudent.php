<?php
$db_host = "localhost";
$db_username = "hostel";
$db_pass = "hostel123";
$db_name = "hostelmanagement";
$conn = mysqli_connect($db_host, $db_username, $db_pass, $db_name) or die ("could not connect");

$stuid = $_POST['stuid'];
$stuname = $_POST['stuname'];
$sturace = $_POST['sturace'];
$stureligion = $_POST['stureligion'];
$stubd = $_POST['stubd'];
$stugender = $_POST['stugender'];
$stuclass = $_POST['stuclass'];
$stuaddress = $_POST['stuaddress'];
$drmnum = $_POST['drmnum'];
$parid = $_POST['parid'];

$sql = "INSERT INTO STUDENT VALUES ('$stuid', '$stuname', '$sturace', '$stureligion', '$stubd', '$stugender', '$stuclass', '$stuaddress', '$drmnum', '$parid');";
mysqli_query($conn, $sql);

header("Location: ../../html/student.html?add=success");
?>