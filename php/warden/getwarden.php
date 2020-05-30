<?php
$db_host = "localhost";
$db_username = "hostel";
$db_pass = "hostel123";
$db_name = "hostelmanagement";
$conn = mysqli_connect($db_host, $db_username, $db_pass, $db_name) or die ("could not connect");

if (isset($_POST['submit-getwar'])) {
    $search = mysqli_real_escape_string($conn, $_POST['getwar']);
    $sql = "SELECT * FROM WARDEN WHERE WAR_ID='$search';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        $row = mysqli_fetch_assoc($result);
        $wrid = $row['WAR_ID'];
        $wrnm = $row['WAR_NAME'];
        $wrrc = $row['WAR_RACE'];
        $wrrl = $row['WAR_RELIGION'];
        $wrgn = $row['WAR_GENDER'];
        $wrct = $row['WAR_CONTACT'];
        $wrad = $row['WAR_ADDRESS'];
        $hsid = $row['HOS_ID'];

        echo "<h2> WARDEN DETAILS </h2>";
        echo "<form action='../php/warden/updatewarden.php' method='POST'>";
        echo "Warden ID: {$wrid} <br>";
        echo "<input type='hidden' name='wrid' value={$wrid}>";
        echo "Name     : <input type='text' value={$wrnm} name='wrnm'> <br>
              Race     : <input type='text' value={$wrrc} name='wrrc'> <br>
              Religion : <input type='text' value={$wrrl} name='wrrl'> <br>
              Gender   : <input type='text' value={$wrgn} name='wrgn'> <br>
              Contact  : <input type='text' value={$wrct} name='wrct'> <br>
              Address  : <input type='text' value={$wrad} name='wrad'> <br>
              Hostel ID: <input type='text' value={$hsid} name='hsid'> <br>";
        echo "<button type='submit' name='submit-update'>Update</button>";
        echo "<button type='submit' name='submit-delete'>Delete</button>";
        echo "</form>";
    } else {
        echo "<script type ='text/javascript'>alert('There are no results matching your search');
        location = '../../html/warden.html?search=failed'</script>";
    }
}
?>