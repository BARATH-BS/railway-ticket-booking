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
     <title>Cancel</title>
     <style media="screen">
     select,input, #notic
     {
       height: 25px;
       width: 180px;
       border-width: 0px;
       background-color: #e0feff;
     }
     body{background-color: #e0feff;}
     #sub
     {
       height: 30px;
       width: 100px;
       border: solid black 3px;
       background-color:#ff1c1c;
       border-radius: 25px;
     }
     #home
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
         <h1>CANCELATION</h1>
         <h3><?php echo $_SESSION['userid'].", click on the respective cancel button to cancel the ticket"; ?></h3>
         <?php
         include ("connection.php");
         $user=$_SESSION['userid'];
         $sql="SELECT * FROM booked WHERE UID='$user'"; //sql query to fetch the data from database
         $avail=$connect->query($sql); //content from data base
         while ($row=$avail->fetch_assoc())
         {
           echo "<hr>";
          ?>
          <form class="cancel" action="cancelation.php" method="POST">
            <br>
            <label for="tiktnum">Ticket Number: </label>
            <input type="text" name="Ticket_Number" value="<?php echo $row['Ticket_Number']; ?>"><br>
            <label for="tno">Train Number: </label>
            <input type="text" id="tno" name="Tno" value="<?php echo $row['Tno']; ?>" readonly><br>
            <label for="tdate">Travel Date: </label>
            <input type="text" id="tdate"  name="Tdate" value="<?php echo $row['Tdate']; ?>" readonly><br>
            <label for="cls">Class: </label>
            <input type="text" id="cls" name="class" value="<?php echo $row['class']; ?>" readonly><br>
            <label for="not">Number Of Tickets: </label>
            <input type="text" id="not" name="NumOfTickets" value="<?php echo $row['NumOfTickets']; ?>" readonly><br>
            <input id="sub" type="submit" name="submit" value="Cancel"><br><br>
          </form>
          <?php
         }
         ?>
         <hr><br><br>
         <center>
      <button type="button" id="home"><?php echo '<a href="welcome.php">HOME PAGE</a>'; ?></button><br><br>
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
