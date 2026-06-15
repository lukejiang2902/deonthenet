<?php
//******************************************************************************
//    This script sets the indicators to show the student has passed the       *
//    final quiz and sends an e-mail to the driving school                     *
//                                                                             *
//*********************************************Last Modified: July. 22, 2011 ***

require_once('../includes/GetDMVcookie.inc');
require_once('../includes/conndb.inc');

// ********************************************** see if the student is finished
$sql = "SELECT *
        FROM   ststats
        WHERE  U_StudentLogin = '$LoginID'
        AND    U_DMVSchoolNbr = '$SchoolNbr'
        ";
$result = mysqli_query($conn, $sql);
if (!$result) {
//    echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
    echo "Could not successfully run query ($sql) from DB: ";
    mysqli_close($conn);
    exit;
    }
if (mysqli_num_rows($result) == 0) {
    print "System Error Code: Q0S7 - Please call the Adminstrator at DMV-DriversEd.com<br>";
    mysqli_close($conn);
    exit;
    }
$row = mysqli_fetch_array($result);
$U_gotoLesson = $row["U_gotoLesson"];

if ($U_gotoLesson == '12') {
      print "<h2>Remember, you are finished!</h2>";
      mysqli_close($conn);
      exit;
      };

// ********************************************** see if the questionaire exists
$sql = "SELECT *
        FROM   quest
        WHERE  Q_StudentLogin = '$LoginID'
        AND    Q_DMVSchoolNbr = '$SchoolNbr'
        ";
$result = mysqli_query($conn, $sql);
if (!$result) {
//    echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
    echo "Could not successfully run query ($sql) from DB: ";
    mysqli_close($conn);
    exit;
    }

if (mysqli_num_rows($result) >= 1) {      // bypass the questionaire; it's already there
       header("Location: LS10Z63o9fs0f/qwzA309fgvQWnyq99eisj/QZFN39pqmt4K7A/Final/quiz.html");
       mysqli_close($conn);
       exit;
       };
header("Location: Que1kf8F9qwlkfgEFn.php");
?>
