<?php 
session_start();
ob_start();
$buffer=ob_get_contents();
ob_end_clean();

$link=mysqli_connect("96.44.135.40","valkyrie_005781551","GiKC4-2OTwok","valkyrie_scrambeledlegs");
$query=mysqli_query($link,"SELECT Username,Password FROM UserData WHERE Username = '$username'");

$query=mysqli_query($link,"SELECT Post_ID,Password FROM Posts WHERE Image = '$post_ID'");
$query=mysqli_query($link,"SELECT Post_ID,Password FROM Posts WHERE Image = '$image'");
$query=mysqli_query($link,"SELECT Post_ID,Password FROM Posts WHERE Video = '$video'");
$query=mysqli_query($link,"SELECT Post_ID,Password FROM Posts WHERE Image = '$iconReaction'");
$query=mysqli_query($link,"SELECT Post_ID,Password FROM Posts WHERE Image = '$reactText'");
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_array($query);

$title = 'username';
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer);
include("map.html");

?>
