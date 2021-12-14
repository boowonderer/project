<?php
session_start();
include_once './src/includes/functions.inc.php';

require './src/php/mysql.php';

//$sql = "INSERT INTO personen (firstname, lastname, age, adress, city, length, weight) VALUES ('John', 'Doe', 19, 'halaljgig', 'houten', 2.6, 88)";
//if ($conn->query($sql) === TRUE) {
//    echo "New record created successfully";
//} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
//}
$sql = "SELECT * FROM scoreformulier";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$cards = "";

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $fullname = $row['fullname'];
        $score = gmdate("H:i:s", $row['score']);
        $bericht = $row['bericht'];
        $keuzeveld = $row['keuzeveld'];
        $test = <<<XYZ
<div class="container">
    <div class="mycard">
            <div class="cimg">
            <img src="./src/img/img1.jpg" alt="">
        </div>
        <div class="cdetail">
            <h2>Score:</h2>
           <ul class="list-group list-group-flush">
                    <li class="list-group-item">Fullname: $fullname</li>
                    <li class="list-group-item">Timescore: $score </li>
                    <li class="list-group-item">Message: $bericht </li>
                    <li class="list-group-item">Satisfaction: $keuzeveld </li>
           </ul>
             </div>
        </div>
    </div>


XYZ;
        $cards = $cards.$test;

    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Escaperoom Excido</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="src/css/grid.css">
</head>
<body>
<header>

    <nav>
        <div class="logo">
            <h1><a href="index.html"></a>ES.Excido</h1>
        </div>
        <ul class="nav-links">
            <li><a href="">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="">Score</a></li>
            <li><a href="">Contact</a></li>
         <?php
            if (isset($_SESSION["userid"])) {
                echo "<li><a href='./src/php/logout.php'>Logout</a></li>";
            }
            else {
                echo "<li><a href='./src/php/signup.php'>Sign up</a></li>";
                echo "<li><a href='./src/php/login.php'>Log in</a></li>";
            }
         ?>
        </ul>
    </nav>
</header>
<section>
    <div class="content">
        <h1>Welkom bij Excido!</h1>
    </div>
</section>
<div class="container">
    <div class="mycard">
        <div class="cimg">
            <img src="./src/img/img1.jpg" alt="">
        </div>
        <div class="cdetail">
            <h2>Card no1</h2>
            <p>
                Here you can see our first escape room that we have to offer. It is one
                of our most sold out rooms of the days. With a lot of tricky tasks.
            </p>
        </div>
    </div>
    <div class="mycard">
        <div class="cimg">
            <img src="./src/img/img2.jpg" alt="">
        </div>
        <div class="cdetail">
            <h2>Card no2</h2>
            <p>
                Here you can see our second escape room that we have to offer. It is one
                of our most sold out rooms of the days. With a lot of tricky tasks.
            </p>
        </div>
    </div>
    <div class="mycard">
        <div class="cimg">
            <img src="./src/img/img3.jpg" alt="">
        </div>
        <div class="cdetail">
            <h2>Card no3</h2>
            <p>
                Here you can see our third escape room that we have to offer. It is one
                of our most sold out rooms of the days. With a lot of tricky tasks.
            </p>
        </div>
    </div>
</div>
<section-wave id="about">
        <div class="content2">
            <h2>About Us Excido</h2>
            <p>
                Escape Room Excido is a brand new escape room experience in Southeast Michigan.

                We know all escape rooms are slightly different but the idea is the same, get locked in and try to get out in under an hour. So we wanted to make ours really stand out.

                You decide what kind of adventure you want with multiple rooms that can be different levels of difficulty in each room. Our rooms are fully themed with interactive special effects that take you to another world or a different time and place. We can’t give away all our secrets but we promise you a one-of-a-kind experience that is a challenging and memorable good time. You leave with hilarious and great stories about how much fun you had and how you did or didn’t escape the room.
            </p>
        </div>
        <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#fff" fill-opacity="1" d="M0,128L48,149.3C96,171,192,213,288,202.7C384,192,480,128,576,133.3C672,139,768,213,864,229.3C960,245,1056,203,1152,181.3C1248,160,1344,160,1392,160L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </section-wave>

  <div class="contact-content">
        <div class="contact-form-container">
            <h1>Contact</h1>
            <form class="contact-form" action="../sources/php/contact-forum.php" method="post">
                <h3>Naam</h3>
                <input type="text" name="name" placeholder="Naam" required="required">
                <h3>E-Mail</h3>
                <input type="email" name="mail" placeholder="123456@mboutrecht.nl" required="required">
                <h3>Onderwerp</h3>
                <input type="text" name="subject" placeholder="Onderwerp" required="required">
                <h3>Bericht</h3>
                <textarea name="message" required="required"></textarea>
                <button type="submit" name="submit">Versturen</button>
            </form>
        </div>
    </div>





</body>
</html>