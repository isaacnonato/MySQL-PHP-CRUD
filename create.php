<?php
require_once("db.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_nameError = null;
    $last_nameError = null;
    $notesError = null;


    if (!empty($_POST)) {
        $valid = true;

        if (empty($_POST["first_name"])) {
            $first_nameError = "Insert a valid name!";
            $valid = false;
        } else {
            $first_name = $_POST["first_name"];
        }

        if (empty($_POST["last_name"])) {
            $last_nameError = "Insert a valid last name!";
            $valid = false;
        } else {
            $last_name = $_POST["last_name"];
        }

        if (empty($_POST["notes"])) {
            $notesError = "Insert a valid note!";
            $valid = false;
        } else {
            $notes = $_POST["notes"];
        }

        if (isset($_POST["allowed"])) {
            $allowed = 1;
        } else {
            $allowed = 0;
        }
    }

    if ($valid) {
        $pdo = DB::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO tb_people(first_name, last_name, allowed, notes) VALUES(?,?,?,?)");
        $stmt->execute(array($first_name, $last_name, $allowed, $notes));
        DB::disconnect();
        header("Location: index.php");
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Criar registro</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form method="post">
                    <div class="form-group">
                        <label for="first_name">Primeiro nome</label>
                        <input type="text" placeholder="Ex.: João" class="form-control" autocomplete="off" name="first_name" id="first_name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Último nome</label>
                        <input type="text" placeholder="Ex.: Vieira" class="form-control" autocomplete="off" name="last_name" id="last_name">
                    </div>
                    <div class="form-group">
                        <label for="notes">Anotações</label>
                        <input type="text" class="form-control" autocomplete="off" name="notes" id="notes">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" name="allowed" class="form-check-input" id="allowed_check">
                        <label class="form-check-label" for="allowed_check">Permissão</label>
                    </div>
                    <button type="submit" class="btn btn-danger">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>