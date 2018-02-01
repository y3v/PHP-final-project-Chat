<?php
session_start();
// $path = "localhost:82/PHP-Final-Project-Chat";
$path = 'voyd.sytes.net:8080';

if (isset($_SESSION['errorMessages'])){
  unset($_SESSION['errorMessages']);
}

if (isset($_GET["page"])){
  switch ($_GET["page"]){
    case 'Homepage':
    //header('location: http://localhost:82/PHP-Final-Project-Chat/index.php');
    //header('location: http://localhost/PHP-Final-Project-Chat/index.php');
    header('location: http://'. $path .'/index.php');
    break;

    case 'Signup':
    //header('location: http://localhost:82/PHP-Final-Project-Chat/src/view/signup.php');
    //header('location: http://localhost/PHP-Final-Project-Chat/src/view/signup.php');
    header('location: http://'. $path .'/src/view/signup.php');
    break;

    case 'Login':
    //header('location: http://localhost:82/PHP-Final-Project-Chat/src/view/login.php');
    //header('location: http://localhost/PHP-Final-Project-Chat/src/view/login.php');
    header('location: http://'. $path .'/src/view/login.php');
    break;

    case 'chatroom':
        //header('location: http://localhost:82/PHP-Final-Project-Chat/src/view/chatroom.php?user='. $_SESSION['username'] .'&friend=' . $_GET['friend']);
        //header('location: http://localhost:82/PHP-Final-Project-Chat/src/view/chatroom.php?user='. $_SESSION['username'] .'&friend=' . $_GET['friend']);
        header('location: http://'. $path .'/src/view/chatroom.php?user=' . $_SESSION['username'] .'&friend=' . $_GET['friend']);
        break;

    case 'Logout':
    /*if (isset($_SESSION['username'])){
      if (isset($_COOKIE[session_name()])){
        setcookie(session_name(), '', time()-3600, '/');
      }
      session_unset();
      session_destroy();
    }
    */
    //header('location: http://localhost:82/PHP-Final-Project-Chat/src/controller/logout.php');
    //header('location: http://localhost/PHP-Final-Project-Chat/src/controller/logout.php');
    header('location: http://'. $path .'/src/controller/logout.php');
    break;
  }
}
