<?php
session_start();

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

        html {
            height: 100%;
        }

        body {
            padding-bottom: 57px;
            text-align: center !important;
            height: inherit;
        }

        .table {
            margin-top: 40% !important;
        }
    </style>

    <title>CRUD de bosta olha q piada</title>
</head>
<body>
    <div class="container h-100">
    <nav class="navbar navbar-light bg-light justify-content-between">
    <a class="navbar-brand">Navbar</a>
    <a href="create.php"><button class="btn btn-primary">Adicionar usuário</button>
</a>
</nav>
        <div class="row justify-content-center h-100">
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
                    $sql = "SELECT * FROM people";

                    foreach($pdo->query($sql) as $row) {
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
                        echo "<td>";
                        echo "<a type='button' class='btn btn-danger' href='delete.php?id=". $row["id"] . "'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>