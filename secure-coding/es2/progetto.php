<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
</head>
<body>
    <h1>
        Il testo che segue arriva dal database
    </h1>
        <div>
            <?php

            
                //inizializza la connessione al database
                $databaseHost = 'localhost';
                $databaseName = 'cescot';
                $databaseUsername = 'root';
                $databasePassword = '';

                $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

                //verifica la connessione
                if (!$mysqli) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                //esegui una query di esempio
                $query = 'SELECT * FROM content';

                $result = mysqli_query($mysqli, $query);

                //ciclo sulle righe restituite e stampo il valore di ogni riga
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<p>' . $row['value'] . '</p><br>';
                }
            ?>
        </div>
</body>
</html>