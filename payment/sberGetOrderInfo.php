<?php
$sbRest = "https://3dsec.sberbank.ru/payment/rest/getOrderStatusExtended.do";
$user = 'T1655460787-api';
$pass = 'T1655460787';
// $data = "userName=".$user."&password=".$pass."&orderId=1193c112-4159-71cf-bf98-a8826a62f72b";
$data = "userName=T1655460787-api&password=T1655460787&orderId=".$_GET['orderId']."";

// echo $_GET['orderId'];
// echo $data;
$response = array(
  'http' => // Обертка, которая будет использоваться
    array(
    'method'  => 'POST', // Метод запроса
    // Ниже задаются заголовки запроса
    'header'  => 'Content-type: application/x-www-form-urlencoded',
    'content' => $data
  )
);
$context = stream_context_create($response);
$contents = file_get_contents($sbRest, false, $context);
echo $contents;
