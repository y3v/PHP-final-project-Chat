<?php
if(!isset($_SESSION)){
    session_start();
}
require_once "src/controller/global_actions.php";
// include "src/view/login.php";
?>
<!DOCTYPE html>
<html>
  <head lang="en">
    <title>InstaChat!</title>
    <meta charset="utf-8">
    <meta name="author" content="Olivier Lepage & Yev Kantorovich">
    <meta name="description" content="description of this pages content">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- for responsive websites -->

    <meta name="robots" content="index,follow"> <!-- default behavior: index and follows all links on page. -->
    <!-- Other behaviors: *noindex,nofollow* || *index,nofollow* || *noindex, follow* -->
    <link rel="stylesheet" href="src\view\style\style.css">
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
      getSiteMenu();
      ?>
    </header>
    <main>
    	<?php
    	$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'bootstrap.php']);

    	use Tuto\Entity\User;

    	$userRepo = $entityManager->getRepository(User::class);

    	if (isset($_SESSION['username'])){
    	    echo "<h3 id='whoChat'>Who would you like to Chat with?</h3>";
            //$path = "localhost:82/PHP-final-project-Chat";
            $path = "localhost:82/PHP-Final-Project-Chat";

    	    $allUsers = $userRepo->findAll();

    	    foreach ($allUsers as $user) {
    	      echo "<div class='userChatList'><a href='
            http://". $path ."/src/controller/redirect.php?page=chatroom&user=". $_SESSION['username'] ."&friend=" . $user->getUsername() . "
            '>" . $user->getUsername() . "  (" . $user->getFirstname() . " " .  $user->getLastname() .
            ")<span class='status'>";
    	        if ($user->getIsLoggedOn()) {
    	            echo "<img src='http://". $GLOBALS['path'] ."/src/view/images/online.png' alt='http://". $GLOBALS['path'] ."/src/view/images/online.png'/>";
    	        }else{
    	            echo "<img src='http://". $GLOBALS['path'] ."/src/view/images/offline.png' alt='http://". $GLOBALS['path'] ."/src/view/images/online.png'/>";
    	        }
    	        echo "</span></a></div>";
    	    }
    	}
    	else{
    	    getSlideShow();
    	}

    	?>
    </main>
    <footer>
		<?php getFooter()?>
    </footer>
  </body>
</html>
