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
    <title>View Booked Tickets</title>
    <style media="screen">
      body{background-color: #e0feff;}
      button
      {
        width: 250px;
        height: 50px;
        border: solid black 5px;
        border-radius: 20px;
        background-color: #73ffa2;
      }
      a
      {
        text-decoration: none;
        color: black;
      }
    </style>
  </head>
  <body>
    <h2><?php echo $_SESSION['userid'].", this is your booked tickets";?></h2>
    <?php
    include ("connection.php");
    $user=$_SESSION['userid'];
    $sql="SELECT * FROM booked WHERE UID='$user'"; //sql query to fetch the data from database
    $avail=$connect->query($sql); //content from data base
    while($row=$avail->fetch_assoc())
    {
      echo"<br><br><hr>";
      echo "Ticket Number: ";
      ?>
      <b><?php echo $row['Ticket_Number'];  ?></b>
      <?php
      echo "<br>";
      echo "Train Number: ";
      echo $row['Tno'];
      echo "<br>";
      echo "Travel Date: ";
      echo $row['Tdate'];
      echo "<br>";
      echo "Class: ";
      echo $row['class'];
      echo "<br>";
      echo "Number of Tickets: ";
      echo $row['NumOfTickets'];
      echo "<br>";
      echo "<br><br>";
    }
    echo "<hr>";
    ?>
    <center>
    <br>
    <button type="button" id="home"><?php echo '<a href="welcome.php">HOME PAGE</a>'; ?></button><br><br>
    <button type="button" id="res"><?php echo '<a href="reservation.php">RESERVE TICKETS</a>' ;  ?> </button><br><br>
    <button type="button" id="vt"><?php echo '<a href="viewtickets.php">VIEW BOOKED TICKETS</a>'; ?></button><br><br>
    <button type="button" id="cancel"><?php echo '<a href="req_cancel.php">CANCEL BOOKED TICKETS</a>'; ?></button><br><br>
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
