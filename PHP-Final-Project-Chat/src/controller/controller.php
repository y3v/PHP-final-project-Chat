<?php
$siteMenu = ['homepage','signup','login'];
//include "src/view/chat.php";

if (isset($_GET["page"])){
  switch ($_GET["page"]){
    case 'homepage':
    header('location: http://localhost:8000/index.php');
    break;

    case 'signup':
    header('location: http://localhost:8000/src/view/signup.php');
    break;

    case 'login':
    header('location: http://localhost:8000/src/view/login.php');
    break;
  }
}

if (isset($_POST['signup'])){

}
