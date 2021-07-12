<?php 
if (!isset($_SESSION)) {
    session_start();
}

function msg(){
if (isset($_SESSION['msg'])) {
    $smm = $_SESSION['msg'];

    $_SESSION['msg'] = NULL;
    return $smm;  
}

function err()
{
    if (isset($_SESSION['errors'])) {
        $smm = $_SESSION['errors'];

        $_SESSION['errors'] = NULL;
        return $smm;
    }
}
}
?>
