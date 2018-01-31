<?php
require_once "global_actions.php";
require_once "user_service.php";
use Tuto\Entity\User;

//Get rid of the current session
session_start();
session_unset();

$userRepo = $entityManager->getRepository(User::class);
$validation = true;
$dbValidation = true;
$errorMessages = [];

if (isset($_SESSION['errorMessages']))
  unset($_SESSION['errorMessages']);


if (empty(trim($_POST['email']))){
  $validation = false;
  $GLOBALS['errorMessages']['email'] = 'Invalid email address.';
}

if (empty(trim($_POST['uname']))){
  $validation = false;
  $GLOBALS['errorMessages']['uname'] = 'Invalid username.';
}

if (empty(trim($_POST['fname']))){
  $validation = false;
  $GLOBALS['errorMessages']['fname'] = 'Enter your first name.';
}

if (empty(trim($_POST['lname']))){
  $validation = false;
  $GLOBALS['errorMessages']['lname'] = 'Enter your last name.';
}

if (empty(trim($_POST['pword']))){
  $validation = false;
  $GLOBALS['errorMessages']['pword'] = 'Invalid password.';
}
else if (empty(trim($_POST['pword2']))){
  $validation = false;
  $GLOBALS['errorMessages']['pword2'] = 'Confirm your password.';
}
else if(trim($_POST['pword']) != trim($_POST['pword2'])){
  $validation = false;
  $GLOBALS['errorMessages']['pword2'] = 'Passwords does not match.';
}

// If fields validation successful
if ($validation){
  $usersByUsername = getUserByUsername($_POST['uname'], true);
  $usersByEmail = getUserByEmail($_POST['email'], true);
  if(!empty($usersByUsername)){
    $dbValidation = false;
    $GLOBALS['errorMessages']['unameTaken'] = 'Username is already taken.';
  }
  if(!empty($usersByEmail)){
    $dbValidation = false;
    $GLOBALS['errorMessages']['emailUsed'] = 'This email address is already used';
  }
}
else {
  $_SESSION['errorMessages'] = $GLOBALS['errorMessages'];
  header('location: http://localhost:82/PHP-Final-Project-Chat/src/view/signup.php');
  //header('location: http://localhost:8000/src/view/signup.php');
}

// If database/unique validation successful
if($dbValidation){
  $user = createUser($_POST['uname'],$_POST['email'] , $_POST['pword'], $_POST['fname'], $_POST['lname'], $logged = false);
  if ($user != false){
    header('location: http://localhost:82/PHP-Final-Project-Chat/src/controller/login.php?userId=' . $user->getId());
  }
  else{
    $GLOBALS['errorMessages']['dbError'] = 'There was an error processing this request. Try again later.';
    $_SESSION['errorMessages'] = $GLOBALS['errorMessages'];
    header('location: http://localhost:82/PHP-Final-Project-Chat/src/view/signup.php');
    //header('location: http://localhost:8000/src/view/signup.php');
  }
}
else{
  $_SESSION['errorMessages'] = $GLOBALS['errorMessages'];
  header('location: http://localhost:82/PHP-Final-Project-Chat/src/view/signup.php');
  //header('location: http://localhost:8000/src/view/signup.php');
}
