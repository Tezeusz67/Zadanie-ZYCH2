<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dziennik ocen</title>
</head>
<body>

<h1>Dziennik ocen</h1>

<form method="POST">

    <label>Imię i nazwisko ucznia:</label><br>
    <input type="text" name="uczen">
    <br><br>

    <label>Ocena:</label><br>
    <select name="ocena">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
    </select>
    <br><br>

    <label>Przedmiot:</label><br>
    <input type="text" name="przedmiot">
    <br><br>

    <input type="submit" name="zapisz" value="Zapisz ocenę">

</form>

<?php

$plik = "oceny.txt";

if (isset($_POST["zapisz"])) {

    $uczen = $_POST["uczen"];
    $przedmiot = $_POST["przedmiot"];
    $ocena = $_POST["ocena"];

    $uchwyt = fopen($plik, "a");

    $wpis = $uczen . " | " . $przedmiot . " | ocena: " . $ocena . "\n";

    fwrite($uchwyt, $wpis);

    fclose($uchwyt);
}

?>

<h2>Zapisane oceny</h2>

<?php

if (file_exists($plik)) {

    $uchwyt = fopen($plik, "r");

    while (!feof($uchwyt)) {

        $linia = fgets($uchwyt);

        if ($linia != false) {
            echo $linia . "<br>";
        }
    }

    fclose($uchwyt);

} else {

    echo "Brak zapisanych ocen.";

}

?>

</body>
</html>
