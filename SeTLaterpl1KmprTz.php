<?php
$currLesson = "1";
$nextChapter = "1Q";
require_once('../includes/SetLesson.inc');
$TestNbr    = '001A';
$Result     = 'C';
require_once('../includes/SetQuizResult.inc');
// old version: header("Location: LS0139x4KM17S/qwzA309fgvQWnyq99eisj/QZ017dDg84qT583\Quiz Unit 01 - output\quizmaker.html");
// (April 25, 2011) version 9 new path:
// header("Location: LS0139x4KM17S/qwzA309fgvQWnyq99eisj/QZ017dDg84qT583/Quiz Unit 01 - Quizmaker output/quiz.html");
print "<h1><i>Please close your Browser!</i></h1>";
print "<h3>When you login next time at your Driving School website, you will be able to take the test for Lesson 1 and continue.</h3>";
print "<h3>Remember, whenever you <font color='red'>fail a test</font>, you will need to study the entire lesson again.</h3>";
print "<h3>You cannot continue until you pass the Lesson Test!</h3>";
print "<h2>This pertains to all lessons!</h2>";
?>
