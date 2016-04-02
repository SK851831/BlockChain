<?php

$signature = null;
$toSign = "sss";

// Read the private key from the file.
$fp = fopen("private_key.pem", "r");
$priv_key = fread($fp, 8192);
fclose($fp);
$pkeyid = openssl_get_privatekey($priv_key);

// Compute the signature using OPENSSL_ALGO_SHA1
// by default.
openssl_sign($toSign, $signature, $pkeyid);

// Free the key.
openssl_free_key($pkeyid);

// At this point, you've got $signature which
// contains the digital signature as a series of bytes.
// If you need to include the signature on a URL
// for a request to be sent to a REST API, use
// PHP's bin2hex() function.

$hex = bin2hex( $signature );
$toSign .= "/" . $hex;

echo $toSign;

?>