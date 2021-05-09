<?php
require 'apikeys.php';

// $token = $epayco->token->create(array(
//     "card[number]" => '4575623182290326',
//     "card[exp_year]" => "2025",
//     "card[exp_month]" => "12",
//     "card[cvc]" => "123"
// ));

// $plan = $epayco->plan->create(array(
//     "id_plan" => $nameplan,
//     "name" => $nameplan,
//     "description" => $nameplan,
//     "amount" => 1,
//     "currency" => "cop",
//     "interval" => "month",
//     "interval_count" => 1,
//     "trial_days" => 7
// ));

$customer = $epayco->customer->create(array( //Metodo para crear un customer
    "token_card" => $_POST['epaycoToken'], //Se recibe el token de la tarjeta desde front
    "name" => $_POST['name'], //
    "last_name" => $_POST['last_name'],
    "email" => $_POST['email'],
    "default" => false,
    "city" => $_POST['city'],
    "address" => $_POST['address'],
    "phone" => $_POST['phone'],
    "cell_phone" => $_POST['cell_phone'],
));


$sub = $epayco->subscriptions->create(array(
    "id_plan" => $_REQUEST['id_plan'],
    "customer" => $customer->data->customerId,
    "token_card" => $_POST['epaycoToken'],
    "doc_type" => $_POST['docType'],
    "doc_number" => $_POST['number'],
     "url_confirmation" => "http://diego.dev-plugins.info/confirmacion.php",
     "method_confirmation" => "POST"
));

$pay = $epayco->subscriptions->charge(array(
  "id_plan" => $_REQUEST['id_plan'],
  "customer" => $customer->data->customerId,
  "token_card" => $_POST['epaycoToken'],
  "doc_type" => $_POST['docType'],
  "doc_number" => $_POST['number'],
  "address" => $_POST['address'],
  "phone"=> $_POST['phone'],
  "cell_phone"=> $_POST['cell_phone'],
  "ip" => "181.134.247.50" 
));

var_dump($pay);
die();

?>