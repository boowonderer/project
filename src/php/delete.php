<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_GET["id"])) {
        echo "Je hebt geen id ingevuld";
    } else {
        include "mysql.php";

        $id = $_GET["id"];

        $sql = "DELETE FROM `reservations` WHERE `reservationId` = $id";

        $result = $conn->query($sql);

        $conn->close();
        header("Location: dashboard.php");
    }
}
?>
