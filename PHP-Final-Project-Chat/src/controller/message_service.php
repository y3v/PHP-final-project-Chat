<?php
$messageEntityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, '../../bootstrap.php']);
use Tuto\Entity\Message;
$messageRepo = $entityManager->getRepository(Message::class);

/***** CREATE MESSAGE *****/
function createMessage($authorUname, $recipientUname, $message, $isDeleted = false, $wasViewed = false){
  global $messageEntityManager;

  $timestamp = date("Y-m-d H:i:s");

  $newMessage = new Message($authorUname, $recipientUname, $timestamp, $message, $isDeleted, $wasViewed);
  $ret = $messageEntityManager->persist($newMessage);
  $messageEntityManager->flush();

  return $ret;
}

/***** READ USER *****/
function readLastMessages($authorUname, $recipientUname, $number = 15){
  $servername = "voyd.sytes.net";
  $username = "yevoli";
  $password = "yevoli123";
  $dbname = "php_project_chat";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM message WHERE (authorUname ='" . $authorUname . "'  AND recipientUname ='" . $recipientUname . "') OR (authorUname = '" . $recipientUname . "' AND recipientUname = '" . $authorUname . "') ORDER BY timeStamp DESC ";
  $result = $conn->query($sql);
  $messages = array();
  $count = 0;

  if ($result->num_rows > 0) {
      // output data of each row
      $outp = $result->fetch_all(MYSQLI_ASSOC);
      /*while($row = $result->fetch_assoc() && $count < $number) {
        $message = $row;
        array_push($messages,$message);
        $count++;
      }*/
  }
  else {
    $outp = array();
  }
  $conn->close();

  return json_encode($outp);
}
/***** UPDATE USER *****/
/***** DELETE USER *****/
