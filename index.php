<?php
//DATA ARRAY
$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];
//IMPORT CHOISE AND CHECK IF IS DECLARED
$whit_parking = $_GET['whitparking'] ?? '';
$vote = $_GET['vote'] ?? '';

//RESCUE KEY TO ARRAY

$array_keys = array_keys($hotels[0]);

//FILTER HOTEL

$filtered_hotels = [];

foreach ($hotels as $hotel) {
    if (!$whit_parking && !$vote) {
        $filtered_hotels = $hotels;
    } elseif ($whit_parking == $hotel['parking'] || !$whit_parking) {
        if ($vote <= $hotel['vote'] || !$vote) {
            $filtered_hotels[] = $hotel;
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotels</title>

    <!-- IMPORT BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body {
            background-image: url(./img/hotelbg.jpg);
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="container mt-5 bg-white text-dark p-3 rounded-4">
        <h1>Boolean Hotels</h1>
        <hr>
        <h3>Filtra ricerca per:</h3>
        <!-- FORM -->
        <form action="" method="GET">
            <div class="d-flex align-items-center justify-content-around">
                <!-- PARKING CHECKBOX  -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value=true id="whit_parking" name="whitparking" <?php if ($whit_parking) : ?><?= 'checked' ?><? endif; ?>>
                    <label class="form-check-label" for="whit_parking">Parcheggio </label>
                </div>
                <!--  VOTE SELECT -->
                <select class="form-select form-select-lg mb-3 w-25" name="vote">
                    <option value="0" selected>Voto</option>
                    <option value="1">1 Stella o sup</option>
                    <option value="2">2 Stelle o sup</option>
                    <option value="3">3 Stelle o sup</option>
                    <option value="4">4 Stelle o sup</option>
                    <option value="5">5 Stelle</option>
                </select>
            </div>

            <div class="my-3 text-center">

                <button class="btn btn-primary">Cerca</button>
                <a href="http://localhost:8080/php-hotel" class="btn btn-danger">Annulla</a>
            </div>

        </form>
        <hr>
        <!-- TABLE -->
        <table class="table text-center">
            <!-- HEAD OF TABLE -->
            <thead>
                <tr>
                    <?php foreach ($array_keys as $key) : ?>
                        <th scope="col"><?= strtoupper($key) ?></th>
                    <? endforeach; ?>
                </tr>
            </thead>
            <!-- TABLE BODY -->
            <tbody>
                <?php foreach ($filtered_hotels as $hotel) : ?>
                    <tr>
                        <th scope="row"><?= $hotel['name'] ?></th>
                        <td><?= $hotel['description'] ?></td>
                        <td><?= $hotel['parking'] ?></td>
                        <td><?= $hotel['vote'] ?></td>
                        <td><?= $hotel['distance_to_center'] ?></td>
                    </tr>
            </tbody>
        <? endforeach; ?>
        </table>
    </div>
</body>

</html>