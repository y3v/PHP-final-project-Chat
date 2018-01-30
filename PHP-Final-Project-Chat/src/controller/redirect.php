<?php
session_start();

if (isset($_SESSION['errorMessages'])){
  unset($_SESSION['errorMessages']);
}

if (isset($_GET["page"])){
  switch ($_GET["page"]){
    case 'homepage':
    header('location: http://localhost/PHP-Final-Project-Chat/index.php');
    break; 

    case 'signup':
    header('location: http://localhost/PHP-Final-Project-Chat/src/view/signup.php');
    break;

    case 'login':
    header('location: http://localhost/PHP-Final-Project-Chat/src/view/login.php');
    break;

    case 'logout':
    if (isset($_SESSION['username'])){
      if (isset($_COOKIE[session_name()])){
        setcookie(session_name(), '', time()-3600, '/');
      }
      session_unset();
      session_destroy();
    }
    header('location: http://localhost/PHP-Final-Project-Chat/index.php');
    break;
  }
}
