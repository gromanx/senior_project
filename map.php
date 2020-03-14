<?php 
session_start();
ob_start();
$buffer=ob_get_contents();
ob_end_clean();

$title = $_SESSION['username'];
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer);
include("map.html");
?>
