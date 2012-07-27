<?php
print_r($_REQUEST);
$message = "<h1>Paypal variables</h1>";
foreach($_POST as $key => $value)
{
    $message.= $key . " - " . $value . "<br />";
}
echo $message;
die;
?>
























