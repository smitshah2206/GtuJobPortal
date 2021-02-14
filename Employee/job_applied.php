<?php
 $titlename = "Job Applied";
 include 'header.php';
 if(isset($_GET['post_id'])){
  $id = $_GET['post_id'];
  if(employee_job_applied($conn,$id,$_SESSION['id'])){
    $msg = 'Job Applied Successfully.!';
    $link = 'index.php';
    redirect_link($msg,$link);
  }else{
    $msg = 'Something went wrong';
    $link = 'index.php';
    redirect_link($msg,$link);
  }
}else{
  $link = 'index.php';
  redirect_link('',$link);
}
?>