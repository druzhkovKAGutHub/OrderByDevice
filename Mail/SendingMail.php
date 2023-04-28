<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
//require_once("Lib/PHPMailer/PHPMailerAutoload.php");
require 'Mail/ConfigMail.php';

function mytest(){
    $m = new PHPMailer(true);
}

class SendingMail extends PHPMailer
{
    var $priority = 3;
    var $to_name;
    var $to_email;
    var $From = null;
    var $FromName = null;
    var $Sender = null;

    function __construct()
    {
        global $site;
        $this->setLanguage($site['language']);

        // Берем из файла ConfigMail.php массив $site
        if ($site['smtp_mode'] == 'enabled')
        {
            $this->Host = $site['smtp_host'];
            $this->Port = $site['smtp_port'];
            if($site['smtp_username'] != '')
            {
                $this->SMTPAuth  = true;
                $this->Username  = $site['smtp_username'];
                $this->Password  =  $site['smtp_password'];
            }
            $this->Mailer = "smtp";
        }
        if(!$this->From)
        {
            $this->From = $site['from_email'];
        }
        if(!$this->FromName)
        {
            $this-> FromName = $site['from_name'];
        }
        if(!$this->Sender)
        {
            $this->Sender = $site['from_email'];
        }
        $this->Priority = $this->priority;
        $this->CharSet='utf-8';
        $this->Body = 'Это письмо сформировано автоматически службой уведомлений Метео. Отвечать на него не нужно.';
        $this->Subject='Показание метео датчиков за '. date("d-m-Y_H:i:s") ;
    }

    function SendOrderShotFromMail($file){
        global $site;
        //$this->addAddress('lab@npocodit.ru');
        //$this->addAddress('sysadmin@impuls-perm.ru');
        foreach ($site['SendShortReport'] as $item) {
            $this->addAddress($item);
        }
// Прикрипление файлов к письму
        if (!empty($file) && file_exists($file)) {
            $this->addAttachment($file); //"C:\Devepoper\Отчет по датчикам\Reports\Показание метео датчиков_26-04-2023_11-54-38.xls"
        } else {
            echo "Не удалось прикрепить файл $file";
        }

        if($this->Send())
        {
            echo 'Письмо отослано!';
        }
        else
        {
            echo "Не могу отослать письмо! Ошибка-".$this->ErrorInfo;
        }
        $this->ClearAddresses();
        $this->ClearAttachments();
    }

    function SendOrderLongFromMail($file){
        global $site;
        //$this->addAddress('lab@npocodit.ru');
        //$this->addAddress('sysadmin@impuls-perm.ru');
        foreach ($site['SendLongReport'] as $item) {
            $this->addAddress($item);
        }
// Прикрипление файлов к письму
        if (!empty($file) && file_exists($file)) {
            $this->addAttachment($file); //"C:\Devepoper\Отчет по датчикам\Reports\Показание метео датчиков_26-04-2023_11-54-38.xls"
        } else {
            echo "Не удалось прикрепить файл $file";
        }

        if($this->Send())
        {
            echo 'Письмо отослано!';
        }
        else
        {
            echo "Не могу отослать письмо! Ошибка-".$this->ErrorInfo;
        }
        $this->ClearAddresses();
        $this->ClearAttachments();
    }
}