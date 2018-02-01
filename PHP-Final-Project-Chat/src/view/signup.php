<?php
require_once "../controller/global_actions.php";
if(!isset($_SESSION)){
    session_start();
}

$path = "localhost:82/PHP-Final-Project-Chat";
//$path = 'voyd.sytes.net:82';

if (isset($_SESSION['refreshed']) && isset($_SESSION['errorMessages'])){
  unset($_SESSION['errorMessages']);
  unset($_SESSION['refreshed']);
}
else
  $_SESSION['refreshed'] = true;

//var_dump($_SESSION);
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
    <link rel="stylesheet" href="http://<?php echo $GLOBALS['path'];?>/src\view\style\style.css">
    <script src="script/script.js" type="text/javascript" charset="utf-8"></script>
    <link rel="canonical" href="">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->

  </head>
  <body>
    <header>
      <?php
      getWebsiteBanner();
      //getWelcome();
      getSiteMenu();?>
    </header>
    <main>
      <h1 id="signuph1" style="text-align:center">Register Now!</h1>
      <!-- <form action="http://localhost:82/PHP-Final-Project-Chat/src/controller/signup.php" method="POST"> -->
      <form action="http://<?php echo $path; ?>/src/controller/signup.php" method="POST">
        <label>Username:</label><input type="text" id="" name="uname" value="<?php if(isset($_SESSION['stickies']['uname'])){ echo $_SESSION['stickies']['uname']; }?>">
          <?php
          if(isset($_SESSION['errorMessages']['uname'])) {
            getError($_SESSION['errorMessages']['uname']);
          }
          else if (isset($_SESSION['errorMessages']['unameTaken'])) {
            getError($_SESSION['errorMessages']['unameTaken']);
          }
          ?>
        <br>
        <label>Password:</label><input type="password" id="" name="pword">
          <?php
          if(isset($_SESSION['errorMessages']['pword'])) {
            getError($_SESSION['errorMessages']['pword']);
          }?>
        <br>
        <label>Confirm Password:</label><input type="password" id="" name="pword2">
          <?php
          if(isset($_SESSION['errorMessages']['pword2'])) {
            getError($_SESSION['errorMessages']['pword2']);
          }?>
        <br>
        <label>First Name:</label><input type="text" id="" name="fname" value="<?php if(isset($_SESSION['stickies']['fname'])){ echo $_SESSION['stickies']['fname']; }?>">
          <?php
          if(isset($_SESSION['errorMessages']['fname'])) {
            getError($_SESSION['errorMessages']['fname']);
          }?>
        <br>
        <label>Last Name:</label><input type="text" id="" name="lname" value="<?php if(isset($_SESSION['stickies']['lname'])){ echo $_SESSION['stickies']['lname']; }?>">
          <?php
          if(isset($_SESSION['errorMessages']['lname'])) {
            getError($_SESSION['errorMessages']['lname']);
          }?>
        <br>
        <label>E-mail:</label><input type="email" id="" name="email" value="<?php if(isset($_SESSION['stickies']['email'])){ echo $_SESSION['stickies']['email']; }?>">
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
		<?php getFooter();?>
  </body>
</html>

<!-- //in signup.php -->
