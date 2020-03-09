<?php 
  $Image=$_FILE['image'];
  $Video=$_FILES['video'];

  $link=mysqli_connect("96.44.135.40","valkyrie_005781551","GiKC4-2OTwok","valkyrie_scrambeledlegs");
  $result=mysqli_query($con,$sql);
  $row = mysqli_fetch_array($query);

  if (count($_FILE) > 0) {
      if (is_uploaded_file($_FILE['userImage']['tmp_name'])) {
          require_once "db.php";
          $imgData = addslashes(file_get_contents($_FILE['userImage']['tmp_name']));
          $imageProperties = getimageSize($_FILE['userImage']['tmp_name']);
          
          $sql = "INSERT INTO output_images(imageType ,imageData)
          VALUES('{$imageProperties['mime']}', '{$imgData}')";
          $current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
          if (isset($current_id)) {
            header("Location: listImages.php");
          }
      }
  }

  if (isset($_REQUEST['image']) | isset($_REQUEST['vedio'])){
      session_start();
      if($_FILE['image']){  
        if($Image==""){
          echo "<script>alert('Post must conatin a picture or video');</script>";
        }
        else{ 
          echo "<script>alert('successfully');window.location= 'post.html';</script>";
        }
      }
  }

  include('login.html');
?>
