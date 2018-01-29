<?php

session_start();
require_once "global_actions.php";
//include "src/view/chat.php";

if (isset($_GET["page"])){
  switch ($_GET["page"]){
    case 'homepage':
    header('location: PHP-Final-Project-Chat/index.php');
    break;

    case 'signup':
    header('location: PHP-Final-Project-Chat/src/view/signup.php');
    break;

    case 'login':
    header('location: PHP-Final-Project-Chat/src/view/login.php');
    break;

    case 'logout':
    if (isset($_SESSION['username'])){
      if (isset($_COOKIE[session_name()])){
        setcookie(session_name(), '', time()-3600, '/');
      }
      session_unset();
      session_destroy();
    }
    header('location: PHP-Final-Project-Chat/index.php.php');
    break;
  }
}

if (isset($_POST['signup'])){

}

if (isset($_POST['login'])){
  if (true){ // validate username + password
    // set userid + username in session

    session_name($_COOKIE['PHPSESSID']);
    $_SESSION['username'] = 'paco';
    header('location: PHP-Final-Project-Chat/index.php');
  }
}

if (isset($_POST['logout'])){
  session_destroy();
  header('location: PHP-Final-Project-Chat/index.php');
}
