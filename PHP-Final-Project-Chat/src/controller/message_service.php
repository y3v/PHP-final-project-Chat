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
  global $messageEntityManager;

  $rsm = new ResultSetMapping;
  $rsm->addEntityResult('User', 'u');
  $rsm->addFieldResult('u', 'id', 'id');
  $rsm->addFieldResult('u', 'name', 'name');
  
  $query = $messageEntityManager->createNativeQuery("SELECT * FROM message WHERE (authorUname ='" . $authorUname . "'  AND recipientUname ='" . $recipientUname . "') OR (authorUname = '" . $recipientUname . "' AND recipientUname = '" . $authorUname . "') ORDER BY timeStamp DESC ");
  $result = $query->getResult();
  $return = array_slice($result,0,$number);

  return $result;
}
/***** UPDATE USER *****/
/***** DELETE USER *****/
