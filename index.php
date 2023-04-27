<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require 'BD/pdoMySQl.php';
require 'BD/configDB.php';
require 'Orders/deviceInfoOutExcel.php';
require 'Mail/SendingMail.php';

global $dbConnParamObj;

$bd = new pdoMySQl($dbConnParamObj);
$res = $bd->selectDB('device_info');

//Оправляет отчет мало столбцов
if ($res instanceof ResErrorClassMessage)
    echo json_encode($res->errmesage, 256);
else {
    $excel = new deviceInfoOutExcel();
    $fileName = $excel->ExcelSheetShot($res);
}
/*
$mail = new SendingMail();
$mail->SendOrderShotFromMail(getcwd().DIRECTORY_SEPARATOR."Reports".DIRECTORY_SEPARATOR.$fileName);
*/

//Отправляет отчет с большим количеством столбцов
/*
if ($res instanceof ResErrorClassMessage)
    echo json_encode($res->errmesage, 256);
else {
    $excel = new deviceInfoOutExcel();
    $fileName = $excel->ExcelSheet($res);
}

$mail = new SendingMail();
$mail->SendOrderFromLongMail(getcwd().DIRECTORY_SEPARATOR."Reports".DIRECTORY_SEPARATOR.$fileName);
*/