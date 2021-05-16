<?php

require '../vendor/autoload.php';
$epayco = new Epayco\Epayco(array(
     "apiKey" => "55b75fd6b1ef17eaf394fa985de6563c", 
     "privateKey" => "9327203f56866f1ed1ef4f56272ee771", 
     "lenguage" => "ES",
     "test" => false
 ));

// $token = $epayco->token->create(array(
//     "card[number]" => '5240521756556621',
//     "card[exp_year]" => "2027",
//     "card[exp_month]" => "02",
//     "card[cvc]" => "049"
// ));

// $customer = $epayco->customer->create(array(
//     "token_card" => $token->id,
//     "name" => "Juan Diego",
//     "last_name" => "Vargas Posada", 
//     "email" => "diego.vargas@payco.co",
//     "default" => false,
//     "city" => "Medellin",
//     "address" => "Cl 104 # 74a - 4",
//     "phone" => "5502712",
//     "cell_phone" => "3042462218",
// ));

$pay = $epayco->charge->create(array(
    // "token_card" => $token->id,
    // "customer_id" => $customer->data->customerId,
    "token_card" => "0837e22f054270493229d03",
    "customer_id" => "0754200c0e6dd165e4c5344",
    "doc_type" => "CC",
    "doc_number" => "1194418306",
    "name" => "Juan Diego",
    "last_name" => "Vargas Posada",
    "email" => "diego.vargas@payco.co",
    "bill" => strval(rand(500000, 300000)),
    "description" => "SDK PHP Pruebas ePayco Split TC",
    "value" => "1",
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
    "split_type" => "01",
    "split_primary_receiver" => "515360",
    "split_primary_receiver_fee" => "0",
    "split_rule" => 'multiple', // Parametros para split multiple
    "split_receivers" => array(
        array('id' => '93006', 'total' => '1', 'iva' => '0', 'base_iva' => '1', 'fee' => '0')
    ), // Parametros para split multiple
//  "split_receivers" => json_encode(array(
//      array('id' => 'P_CUST_ID_CLIENTE 1 RECEIVER', 'total' => '58000', 'iva' => '8000', 'base_iva' => '50000', 'fee' => '10'),
//      array('id' => 'P_CUST_ID_CLIENTE 2 RECEIVER', 'total' => '58000', 'iva' => '8000', 'base_iva' => '50000', 'fee' => '10')
//  )) // Campo obligatorio sí se envía el campo split_rule
//  ));
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