<?php
$db_host = "localhost";
$db_username = "hostel";
$db_pass = "hostel123";
$db_name = "hostelmanagement";
$conn = mysqli_connect($db_host, $db_username, $db_pass, $db_name) or die ("could not connect");

if (isset($_POST['submit-update'])) {
    $stid = mysqli_real_escape_string($conn, $_POST['stid']);
    $stnm = mysqli_real_escape_string($conn, $_POST['stnm']);
    $strc = mysqli_real_escape_string($conn, $_POST['strc']);
    $strl = mysqli_real_escape_string($conn, $_POST['strl']);
    $stbd = mysqli_real_escape_string($conn, $_POST['stbd']);
    $stgn = mysqli_real_escape_string($conn, $_POST['stgn']);
    $stcl = mysqli_real_escape_string($conn, $_POST['stcl']);
    $stad = mysqli_real_escape_string($conn, $_POST['stad']);
    $drnm = mysqli_real_escape_string($conn, $_POST['drnm']);
    $prid = mysqli_real_escape_string($conn, $_POST['prid']);

    $sql = "UPDATE STUDENT SET STU_ID='$stid', STU_NAME='$stnm', STU_RACE='$strc', STU_RELIGION='$strl', STU_BIRTHDATE='$stbd', STU_GENDER='$stgn', STU_CLASS='$stcl', STU_ADDRESS='$stad', DRM_NUM='$drnm', PAR_ID='$prid' WHERE STU_ID='$stid';";
    $result = mysqli_query($conn, $sql);
    if ($result > 0) {
        echo "<script type='text/javascript'>alert('Record updated successfully');
        location = '../../html/student.html?update=successful'</script>";
    }
    else {
        echo "<script type='text/javascript'>alert('Erro update failed');
        location = '../../html/student.html?update=successful'</script>";
    }
}
else if (isset($_POST['submit-delete'])) {
    $stid = mysqli_real_escape_string($conn, $_POST['stid']);
    $sql = "DELETE FROM STUDENT WHERE STU_ID='$stid';";
    $result = mysqli_query($conn, $sql);
    if ($result > 0) {
        echo "<script type='text/javascript'>alert('Record deleted successfully');
        location = '../../html/student.html?delete=successful'</script>";
    }
    else {
        echo "<script type='text/javascript'>alert('Error delete failed');
        location = '../../html/student.html?delete=failed'</script>";
    }
}
?>