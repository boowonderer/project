<?php
$servername = "176.31.151.81";
$username = "philip";
$password = "vc^yN9Nn$#eva9Fx_c3gC4Q*h0mWjH#6";
$dbname = "philip";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

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