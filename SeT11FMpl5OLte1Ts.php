<?php
//******************************************************************************
//    This script sets the indicators to show the student has passed the       *
//    quiz for lesson 10 and moves him to fill out the questionaire            *
//                                                                             *
//*********************************************Last Modified: July. 22, 2011 ***

//there is no lesson 11. The Final Test is used as Lesson 11
$currLesson = "11";
$nextChapter = "11";
require_once('../includes/SetLesson.inc');
$TestNbr    = '910 ';
$Result     = 'P';
require_once('../includes/SetQuizResult.inc');
header("Location: Que0kf8F9pwikfpEFm.php");
?>
