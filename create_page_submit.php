<?php 
if(!isset($_SESSION)){
session_start();
}
?>
<?php
 include("../MYCMS/includes/session.php");
include("../MYCMS/database/connection.php");
include("../MYCMS/database/function.php");

if (isset($_POST['create'])) {
   $id = $_SESSION['id'];
   $title = $_POST['menu'];
   $rank = (int) $_POST['rank'];
   $body = $_POST['body'];
   $pragraph = $_POST['p'];
   $visible = (int) $_POST['myradio'];
   $title1 = mysqli_real_escape_string($conn ,$title);
   $body1 = mysqli_real_escape_string($conn ,$body);
   $pragraph1 = mysqli_real_escape_string($conn ,$pragraph);

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        redirect('create_page.php');
    }

   $sql = "INSERT INTO `posts`(`item_name_id`, `rank`, `title`,  `body`, `p`, `visible`) VALUES 
   ({$id},'{$rank}','{$title1}','{$body1}','{$pragraph1}',{$visible})";

   if (mysqli_query($conn ,$sql) && mysqli_affected_rows() > 0) {
      $_SESSION['msg'] = success_msg_page();
      redirect("manage_content.php");
   }else {
      $_SESSION['msg'] = failed_msg_page();
      redirect("create_page.php");
   }
}