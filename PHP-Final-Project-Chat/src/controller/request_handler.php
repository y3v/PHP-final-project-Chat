<?php
require_once "global_actions.php";
require_once "message_service.php";

if (isset($_POST['request'])){
  switch($_POST['request']){
    case 'saveMessage':
    createMessage($_POST['author'],$_POST['recipient'],$_POST['data']);
    break;
  }
}
?>
