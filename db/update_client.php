<?php
require_once "config.php";


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $sql = "UPDATE Clients SET 
            Name    = ?,
            Email   = ?,
            Phone   = ?,
            Address = ?,
            CreatedAt=?
            WHERE ID= ?";

    $ID   =  $_POST["ID"];
    $name =  $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address=$_POST["address"];
    $createdAt = $_POST["CreatedAt"];

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "sssssi",  $name, $email, $phone, $address, $createdAt, $ID);

    if (mysqli_stmt_execute($stmt)) 
        header("location: ../index.php?Update=SUCCESSFUL");
    else 
        die("ERROR: Could not update details");

}

$qry = "SELECT * FROM Clients WHERE ID=".$_GET["ID"];

$data = mysqli_query($conn, $qry);

while ($result = mysqli_fetch_assoc($data))
{
    $Name =  $result["Name"];
    $Email = $result["Email"];
    $Phone = $result["Phone"];
    $Address=$result["Address"];
    $createdAt=$result["CreatedAt"];

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update client Epstiens Client List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">   
    <link rel="stylesheet" href="../styles/forms.css">
</head>
<body>
    <h1 class="alert alert-success">Update a client</h1>

    <form method="POST">
        <div class="form-group">
            <label class="control-label">ID</label>
            <input type="text" name="ID" class="form-control" readonly value="<?php echo htmlspecialchars($_GET["ID"]) ?>">
        </div>

        <div class="form-group">
            <label class="control-label">Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($Name) ?>" required >
        </div>

        <div class="form-group">
            <label class="control-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($Email) ?>" required>
        </div>

        <div class="form-group">
            <label class="control-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($Phone) ?>" required>
        </div>

        <div class="form-group">
            <label class="control-label">Address</label>
            <input type="text" name="address" class="form-control" value="<?php echo htmlspecialchars($Address) ?>" required>
        </div>
        <div class="form-group">
            <label class="control-label">Created At</label>
            <input type="text" name="CreatedAt" class="form-control" readonly value="<?php echo htmlspecialchars($createdAt) ?>">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>

    
</body>
</html>