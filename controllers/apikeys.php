<?php
require '../vendor/autoload.php';
$epayco = new Epayco\Epayco(array(
    "apiKey" => "c40acc8a877f180bf312c79aae0503f7", 
    "privateKey" => "b13e95ea247b7cbe1f41724a1cb86d91", 
    "lenguage" => "ES", 
    "test" => false 
));
?>