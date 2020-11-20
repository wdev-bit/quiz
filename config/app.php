<?php

session_start();

$HOSTNAME = 'localhost';
$USERNAME = 'angorabynayabcha_pharmacy';
$PASSWORD = 'angorabynayabcha_pharmacy';
$DATABASE = 'angorabynayabcha_pharmacy';

$con = new mysqli($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

function base_url(){
    return "http://pharmacy.angorabynayabchaudary.com/";
}
