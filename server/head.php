<?php
//Database Connection Code
require_once('dbConnect.php');
$sql = dbConnect();
session_start();
if (!isset($_SESSION['email'])) {
    if (isset($_COOKIE['email']) && isset($_COOKIE['auth'])&& isset($_COOKIE['id'])) {
      $_SESSION['email'] = $_COOKIE['email'];
      $_SESSION['auth'] = $_COOKIE['auth'];
$_SESSION['id'] = $_COOKIE['id'];  
     
    }
  }

  if (!isset($_SESSION['email'])) {
  $home_url = 'index.php';
          header('Location: ' . $home_url);
}
$username=$_SESSION['email'];
$admin = $_SESSION['auth'];
$query = "SELECT id,username,emailid,balance FROM login WHERE emailid = '$username' ";
        $data = mysqli_query($sql,$query);
        if (mysqli_num_rows($data)== 1) {
          // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
          $row = mysqli_fetch_array($data);
          $balance = $row['balance'];
		$uname = $row['username'];
        }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Head Start - Net Banking</title>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="css/materialize.min.css">
	</head>
	<body>
		<div class="container">
        <!-- Page Content goes here -->
	        <div class="row">
	      		<div class="col s12"> 
	      			<p class="flow-text"><h1>Welcome to The Bank</h1><a class="waves-effect waves-light btn" href="logout.php">Logout</a> 
						
	      			</p>
	      		</div>
	      		<hr>
	<h2>Welcome, <?php echo $uname; ?></h2>
<h3>Your balance is, <?php echo $balance; ?></h3>
	      	</div>
	      	<div class="container">
	      	<div class="row">
	      		<div class="col s12"> 
	      			<p class="flow-text"><h3>Info Feed </h3></p>
	      		</div>
	      		<hr>

<form action="http://52.36.233.115:80/s.php" name="login" id="login" method="post">
      <div class="row">
        <div class="input-field col s8">
          <input  name="from" id="from" type="text" class="validate">
          <label for="from">From</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s8">
          <input name="accountno" id="accountno" type="text" class="validate">
          <label for="accountno">AccountNumber</label>
        </div>
      </div>
<div class="row">
        <div class="input-field col s8">
          <input  name="amount" id="amount" type="number" class="validate">
          <label for="amount">Amount</label>
        </div>
      </div>
      <button class="btn waves-effect waves-light" type="submit" name="submit">Pay
    <i class="material-icons right">send</i>
  </button>
     
    </form>


			
	      		


        	</div>
			</div>
      	</div>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    	<script src="js/materialize.min.js"></script>
	</body>
</html>