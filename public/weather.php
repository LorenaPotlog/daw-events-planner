
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weather Information</title>
</head>
<body>
<h1>Weather Information</h1>
<!-- Include the PHP file here -->
<?php include '../src/weather.php';
$localitate='arad';
$id=accuweather_id($localitate);
accuweather_weather($localitate,$id);?>
</body>
</html>