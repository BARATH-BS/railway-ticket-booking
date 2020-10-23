<?php
		$connect = mysqli_connect("localhost", "root" , "", "railway_ticket");
    if(! $connect )
    {
      die('Could not connect: ' . mysql_error());
    }
?>
