<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery da Database</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>
        Gallery
    </h1>
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
            //gestione del form di inserimento
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $url = mysqli_real_escape_string($mysqli, $_POST['url']);
                $didascalia = mysqli_real_escape_string($mysqli, $_POST['didascalia']);
                
                $insertQuery = "INSERT INTO galleria (url, didascalia) VALUES ('$url', '$didascalia')";
                if (mysqli_query($mysqli, $insertQuery)) {
                    header("Refresh:0");
                } else {
                    echo "<p>Errore: " . mysqli_error($mysqli) . "<br><a href='progetto.php'>Torna indietro</a>.</p>";
                }
            }
        ?>
        <form method="post">
            <label for="url">Image URL:</label>
            <input type="text" id="url" name="url" required>
            <br>
            <label for="didascalia">Caption:</label>
            <input type="text" id="didascalia" name="didascalia" required>
            <br>
            <input type="submit" value="Add Image">
        </form>
        <br>
        <div>
            <?php
                //esegui la query per selezionare tutte le immagini dalla tabella galleria
                $query = 'SELECT * FROM galleria ORDER BY id DESC';
                $result = mysqli_query($mysqli, $query);
                //ciclo sulle righe restituite e stampo il valore di ogni riga
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<img src="' . $row['url'] . '" alt="' . $row['didascalia'] . '">';
                }
            ?>
        </div>
</body>
</html>