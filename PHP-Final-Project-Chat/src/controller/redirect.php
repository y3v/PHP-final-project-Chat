<?php
session_start();

if (isset($_SESSION['errorMessages'])){
  unset($_SESSION['errorMessages']);
}

if (isset($_GET["page"])){
  switch ($_GET["page"]){
    case 'homepage':
    header('location: ../../index.php');
    break; 

    case 'signup':
    header('location: ../view/signup.php');
    break;

    case 'login':
    header('location: ../view/login.php');
    break;

    case 'logout':
    if (isset($_SESSION['username'])){
      if (isset($_COOKIE[session_name()])){
        setcookie(session_name(), '', time()-3600, '/');
      }
      session_unset();
      session_destroy();
    }
    header('location: index.php');
    break;
  }
}
