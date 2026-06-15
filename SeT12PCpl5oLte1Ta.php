<?php
//there is no lesson 12. It is used to signal the end of the Final Test for
//capturing the time for the final test
$currLesson = "12";
$nextChapter = "12";
require_once('../includes/SetLesson.inc');

//print "<h1> The END </h1>";
header("Location: ../congrats.php");
?>
