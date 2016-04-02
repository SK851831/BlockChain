<?php
if (isset($_POST['submit'])) {
$from = $_POST['from'];
$to =  $_POST['accountno'];
$amt = $_POST['amount'];
$ch = curl_init();
//echo $from.",".$to.",".$amt;
curl_setopt($ch, CURLOPT_URL,"http://52.38.128.83:80/s.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "post1=$from&post2=$to&post3=$amt");

// in real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS, 
//          http_build_query(array('postvar1' => 'value1')));

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

// further processing ....
//if ($server_output == "OK") { 
}
//$home_url = "http://52.38.128.83:80/s.php";
$home_url = "Location: http://52.38.128.83:80/s.php";  
        header($home_url);
// } else { echo 'Error'; }
?>

