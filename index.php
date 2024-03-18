<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<?php
    $parking = $_GET['parking'];
    $vote = $_GET['vote'];

   

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


    if ($parking) {
        $hotels = array_filter($hotels, function($hotel) {
            return $hotel['parking'];
        });
    };

    if (!is_null($vote)) {
        $hotels = array_filter($hotels, function($hotel) use ($vote) {
            return $hotel['vote'] >= $vote;
        });
    };

    if (!$parking && is_null($vote)) {
        $hotels = $hotels;
    }

?>

<div class="container">
    <form>
        <div class="mb-3">
            <label for="vote" class="form-label">Inserisci un numero da 1 a 5</label>
            <input type="number" name="vote" class="form-control" id="vote">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="parking" class="form-check-input" id="parking">
            <label class="form-check-label" for="parking">Con il parcheggio</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Parking</th>
                    <th>Vote</th>
                    <th>Distance to Center</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($hotels as $currentHotel) {
                        echo "<tr>";
                        foreach($currentHotel as $value) {
                            echo "<td>$value</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>


    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>