<?php
//data you want to sign
$data = 'my data';
$signature = 'SiGn';

//create new private and public key
$new_key_pair = openssl_pkey_new(array(
    "private_key_bits" => 2048,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
));
openssl_pkey_export($new_key_pair, $private_key_pem);

$details = openssl_pkey_get_details($new_key_pair);
$public_key_pem = $details['key'];

//create signature
openssl_sign($data, $signature, $private_key_pem, $private_key_type);



//save for later
file_put_contents('private_key.pem', $private_key_pem);
file_put_contents('public_key.pem', $public_key_pem);
file_put_contents('signature.dat', $signature);
echo $private_key_pem ;
 echo $public_key_pem ; 
 echo $signature;

//verify signature
$r = openssl_verify($data, $signature, $public_key_pem, $private_key_type);
echo $r;

?>