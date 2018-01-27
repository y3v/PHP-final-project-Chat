<?php
$siteMenu = ['homepage','signup','login'];
function getSiteMenu(){
//  $siteMenu = ['homepage','signup','login'];
  echo '<ul>';
  for ($i=0; $i < sizeof($GLOBALS['siteMenu']); $i++) {
    echo '<li><a href="http://localhost:8000/src/controller/controller.php?page=' . $GLOBALS['siteMenu'][$i] . '">' . $GLOBALS['siteMenu'][$i] . '</a></li>';
  }
  echo '</ul>';
}
