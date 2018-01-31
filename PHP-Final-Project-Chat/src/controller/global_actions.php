<?php
session_start();
$siteMenu = ['homepage','signup','login'];
$errorMessages = [];

function getSiteMenu(){
  echo '<ul class="header-menu">';
  for ($i=0; $i < sizeof($GLOBALS['siteMenu']); $i++) {
    if ($GLOBALS['siteMenu'][$i] == 'login' && isset($_SESSION['username']) && isset($_SESSION['userId'])){
      echo '<li><a href="http://localhost:82/PHP-Final-Project-Chat/src/controller/logout.php">Logout</a></li>';
      //echo '<li><a href="http://localhost/PHP-Final-Project-Chat/src/controller/logout.php">Logout</a></li>';
    }
    else if ($GLOBALS['siteMenu'][$i] == 'signup' && isset($_SESSION['username']) && isset($_SESSION['userId']) ){
    }
    else
      echo '<li><a href="http://localhost:82/PHP-Final-Project-Chat/src/controller/redirect.php?page=' . $GLOBALS['siteMenu'][$i] . '">' . $GLOBALS['siteMenu'][$i] . '</a></li>';
      // echo '<li><a href="http://localhost:82/PHP-Final-Project-Chat/src/controller/redirect.php?page=' . $GLOBALS['siteMenu'][$i] . '">' . $GLOBALS['siteMenu'][$i] . '</a></li>';
  }
  echo '</ul>';
}

function getWelcome(){
  if (isset($_SESSION['username'])) {
    echo '<p>Hello ' . $_SESSION['username'] . '</p>';
  }
  else
    echo 'No session.';
}

function getError($message){
  echo '<span class="error">'. $message . '</span>';
}
