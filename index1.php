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
  $rank = $_POST['rank'];
  $body = $_POST['body'];
  $p = $_POST['p'];


  echo $id;
}