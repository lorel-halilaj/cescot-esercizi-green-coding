<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>
        Gallery
    </h1>
        <div>
            <?php

            
                //inizializza la connessione al database
                $mysqli = mysqli_connect(
                    getEnv("dbHost"),
                    getEnv("dbUser"),
                    getEnv("dbPass"),
                    getEnv("dbName")
                );

                //verifica la connessione
                if (!$mysqli) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                //esegui una query di esempio
                $query = 'SELECT * FROM galleria';

                $result = mysqli_query($mysqli, $query);

                //ciclo sulle righe restituite e stampo il valore di ogni riga
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<img src="' . $row['url'] . '" alt="' . $row['didascalia'] . '">';
                }
            ?>
        </div>
</body>
</html>