<?php
//use Doctrine\DBAL\DriverManager;
//use Doctrine\ORM\EntityManager;
//use Doctrine\ORM\ORMSetup;
//
//require_once ("../vendor/autoload.php");
//
//
//$paths = ['/entities'];
//$isDevMode = true;
//
//// Database configuration parameters
//$dbParams = [
//    'driver' => 'pdo_mysql',
//    'user' => 'root',
//    'password' => '',
//    'dbname' => 'details',
//];
//
//
//$config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);
//$connection = null;
//$entityManager = null;
//
//try {
//    $connection = DriverManager::getConnection($dbParams, $config);
//    $entityManager = new EntityManager($connection, $config);
//} catch (\Doctrine\DBAL\Exception|\Doctrine\ORM\Exception\MissingMappingDriverImplementation $e) {
//    error_log($e->getMessage());
//}
