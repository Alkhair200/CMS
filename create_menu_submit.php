<?php session_start()?>
<?php 
include("../MYCMS/database/connection.php");
include("../MYCMS/includes/session.php");
include("../MYCMS/database/function.php");

if (isset($_POST['create'])) {
    $menu = check_input(check_empty($_POST['menu']));
    $menu = check_lengh($_POST['menu'], 12 ,4);
    $radio = (int) check_visible($_POST['myradio']);
    $rank = (int) $_POST['rank'];
    $menu2 = mysqli_real_escape_string($conn ,$menu);

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        redirect('create_menu.php');
    }


    $sql = "INSERT INTO `web_navbar`(`item_name`, `rank`, `visible`) 
    VALUES ( '{$menu2}','{$rank}',{$radio} ) ";

    if (mysqli_query($conn ,$sql) && mysqli_affected_rows($conn) > 0) {
        $_SESSION['msg'] = success_msg_menu();

       redirect("manage_content.php");
       exit();
    } else {
       $_SESSION['msg'] = error_msg_menu();
        redirect("create_menu.php.php");
    }
    
}else {
    redirect('create_menu.php');
}
?>