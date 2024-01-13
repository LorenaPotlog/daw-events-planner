<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $yourName = $_POST['yourName'] ?? '';
    $partnerName = $_POST['partnerName'] ?? '';

    if (!empty($yourName) && !empty($partnerName)) {
        $apiKey = '8f15ffeab1msh31e49daeef217d8p1fbc63jsn9b9ea0f89c1c';
        $apiHost = 'the-love-calculator.p.rapidapi.com';

        $url = "https://$apiHost/love-calculator?fname=$yourName&sname=$partnerName";
        $headers = [
            "X-RapidAPI-Key: $apiKey",
            "X-RapidAPI-Host: $apiHost"
        ];

        $context = stream_context_create([
            'http' => [
                'header' => implode("\r\n", $headers),
            ],
        ]);

        $response = file_get_contents($url, false, $context);

        if ($response !== FALSE) {
            $result = json_decode($response, true);
            $percentage = $result["percentage match: "];
            $loveResult = $result["result: "];

            header("Location: ../../public/game.php?percentage=$percentage&result=$loveResult");
            exit();
        } else {
            echo 'Error calculating love percentage.';
        }
    } else {
        echo 'Please provide both names.';
    }
} else {
    echo 'Invalid request method.';
}