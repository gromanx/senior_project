<?php 
$username=$_POST['username'];
$password=$_POST['pass'];
$phonenumber=$_POST['phonenumber'];
$hashpwd = password_hash($password, PASSWORD_DEFAULT);
echo "<script>console.log($hashpwd)</script>";
$realname=$_POST['realname'];
$phonenumber=$_POST['phonenumber'];

$link=mysqli_connect("96.44.135.40","valkyrie_005781551","GiKC4-2OTwok","valkyrie_scrambeledlegs");
if($_POST['submit']){
        $$sqlsearch = mysqli_query($link,"select * from Authentication where Email='$username'");
	$seresult = $sqlsearch;
	if($seresult){
                echo "<script>alert('user already exist');window.location= 'index.php';</script>";
        }
        else{
                if(mysqli_query($link,"insert into Authentication(Email,Password,register_date) values('$username','$hashpwd',NOW())")){
                        setcookie("uname",$username,time()+7200);
                        echo "<script>alert('successfully');window.location= 'index.php';</script>";
                }
                else {
                        echo "<script>alert('failed, here');history.go(-1)</script>";
                }
        }
}
include('register.html');
?>
