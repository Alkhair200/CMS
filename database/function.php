<?php

$errors = array();
function redirect($URL){
    header("Location: " . $URL);
    exit();
}

function check_visible($data)
{
    global $errors;
    if (!isset($data)) {
        $errors['radio'] = "please check visible yes or no!";
    }
}

function check_input($data)
{
    $data = str_replace("_" ,"" ,$data);
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlentities($data);
    $data = htmlspecialchars($data);
    $data = ucfirst($data);
    return $data;
}

function check_lengh($data ,$max ,$min){
     global $errors;
  if (strlen($data) > $max) {
     $errors['long'] = "input is long maximum is 12 char (4 min)";
  }elseif (strlen($data) < $min) {
     $errors['short'] = "input is too short minimum is 4 char (max 12)";
  }else {
      return $data;
  }
}

function check_empty($data)
{
    global $errors;
    trim($data);
    if (isset($data) === true && $data === '') {
       $errors['empty'] = "failed is empty!";
    }else {
        return $data;
    }
}
function check_content($data)
{
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function error_function($errors = array())
{
    if (!empty($errors)) {  
    foreach ($errors as $key => $value) {
       echo "<div class='alert alert-warning alert-dismissible'>";
       echo "<a href='#' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></a>";
       echo "<strong>warning!</strong> $value";
       echo "</div>";
    }
 }
}
error_function($errors);

function success_msg_menu(){
    $msg = "<div class='alert alert-success alert-dismissible'>";
    $msg.= "<a href='#' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></a>";
    $msg.= "<strong>Success!</strong> Record Created Successfully.";
    $msg.= "</div>"; 
    return $msg;
}
    
function error_msg_menu(){
    $msg = "<div class='alert alert-warning alert-dismissible'>";
    $msg.= "<a href='#' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></a>";
    $msg.= "<strong>warning!</strong> Sorry Record Not Created.";
    $msg.= "</div>";
    return $msg;
}

function success_msg_menu_updated(){
    $msg = "<div class='alert alert-success alert-dismissible'>";
    $msg.= "<a href='#' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></a>";
    $msg.= "<strong>Success!</strong> Record updated Successfully.";
    $msg.= "</div>"; 
    return $msg;
}
function error_msg_menu_updated(){
    $msg = "<div class='alert alert-warning alert-dismissible'>";
    $msg.= "<a href='#' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></a>";
    $msg.= "<strong>warning!</strong> Sorry Record Not Updated.";
    $msg.= "</div>";
    return $msg;
}
function failed_delete_menu(){
    $msg = "<div class='alert alert-warning alert-dismissible'>";
    $msg.= "<a href='#' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></a>";
    $msg.= "<strong>warning!</strong>Failed delete menu.";
    $msg.= "</div>";
    return $msg;
}
function success_delete_menu(){
    $msg = "<div class='alert alert-success alert-dismissible'>";
    $msg.= "<a href='#' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></a>";
    $msg.= "<strong>success!</strong>Deleted successfully.";
    $msg.= "</div>";
    return $msg;
}
function success_msg_page(){
    $msg = "<div class='alert alert-success alert-dismissible'>";
    $msg.= "<a href='#' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></a>";
    $msg.= "<strong>success!</strong>Create page successfully.";
    $msg.= "</div>";
    return $msg;
}
function failed_msg_page(){
    $msg = "<div class='alert alert-warning alert-dismissible'>";
    $msg.= "<a href='#' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></a>";
    $msg.= "<strong>warning!</strong>Failed create page.";
    $msg.= "</div>";
    return $msg;
}