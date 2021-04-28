<?php

require 'vendor/autoload.php';
$epayco = new Epayco\Epayco(array(
     "apiKey" => "55b75fd6b1ef17eaf394fa985de6563c", 
     "privateKey" => "9327203f56866f1ed1ef4f56272ee771", 
     "lenguage" => "ES",
     "test" => false
 ));

$token = $epayco->token->create(array(
    "card[number]" => '5240521756556621',
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
    "address" => "Cl 104 # 74a - 4",
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
    "description" => "SDK PHP Pruebas ePayco Split TC",
    "value" => "6",
    "tax" => "0",
    "tax_base" => "0",
    "currency" => "COP",
    "dues" => "1",
    "address" => "Cl 104 # 74a - 4",
    "phone" => "5502712",
    "cell_phone" => "3042462218",
    "ip" => "181.134.247.50",  
    "url_response" => "http://diego.dev-plugins.info/respuesta.html",
    "url_confirmation" => "http://diego.dev-plugins.info/confirmacion.php",
    "method_confirmation" => "POST",
    "splitpayment" => "true",
    "split_app_id" => "515360",
    "split_merchant_id" => "515360",
    "split_type" => "02",
    "split_primary_receiver" => "515360",
    "split_primary_receiver_fee" => "0",
    "split_rule" => 'multiple', // Parametros para split multiple
    "split_receivers" => json_encode(array(
        array('id' => '9898', 'total' => '6', 'iva' => '0', 'base_iva' => '6', 'fee' => '50')
    )),// Parametros para split multiple
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
        "extra10" =>"",
    )
));

var_dump($pay);

?>