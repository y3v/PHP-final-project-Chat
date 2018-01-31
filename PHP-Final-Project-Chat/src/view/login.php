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
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="author" content="Olivier Lepage">
    <meta name="description" content="description of this pages content">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- for responsive websites -->

    <meta name="robots" content="index,follow"> <!-- default behavior: index and follows all links on page. -->
    <!-- Other behaviors: *noindex,nofollow* || *index,nofollow* || *noindex, follow* -->
    <link rel="canonical" href="">


    <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->

  </head>
  <body>
    <header>
      <h1>LOGIN HERE</h1>

      <?php
      getWelcome();
      getSiteMenu(); ?>
    </header>
    <main>
    <!--  <form action="http://localhost:82/PHP-Final-Project-Chat/src/controller/login.php" method="POST"> -->
        <!-- <form action="http://localhost:8000/src/controller/login.php" method="POST"> -->
      <form action="http://voyd.sytes.net:8080/src/controller/login.php" method="POST">
        uname: <input type="text" id="" name="uname" value="">
          <?php
          if(isset($_SESSION['errorMessages']['uname'])) {
            getError($_SESSION['errorMessages']['uname']);
          }?>
        <br>
        pass: <input type="password" id="" name="pword" value="">
          <?php
          if(isset($_SESSION['errorMessages']['pword'])) {
            getError($_SESSION['errorMessages']['pword']);
          }?>
        <br>
        Remember me? <input type="checkbox" id="" name="remember_me" value=""><br>
        <input type="submit" id="" name="login" value="Login"><br>
          <?php
          if(isset($_SESSION['errorMessages']['loginError'])) {
            getError($_SESSION['errorMessages']['loginError']);
          }?>
        <br>
        <!--<a href="http://localhost:82/PHP-Final-Project-Chat/src/controller/redirect.php?page=signup" rel="follow">New user? Sign up!</a> <br> -->
      	<a href="http://http://voyd.sytes.net:8080/src/controller/redirect.php?page=signup" rel="follow">New user? Sign up!</a> <br>
      </form>
    </main>
    <footer>

    </footer>
  </body>
</html>
