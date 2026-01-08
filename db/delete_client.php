<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $sql = "DELETE FROM Clients WHERE ID=" . $_POST["ID"];

    mysqli_query($conn, $sql);
    
    echo "deleted";
    header("location: ../");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete client Epstiens Client List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">   
    <link rel="stylesheet" href="../styles/index.css">
</head>
<body>
    <h1 class="alert alert-danger">Delete a client</h1>
    

    <p>Are you sure you want to delete: <br>ID: <?php echo $_GET["ID"] ?><br>Name: <?php echo $_GET["Name"] ?></p>

    <form method="POST">
        <input type="hidden" name="ID" value="<?php echo $_GET["ID"]; ?>">
        <button type="submit" clas="btn btn-danger">Yes, Delete</button>
        <a href="../" class="btn btn-secondary">No, Cancel</a>
    </form>

    
</body>
</html>