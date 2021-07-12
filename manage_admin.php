<?php 
include("../MYCMS/includes/header.php");
?>

<div class="container">

<div class="row">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">admins</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Add admin</a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Edit admin</a>
      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Delete admin</a>
    </div>
  </div>
  <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
         <div class="container">
         <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Number</th>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">Password</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
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
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
         </div>
      </div>
      
      
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
      <div class="container-fluid mypad">
 <form action='admin_new.php' method='post'>
  <div class="form-group">
    <label  >First name:</label>
    <input type="text" class="form-control" name="fname">
  </div>
  <div class="form-group">
    <label  >Last name:</label>
    <input type="text" class="form-control" name="lname">
  </div>
  <div class="form-group">
    <label  >Username:</label>
    <input type="text" class="form-control" name="username">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="pwd">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email">
  </div>
 
  <button type="submit" class="btn btn-info" name="submit">Submit</button>
</form>
</div>
      </div>
      
      
      
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
      <div class="container-fluid mypad">
 <form action='admin_new.php' method='post'>
  <div class="form-group">
    <label  >First name:</label>
    <input type="text" class="form-control" name="fname">
  </div>
  <div class="form-group">
    <label  >Last name:</label>
    <input type="text" class="form-control" name="lname">
  </div>
  <div class="form-group">
    <label  >Username:</label>
    <input type="text" class="form-control" name="username">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="pwd">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email">
  </div>
 
  <button type="submit" class="btn btn-info" name="submit">Submit</button>
</form>
</div>
      </div>
      
      
      
      
      
      
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
      <div class="container">
         <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Number</th>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">Password</th>
      <th scope="col">Email</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
      <td>@twitter</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
         </div>
      </div>
      </div>
    </div>
  </div>
</div>
</div>





<?php include("../MYCMS/includes/footer.php");?>