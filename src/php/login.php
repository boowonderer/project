<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Escaperoom Excido</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/grid.css">
</head>
<body>
<header>
    <nav>
        <div class="logo">
            <h1><a href="index.php"></a>ES.Excido</h1>
        </div>
        <ul class="nav-links">
            <li><a href="../../index.php">Home</a></li>
            <li><a href="../../index.php">Over Ons</a></li>
            <li><a href="../../index.php">Score</a></li>
            <li><a href="">Contact</a></li>
         <?php
            if (isset($_SESSION["userid"])) {
                echo "<li><a href='./src/php/logout.php'>Logout</a></li>";
            }
            else {
                echo "<li><a href='signup.php'>Sign up</a></li>";
                echo "<li><a href='#'>Log in</a></li>";
            }
         ?>
        </ul>
    </nav>
</header>
<section>
<div class="contact-content">
            <div class="contact-form-container">
                <h1>Log In</h1>
                <form class="contact-form" action="../sources/php/contact-forum.php" method="post">
                    <h3>Username</h3>
                    <input type="text" name="name" placeholder="Naam" required="required">
                    <h3>Password</h3>
                    <input type="password" name="pwdrepeat" placeholder="Password..." >
                    <h3>Repeat Password</h3>
                    <input type="password" name="pwdrepeat" placeholder=" Repeat Password..." >
                    <button type="submit" name="submit">Log in</button>
                </form>
            </div>
        </div>
  <?php
    // Error messages
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
      }
      else if ($_GET["error"] == "wronglogin") {
        echo "<p>Wrong login!</p>";
      }
    }
  ?>
</section>

