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
    <title>Cancelling</title>
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
      <?php
      $clas=array("First Class A/C","First Class Non A/C","Second Class","Third Class"); //array to store different types of classes
      $clas_short= array("fca","fcna","sc","tc"); //short hand notation of the classes
      $tiktnum=$_POST['Ticket_Number'];
      $user=$_SESSION['userid'];
      include ("connection.php");
      $delsql="SELECT * FROM booked WHERE Ticket_Number='$tiktnum'"; //sql query to fetch the data from database
      $book_c=$connect->query($delsql); //content from data base
      while ($row=$book_c->fetch_assoc())
      {
        $clsindex=0;
        for($i=0; $i<4 ;$i++)
        {
          if($row['class']==$clas[$i])
          {
            $clsindex=$i;
            break;
          }
        }
        $tnum=$row['Tno'];
        $tdate=$row['Tdate'];
        $avl_sql="SELECT * FROM availability WHERE Tno='$tnum' AND Tdate='$tdate'";
        $avail=$connect->query($avl_sql);
        ?>
        <script type="text/javascript">
          var del=confirm("Click OK to cancel the ticket or Click cancel to stop the cancelation ");
          if(del==true)
          {
            <?php
            while ($col=$avail->fetch_assoc())
            {
              $cancelTicket=(int)$row['NumOfTickets'];
              $sc=$clas_short[$clsindex];
              $remTicket=(int)$col[$sc];
              $remTicket=$remTicket+$cancelTicket;
              $update_sql="UPDATE availability SET $sc='$remTicket' WHERE Tno='$tnum' AND Tdate='$tdate'";
              $connect->query($update_sql); //to make changes in database
            }
            $del_booked="DELETE FROM booked WHERE Ticket_Number='$tiktnum'";
            $connect->query($del_booked); //to make changes in database
            ?>
          }
          </script>
          <?php
      }
       ?>
       <h3><?php echo $_SESSION['userid'].", Ticket has been canceled successfully"; ?> </h3>
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
