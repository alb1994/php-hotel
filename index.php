<?php
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

$filtro = $hotels;

if (isset($_GET['parking'])) {
    $tempHotels = [];

    // Verifica se il parametro 'parking' è diverso da vuoto e 'tutti'
    if ($_GET['parking'] !== '' && $_GET['parking'] !== 'tutti') {
        // Confronta il valore del parametro 'parking' (convertito in booleano) con il valore 'parking' di ogni hotel
        foreach ($hotels as $hotel) {
            if (filter_var($_GET['parking'], FILTER_VALIDATE_BOOLEAN) === $hotel['parking']) {
                // Aggiungi l'hotel corrente all'array temporaneo dei risultati
                $tempHotels[] = $hotel;
            }
        }
        // Assegna l'array temporaneo dei risultati al filtro
        $filtro = $tempHotels;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Hotels</title>
</head>
<body>
    <form action="index.php" method="get">
        <label for="parking">Parcheggio</label>
        <select name="parking" id="parking">
            <option value="tutti">Tutti</option>
            <option value="0">No</option>
            <option value="1">Si</option>
        </select>
        <button type="submit">Filtra</button>
        <button type="reset">Resetta</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrizione</th>
                <th>Parcheggio</th>
                <th>Voto</th>
                <th>Distanza dal centro</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($filtro as $hotel) { ?>
            <tr>
                <td><?php echo $hotel['name']; ?></td>
                <td><?php echo $hotel['description']; ?></td>
                <td><?php echo $hotel['parking'] ? 'Si' : 'No'; ?></td>
                <td><?php echo $hotel['vote']; ?></td>
                <td><?php echo $hotel['distance_to_center']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>