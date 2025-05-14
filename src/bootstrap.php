<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/../vendor/autoload.php';

function getEntityManager(): EntityManager {
    $paths = [__DIR__ . "/Entity"];
    $isDevMode = true;

    $dbParams = [
        'driver'   => 'pdo_mysql',
        'user'     => 'root',
        'password' => '',
        'dbname'   => 'vehicles',
        'host'     => '127.0.0.1',
        'port'     => '3306',
    ];

    $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
    return EntityManager::create($dbParams, $config);
}
