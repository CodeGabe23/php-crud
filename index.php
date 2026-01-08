<?php
require_once "db/config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Jeffrey Epstein Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">   
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>
    
    <h1 class="alert alert-info">Epstein Client List</h1>

    <a href="db/add_client.php"> <h2 class="btn btn-primary">Add New Client</h2> </a>
    <table class="table table-bordered">
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Created At</th>
            <th>Action</th>
    <?php

        // loop over data
        $sql = "SELECT * FROM Clients";

        $data = mysqli_query($conn, $sql);


        while ($result = mysqli_fetch_assoc($data))
        {
            echo "<tr>"; 
            echo "<td>" . $result["ID"] . "</td>";
            echo "<td>" . $result["Name"] . "</td>";
            echo "<td>" . $result["Email"] . "</td>";
            echo "<td>" . $result["Phone"] . "</td>";
            echo "<td>" . $result["Address"] . "</td>";
            echo "<td>" . $result["CreatedAt"] . "</td>";
            echo "<td> 
                <a href='db/update_client.php?ID=" . $result['ID'] . "&Name=". $result["Name"] ."'> <button class='btn btn-primary'>Edit</button>  </a>
                <a href='db/delete_client.php?ID=" . $result['ID'] . "&Name=". $result["Name"] ."'> <button class='alert alert-danger' style='padding-top:1%; padding-bottom:2.5%;'>Delete</button> </a>
            </td>";
            echo "</tr>";
        }
    ?>
    </table>

</body>
</html>