<?php
$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, './../bootstrap.php']);

use Tuto\Entity\User;

$userRepo = $entityManager->getRepository(User::class);

$user = $userRepo->find(1);
echo "User by primary key:\n";
echo $user;

$allUsers = $userRepo->findAll();
echo "\nAll users\n";

foreach ($allUsers as $user) {
    echo $user;
}

$usersByRole = $userRepo->findBy(['role' => 'admin']);
echo "\nUsers by role\n";
foreach ($usersByRole as $user) {
    echo $user;
}

$usersByRoleAndFirstName = $usersByRole = $userRepo->findBy(['role' => 'admin', "firstname" => "Yev"]);
echo "\nUsers by role and name\n";
foreach ($usersByRole as $user) {
    echo $user;
}