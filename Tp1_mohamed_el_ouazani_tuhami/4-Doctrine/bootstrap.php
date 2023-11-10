<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once 'vendor/autoload.php'; // Include Composer autoloader

// Specify paths to your Doctrine entity classes
$paths = [__DIR__ . '/src/Entity'];
$isDevMode = true;

// Configuration of the database connection
$dbParams = [
    'driver'   => 'pdo_mysql',
    'host'     => 'localhost',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'banque102',
];

// Create a Doctrine configuration
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

// Create the EntityManager
$entityManager = EntityManager::create($dbParams, $config);

// Function to retrieve the EntityManager (used in cli-config.php)
function GetEntityManager() {
    global $entityManager;
    return $entityManager;
}
?>