<?php session_start()?>
<?php 
include("../MYCMS/includes/session.php");
include("../MYCMS/database/function.php");
include("../MYCMS/database/connection.php");

    $id_page = (int) $id_page;
    if (!empty($errors)) {
        redirect("delete_menu.php");
    }

    $sql = "DELETE FROM `page` WHERE id = {$id_menu} LIMIT 1";

    $result = mysqli_query($conn ,$sql);
    if ($result && mysqli_affected_rows($conn) > 0) {

        $_SESSION['msg'] = success_delete_menu();
        redirect("manage_content.php");
    }else {
         $_SESSION['msg'] = failed_delete_menu();
        redirect("delete_menu.php");  
     }
