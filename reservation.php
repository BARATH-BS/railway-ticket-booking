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
     <title>Reservation</title>
     <style media="screen">
     select,input, #notic
     {
       height: 25px;
       width: 180px;
       border-width: 3px;
     }
     body{background-color: #e0feff;}
     #sub
     {
       height: 50px;
       width: 150px;
       border: solid black 3px;
       background-color:#9eff7a;
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

     <form class="reservation" action="book.php" method="POST">
       <center>
         <h1>RESERVATION</h1>
       </center>
      <b><?php echo $_SESSION['userid'].", choose your preferred options"; ?></b>
      <center>
         <hr>
         <p>Select date</p>
         <input id="date" type="date" name="date"  required onblur="javascript:dateCheck()">
         <div id="idate"></div>
         <br><br><br>

         <p>Select Train Number</p>
         <select id="tnum" class="Trainnum" name="Tnum" required onblur="javascript:tnumCheck()" >
           <option value="0">Choose Train number</option>
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
         </select>
         <div id="itnum"></div>
         <br><br><br>

         <p>Select Class</p>
         <select id="cls" class="Trainclass" name="Tclass" required onblur="javascript:tclsCheck()">
           <option value="0">Choose Class</option>
           <option value="1">First Class A/C</option>
           <option value="2">First Class Non-A/C</option>
           <option value="3">Second Class</option>
           <option value="4">Third Class</option>
         </select>
         <div id="icls"></div>
         <br><br><br>

         <p>Number of tickets</p>
         <input id="notic" type="number" name="num_of_tickets" placeholder="Number of tickets" min="1" max="10" required onblur="javascript:ticketCheck()">
         <div id="inotic"></div>
         <br><br><br>

         <input id="sub" type="submit" name="sub" value="BOOK">
       </center>
     </form>

     <script type="text/javascript">
     function dateCheck()
     {
      var d=document.getElementById('date').value;
      //alert(d);
      var year=parseInt(d.substring(0,4));
      var month=parseInt(d.substring(5,7));
      var dat=parseInt(d.substring(8,10));
      if((year==2020) && (month==10))
      {
        if(!(dat>=11 && dat<=15))
        {
          idate.innerHTML="Select date from 11-10-2020 to 15-10-2020.";
          document.getElementById('date').focus();
        }
        else
        {
          idate.innerHTML="";
        }
      }
      else
      {
        idate.innerHTML="Select date from 11-10-2020 to 15-10-2020.";
        document.getElementById('date').focus();
      }
     }

     function tnumCheck()
     {
       var t=document.getElementById('tnum').value;
       t=parseInt(t)
       if(!(t>0 && t<6))
       {
         itnum.innerHTML="Select Train Number from 1 to 5.";
         document.getElementById('tnum').focus();
       }
       else
       {
         itnum.innerHTML="";
       }
     }

     function tclsCheck()
     {
       var t=document.getElementById('cls').value;
       t=parseInt(t)
       if(!(t>0 && t<5))
       {
         icls.innerHTML="Choose appropriate class.";
         document.getElementById('tnum').focus();
       }
       else
       {
         icls.innerHTML="";
       }
     }

     function ticketCheck()
     {
       var t=document.getElementById('notic').value;
       t=parseInt(t)
       if(t>10)
       {
         inotic.innerHTML="Maximum of 10 tickets at a time.";
         document.getElementById('notic').focus();
       }
       else
       {
         inotic.innerHTML="";
       }
     }
     </script>
     <br><br>
     <hr>
     <center>
       <br><br>
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
