<?php
$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, './../bootstrap.php']);

use Tuto\Entity\User;

$identity = 2;

$userRepo = $entityManager->getRepository(User::class);

$user = $userRepo->find($identity);

$entityManager->remove($user);
$entityManager->flush($user);

$user = $userRepo->find($identity);

var_dump($user);