<?php
require './mysql.php';

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['useruid'])) {
    die("Login you cunt.");
}

$sql = "SELECT * FROM `reservations` WHERE userId = ?";

$stmt = $conn -> prepare($sql);

if (!$stmt) {
    die("Statement failed.");
}

$stmt -> bind_param('i', $_SESSION['useruid']);
$stmt -> execute();
$result = $stmt->get_result();

$records = "";
if ($result->num_rows) {

    while ($row = $result->fetch_assoc()) {
        $records .=
            "<tr><td>" .
            $row["roomId"] .
            "</td><td>" .
            $row["userId"] .
            "</td><td>" .
            $row["date"] .
            "</td><td>" .
            $row["message"] .
            "</td><td>" .
            "<td>
                <a href='update.php?id=" .
            $row["id"] .
            "'>
                    <img style='width: 50px' src='../img/Pencil.svg.png' alt='Pencil image'>
                </a>
            </td>
            <td>
                <a href='delete.php?id=" .
            $row["id"] .
            "'>
                    <img style='width: 50px' src='../img/cross.jpg' alt='Cross image'>
                </a>
            </td>
            </tr>";
    }
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Escaperoom Excido</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/grid.css">
    <link rel="stylesheet" href="../css/modal.css">
</head>
<body>
<header>
    <nav>
        <div class="logo">
            <h1><a href="index.html"></a>ES.Excido</h1>
        </div>
        <ul class="nav-links">
            <li><a href="../../index.php">Home</a></li>
            <li><a href="../../index.php">Over Ons</a></li>
            <li><a href="../../index.php">Score</a></li>
            <li><a href="../../index.php">Contact</a></li>
         <?php
            if (isset($_SESSION["userid"])) {
                echo "<li><a href='logout.php'>Logout</a></li>";
               }
            if (isset($_SESSION["userRole"]) && $_SESSION["userRole"] == 1) {
                 echo "<li><a href='reservation.php'>Reservation</a></li>";
                 echo "<li><a href='dashboard.php'>Dashboard</a></li>";
            }
            else {
                echo "<li><a href='signup.php'>Sign up</a></li>";
                echo "<li><a href='login.php'>Log in</a></li>";
            }
         ?>
        </ul>
    </nav>
</header>

        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Room</th>
                            <th scope="col">User</th>
                            <th scope="col">Date</th>
                            <th scope="col">Message</th>
                            <th scope="col">edit</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $records ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>