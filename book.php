<?php
session_start();
echo $_SESSION['userid'].", your booking details is as follows";
?>
<?php
if(isset($_SESSION['userid']))
{
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BOOK</title>
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
    <?php
    $tnum=$_POST['Tnum']; //train number from form
    $tdate=$_POST['date']; //travel date from form
    $clas=array("First Class A/C","First Class Non A/C","Second Class","Third Class"); //array to store different types of classes
    $clas_short= array("fca","fcna","sc","tc"); //short hand notation of the classes
    include ("connection.php");
    $sql="SELECT * FROM availability WHERE Tno='$tnum' AND Tdate='$tdate'"; //sql query to fetch the data from database
    $avail=$connect->query($sql); //content from data base
    while($row=$avail->fetch_assoc())
    {
        $tnum=(int)$tnum;
        $cls=(int)$_POST['Tclass']; //travel class from the form
        $noti=(int)$_POST['num_of_tickets']; //number of tickets from the form
        $index_class=(int)$cls-1; //to find the class
        $user=$_SESSION['userid']; //current user
        $na=$clas_short[$index_class]; //short hand notation of the travel class
        $nb=$clas[$index_class]; //class notation of travel class
        date_default_timezone_set("Asia/Calcutta"); //to grt the current time
        $tim=date("h:i:sa"); //current time in hh:mm:ss(am/pm) format
        /*echo "userid,tnum,tdate,cls,noti,tim"."<br>";
        echo $user."<br>".gettype($user)."<br><br>";
        echo $tnum."<br>".gettype($tnum)."<br><br>";
        echo $tdate."<br>".gettype($tdate)."<br><br>";
        echo $na."<br>".gettype($na)."<br><br>";
        echo $nb."<br>".gettype($nb)."<br><br>";
        echo $noti."<br>".gettype($noti)."<br><br>";
        echo $tim."<br>".gettype($tim)."<br><br>";*/

        if((int)$row[$na]>=$noti) //if seats are available
        {
          $p1=substr($user,0,3).":"; //first three character of user name
          $p2=$tnum.":"; //train number
          $p3=date("Y:m:d").":"; //booking date
          $p4=substr($tim,0,8); //time
          $tiktnum=$p1.$p2.$p3.$p4; //ticket number
          $sql="INSERT INTO booked (Ticket_Number,UID,Tno,Tdate,class,NumOfTickets,booktime) VALUES ('$tiktnum','$user','$tnum','$tdate','$nb','$noti','$tim')"; //sql query to book tickets
          $connect->query($sql); //to make changes in database
          $avai=(int)$row[$na]-$noti; //to change available seats
          $update_sql="UPDATE availability SET $na='$avai' WHERE Tno='$tnum' AND Tdate='$tdate'";//sql query to update number of seats in availability table
          $connect->query($update_sql); //to make changes in database
          ?>
          <h3><?php echo "Ticket Booked Successfully<br><br><br>";  ?></h3>
          <h2><?php echo "Your Ticket Number: ".$tiktnum;  ?></h2>
          <?php
          break;
        }
        else
        {
          echo "<br>";
          ?>
          <h2><?php echo $noti. " ticket(s)  not available<br>";  ?></h2>
          <h2><?php echo "Only ".$row[$na]." ticket(s) are available<br>";  ?> </h2>
          <?php
          echo "Choose appropriately, Try with other options";
          break;
        }
        /*echo $row['Tno'];
        echo "<br>";
        echo $row['Tdate'];
        echo "<br>";
        echo $row['fca'];
        echo "<br>";
        echo $row['fcna'];
        echo "<br>";
        echo $row['sc'];
        echo "<br>";
        echo $row['tc'];
        echo "<br>";*/
    }
    ?>
    <br><br><hr>
    <center>
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
