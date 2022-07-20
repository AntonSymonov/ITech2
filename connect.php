<?php
require_once "vendor/autoload.php";
use MongoDB\Client;
$client = new \MongoDB\Client("mongodb://127.0.0.1/");
$db = $client->Database->{1};
?>
