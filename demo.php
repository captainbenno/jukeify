<?php
error_reporting(-1);
ini_set('display_errors', 1);

require 'vendor/autoload.php';

//Dotenv::load(__DIR__);

$spotify_client_id = "9b7ff4b457de48129720ecde17b748e0";
$spotify_client_secret = "14e967747adc4041b478a9bc83545f85";
$spotify_redirect_uri = "";

require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session($spotify_client_id, $spotify_client_secret, $spotify_redirect_uri);
$api = new SpotifyWebAPI\SpotifyWebAPI();

// Request a access token with optional scopes
$scopes = array(
    'playlist-read-private',
    'user-read-private'
);

$session->requestCredentialsToken($scopes);
$accessToken = $session->getAccessToken(); // We're good to go!

// Set the code on the API wrapper
$api->setAccessToken($accessToken);

$categories = $api->getCategoriesList(array(
    'country' => 'au'
));


echo "<xmp>";
print_r($categories);
echo "</xmp>";


$albums = $api->search('blur', 'album');

echo "<xmp>";
print_r($albums);
echo "</xmp>";