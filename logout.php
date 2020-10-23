<?php
session_start()
?>
<?php
if(isset($_SESSION['userid']))
{
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Logout</title>
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
        border: solid black 0px;
        background-color: #e0feff;
      }
    </style>
  </head>
  <body>
    <center>
      <br><br><br>
    <?php
       session_destroy();
       echo "Successfully logged out";
    ?>
    <br><br><br><br><br>

    <button type="button" id="res"><?php echo '<a href="login.php">Click here to login</a>' ;  ?> </button><br><br><br>
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
