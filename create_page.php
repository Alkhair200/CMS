<?php 
if(!isset($_SESSION)){
session_start();
}
?>
<?php
 include("../MYCMS/includes/session.php");
include("../MYCMS/database/connection.php");
 include("../MYCMS/includes/header.php");
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
         <a href="create_page.php?menu=<?php echo $row['id']?>"><h5><?php echo $row['item_name']?></h5></a>
       
         <?php
         $query1 = "SELECT * FROM `posts` WHERE `posts`.`item_name_id`=".$row['id'];
         $result1 = mysqli_query($conn ,$query1);
         $row_count = mysqli_num_rows($result1);
             ?>

             <ul style="list-style: none;">
             <?php
             if ($row_count == 0) {
               echo "No Pages". " (". $row_count .")";
             }elseif ($row_count == 1) {
              echo "Page"." (". $row_count .")";
             }else {
              echo "Pages"." (". $row_count .")";
             }
             ?>
             </ul>
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
  <a class="btn btn-danger" href="edit_menu.php" role="button">Edit menu</a>
  <a class="btn btn-danger" href="#" role="button">Edit page</a>
  <a class="btn btn-danger" href="#" role="button">Admin</a>
  </div>
</div>
<br>
<form method="post" action="index1.php">
  <div class="form-group">
    <label for="exampleFormControlInput1">Create page</label>
    <input type="text" class="form-control" name="menu" placeholder="menu name">
  </div>
  <div class="form-group">
  <label for="exampleFormControlInput1">Visible: </label>
  <label><input type="radio" name="myradio" value="1"> Yes</label>
  <label><input type="radio" name="myradio" value="0"> No</label>
  </div>
  <div class="form-group">
  <div class="form-group">
    <label for="exampleFormControlSelect1">Rank:</label>
    <select class="form-control" id="exampleFormControlSelect1" name="rank">
    <?php
    $query = "SELECT  `rank` FROM `posts` WHERE `item_name_id`=".$select_menu_id;
    $result = mysqli_query($conn ,$query);
      $count = mysqli_num_rows($result); 
        for ($i=1; $i <= $count+1 ; $i++) {
       ?>

          <option value="<?php echo $i?>"><?php echo $i?></option>

     <?php  } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Body:</label>
    <textarea class="form-control" name="body" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Pragraph:</label>
    <textarea class="form-control" name="p" rows="3"></textarea>
  </div>

  <button type="submit" name="create" class="btn btn-outline-success">Create</button>

</form>
    </div>
  </div>
</div>


<?php include("../MYCMS/includes/footer.php");?>