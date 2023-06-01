<?php
  require_once 'vendor/autoload.php';

  $clientID = '307091521208-t7671i9uls1kv5tg8l9qhbdieo5tm9me.apps.googleusercontent.com';
  $clientSecret = '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';
  $redirectUri = 'http://localhost/Trader/vista/register.php';

  // create Client Request to access Google API
  $client = new Google_Client();
  $client->setClientId($clientID);
  $client->setClientSecret($clientSecret);
  $client->setRedirectUri($redirectUri);
  $client->addScope("email");
  $client->addScope("profile");

 
?>