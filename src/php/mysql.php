<?php
$servername = "198.244.216.169";
$dbUsername = "philip";
$password = "vc^yN9Nn$#eva9Fx_c3gC4Q*h0mWjH#6";
$dbname = "philip";
// Create connection
$conn = new mysqli($servername, $dbUsername, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql =  "create TABLE if not exists scoreformulier (
	id INT(6) AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    score INT(6) NOT NULL,
    bericht VARCHAR(30),
    keuzeveld ENUM('zeer tevreden', 'tevreden', 'ontevreden')
    )";
$conn -> query($sql);

$sql = "CREATE TABLE if not exists `reservations` ( `reservationId` INT NOT NULL AUTO_INCREMENT , `roomId` INT NOT NULL , `userId` INT NOT NULL , `date` DATE NOT NULL , `message` TEXT NOT NULL , PRIMARY KEY (`reservationId`));";
$conn -> query($sql);