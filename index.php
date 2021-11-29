<?php
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
            <li><a href="">Home</a>
            </li>
            <li><a href="">Over Ons</a>
            </li>
            <li><a href="">Score</a>
            </li>
            <li><a href="">Contact</a>
            </li>
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

<div>
    <h2 class="score"> Scores</h2>
</div>
<div class="formulier">
<form action="./src/php/insert.php" enctype="multipart/form-data" method="post">
    <label>Full Name</label>
    <input type="text" name="fullname" placeholder="Your Full name">
    <label>E-mail</label>
    <input type="text" name="email" placeholder="Your E-mail">
    <label>Score</label>
    <input type="time" name="score" step="2" placeholder="Your Score">
    <label>Message</label>
    <input type="text" name="bericht" placeholder="Your Message">
    <label>Satisfaction</label> 
    <select name="keuzeveld">
        <option value="zeer tevreden">Very satisfied</option>
        <option value="tevreden">Satisfied</option>
        <option value="ontevreden">Unsatisfied</option>
    </select>
    <input type="submit" value="Submit">

</form>
</div>
<div class="row">
<?php echo $cards; ?>
</div>
<div class="footer">
<footer>
Copyright ©2021 Escape Room Excido Nederland
</footer>
</div>
</body>
</html>