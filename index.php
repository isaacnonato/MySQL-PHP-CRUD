<?php

require_once "db.php";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        body {
            text-align: center !important;
        }
    </style>
    <title>CRUD de bosta olha q piada</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Primeiro nome</th>
                    <th scope="col">Último nome</th>
                    <th scope="col">Anotações</th>
                    <th scope="col">Permitido</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $pdo = DB::connect();
                $stmt = $pdo->query("SELECT * FROM tb_people");
                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $row["id"] . "</th>";
                    echo "<td>" . $row["first_name"] . "</td>";
                    echo "<td>" . $row["last_name"] . "</td>";
                    echo "<td>" . $row["notes"] . "</td>";
                    if ($row["allowed"]) {
                        echo "<td>" . "✔" . "</td>";
                    } else {
                        echo "<td>" . "✗" . "</td>";
                    };
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>