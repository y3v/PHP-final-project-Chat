<?php
$userEntityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, '../../bootstrap.php']);
use Tuto\Entity\User;
$userRepo = $entityManager->getRepository(User::class);

/***** CREATE USER *****/
function createUser($uname, $email, $pword, $fname = 'paco', $lname = 'toto', $logged = false){
  global $userEntityManager;

  if (empty($email) || empty($uname) || empty($pword))
    return false;

  $newUser = new User($uname, $email, $pword, $fname, $lname, $logged);
  $userEntityManager->persist($newUser);
  $userEntityManager->flush();

  return $newUser;
}

/***** READ USER *****/
function getUserById($id){
  global $userRepo;

  $user = $userRepo->find($id);

  if (!empty($user))
    return $user;

  else
    return false;
}

function getUserByUsername($username, $all = false){
  global $userRepo;

  $userByUsername = $userRepo->findBy(['username' => $username]);

  if ($all)
    return $userByUsername;

  else if (!empty($userByUsername))
    return $userByUsername[0];

  else
    return false;
}

function getUserByEmail($email, $all = false){
  global $userRepo;

  $userByEmail = $userRepo->findBy(['email' => $email]);

  if ($all)
  return $userByEmail;

  else if (!empty($userByEmail))
    return $userByEmail[0];

  else
    return false;
}

function getUserByLogin($uname, $pass){
  global $userRepo;

  
  $userByLogin = $userRepo->findBy(['username' => $uname, 'password' => $pass]);
  printf($userByLogin);
  if (!empty($userByLogin))
    return $userByLogin[0];

  else
    return false;
}
/***** UPDATE USER *****/
/***** DELETE USER *****/
