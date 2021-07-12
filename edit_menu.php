<?php 
if(!isset($_SESSION)){
session_start();
}
?>
<?php
include("../MYCMS/database/connection.php");
 include("../MYCMS/includes/header.php");
 include("../MYCMS/includes/session.php");
include("../MYCMS/database/function.php");
if (isset($_GET['menu'])) {
    $select_menu_id = $_GET['menu'];
    $select_page_id = NULL;
  
  } elseif (isset($_GET['page'])) {
    $select_page_id = $_GET['page'];
    $select_menu_id = NULL;
    } else {
      $select_menu_id = NULL;
      $select_page_id = NULL;
    }
?>  



<br>
<div class="container">
  <div class="row">
    <div class="col-sm-2">

    </div>
    <div class="col-sm-10">
      <?php echo msg();?>
      <?php $error = err();?>
      <?php error_function($error)?>
    </div>
    </div>
    </div>
<br>
<div class="container">
  <div class="row">
    <div class="col-sm-2">
    <div class="accordion" id="accordionExample">

    <?php 
    $query = "SELECT * FROM `web_navbar` WHERE 1";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)){
      ?>
    <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <a class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree<?php echo $row['id']?>" aria-expanded="false" aria-controls="collapseThree">
          <?php echo $row['item_name']?> <?php echo " (" . $row['id'] .")"?>
        </a>
      </h2>
    </div>
    <div id="collapseThree<?php echo $row['id']?>" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
      <li style="list-style: none;">
         <a href="edit_menu.php?menu=<?php echo $row['id']?>"><h5><?php echo $row['item_name']?></h5></a>
       
         <?php
         $query1 = "SELECT * FROM `posts` WHERE visible = 1 AND `posts`.`item_name_id`=".$row['id'];
         $result1 = mysqli_query($conn ,$query1);
         if (mysqli_num_rows($result1) > 0) {
           while ($row1 = mysqli_fetch_assoc($result1)) {
             ?>
             <ul>
             <a href="edit_menu.php?menu=<?php echo $row['id']?>"></a>
             </ul>

             <ul style="list-style: none;">
             <a href="edit_page.php?page=<?php echo $row1['id']?>"><?php echo $row1['title']?></a>
             </ul>
            
         <?php  }
         } ?>
         </li>
      </div>
    </div>
  </div>
  <?php }} ?>
    </div>
  </div>

    <div class="col-sm-10">
    <div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Tools</h3>
  </div>
  <div class="panel-body">
  <a class="btn btn-danger" href="#" role="button">Create new menu</a>
  <a class="btn btn-danger" href="#" role="button">Create new page</a>
  <a class="btn btn-danger" href="#" role="button">Edit page</a>
  <a class="btn btn-danger" href="#" role="button">Admin</a>
  </div>
</div>
<br>
<?php if (isset($_GET['menu'])) {
    $select_menu_id = $_GET['menu'];
    $_SESSION['id'] = $select_menu_id;       

    $query1 = "SELECT * FROM `web_navbar` WHERE id=" .$select_menu_id;
    $result1 = mysqli_query($conn, $query1);
    if (mysqli_num_rows($result1) > 0) {
    while ($row1 = mysqli_fetch_assoc($result1)){
      ?>
<form method="post" action="edit_menu_submit.php">
  <div class="form-group">
    <label for="exampleFormControlInput1">Menu name: <?php echo $row1['item_name']?></label>
    <input type="text" class="form-control" name="menu" placeholder="<?php echo $row1['item_name']?>">
  </div>
  <div class="form-group">
  <label for="exampleFormControlInput1">Visible</label>

  <?php 
  if ($row1['visible'] == 1) {
   echo '<label><input type="radio" name="myradio" value="1" checked> Yes</label>';
   echo '<label><input type="radio" name="myradio" value="0"> No</label>';

  }else {
      echo '<label><input type="radio" name="myradio" value="1"> Yes </label>';
      echo '<label><input type="radio" name="myradio" value="0" checked> No </label>';

  } ?>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Rank:<?php echo "(". $row1['rank'] .")"?></label>
    <select class="form-control" id="exampleFormControlSelect1" name="rank">
    <?php
    $query = "SELECT  `rank` FROM `web_navbar`";
    $result = mysqli_query($conn ,$query);
      $count = mysqli_num_rows($result); 
        for ($i=1; $i <= $count ; $i++) {
       ?>

          <option value="<?php echo $i?>"><?php echo $i?></option>

     <?php  } ?>
    </select>
  </div>

  <button type="submit" name="update" class="btn btn-outline-success">Update</button>

</form>
    </div>
  </div>
</div>
        <?php } } }?>
<?php include("../MYCMS/includes/footer.php");?>