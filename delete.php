<?php
session_start();
require_once ("db.php");
$id = $_GET["id"];
echo "<strong>$id</strong>";

if (!empty($_POST["id"])) {
    $pdo = DB::connect();
    $stmt = $pdo->prepare("DELETE FROM people WHERE id=?");
    $stmt->execute(array($id));
    DB::disconnect();
    header("Location: index.php");
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https:stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Delete registry</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div id="delete-confirm" class="col-md-4">
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="alert alert-primary" role="alert">
                        Do you want to delete this record?
                    </div>
                    <button type="submit" class="btn btn-danger">Yes</button>
                    <a href="index.php"><button type="button" class="btn btn-secondary">No</button>
                    </a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
