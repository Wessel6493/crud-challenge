<?php
require "database-connectie.php";

$id = $_POST['id'];
$naamStudent = $_POST['naam_van_student'];
$klas = $_POST['klas'];
$aantalMinutenTeLaat = $_POST['aantal_minuten_te_laat'];
$redenVanTeLaatKomen = $_POST['reden_van_te_laat_komen'];

$query = "DELETE FROM studenten WHERE id = $id";
$conn->exec($query);

header("Location: index.php");
exit();
