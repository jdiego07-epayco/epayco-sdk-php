<?php
require '../vendor/autoload.php';
$epayco = new Epayco\Epayco(array(
    "apiKey" => "55b75fd6b1ef17eaf394fa985de6563c", 
    "privateKey" => "9327203f56866f1ed1ef4f56272ee771", 
    "lenguage" => "ES", 
    "test" => true 
));
?>