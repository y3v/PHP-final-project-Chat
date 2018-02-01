<?php
session_start();
$siteMenu = ['homepage','signup','login'];
$errorMessages = [];
// $path = "localhost:82/PHP-Final-Project-Chat";
$path = 'voyd.sytes.net:8080';

function getSiteMenu(){
  echo '<ul class="header-menu">';
  for ($i=0; $i < sizeof($GLOBALS['siteMenu']); $i++) {
    if ($GLOBALS['siteMenu'][$i] == 'login' && isset($_SESSION['username']) && isset($_SESSION['userId'])){
      //echo '<li><a href="http://localhost:82/PHP-Final-Project-Chat/src/controller/logout.php">Logout</a></li>';
      echo '<li><a href='. $GLOBALS["path"] .'/src/controller/logout.php">Logout</a></li>';
      //echo '<li><a href="http://localhost/PHP-Final-Project-Chat/src/controller/logout.php">Logout</a></li>';
    }
    else if ($GLOBALS['siteMenu'][$i] == 'signup' && isset($_SESSION['username']) && isset($_SESSION['userId']) ){
    }
    else
      //echo '<li><a href="http://localhost:82/PHP-Final-Project-Chat/src/controller/redirect.php?page=' . $GLOBALS['siteMenu'][$i] . '">' . $GLOBALS['siteMenu'][$i] . '</a></li>';
        echo '<li><a href="http://'. $GLOBALS["path"] .'/src/controller/redirect.php?page=' . $GLOBALS['siteMenu'][$i] . '">' . $GLOBALS['siteMenu'][$i] . '</a></li>';
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

function getWebsiteBanner(){
    echo

    '<div id="logo-box">
        <a class="" id="logo" href="http://'. $GLOBALS["path"] .'/index.php"><img src="http://'. $GLOBALS["path"] .'/src/view/images/logo.png" alt="Image of InstaChat Logo"></a>
    </div>';

}

function getFooter(){
    echo '
    <div id="footer-container">
			<!-- START OF FOOTER -->
			<footer class="wrapper row">
				<div class="site-hub row col-4">
					<h3>SITE HUB</h3>
					<ul class="row">
						<li class="col-m-4"><a href="index.html">Home</a></li>
						<li class="col-m-4"><a href="oops.html?special=categories">Categories</a></li>
						<li class="col-m-4"><a href="oops.html?special=categories">Account</a></li>
						<li class="col-m-4"><a href="contact.html">Contact</a></li>
						<li class="col-m-4"><a href="oops.html?special=faqs">FAQs</a></li>
						<li class="col-m-4"><a href="oops.html?special=fav">Favourites</a></li>
					</ul>
				</div>
				<div class="social col-4">
					<h3>SOCIAL HUB</h3>
					<div class="row">
						<ul class="col-m-8 row">
							<li class="col-m-3 col-6"><a href="https://www.facebook.com"><img src="images/social/facebook.png" alt="Link to the ePass Facebook page. Like Us on Facebook!" title="Like us on Facebook!"/></a></li>
							<li class="col-m-3 col-6"><a href="https://www.twitter.com"><img src="images/social/twitter.png" alt="Link to the ePass Twitter feed. Follow us on Twitter!" title="Follow us on Twitter!"/></a> </li>
							<li class="col-m-3 col-6"><a href="https://www.youtube.com"><img src="images/social/youtube.png" alt="Link to the ePass YouTube page. Subscribe to us on YouTube!" title="Subscribe to us on YouTube!"/></a></li>
							<li class="col-m-3 col-6"><a href="https://plus.google.com"><img src="images/social/google-plus.png" alt="Link to the ePass Google+ page." title="Like us on Google+"/></a></li>
						</ul>
					</div>
				</div>
				<h3 class="contact-phone col-4">Contact us at: <a href="tel:1-514-555-5555">1-514-555-5555</a></h3>
			</footer>
			<!-- END OF FOOTER -->
		</div>
    ';
}

function getSlideShow(){
    echo '<img class="slide-box" src="http://'. $GLOBALS["path"] .'/src/view/images/slide1.png" alt="Slide1"/>';
}
