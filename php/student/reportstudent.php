<?php
$db_host = "localhost";
$db_username = "hostel";
$db_pass = "hostel123";
$db_name = "hostelmanagement";
$conn = mysqli_connect($db_host, $db_username, $db_pass, $db_name) or die ("could not connect");

if (isset($_POST['submit-stureport'])) {
    $report = mysqli_real_escape_string($conn, $_POST['stureport']);
    $sql = "SELECT * FROM STUDENT WHERE STU_ID='$report';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        echo "<h2>REPORT</h2>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            Student ID: {$row['STU_ID']} </br>
            Student Name: {$row['STU_NAME']} </br>
            Student Race: {$row['STU_RACE']} </br>
            Student Religion: {$row['STU_RELIGION']} </br>
            Student Gender: {$row['STU_GENDER']} </br>
            Student Class: {$row['STU_CLASS']} </br>
            Student Address: {$row['STU_ADDRESS']} </br>
            Dorm Number: {$row['DRM_NUM']} </br>
            Parent ID: {$row['PAR_ID']} ";
        }
    } else {
        echo "Error in generating report";
    }
}

if (isset($_POST['submit-chrisreport'])) {
/*     $sql = "SELECT COUNT(STU_ID), STU_RELIGION FROM STUDENTS GROUP BY STU_RELIGION WHERE STU_RELIGION='ISLAM';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        echo "<h2>MUSLIM STUDENTS</h2>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            No. of Muslims: "
        }
    } */
/*     $sql = "SELECT COUNT(STU_RELIGION) AS 'TOTAL' FROM STUDENTS WHERE STU_RELIGION='ISLAM';";
    $result = mysqli_query($conn, $sql);
    // $result = mysqli_query($conn, "SELECT COUNT(STU_RELIGION) FROM STUDENTS AS 'TOTAL' WHERE STU_RELIGION='ISLAM';");
    // $count = mysqli_fetch_assoc($result);
    // $total = $count['total'];
    echo mysqli_result($result, 0); 
*/

    $sql = mysqli_query($conn, "SELECT COUNT(STU_RELIGION) AS TOTAL FROM STUDENT WHERE STU_RELIGION='CHRISTIAN';");
    $count = mysqli_fetch_assoc($sql);
    $total = $count['TOTAL'];
    echo "<h1>TOTAL CHRISTIAN STUDENTS</h1>";
    echo "Total: {$total}";
}