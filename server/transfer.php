<?php

$from =$_POST['from'];
$to = $_POST['to'];
$amt = $_POST['amt'];
require_once('dbConnect.php');
$sql = dbConnect();
if (!empty($amt) && !empty($from) && !empty($to)) {
        // Look up the username and password in the database

        $query = "UPDATE `login`.`login` SET `balance` = `balance` - '$amt' WHERE `login`.`username` = '$from'";

        $data = mysqli_query($sql,$query);
	$query = "UPDATE `login`.`login` SET `balance` = `balance` + '$amt' WHERE `login`.`id` = '$to'";

        $data = mysqli_query($sql,$query);
         mysqli_close($sql);
           $home_url = 'head.php';
           header('Location:' . $home_url);
        }
        else {
          // The username/password are incorrect so set an error message
          echo 'Sorry, pls try again.';
        }

?>