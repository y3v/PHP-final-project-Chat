<?php
 $entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, './../bootstrap.php']);
 
 use Tuto\Entity\User;
 
 $admin = new User();
 $admin->setFirstname("Yev");
 $admin->setLastname("K");
 $admin->setRole('admin');
 $admin->setAddress(10);
 
 $entityManager->persist($admin);
 $entityManager->flush();
 
 echo "User ID created: " . $admin->getId();
 