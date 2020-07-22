<?php

session_start();
require_once("db.php");
$id = intval($_GET["id"]);

$pdo = DB::connect();
$sql = "SELECT * FROM people WHERE id=?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($id));
$row = $stmt->fetch();

$name = $row["first_name"];
$last_name = $row["last_name"];
$notes = $row["notes"];
$allowed = $row["allowed"];

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $new_name = $_POST["first_name"];
    $new_last_name = $_POST["last_name"];
    $new_notes = $_POST["notes"];
    $new_allowed = isset($_POST["allowed"]);

    $new_allowed = $new_allowed ? 1 : 0;

    $sql = "UPDATE people
            SET first_name=?, last_name=?, allowed=?, notes=? 
            WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($new_name, $new_last_name, $new_allowed, $new_notes, $id));
    DB::disconnect();
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Editar registro</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form method="post">
                <div class="form-group">
                    <label for="first_name">Primeiro nome</label>
                    <input type="text" class="form-control" autocomplete="off" value="<?= $name ?>" name="first_name" id="first_name">
                </div>
                <div class="form-group">
                    <label for="last_name">Último nome</label>
                    <input type="text" class="form-control" autocomplete="off" value="<?= $last_name ?>" name="last_name" id="last_name">
                </div>
                <div class="form-group">
                    <label for="notes">Anotações</label>
                    <input type="text" class="form-control" value="<?= $notes ?>" autocomplete="off" name="notes" id="notes">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="allowed" class="form-check-input" id="allowed_check" <?php echo ($allowed ? 'checked' : ''); ?>
                    <label class="form-check-label" for="allowed_check">Permissão</label>
                </div>
                <button type="submit" class="btn btn-danger">Salvar alterações</button>
                <a href="index.php"><button type="button" class="btn btn-secondary">Cancelar</button></a>
            </form>
        </div>
    </div>
    </div>
</body>
</html>