<?php
require "database-connectie.php";

$naam_van_student = $_GET['naam_van_student'];
$klas = $_GET['klas'];
$aantal_minuten_te_laat = $_GET['aantal_minuten_te_laat'];
$de_reden_van_te_laat_komen = $_GET['de_reden_van_te_laat_komen'];

$sql = "INSERT INTO studenten (naam_van_student, klas, aantal_minuten_te_laat, de_reden_van_te_laat_komen) VALUES (:naam_van_student, :klas, :aantal_minuten_te_laat, :de_reden_van_te_laat_komen)";

$statement = $conn->prepare($sql);

$statement->bindParam(':naam_van_student', $naam_van_student);
$statement->bindParam(':klas', $klas);
$statement->bindParam(':aantal_minuten_te_laat', $aantal_minuten_te_laat);
$statement->bindParam(':de_reden_van_te_laat_komen', $de_reden_van_te_laat_komen);

$statement->execute();

if (empty($naam_van_student) || empty($klas) || empty($aantal_minuten_te_laat) || empty($de_reden_van_te_laat_komen)) {
    echo "Alle velden moeten ingevuld worden!";
    exit();
}

header("Location: index.php");
?>

