<?php

$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, './../bootstrap.php']);

use Tuto\Entity\Address;
use Tuto\Entity\User;


$userRepo = $entityManager->getRepository(User::class);

$user = $userRepo->find(3);

$address = new Address();

$address->setStreet("1200 Rue st jacques # 503");
$address->setCity("MTL");
$address->setCountry("Canada");

$user->setAddress($address);

$entityManager->persist($address);
$entityManager->flush();

