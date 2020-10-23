<?php
session_start();
?>
<?php
if(isset($_SESSION['userid']))
{
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <style media="screen">
      body{background-color: #e0feff;}
      a
      {
        text-decoration: none;
        color: black;
      }
      button
      {
        width: 250px;
        height: 50px;
        border: solid black 5px;
        border-radius: 20px;
        background-color: #73ffa2;
      }
    </style>
  </head>
  <body>
    <center>
      <h1>Welcome to Railway Ticket Reservation Portal</h1><br><br><br>
      <h3><?php echo "Welcome ".$_SESSION['userid']; ?></h3><br><br>
      <button type="button" id="res"><?php echo '<a href="reservation.php">RESERVE TICKETS</a>' ;  ?> </button><br><br><br>
      <button type="button" id="vt"><?php echo '<a href="viewtickets.php">VIEW BOOKED TICKETS</a>'; ?></button><br><br><br>
      <button type="button" id="cancel"><?php echo '<a href="req_cancel.php">CANCEL BOOKED TICKETS</a>'; ?></button><br><br><br>
      <button type="button" id="logout"><?php echo '<a href="logout.php">LOGOUT</a>'; ?></button><br><br><br>
    </center>
  </body>
</html>
<?php
}
else
{
  echo '<script> window.location.href = "login.php";</script>';
}
?>
