<?php

require_once ('../src/db_config.php');
use entities\Animal;

// Assuming Animal entity is defined in the specified namespace

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];

    $animalRepository = $entityManager->getRepository(Animal::class);
    $animal = $animalRepository->findOneBy(['name' => 'animal1']);

    $animal->setName($name);

    $entityManager->persist($animal);
    $entityManager->flush();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Animal</title>
</head>
<body>
<h1>Add a new animal to our website</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <table border="0">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" maxlength="255"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Add Animal"></td>
        </tr>
    </table>
</form>
</body>
</html>

