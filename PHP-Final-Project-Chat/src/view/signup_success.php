<?php
require_once "../controller/global_actions.php";
////$path = "localhost:82/PHP-Final-Project-Chat";
$path = 'voyd.sytes.net:8080';

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
      <h1>ACCOUNT CREATED</h1>

      <?php
      getWelcome();
      getSiteMenu(); ?>
    </header>
    <main>
      <p>Registered successfully! You can get the verified status by clicking on the link we just sent you via email.</p>
    </main>
    <footer>

    </footer>
  </body>
</html>
