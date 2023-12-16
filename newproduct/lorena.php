<?php
// create_product.php <name>
use entities\Animal;

require_once "../src/db_config.php";

$newProductName = 'loernanew';


$animalRepository = $entityManager->getRepository(Animal::class);
$animal = $animalRepository->findOneBy(['name' => 'animal1']);

$animal->setName('lorena');

$entityManager->persist($animal);
$entityManager->flush();

echo "succes";
?>
