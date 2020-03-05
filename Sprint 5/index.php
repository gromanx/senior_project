<?php 
$flag=0;
//var_dump($_GET);
if(isset($_GET["out"])){
    if($_GET["out"]){
        setcookie('uname','',time()-1);
        $flag=1;    }
}
if($flag!=1){
    $link=mysqli_connect("96.44.135.40","valkyrie_005781551","GiKC4-2OTwok","valkyrie_scrambeledlegs");
    if(isset($_COOKIE['uname'])){
        $name=$_COOKIE['uname'];
        $query=mysqli_query($link,"SELECT Email FROM Users WHERE Email = '$name'");
        $row=mysqli_num_rows($query);
        if($row==1){
            echo "Welcome ".$_COOKIE['uname']."";
            echo '    ';
            echo '<a href="index.php?out=1">logout</a>';
        }
    }else{
        echo  '<a href="login.html">login</a>';
        echo  '    ';
        echo  '<a href="register.html">register</a>';
    }
}
else{
    echo  '<a href="login.html">login</a>';
    echo  '    ';
    echo  '<a href="register.html">register</a>';
}?>
