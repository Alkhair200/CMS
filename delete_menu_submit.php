<?php session_start()?>
<?php 
include("../MYCMS/includes/session.php");
include("../MYCMS/database/function.php");
include("../MYCMS/database/connection.php");

$id_menu = mysqli_real_escape_string($conn ,$_GET['menu']);
$query = "SELECT * FROM `posts` WHERE `posts`.`item_name_id`=".$id_menu;
$result1 = mysqli_query($conn ,$query);

if (mysqli_num_rows($result1) > 0) {
    $_SESSION['msg'] = failed_delete_menu();
    redirect("delete_menu.php");
}else {
    $id_menu = (int) $id_menu;
    if (!empty($errors)) {
        redirect("delete_menu.php");
    }

    $sql = "DELETE FROM `web_navbar` WHERE id = {$id_menu} LIMIT 1";

    $result = mysqli_query($conn ,$sql);
    if ($result && mysqli_affected_rows($conn) > 0) {

        $_SESSION['msg'] = success_delete_menu();
        redirect("manage_content.php");
    }else {
         $_SESSION['msg'] = failed_delete_menu();
        redirect("delete_menu.php");  
     }
}