<?php
$sbRest = "https://securepayments.sberbank.ru/payment/rest/register.do";
$defaultProps = "userName=".$_POST['userName']."&password=".$_POST['password']."&returnUrl=".$_POST['returnUrl']."&amount=".$_POST['amount']."&orderNumber=".$_POST['orderNumber']."&email=".$_POST['email']."&phone=".$_POST['phone']."";
$params = $defaultProps;
if ($_POST['back2app']) {
    $params = $defaultProps . "&back2app=".$_POST['back2app']."&recurringFrequency=".$_POST['recurringFrequency']."&recurringExpiry=".$_POST['recurringExpiry']."";
}

$response = array(
  'http' => // Обертка, которая будет использоваться
    array(
    'method'  => 'POST', // Метод запроса
    // Ниже задаются заголовки запроса
    'header'  => 'Content-type: application/x-www-form-urlencoded',
    'content' => $params
  )
);
$context = stream_context_create($response);
$contents = file_get_contents($sbRest, false, $context);
echo $contents;
