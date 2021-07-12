<?php 
if(!isset($_SESSION)){
session_start();
}
?>
<?php
include("../MYCMS/database/connection.php");
 include("../MYCMS/includes/session.php");
include("../MYCMS/database/function.php");
?>

<?php
if (isset($_POST['update'])) {
   
   $id = $_SESSION['id'];
   $idmenu = (int) $id;
   $menu = check_input(check_empty($_POST['menu']));
   $menu = check_lengh($_POST['menu'], 12 ,4);
   $rank = (int) $_POST['rank'];
   $radio = (int) $_POST['myradio'];
   $menu1 = mysqli_real_escape_string($conn ,$menu);

   if (!isset($_SESSION['errors'])) {
      $_SESSION['errors'] = $errors;
      redirect("edit_menu.php");
   }
   

   $sql = "UPDATE `web_navbar` SET `item_name`='{$menu}',`rank`={$rank},`visible`={$radio} WHERE id={$idmenu}";
   if (mysqli_query($conn, $sql) && mysqli_affected_rows($conn) > 0) {
      
     $_SESSION['msg'] = success_msg_menu_updated();
     redirect("manage_content.php");
   }else {
      $_SESSION['msg'] = error_msg_menu_updated();
      redirect("create_menu.php");
   }

}else {
   redirect("create_menu.php");
}
?>