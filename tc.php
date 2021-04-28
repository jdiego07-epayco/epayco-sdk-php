<?php
require 'vendor/autoload.php';
$epayco = new Epayco\Epayco(array(
    "apiKey" => "c40acc8a877f180bf312c79aae0503f7", 
    "privateKey" => "b13e95ea247b7cbe1f41724a1cb86d91", 
    "lenguage" => "ES", 
    "test" => false 
));

$token = $epayco->token->create(array(
    "card[number]" => "5240521756556621",
    "card[exp_year]" => "2027",
    "card[exp_month]" => "02",
    "card[cvc]" => "049"
));

$customer = $epayco->customer->create(array(
    "token_card" => $token->id,
    "name" => "Juan Diego",
    "last_name" => "Vargas Posada", 
    "email" => "diego.vargas@payco.co",
    "default" => false,
    "city" => "Medellin",
    "address" => "Cl 104 # 74A - 4",
    "phone" => "5502712",
    "cell_phone" => "3042462218",
));

$pay = $epayco->charge->create(array(
    "token_card" => $token->id,
    "customer_id" => $customer->data->customerId,
    "doc_type" => "CC",
    "doc_number" => "1194418306",
    "name" => "Juan Diego",
    "last_name" => "Vargas Posada",
    "email" => "diego.vargas@payco.co",
    "bill" => strval(rand(500000, 300000)),
    "description" => "SDK PHP Pruebas ePayco TC",
    "value" => "1",
    "tax" => "0",
    "tax_base" => "1",
    "currency" => "COP",
    "dues" => "1",
    "address" => "Cl 104 # 74a - 4",
    "phone" => "5502712",
    "cell_phone" => "3042462218",
    "ip" => "181.134.247.50",  
    "url_response" => "http://diego.dev-plugins.info/respuesta.html",
    "url_confirmation" => "http://diego.dev-plugins.info/confirmacion.php",
    "method_confirmation" => "POST",
    "use_default_card_customer" => false,
    "extras" => array(
        "extra1" => "",
        "extra2" => "",
        "extra3" => "",
        "extra4" => "",
        "extra5" => "",
        "extra6" => "",
        "extra7" => "",
        "extra8" => "",
        "extra9" => "",
        "extra10" => "",
    )
));

var_dump($pay);