<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Escaperoom Excido</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
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
<section class="signup-form">
  <h2>Log In</h2>
  <div class="signup-form-form">
    <form action="../includes/login.inc.php" method="post">
      <input type="text" name="uid" placeholder="Username/Email...">
      <input type="password" name="pwd" placeholder="Password...">
      <button type="submit" name="submit">Sign up</button>
    </form>
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

