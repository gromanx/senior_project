<?php 
$username=$_POST['username'];
$password=$_POST['pass'];
$link = mysqli_connect('96.44.135.40','valkyrie_005781551','GiKC4-2OTwok');
$query=mysqli_query($link,"SELECT Email,Password FROM info WHERE Email = '$username'");
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_array($query);
if($_POST['submit']){    
    if($row['Email']==$username &&$row['Password']==$password){
        setcookie('uname',$username,time()+7200);
        echo "<script>alert('successfully');window.location= 'index.php';</script>";
    }
    else echo "<script>alert('failed');history.go(-1)</script>";
}
include('login.html');
?>
