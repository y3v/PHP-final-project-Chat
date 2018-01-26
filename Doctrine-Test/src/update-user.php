<?php
$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, './../bootstrap.php']);

use Tuto\Entity\User;

$identity = 1;

$userRepo = $entityManager->getRepository(User::class);

$user = $userRepo->find($identity);

$user->setFirstname("Yevgeni");
$user->setLastname("Kant");

$entityManager->flush();