<?php
//******************************************************************************
//******************************************************************************
//*                                                                           **
//*    This script takes the Student back to the School site because he does  **
//*    not agree with the CA DMV Disclaimer                                   **
//*                                                                           **
//******************************************************************************
//*************************v3.0*******************Last Modified: Nov. 04, 2010**

require_once('../includes/GetDMVcookie.inc');
require_once('../includes/conndb.inc');
$sql = "SELECT *
        FROM   schulen
        WHERE  E_SchoolLogin = '$LoginID'";
$result = mysqli_query($conn, $sql);
if (!$result) {
//    echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
    echo "Could not successfully run query ($sql) from DB: ";
    mysqli_close($conn);
    exit;
    }

//                                       if it's 0 it is a student; NOT an error
if (mysqli_num_rows($result) >= 1) {                         // it's now a school
    $Srow = mysqli_fetch_array($result);
    $SchoolName   = $Srow['E_SchoolName'];
    $SchoolNbr    = $Srow['E_DMVSchoolNbr'];
    $websiteShort = $Srow['E_WebSite'];
    $WebSite      = "http://www." . $websiteShort;
   };
mysqli_free_result($result);

//$SchoolName = "A test";
//$WebSite    = "http://www.MyCalDl.com";
?>
<table align="center" bgcolor="red" cellpadding=15 border=15 width="73%">
   <tr>
      <td><font color="FFFFFF">We understand why you feel this way. <br><br>
            As you know, unless we tell government what to do, government will tell us what to do. <br><br>
            There is NO online DE course available in California where you do not have to agree with this CA DMV policy.<br><br>
            <font color="FFDF07"><b>If you find one, please remember, that the course is in violation of the CA DMV regulations and<br>
            <font size=+2><i><u>your Completion Certificate may be rejected by the DMV</u></i></font>
            when you are going to take your written test.<br><br></b></font color>
            Willing to take the risk? <br><br>
            If not, go back and agree with the CA DMV policy.</font>
      </td>
   </tr>

</table>

<?php
//print "1.) $WebSite";
//exit;
?>
  <p align= "center" </p>
<form method="post" action="CA_DMV_Disclaimer.php">
     <input type="submit" value="Please take me back">
</form>
