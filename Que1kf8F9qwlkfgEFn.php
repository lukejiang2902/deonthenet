<HTML>
<HEAD>
<TITLE>DE Student Questionaire v4.1</TITLE>
<script language="JavaScript" type="text/JavaScript" src="js/DE-SS-regv41.js"></script>
</HEAD>
<BODY oncontextmenu="return false;">
<noscript>
<h2><font color="red">JavaScript has been disabled or your browser does not support Javascript.</font></h2>
<h2>Please enable Javascript before continuing!</h2>
</noscript>

<?php
//******************************************************************************
//    This script sets the indicators to show the student has passed the       *
//    final quiz and sends an e-mail to the driving school                     *
//                                                                             *
//*********************************************Last Modified: July. 17, 2011 ***
require_once('../includes/GetDMVcookie.inc');

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! Start testing only !!!!!!!!!!!!!!!!!!!!!!!
//$SchoolNbr     = 'NV9991';
//$SchoolName    = 'Some School Name';
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! End Testing only !!!!!!!!!!!!!!!!!!!!!!

?>

<font face=Arial>
<form name="newStud" method="post" action="Que2kf8F9pwlkfqEFm.php">

<table width="93%" align="center" cellspacing=0 cellpadding=5 border=2>

      <table font face=Arial width="90%" align="center" cellspacing=0 cellpadding=2 border=5 bordercolor="#B7B7B7" bgcolor="#F1F1F0">
         <tr>
            <td colspan="2" align="center"><font color="4a2885" size="5"><b>Your Opinion matters</b></font>
               <font color="4a2885" size="1">(v4.1)</font></td>
         </tr>
         <tr>
            <td colspan="2" align="center"><font color="4a2885" size="4"><i>Thanks for choosing</i></font><br>
            <img src="../images/DEN_02.gif"><br>
            <font color="4a2885" size="2"><br>You are almost done but first, tell us about what you think of our course!<br>
            This questionaire must be filled out before you can take the Final Test.<br><br>
            Please do not simply hit the button below - your opinion matters!</font><br><br></td>
         </tr>
         <font color="4a2885">
         <tr>
            <td align="right"><font size=4 color="#4A4A4A"> How did you like the course?</font><br></td>
            <td colspan="0"><select name="ans1" size=1 maxlength=1>
                                <option selected value="10">10 - loved it</option>
                                <option value="9">9 - outstanding</option>
                                <option value="8">8 - excellent</option>
                                <option value="7">7 - very good</option>
                                <option value="6">6 - good</option>
                                <option value="5">5 - was OK</option>
                                <option value="4">4 - was barely OK</option>
                                <option value="3">3 - fair</option>
                                <option value="2">2 - poor</option>
                                <option value="1">1 - terrible</option>
                                </select><br></td>
         </tr>
         <tr>
            <td align="right"><font size=4 color="#4A4A4A">Did the Audio help you to understand the subject?<br></td>
            <td colspan="0"><select name="ans2" size=1 maxlength=1>
                                <option selected value="1">Yes</option>
                                <option value="2">No</option>
                                </select><br></td>
         </tr>
         <tr>
            <td align="right"><font size=4 color="#4A4A4A"> Did you Listen only, Read only, both? </font> </td>
            <td colspan="0"><select name="ans3" size=1 maxlength=1>
                                <option value="1">Listened only</option>
                                <option value="2">Read only</option>
                                <option selected value="3">Listened and Read</option>
                                </select><br></td>
         </tr>
        <tr>
            <td align="right"><font size=4 color="#4A4A4A"> Would you like more visual explanations? </font> </td>
            <td colspan="0"><select name="ans4" size=1 maxlength=1>
                                <option selected value="1">Yes</option>
                                <option value="2">No</option>
                                </select><br></td>
         </tr>
         <tr>
            <td align="right"><font size=4 color="#4A4A4A"> Would you recommend our course to your friends? </font></td>
            <td colspan="2"><select name="ans5" size=1 maxlength=1>
                                <option selected value="1">Yes</option>
                                <option value="2">No</option>
                                </select><br></td>
         </tr>
         <tr>
            <td align="right"><font size=4 size=4 color="#4A4A4A">Looking back, would you have preferred to take the course in a classroom? </font></td>
            <td colspan="2"><select name="ans6" size=1 maxlength=1>
                                <option value="1">Yes</option>
                                <option selected value="2">No</option>
                                </select><br></td>
         </tr>
     <tr>
        <td valign=top align="right"><font size=4 color="#4A4A4A">Your Comments </font></td>
        <td colspan="2"><Textarea id="comment" name="comment" ROWS=10 COLS=33 WRAP value=""></Textarea></td>
    </tr>

         <tr>
            <td colspan="2" align="center"><input type="submit" name="submit" value="OK, here is my valued opinion"></td>
         </tr>
      </table>
</table>
</FORM>
</BODY>
</HTML>
