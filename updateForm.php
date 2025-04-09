<?php
require "database-connectie.php";
$id = $_GET['id'];


$sql = "SELECT * FROM studenten WHERE id = :id";

$statement = $conn->prepare($sql);
$statement->bindParam(':id', $id);
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);


//print_r($data);
//exit();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Te laat melding</title>
    <style>

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
            justify-content: center;
            align-items: center;
            height: 100vh;
        }


        label {
            margin-bottom: 5px;
            font-weight: bold;
            width: 100%;
            color: #b3b3b3;
        }

        input[type="text"], input[type="number"] {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #555555;
            border-radius: 4px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
            background-color: #222222;
            color: #e5e5e5;
        }

        input[type="text"]::placeholder, input[type="number"]::placeholder {
            color: #b3b3b3;
        }




        .button-container form {
            margin-bottom: 10px;
            width: 100%;
        }

        input[type="submit"], button {
            background-color: #e50914;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        input[type="submit"]:hover, button:hover {
            background-color: #f40612;
        }


        form {
            width: 100%;
        }


        @media (max-width: 600px) {
            input[type="text"], input[type="number"], input[type="submit"], button {
                font-size: 14px;
            }
        }

        .terugknop {
            margin-top: 20px;
        }

    </style>
</head>
<body>
<div>
    <form action="update.php" method="get">
        naam van student:<input type="text" name="naam_van_student" value="<?php echo $data[0]['naam_van_student']; ?>"><br>
        klas: <input type="text" name="klas" value="<?php echo $data[0]['klas']; ?>"><br>
        Aantal minuten te laat: <input type="number" min="1" name="aantal_minuten_te_laat"
                                       value="<?php echo $data[0]['aantal_minuten_te_laat']; ?>"><br>
        De reden van te laat komen: <input type="text" name="de_reden_van_te_laat_komen"
                                           value="<?php echo $data[0]['de_reden_van_te_laat_komen']; ?>"><br>
        <input type="hidden" name="id" value="<?php echo $data[0]['id']; ?>">
        <input type="submit" value="toevoegen">
    </form>
    <form action="index.php" class="terugknop">
        <button type="submit">Terug naar overzicht</button>
    </form>
</div>

</body>
</html>