<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test strona</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 style="color: red;">Strona w produkcji</h1>
    <?php
    $conn = new mysqli("me.zangery.pl", "ccna", "ccna", "certyfikat");

    // Sprawdzenie połączenia
    if ($conn->connect_error) {
        die("Błąd połączenia: " . $conn->connect_error);
    }

    $sql = "SELECT ID, Imie, Nazwisko, Klasa FROM chetni";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Imię</th><th>Nazwisko</th><th>Klasa</th><th>Usuń</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["Imie"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Nazwisko"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Klasa"]) . "</td>";
            echo "<td><form method='post' action='usun.php'>
                    <button type='submit' name='delete' value='" . $row["ID"] . "'>X</button>
                </form></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Brak wyników";
    }

    $conn->close();
    ?>

</body>
</html>