<?php
session_start();
require_once "global_actions.php";
require_once "user_service.php";
//$path = "localhost:82/PHP-Final-Project-Chat";
$path = 'voyd.sytes.net:8080';


if (isset($_SESSION['username']) && isset($_SESSION['userId'])){
  if (isset($_COOKIE[session_name()])){
    setcookie(session_name(), '', time()-3600, '/');
  }

  $user = getUserById($_SESSION['userId']);

  // to update isLoggedOn to false;
  if ($user != false){
    $user->setIsLoggedOn(false);
    $userEntityManager->flush();
  }
  else {
    // error message maybe?;
  }
  session_unset();
  session_destroy();
}
//header('location: http://localhost:82/PHP-Final-Project-Chat/index.php');
//header('location: http://localhost:82/PHP-Final-Project-Chat/index.php');
header('location: http://'. $path .'/index.php');
