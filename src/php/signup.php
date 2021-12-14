<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Escaperoom Excido</title>
    <link rel="stylesheet" href="../css/signup.css">
    <link rel="stylesheet" href="../css/grid.css">
</head>
<body>
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
                echo "<li><a href='../php/signup.php'>Sign up</a></li>";
                echo "<li><a href='../php/login.php'>Log in</a></li>";
            }
         ?>
        </ul>
    </nav>
    <div class="contact-content">
            <div class="contact-form-container">
                <h1>Sign Up</h1>
                <form class="contact-form" action="../sources/php/contact-forum.php" method="post">
                    <h3>Name</h3>
                    <input type="text" name="name" placeholder="Naam" required="required">
                    <h3>E-Mail</h3>
                    <input type="email" name="email" placeholder="123456@exicdo.nl" required="required">
                    <h3>Password</h3>
                    <input type="password" name="pwd" placeholder="Password" required="required">
                    <h3>Repeat Password</h3>
                    <input type="password" name="pwdrepeat" placeholder="Repeat password..." >
                    <button type="submit" name="submit">Sumbit</button>
                </form>
            </div>
        </div>
</body>
<div class="signup-form-form">
    <form action="../includes/signup.inc.php" method="post">
      <input type="text" name="name" placeholder="Your name...">
      <input type="text" name="email" placeholder="Email...">
      <input type="text" name="uid" placeholder="Username...">
      <input type="password" name="pwd" placeholder="Password...">
      <input type="password" name="pwdrepeat" placeholder="Repeat password...">
      <button type="submit" name="submit">Sign up</button>
    </form>
  </div>
  </div>
  <?php
    // Error messages
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
      }
      else if ($_GET["error"] == "invaliduid") {
        echo "<p>Choose a proper username!</p>";
      }
      else if ($_GET["error"] == "invalidemail") {
        echo "<p>Choose a proper email!</p>";
      }
      else if ($_GET["error"] == "passwordsdontmatch") {
        echo "<p>Passwords doesn't match!</p>";
      }
      else if ($_GET["error"] == "stmtfailed") {
        echo "<p>Something went wrong!</p>";
      }
      else if ($_GET["error"] == "usernametaken") {
        echo "<p>Username already taken!</p>";
      }
      else if ($_GET["error"] == "none") {
        echo "<p>You have signed up!</p>";
      }
    }
  ?>
</section>


