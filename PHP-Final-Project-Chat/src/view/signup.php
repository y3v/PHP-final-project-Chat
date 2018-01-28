<?php
require_once "../controller/global_actions.php";
session_start();

if (isset($_SESSION['refreshed']) && isset($_SESSION['errorMessages'])){
  unset($_SESSION['errorMessages']);
  unset($_SESSION['refreshed']);
}
else
  $_SESSION['refreshed'] = true;

var_dump($_SESSION);
?>
<!DOCTYPE html>
<html>
  <head lang="en">
    <title>first-mockup</title>
    <meta charset="utf-8">
    <meta name="author" content="Olivier Lepage">
    <meta name="description" content="description of this pages content">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- for responsive websites -->

    <meta name="robots" content="index,follow"> <!-- default behavior: index and follows all links on page. -->
    <!-- Other behaviors: *noindex,nofollow* || *index,nofollow* || *noindex, follow* -->
    <link rel="stylesheet" href="style/main.css">
    <script src="script/script.js" type="text/javascript" charset="utf-8"></script>
    <link rel="canonical" href="">


    <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->

  </head>
  <body>
    <header>
      <h1>SIGN UP</h1>
      <?php
      getWelcome();
      getSiteMenu(); ?>
    </header>
    <main>
      <form action="http://localhost:8000/src/controller/signup.php" method="POST">
        uname: <input type="text" id="" name="uname" value="">
          <?php
          if(isset($_SESSION['errorMessages']['uname'])) {
            getError($_SESSION['errorMessages']['uname']);
          }
          else if (isset($_SESSION['errorMessages']['unameTaken'])) {
            getError($_SESSION['errorMessages']['unameTaken']);
          }
          ?>
        <br>
        pass: <input type="password" id="" name="pword" value="">
          <?php
          if(isset($_SESSION['errorMessages']['pword'])) {
            getError($_SESSION['errorMessages']['pword']);
          }?>
        <br>
        confirm pass: <input type="password" id="" name="pword2" value="">
          <?php
          if(isset($_SESSION['errorMessages']['pword2'])) {
            getError($_SESSION['errorMessages']['pword2']);
          }?>
        <br>
        Fname: <input type="text" id="" name="fname" value="">
          <?php
          if(isset($_SESSION['errorMessages']['fname'])) {
            getError($_SESSION['errorMessages']['fname']);
          }?>
        <br>
        Lname: <input type="text" id="" name="lname" value="">
          <?php
          if(isset($_SESSION['errorMessages']['lname'])) {
            getError($_SESSION['errorMessages']['lname']);
          }?>
        <br>
        email: <input type="email" id="" name="email" value="">
          <?php
          if(isset($_SESSION['errorMessages']['email'])) {
            getError($_SESSION['errorMessages']['email']);
          }
          else if (isset($_SESSION['errorMessages']['emailUsed'])) {
            getError($_SESSION['errorMessages']['emailUsed']);
          }
          ?>
        <br>
        <input type="submit" id="" name="signup" value="Signup">
          <?php
          if(isset($_SESSION['errorMessages']['dbError'])) {
            getError($_SESSION['errorMessages']['dbError']);
          }?>
        <br>
      </form>
    </main>
    <footer>

    </footer>
  </body>
</html>

in signup.php
