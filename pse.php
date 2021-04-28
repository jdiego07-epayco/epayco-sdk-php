<?php
require 'vendor/autoload.php';
$epayco = new Epayco\Epayco(array(
    "apiKey" => "c40acc8a877f180bf312c79aae0503f7", //P_KEY del comercio ID:93006      afe519dcb445a2b6f70559538e4af578360b5cf5
    "privateKey" => "b13e95ea247b7cbe1f41724a1cb86d91", //Llave privada del comercio ID:93006      b13e95ea247b7cbe1f41724a1cb86d91
    "lenguage" => "ES", //Lenguaje en el cual será mostrado por defecto el checkOut de ePayco recibe "ES" o "EN"
    "test" => false //Parametro que indica si la trnsacción se realizará en modo pruebas = "true" o producción = "false"
));
/*
 "bankCode": "1040", "bankName": "BANCO AGRARIO"
 "bankCode": "1052", "bankName": "BANCO AV VILLAS"
 "bankCode": "1013", "bankName": "BANCO BBVA COLOMBIA S.A."
 "bankCode": "1032", "bankName": "BANCO CAJA SOCIAL"
 "bankCode": "1066", "bankName": "BANCO COOPERATIVO COOPCENTRAL"
 "bankCode": "1051", "bankName": "BANCO DAVIVIENDA"
 "bankCode": "1001", "bankName": "BANCO DE BOGOTA"
 "bankCode": "1023", "bankName": "BANCO DE OCCIDENTE"
 "bankCode": "1062", "bankName": "BANCO FALABELLA "
 "bankCode": "1012", "bankName": "BANCO GNB SUDAMERIS"
 "bankCode": "1006", "bankName": "BANCO ITAU"
 "bankCode": "1060", "bankName": "BANCO PICHINCHA S.A."
 "bankCode": "1002", "bankName": "BANCO POPULAR"
 "bankCode": "1058", "bankName": "BANCO PROCREDIT"
 "bankCode": "1065", "bankName": "BANCO SANTANDER COLOMBIA"
 "bankCode": "1007", "bankName": "BANCOLOMBIA"
 "bankCode": "1061", "bankName": "BANCOOMEVA S.A."
 "bankCode": "1009", "bankName": "CITIBANK "
 "bankCode": "1292", "bankName": "CONFIAR COOPERATIVA FINANCIERA"
 "bankCode": "1551", "bankName": "DAVIPLATA"
 "bankCode": "1507", "bankName": "NEQUI"
 "bankCode": "1019", "bankName": "SCOTIABANK COLPATRIA"
*/

$pse = $epayco->bank->create(array(
    "bank" => "1551",
    "invoice" => strval(rand(500000, 300000)),
    "description" => "SDK PHP Pruebas ePayco PSE",
    "value" => "1",
    "tax" => "0",
    "tax_base" => "0",
    "currency" => "COP",
    "type_person" => "0",
    "doc_type" => "CC",
    "doc_number" => "1194418306",
    "name" => "Juan Diego",
    "last_name" => "Vargas Posada",
    "email" => "diego.vargas@payco.co",
    "country" => "CO",
    "cell_phone" => "3001234567",
    "ip" => "181.134.247.50",  // This is the client's IP, it is required
    "url_response" => "http://diego.dev-plugins.info/respuesta.html",
    "url_confirmation" => "http://diego.dev-plugins.info/confirmacion.php",
    "method_confirmation" => "POST",
    //Extra params: These params are optional and can be used by the commerce
    "extra1" => "Diego Alejandro",
    "extra2" => "Vargas Arcia",
    "extra3" => "Argentina",
    "extra4" => "Provincia de Avellaneda",
    "extra5" => "",
    "extra6" => "",
    "extra7" => "",
));

var_dump($pse);
?>