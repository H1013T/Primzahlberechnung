<?php
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8" />
    <title>Primzahlen & Logarithmus</title>
</head>
<body>

<h2>Primzahlen berechnen</h2>
<form method="POST">
    <label>...bis zur Zahl:</label><br>
    <input type="text" name="prime_limit" required><br>
    <button type="submit" name="calc_primes">Berechnen</button>
</form>

<div>
    <?php
    /*
     Funktion zur Überprüfung ob eine Zahl eine Primzahl ist
     */
    function istPrimzahl($zahl) {
        // Zahlen kleiner als 2 sind keine Primzahlen
        if ($zahl < 2) return false;
        
        // Teiler von 2 bis zur Hälfte der Zahl testen
        for ($teiler = 2; $teiler <= $zahl/2; $teiler++) {
            if ($zahl % $teiler == 0) return false;
        }
        
        return true;
    }

    // Prüfen ob das Primzahlen-Formular abgeschickt wurde
    if (isset($_REQUEST['calc_primes'])) {

        $grenze = ($_REQUEST['prime_limit']);
        
        echo "<p><strong>Primzahlen bis $grenze:</strong></p>";
        
        // Alle Zahlen von 1 bis zur Grenze durchgehen
        for ($aktuelleZahl = 1; $aktuelleZahl <= $grenze; $aktuelleZahl++) {
             // Wenn aktuelle Zahl eine Primzahl ist dann ausgeben
            if (istPrimzahl($aktuelleZahl)) echo $aktuelleZahl . " ";
        }
    }
    ?>
</div>

<hr>

<h2>Logarithmus Ausgabe</h2>
<form method="POST">
    <label>...bis zur Zahl:</label><br>
    <input type="text" name="log_limit" min="1" required><br>

    <label>Faktor:</label><br>
    <input type="text" name="factor" step="0.1" value="1" required><br>

    <button type="submit" name="calc_log">Berechnen</button>
</form>

<div>
    <?php
    // Prüfen ob das Logarithmus Formular abgeschickt wurde
    if (isset($_REQUEST['calc_log'])) {

        $grenze = ($_REQUEST['log_limit']);
        $faktor = ($_REQUEST['factor']);

        echo "<p><strong>Log(n) Sterneausgabe bis $grenze mit Faktor $faktor:</strong></p>";

        // Für jede Zahl von 1 bis zur eingegebenen Grenze
        for ($aktuelleZahl = 1; $aktuelleZahl <= $grenze; $aktuelleZahl++) {
            // Natürlichen Logarithmus der aktuellen Zahl berechnen
            // und mit dem Faktor multiplizieren (für Skalierung)
            $logWert = log($aktuelleZahl) * $faktor;
            
            // Logarithmus Wert in Integer umwandeln
            $sterneAnzahl = (int)$logWert;
            
            $sterne = "";
            
            // So viele Sterne hinzufügen wie $sterneAnzahl angibt
            for ($sternZaehler = 0; $sternZaehler < $sterneAnzahl; $sternZaehler++) {
                $sterne .= "*";
            }
            
            echo $sterne . "<br>";
        }
    }
    ?>
</div>

</body>
</html>
