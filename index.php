<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require "database-connectie.php";
$query = "SELECT * FROM studenten";
$query1 = "SELECT AVG(aantal_minuten_te_laat) FROM studenten";
$query2 = "SELECT MAX(aantal_minuten_te_laat) FROM studenten";
$query3 = "SELECT SUM(aantal_minuten_te_laat) FROM studenten";
$result = $conn->query($query);
$result1 = $conn->query($query1);
$result2 = $conn->query($query2);
$result3 = $conn->query($query3);




?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CRUD</title>
        <style type="text/css">

            body, html, form {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }


            body {
                font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
                background-color: #141414;
                color: #e5e5e5;
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 20px;
            }


            h1, h2 {
                color: #e50914;
            }


            table {
                width: 100%;
                max-width: 1000px;
                border-collapse: collapse;
                margin: 20px 0;
                background-color: #333333;
                color: #e5e5e5;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
                border-radius: 8px;
                overflow: hidden;
            }

            th, td {
                padding: 15px;
                text-align: left;
                border-bottom: 1px solid #444444;
            }

            th {
                background-color: #444444;
            }

            td {
                background-color: #222222;
            }


            button {
                background-color: #e50914;
                color: white;
                padding: 10px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
                margin: 5px 0;
            }

            button:hover {
                background-color: #f40612;
            }




            .toevoegen {
                margin-top: 20px;
            }

            .toevoegen button {
                width: 100%;
                max-width: 300px;
            }


            @media (max-width: 600px) {
                table, th, td {
                    font-size: 14px;
                }

                button {
                    font-size: 14px;
                }
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            table, th, td {
                border: 1px solid black;
            }

            th, td {
                padding: 15px;
                text-align: left;
            }

            th {
                background-color: darkslategrey;
            }
        </style>
    </head>
    <body>

    <h1>Overzicht studenten</h1>

    <table>
        <tr>
            <th>id</th>
            <th>naam van student</th>
            <th>klas</th>
            <th>Aantal minuten te laat</th>
            <th>De reden van te laat komen</th>
            <th></th>
        </tr>
        <?php
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['naam_van_student'] . "</td>";
            echo "<td>" . $row['klas'] . "</td>";
            echo "<td>" . $row['aantal_minuten_te_laat'] . "</td>";
            echo "<td>" . $row['de_reden_van_te_laat_komen'] . "</td>";
            echo "<td>";
            echo "<form method='POST' action='verwijder.php'>";
            echo "<button type='submit' onclick='return confirm(\"Weet u zeker dat u deze student wilt verwijderen?\")'>Verwijder</button>";
            echo "<input name='id' type='hidden' value=".$row["id"]."></input>";
            echo "</form>";
            echo "<form method='GET' action='updateForm.php'>";
            echo "<button type='submit'>Update</button>";
            echo "<input name='id' type='hidden' value=".$row["id"]."></input>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    foreach ($result as $row) {
        echo "<form method='post' action='form.php' class='toevoegen'>";
        echo "<input name='id' type='hidden' value=" . $row['id'] . "></input>";
        echo "<input name='naam_van_student' type='hidden' value=" . $row['naam_van_student'] . "></input>";
        echo "<input name='klas' type='hidden' value=" . $row['klas'] . "></input>";
        echo "<input name='aantal_minuten_te_laat' type='hidden' value=" . $row['aantal_minuten_te_laat'] . "></input>";
        echo "<input name='de_reden_van_te_laat_komen' type='hidden' value=" . $row['de_reden_van_te_laat_komen'] . "></input>";
        echo "</form>";
    }
    echo "<form method='post' action='form.php' class='toevoegen'>";
    echo "<button type='submit' name='toevoegen' class='btn btn-danger mb-3'>Wéér eentje te laat!</button>";
    echo "</form>";
    ?>
    <br>
    <table>
        <tr>
            <th>statistieken</th>
        </tr>
        <?php
        foreach ($result1 as $row) {
            echo "<tr>";

            echo "<td>" . "Gemiddelde: " . $row['AVG(aantal_minuten_te_laat)'] . "</td>";
            echo "</tr>";
        }
        foreach ($result2 as $row) {
            echo "<tr>";
            echo "<td>" . "Maximaal aantal minuten: " . $row['MAX(aantal_minuten_te_laat)'] . "</td>";
            echo "</tr>";
        }
        foreach ($result3 as $row) {
            echo "<tr>";
            echo "<td>" . "Totaal: " . $row['SUM(aantal_minuten_te_laat)'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    </body>
    </html>






