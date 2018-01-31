<?php
session_start();

if (isset($_SESSION['errorMessages'])){
  unset($_SESSION['errorMessages']);
}

if (isset($_GET["page"])){
  switch ($_GET["page"]){
    case 'homepage':
    //header('location: http://localhost:82/PHP-Final-Project-Chat/index.php');
    //header('location: http://localhost/PHP-Final-Project-Chat/index.php');
    header('location: http://voyd.sytes.net:8080/index.php');
    break;

    case 'signup':
    //header('location: http://localhost:82/PHP-Final-Project-Chat/src/view/signup.php');
    //header('location: http://localhost/PHP-Final-Project-Chat/src/view/signup.php');
    header('location: http://voyd.sytes.net:8080/src/view/signup.php');
    break;

    case 'login':
    //header('location: http://localhost:82/PHP-Final-Project-Chat/src/view/login.php');
    //header('location: http://localhost/PHP-Final-Project-Chat/src/view/login.php');
    header('location: http://voyd.sytes.net:8080/src/view/login.php');
    break;

    case 'chatroom':
        //header('location: http://localhost:82/PHP-Final-Project-Chat/src/view/chatroom.php?user='. $_SESSION['username'] .'&friend=' . $_GET['friend']);
        //header('location: http://localhost:82/PHP-Final-Project-Chat/src/view/chatroom.php?user='. $_SESSION['username'] .'&friend=' . $_GET['friend']);
        header('location: http://voyd.sytes.net:8080/src/view/chatroom.php?user=' . $_SESSION['username'] .'&friend=' . $_GET['friend']);
        break;

    case 'logout':
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
    header('location: http://voyd.sytes.net:8080/src/controller/logout.php');
    break;
  }
}
