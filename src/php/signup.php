<?php
include_once '../includes/functions.inc.php';
?>

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
            <li><a href="../../index.php">Home</a></li>
            <li><a href="../../index.php">About Us</a></li>
            <li><a href="../../index.php">Score</a></li>
            <li><a href="../../index.php">Contact</a></li>
         <?php
            if (isset($_SESSION["userid"])) {
                echo "<li><a href='./src/php/logout.php'>Logout</a></li>";
            }
            if (isset($_SESSION["userRole"]) && $_SESSION["userRole"] == 1)
                echo "<li><a href='dashboard.php'>Dashboard</a></li>";
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
                <form class="contact-form" action="../includes/signup.inc.php" method="post">
                    <h3>Name</h3>
                    <input type="text" name="name" placeholder="Your name" required="required">
                    <h3>E-Mail</h3>
                    <input type="text" name="email" placeholder="Your E-Mail" required="required">
                    <h3>Username</h3>
                    <input type="text" name="uid" placeholder="Your Username" required="required">
                    <h3>Password</h3>
                    <input type="password" name="pwd" placeholder="Password" required="required">
                    <h3>Repeat Password</h3>
                    <input type="password" name="pwdrepeat" placeholder="Repeat password..." >
                    <button type="submit" name="submit">Submit</button>
                </form>

                <a href="resetpassword.php">Forgot your password</a>

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
            </div>
        </div>
</body>



