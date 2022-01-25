<?php
 session_start();
  if ($_SESSION["userRole"] == null || $_SESSION["userRole"] != '1') {
    header("location: ../../index.php");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Escaperoom Excido</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/grid.css">
    <link rel="stylesheet" href="../css/modal.css">
</head>
<body>
<header>
    <nav>
        <div class="logo">
            <h1><a href="index.html"></a>ES.Excido</h1>
        </div>
        <ul class="nav-links">
            <li><a href="../../index.php">Home</a></li>
            <li><a href="../../index.php">Over Ons</a></li>
            <li><a href="../../index.php">Score</a></li>
            <li><a href="../../index.php">Contact</a></li>
         <?php
            if (isset($_SESSION["userid"])) {
                echo "<li><a href='logout.php'>Logout</a></li>";
               }
            if (isset($_SESSION["userRole"]) && $_SESSION["userRole"] == 1) {
                 echo "<li><a href='reservation.php'>Reservation</a></li>";
                 echo "<li><a href='dashboard.php'>Dashboard</a></li>";
            }
            else {
                echo "<li><a href='signup.php'>Sign up</a></li>";
                echo "<li><a href='login.php'>Log in</a></li>";
            }
         ?>
        </ul>
    </nav>
</header>
<h2 class="wajow">Make a reservation</h2>
<div class="container">
    <div class="mycard">
        <div class="cimg">
            <img src="../img/img1.jpg" alt="">
        </div>
        <div class="cdetail">
            <h2>Card no1</h2>
            <p>
                Here you can see our first escape room that we have to offer. It is one
                of our most sold out rooms of the days. With a lot of tricky tasks.
            </p>
            <div class="button">
                <button openModal="reservationModal-room1">Make reservation</button>
            </div>
        </div>
    </div>
    <div class="mycard">
        <div class="cimg">
            <img src="../img/img2.jpg" alt="">
        </div>
        <div class="cdetail">
            <h2>Card no2</h2>
            <p>
                Here you can see our second escape room that we have to offer. It is one
                of our most sold out rooms of the days. With a lot of tricky tasks.
            </p>
            <div class="button">
                <button openModal="reservationModal-room2">Make reservation</button>
            </div>
        </div>
    </div>
    <div class="mycard">
        <div class="cimg">
            <img src="../img/img3.jpg" alt="">
        </div>
        <div class="cdetail">
            <h2>Card no3</h2>
            <p>
                Here you can see our third escape room that we have to offer. It is one
                of our most sold out rooms of the days. With a lot of tricky tasks.
            </p>
            <div class="button">
              <button openModal="reservationModal-room3">Make reservation</button>
            </div>
        </div>
    </div>
</div>
<?php
for ($i = 1; $i <= 3; $i++) {
    echo '<div class="modal" id="reservationModal-room'.$i.'" style= "display: none">
                 <div class="modal-content">
                          <div class="modal-title">
                              <h4>Example Modal</h4>
                          </div>
                          <div class="modal-body">
                      <form action="reservation/reservation.php?roomId='.$i.'" enctype="multipart/form-data" method="post">
                          <label>Date</label>
                          <input type="date" name="date" placeholder="Reserve a day">
                          <label>Message</label>
                          <input type="text" name="message" placeholder="Any things we need to know">
                          <input type="submit" value="Submit">
                      </form>
                          </div>
                          <div class="modal-footer">
                              <button closeModal="reservationModal-room'.$i.'">Close</button>
                          </div>
                 </div>
          </div>';
}
?>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
<script src="../js/script.js"></script>
<script src="../js/modal.js"></script>
</html>


