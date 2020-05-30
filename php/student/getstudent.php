<?php
$db_host = "localhost";
$db_username = "hostel";
$db_pass = "hostel123";
$db_name = "hostelmanagement";
$conn = mysqli_connect($db_host, $db_username, $db_pass, $db_name) or die ("could not connect");

if (isset($_POST['submit-getstu'])) {
    $search = mysqli_real_escape_string($conn, $_POST['getstu']);
    $sql = "SELECT * FROM STUDENT WHERE STU_ID='$search';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        $row = mysqli_fetch_assoc($result);
        $stid = $row['STU_ID'];
        $stnm = $row['STU_NAME'];
        $strc = $row['STU_RACE'];
        $strl = $row['STU_RELIGION'];
        $stbd = $row['STU_BIRTHDATE'];
        $stgn = $row['STU_GENDER'];
        $stcl = $row['STU_CLASS'];
        $stad = $row['STU_ADDRESS'];
        $drnm = $row['DRM_NUM'];
        $prid = $row['PAR_ID'];

        echo "<head><style> body {
            background-color: white;
            font-family: Arial, Helvetica, sans-serif;
        }
        
        h1 {
            color: black;
        }
        
        legend {
            text-align: center;
        }
        
        ul {
            list-style-type: none;
            margin: 20px 25px 20px;
            padding: 0;
            overflow: hidden;
            background-color: #333333;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            text-align: center;
        }
        
        li {
            float: left;
        }
        
        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 10px;
            text-decoration: none;
        }
        
        li a:hover:not(.active) {
            background-color: #111111;
        }
        
        .active {
            background-color: #4CAF50;
        }
        
        .dropdown-content {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        
        .dropdown-content a:hover {
            background-color: #ddd;
        }
        
        .dropdown {
            position: relative;
            display: inline-block;
        }
        
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
        
        .dropdown:hover .dropdown-content {display: block;}
        .dropdown:hover {background-color: #3e8e41;}
        </style>
        </head>";
        echo "<h2> STUDENT DETAILS </h2>";
        echo "<form action='updatestudent.php' method='POST'>";
        echo "Student ID: {$stid} <br>";
        echo "<input type='hidden' name='stid' value={$stid}>";
        echo "Name     : <input type='text' value={$stnm} name='stnm'> <br>
              Race     : <input type='text' value={$strc} name='strc'> <br>
              Religion : <input type='text' value={$strl} name='strl'> <br>
              Birthdate: <input type='text' value={$stbd} name='stbd'> <br>
              Gender   : <input type='text' value={$stgn} name='stgn'> <br>
              Class    : <input type='text' value={$stcl} name='stcl'> <br>
              Address  : <input type='text' value={$stad} name='stad'> <br>
              Dorm Num : <input type='text' value={$drnm} name='drnm'> <br>
              Parent ID: <input type='text' value={$prid} name='prid'> <br>";
        echo "<button type='submit' name='submit-update'>Update</button>";
        echo "<button type='submit' name='submit-delete'>Delete</button>";
        echo "</form>";
    } else {
        echo "<script type ='text/javascript'>alert('There are no results matching your search');
        location = '../../html/student.html?search=failed'</script>";
    }
}

?>