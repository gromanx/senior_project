<?php  
$username=$_POST['username'];
$password=$_POST['pass'];
$code==$_POST['authcode'];
$link=mysqli_connect("96.44.135.40","valkyrie_005781551","GiKC4-2OTwok","valkyrie_scrambeledlegs");
$query=mysqli_query($link,"SELECT Email,Password FROM Authentication WHERE Email = '$username'");
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_array($query);
$hashpwd = $row['Password']; 
if (isset($_REQUEST['authcode'])) {
  session_start();
  if($_POST['submit']){  
    if($username==""||$password==""){
      echo "<script>alert('Please input Password and Email');</script>";
    }
    else{ 
      if($row['Email']==$username && password_verify($password, $hashpwd) && strtolower($_REQUEST['authcode'])==$_SESSION['authcode']){
        setcookie('uname',$username,time()+7200);
        $_SESSION['username']=$username;
        header("Location:map.php");
      }
      else {
        if(strtolower($_REQUEST['authcode'])==$_SESSION['authcode']){
          echo "<script>alert('Email or Password wrong');history.go(-1)</script>";
        }
        else{
          echo "<script>alert('incorrect security code');history.go(-1)</script>";
        }    
      }
    }
  }     
}
include('login.html');
?>
