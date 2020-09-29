<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('36176409815-pnpkij5g0mbko0vgfdtd893sltf5pr1v.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('6pk22MlDFknTi6a_VRRUtqnX');

//Set the OAuth 2.0 Redirect URI

$google_client->setRedirectUri('http://localhost/ajaxzad/index.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>