<?php
//******************************************************************************
//    This script sets the indicators to show the student has passed the       *
//    final quiz and sends an e-mail to the driving school                     *
//                                                                             *
//*********************************************Last Modified: July. 17, 2011 ***

require_once('../includes/GetDMVcookie.inc');
require_once('../includes/conndb.inc');

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
    };

if (mysqli_num_rows($result) >= 1) {
      header("Location: Que0kf8F9pwikfpEFm.php");
    };
/*
 Questions
1 - How did you like the course ?
2 - Did the Audio help to understand the subject ?
3 - Did you Listen only, Read only, both?
4 - Would you like more visual explanations?
5 - Would you recommend the course to your friends?
6 - In retrospect, would you prefer to take the course in a classroom ?

 Answers
1 > 10 - loved it;
    9 - outstanding
    8 - excellent
    7 - very good
    6 - good
    5 - was OK
    4 - was barely OK
    3 - fair
    2 - poor
    1 - terrible
2 > 1 - Yes; 2 - No
3 > 1 - Yes; 2 - No
4 > 1 - Yes; 2 - No
5 > 1 - Yes; 2 - No
9 > comment 10 rows x 33 columns
*/

$ans1 = $_POST['ans1'];
$ans2 = $_POST['ans2'];
$ans3 = $_POST['ans3'];
$ans4 = $_POST['ans4'];
$ans5 = $_POST['ans5'];
$ans6 = $_POST['ans6'];
$comment = $_POST['comment'];

switch ($ans1) {
            case '10':
                     $ans1long = 'loved it';
                     break;
            case '9':
                     $ans1long = 'outstanding';
                     break;
            case '8':
                     $ans1long = 'excellent';
                     break;
            case '7':
                     $ans1long = 'very good';
                     break;
            case '6':
                     $ans1long = 'good';
                     break;
            case '5':
                     $ans1long = 'was OK';
                     break;
            case '4':
                     $ans1long = 'was barely OK';
                     break;
            case '3':
                     $ans1long = 'fair';
                     break;
            case '2':
                     $ans1long = 'poor';
                     break;
            case '1':
                     $ans1long = 'terrible';
                     break;
   };
$ans2long = "Yes";
if ($ans2 == 2) {$ans2long = "No"; };

$ans3long = "Listened and Read";
if ($ans3 == 1) {$ans3long = "Listened only"; };
if ($ans3 == 2) {$ans3long = "Read only"; };

$ans4long = "Yes";
if ($ans4 == 2) {$ans4long = "No"; };

$ans5long = "Yes";
if ($ans5 == 2) {$ans5long = "No"; };

$ans6long = "Yes";
if ($ans6 == 2) {$ans6long = "No"; };


//$SchoolNbr = 'XS9993';
//$LoginID   = '9993FJ340Nk';

$sql = "SELECT *
        FROM   students
        WHERE  S_StudentLogin = '$LoginID'
        AND    S_DMVSchoolNbr = '$SchoolNbr'
        ";
$result = mysqli_query($conn, $sql);
if (!$result) {
//    echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
    echo "Could not successfully run query ($sql) from DB: ";
    mysqli_close($conn);
    exit;
    }

if (mysqli_num_rows($result) == 0) {
    print "System Error Code: Q0S8 - Please call the Adminstrator at DMV-DriversEd.com<br>";
    mysqli_close($conn);
    exit;
    }
if (mysqli_num_rows($result) >= 1) {
   $Srow = mysqli_fetch_array($result);
   $S_NameLast  = $Srow["S_NameLast"];
   $S_eMailAddr = $Srow["S_eMailAddr"];
   };
/* -------------------- Get the School Name, eMail and web address  --------- */

$sql = "SELECT E_SchoolName, E_eMailAddr, E_WebSite
                FROM   schulen
                WHERE  E_DMVSchoolNbr = '$SchoolNbr'";
$result = mysqli_query($conn, $sql);
if (!$result) {
// echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
   echo "Could not successfully run query ($sql) from DB: ";
   mysqli_close($conn);
   exit;
   }
if (mysqli_num_rows($result) >= 1) { /* found the school for the student logging in */
   $Srow = mysqli_fetch_array($result);
   $E_SchoolName = $Srow["E_SchoolName"];
   $E_eMailAddr = $Srow["E_eMailAddr"];
//   $E_WebSite = $Srow["E_WebSite"];
   }
//$rtnWebSite = "http://www.$E_WebSite";
//$_SESSION['rtnWebSite'] = $rtnWebSite;
//

require_once('../includes/sestim.inc');

$sql = "INSERT INTO quest (   Q_DMVSchoolNbr,
                              Q_StudentLogin,
                              Q_Date,
                              Q_ans1,
                              Q_ans2,
                              Q_ans3,
                              Q_ans4,
                              Q_ans5,
                              Q_ans6,
                              Q_comments)
                    values ( '$SchoolNbr',
                             '$LoginID',
                             '$heute',
                             '$ans1',
                             '$ans2',
                             '$ans3',
                             '$ans4',
                             '$ans5',
                             '$ans6',
                             '$comment'
                            )";
$result = mysqli_query($conn, $sql);
if (!$result) {
//      echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
      echo "Could not successfully run query ($sql) from DB: ";
      mysqli_close($conn);
      exit;
        }

/* ------------------------------------------- Close the Connection --------- */
mysqli_close($conn);
/* ----------------------------------- Write Message to school --------- */
/*
$to      = $E_eMailAddr;
$subject = 'Student Questionaire Result';
$message = "School Name: $E_SchoolName\r\n Student (User: $LoginID): $S_NameFirst $S_NameInitial $S_NameLast\r
            How did you like the course ? - $ans1long\r
            Did the Audio help you to understand the subject ? - $ans2long\r
            Did you Listen only, Read only, both? - $ans3long\r
            Would you like more visual explanations? - $ans4long\r
            Would you recommend the course to your friends? - $ans5long\r
            In retrospect, would you prefer to take the course in a classroom ? - $ans6long\r
            Comments: $comment\r";//$headers = 'From: no-reply@DriversEdOnTheNet.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
$mailsend = mail($to, $subject, $message, $headers);
*/
/* ----------------------------------- Write Message to Nevada DMV --------- */
/*$NV_eMailAddr = "elocsin@dmv.nv.gov";

$to      = $NV_eMailAddr;
$subject = 'Student Questionaire Result';
$message = "School Name: $E_SchoolName\r\n Student (User: $LoginID): $S_NameFirst $S_NameInitial $S_NameLast\r
            How did you like the course ? - $ans1long\r
            Did the Audio help you to understand the subject ? - $ans2long\r
            Did you Listen only, Read only, both? - $ans3long\r
            Would you like more visual explanations? - $ans4long\r
            Would you recommend the course to your friends? - $ans5long\r
            In retrospect, would you prefer to take the course in a classroom ? - $ans6long\r
            Comments: $comment\r";
$headers = 'From: no-reply@DriversEdOnTheNet.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
$mailsend = mail($to, $subject, $message, $headers);
*/
/* -------------------------------------- Send to Metro --------- */
$to      = "andrewjiamd860@gmail.com";
$subject = "$SchoolNbr * Questionaire";
$message = "School Name: $E_SchoolName  School e-Mail: $E_eMailAddr\r\n Student (User: $LoginID): e_mail: $S_eMailAddr $S_NameFirst $S_NameInitial $S_NameLast\r
            Date: $heute\r
            How did you like the course ? - $ans1long\r
            Did the Audio help you to understand the subject ? - $ans2long\r
            Did you Listen only, Read only, both? - $ans3long\r
            Would you like more visual explanations? - $ans4long\r
            Would you recommend the course to your friends? - $ans5long\r
            Looking back, would you have preferred to take the course in a classroom ? - $ans6long\r
            Comments: $comment\r";
$headers = 'From: no-reply@DriversEdOnTheNet.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
$mailsend = mail($to, $subject, $message, $headers);
//print "email sent";
//exit;
// CA
header("Location: LS10Z63o9fs0f/qwzA309fgvQWnyq99eisj/QZFN39pqmt4K7A/Final/quiz.html");
?>
