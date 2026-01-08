<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    $sql = "INSERT INTO Clients (Name, Email, Phone, Address) VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $address);

    if (mysqli_stmt_execute($stmt)) echo "Succesfully added client.";
    else echo "ERROR: could not add client. " . mysqli_stmt_error($stmt);

    header("location: ../");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add client to Epstiens Client List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">   
    <link rel="stylesheet" href="../styles/forms.css">
</head>
<body>
    <h1 class="alert alert-info">Add a new client</h1>
    <form method="POST">
        <div class="form-group">
            <label class="control-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter full name" required>
        </div>

        <div class="form-group">
            <label class="control-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
        </div>

        <div class="form-group">
            <label class="control-label">Phone</label>
            <input type="text" name="phone" class="form-control" placeholder="Enter phone" required>
        </div>

        <div class="form-group">
            <label class="control-label">Address</label>
            <input type="text" name="address" class="form-control" placeholder="Enter address" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
    
</body>
</html>