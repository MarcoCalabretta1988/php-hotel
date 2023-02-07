<?php
//Array con i dati
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
//Recupero scelta con checkbox
$whit_parking = $_GET['whitparking'] ?? '';
$vote = $_GET['vote'] ?? '';

var_dump($whit_parking, $vote);

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
        <form action="" method="GET">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="true" id="whit_parking" name="whitparking">
                <label class="form-check-label" for="whit_parking">Parcheggio </label>
            </div>

            <div class="my-3">

                <button class="btn btn-primary">Cerca</button>
                <a href="http://localhost:8080/php-hotel" class="btn btn-danger">Annulla</a>
            </div>

        </form>
        <hr>
        <table class="table text-center">
            <thead>
                <tr>
                    <?php foreach ($hotels[0] as $key => $hotel) : ?>
                        <th scope="col"><?= strtoupper($key) ?></th>
                    <? endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $key => $hotel) : ?>
                    <?php if ($whit_parking == $hotel['parking'] || !$whit_parking) : ?>
                        <tr>
                            <th scope="row"><?= $hotel['name'] ?></th>
                            <td><?= $hotel['description'] ?></td>
                            <td><?= $hotel['parking'] ?></td>
                            <td><?= $hotel['vote'] ?></td>
                            <td><?= $hotel['distance_to_center'] ?></td>
                        </tr>
                    <?php endif; ?>
            </tbody>
        <? endforeach; ?>
        </table>
    </div>
</body>

</html>