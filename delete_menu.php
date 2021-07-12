<?php session_start()?>
<?php 
include("../MYCMS/includes/header.php");
include("../MYCMS/includes/session.php");
include("../MYCMS/database/connection.php");
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
    <br>
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
         <a href="delete_menu.php?menu=<?php echo $row['id']?>"><h5><?php echo $row['item_name']?></h5></a>
       
         <?php
         $query1 = "SELECT * FROM `posts` WHERE visible = 1 AND `posts`.`item_name_id`=".$row['id'];
         $result1 = mysqli_query($conn ,$query1);
         if (mysqli_num_rows($result1) > 0) {
           while ($row1 = mysqli_fetch_assoc($result1)) {
             ?>
             <ul>
             <a href="delete_menu.php?menu=<?php echo $row['id']?>"></a>
             </ul>

             <ul style="list-style: none;">
             <a href="delete_menu.php?page=<?php echo $row1['id']?>"><?php echo $row1['title']?></a>
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
  <a class="btn btn-danger" href="create_menu.php" role="button">Create new menu</a>
  <a class="btn btn-danger" href="#" role="button">Create new page</a>
  <a class="btn btn-danger" href="edit_menu.php" role="button">Edit menu</a>
  <a class="btn btn-danger" href="#" role="button">Edit page</a>
  <a class="btn btn-danger" href="#" role="button">Admin</a>
  </div>
</div>
<br>
<div class="panel panel-default">
  <div class="panel-heading">
  <?php
  if ($select_menu_id) {
    $query = "SELECT * FROM `web_navbar` WHERE id =" .$select_menu_id;
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)){
  
      echo  "     	<table class='table'>   ";
      echo  "     			<thead>   ";
      echo  "     			<tr>   ";
      echo  "     			<th>Menu name  </th>   ";
      echo  "     			<th>Action</th> 		   ";
      echo  "     			</tr>   ";
      echo  "     			</thead>   ";
      echo  "     			<tbody>   ";
      echo  "     			<tr>   ";
      echo  "     			<td><h4>" .  $row['item_name']  .  "</h4></td>   ";
        echo	"              <td> <a class='btn btn-danger ' href='delete_menu_submit.php?menu=". mysqli_real_escape_string($conn,$row["id"]) . " '>Delete</a></td> ";
      echo  "     			</tr>   ";
      echo  "     		</tbody>   ";
      echo  "     			</table>   ";

      $query1 = "SELECT * FROM `posts`  WHERE   `posts`.`item_name_id`= ".$row["id"];
	$result1 = mysqli_query($conn, $query1);
	if (mysqli_num_rows($result1) > 0) {
		while($row1 = mysqli_fetch_assoc($result1)) {
	
 
			
 
echo  "     			<table class='table'>   ";
echo  "     			<thead>   ";
echo  "     			<tr>   ";
echo  "     			<th>Page name  </th>   ";
echo  "     			<th>Action</th> 		   ";
echo  "     			</tr>   ";
echo  "     			</thead>   ";
echo  "     			<tbody>   ";
echo  "     			<tr>   ";
echo  "     			<td>" .  $row1['title']  .  "</td>   ";
echo	"              <td> <a class='btn btn-danger' href='delete_page_submit.php?page=". mysqli_real_escape_string($conn,$row1["id"]) . " '>Delete</a></td> ";
echo  "     			</tr>   ";
echo  "     		</tbody>   ";
echo  "     			</table>   ";
	
	
		}}}}

    echo  "</div>";
    echo  "</div>";
  }?>


</div>
</div>


<!-- <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table> -->




  <!-- <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Product
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Content
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Service
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Business
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Information
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div> -->





   







<?php include("../MYCMS/includes/footer.php");?>