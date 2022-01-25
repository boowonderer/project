<?php
include '../mysql.php';
session_start();
if  (isset($_POST['submit'])) return;

$roomId =  $_GET['roomId'];
$date = $_POST['date'];
$userid = $_SESSION["userid"];
$message = $_POST['message'];

$sql = "INSERT INTO reservations (roomId, userId, `date`, `message`) VALUES (?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../reservations.php?error=stmtfailed");
		exit();
	}


mysqli_stmt_bind_param($stmt, "iiss", $roomId, $userid, $date, $message);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conn);
header("location: ../reservations.php");