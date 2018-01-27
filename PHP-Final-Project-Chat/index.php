<?php
require_once "src/controller/global_actions.php";
// include "src/view/login.php";
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
      <h1>HOMEPAGE</h1>
      <?php getSiteMenu() ?>
    </header>
    <main>
      <a href="http://localhost:8000/src/controller/controller.php/?page=login" rel="follow">Login</a><br>
    </main>
    <footer>

    </footer>
  </body>
</html>
