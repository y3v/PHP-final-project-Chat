<?php
# bootstrap.php

require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'vendor', 'autoload.php']);

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$entitiesPath = [
    join(DIRECTORY_SEPARATOR, [__DIR__, "src", "Entity"])
];

$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;

// Connexion � la base de donn�es
$dbParams = [
 'driver'   => 'pdo_mysql',
 'host'     => 'localhost',
 'charset'  => 'utf8',
 'user'     => 'yevoli',
 'password' => 'yevoli',
 'dbname'   => 'php_project',
 ];

// $dbParams = [
//     'driver'   => 'pdo_mysql',
//     'path'   => dirname(__FILE__).'data/p.sqlite'
// ];

$config = Setup::createAnnotationMetadataConfiguration(
    $entitiesPath,
    $isDevMode,
    $proxyDir,
    $cache,
    $useSimpleAnnotationReader
    );
$entityManager = EntityManager::create($dbParams, $config);

return $entityManager;
