<?php
require "database-connectie.php";

$id = $_GET['id'];
$naamStudent = $_GET['naam_van_student'];
$klas = $_GET['klas'];
$aantalMinutenTeLaat = $_GET['aantal_minuten_te_laat'];
$redenVanTeLaatKomen = $_GET['de_reden_van_te_laat_komen'];



$query = "UPDATE studenten SET naam_van_student = :naam_van_student, klas = :klas, aantal_minuten_te_laat = :aantal_minuten_te_laat, de_reden_van_te_laat_komen = :de_reden_van_te_laat_komen WHERE id = :id";

$statement = $conn->prepare($query);

$statement->bindParam(':naam_van_student', $naamStudent);
$statement->bindParam(':klas', $klas);
$statement->bindParam(':aantal_minuten_te_laat', $aantalMinutenTeLaat);
$statement->bindParam(':de_reden_van_te_laat_komen', $redenVanTeLaatKomen);
$statement->bindParam(':id', $id);

if ($statement->execute()){
    header("Location: index.php");
    exit();
} else {
    echo "Er is iets fout gegaan!";
}

exit();
