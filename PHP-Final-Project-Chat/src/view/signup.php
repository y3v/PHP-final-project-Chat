<?php
require_once "../controller/global_actions.php";
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
      <?php getSiteMenu() ?>
    </header>
    <main>
      <form action="http://localhost:8000/src/controller/controller.php" method="POST">
        uname: <input type="text" id="" name="uname" value=""><br>
        pass: <input type="password" id="" name="pword" value=""><br>
        confirm pass: <input type="password" id="" name="pword" value=""><br>
        email: <input type="text" id="" name="uname" value=""><br>
        <input type="submit" id="" name="signup" value="Signup"><br>
      </form>
    </main>
    <footer>

    </footer>
  </body>
</html>

in signup.php
