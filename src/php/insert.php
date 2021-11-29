<?php
require 'mysql.php';

if (isset($_POST['submit'])) return;

$fullName = $_POST['fullname'];
$email = $_POST['email'];
$bericht = $_POST['bericht'];
$keuzeVeld = $_POST['keuzeveld'];
$score = strtotime($_POST['score'], 0);
$sql = "INSERT INTO scoreformulier (fullname, email, score, bericht, keuzeveld) VALUES ('$fullName', '$email', $score, '$bericht', '$keuzeVeld')";

if ($conn->query($sql) === TRUE) {
  // echo "New record created successfully";
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}

header( "Location: ../../");
