<?php
require_once "global_actions.php";
require_once "user_service.php";
session_start();
session_unset();

$errorMessages = [];

if (isset($_POST['login'])){

  $validation = true;

  if (empty(trim($_POST['uname']))){
    $validation = false;
    $GLOBALS['errorMessages']['uname'] = 'Enter your username.';
  }

  if (empty(trim($_POST['pword']))){
    $validation = false;
    $GLOBALS['errorMessages']['pword'] = 'Invalid password.';
  }

  if ($validation){
    $user = getUserByLogin($_POST['uname'],$_POST['pword']);
    if ($user != false){
      session_regenerate_id();
      session_name($_COOKIE['PHPSESSID']);
      $_SESSION['username'] = $user->getUsername();
      $_SESSION['userId'] = $user->getId();
      $_SESSION['isLoggedIn'] = true;

      // to run an update;
      $user->setIsLoggedOn(true);
      $userEntityManager->flush();

      header('location: http://localhost:8000/index.php');
    }
    else{
      $GLOBALS['errorMessages']['loginError'] = 'Invalid username or password match';
      $_SESSION['errorMessages'] = $GLOBALS['errorMessages'];
      header('location: PHP-Final-Project-Chat/src/view/login.php');
    }
  }
  else {
    $_SESSION['errorMessages'] = $GLOBALS['errorMessages'];
    header('location: PHP-Final-Project-Chat/src/view/login.php');
  }
}
else if (isset($_GET['userId'])){
  $user = getUserById($_GET['userId']);

  if ($user != false){
    session_regenerate_id();
    session_name($_COOKIE['PHPSESSID']);
    $_SESSION['username'] = $user->getUsername();
    $_SESSION['userId'] = $user->getId();
    $_SESSION['isLoggedIn'] = true;

    // to run an update;
    $user->setIsLoggedOn(true);
    $userEntityManager->flush();

    header('location: PHP-Final-Project-Chat/index.php');
  }
  else {
    $GLOBALS['errorMessages']['loginError'] = 'There was an error logging you in. Please try again later.';
    $_SESSION['errorMessages'] = $GLOBALS['errorMessages'];
    header('location: PHP-Final-Project-Chat/src/view/login.php');
  }
}
