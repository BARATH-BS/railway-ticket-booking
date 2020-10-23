<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <style media="screen">
      #sub
      {
        background-color:#9eff7a;
        border: solid black 2px;
        border-radius: 20px;
        width: 200px;
        height: 40px;
      }
      .cond
      {
        background-color: yellow;
      }
      body{background-color: #e0feff;}
      input
      {
        width: 250px;
        height: 20px;
        border-radius: 10px;
      }
    </style>
  </head>
  <body>
    <center>
      <h1>Welcome to Train Ticket BOOKING</h1><br><br><br>
      <h3>LOGIN</h3><br><br><br>
      <form class="rlogin" action="check.php" method="post">
        <label for="uid">User Id:</label>
        <input id="uid" type="text" name="userid" placeholder="User Id" required>
        <br><br><br>
        <label for="passwd">Password:</label>
        <input id="passwd" type="password" name="pswd" placeholder="Password" required>
        <br><br><br>
        <input id="sub" type="submit" name="login" value="LOGIN">
      </form>
      <br><br><br><br>
      <hr>
      <div class="cond">
      <br>
      <b>Note :</b>This page remains the same if wrong credentials are entered.
      <br><br>
      </div>
      <hr>
    </center>
  </body>
</html>
