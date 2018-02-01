<?php
$messageEntityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, '../../bootstrap.php']);
use Tuto\Entity\Message;
$userRepo = $entityManager->getRepository(Message::class);

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
/***** UPDATE USER *****/
/***** DELETE USER *****/
