<?php
// Настройки Email
use PHPMailer\PHPMailer\SMTP;

require_once 'vendor/phpmailer/phpmailer/src/SMTP.php';


global $site;
$site = [];
/*
SMTP::DEBUG_OFF(0): нормальная производственная настройка; нет отладочного вывода.
SMTP::DEBUG_CLIENT(1): показывать только сообщения клиента -> сервера. Не используйте это - маловероятно, что это даст вам что-то полезное.
SMTP::DEBUG_SERVER(2): показать клиент -> сервер и сервер -> клиентские сообщения - обычно это настройка, которую вы хотите
SMTP::DEBUG_CONNECTION(3): То же, что и 2, но также показать информацию о первоначальном соединении; используйте это только в том случае, если у вас возникли проблемы с подключением (например, время ожидания подключения истекло)
SMTP::DEBUG_LOWLEVEL(4): То же, что и 3, но также показывает подробный трафик низкого уровня. Только действительно полезно для анализа ошибок на уровне протокола, очень многословно, возможно, не то, что вам нужно.
*/
$site['SMTPDebug'] = SMTP::DEBUG_OFF;
$site['from_name'] = 'Метео'; // from (от) имя
$site['from_email'] = 'meteo@i-perm.ru'; // from (от) email адрес
// На всякий случай указываем настройки
// для дополнительного (внешнего) SMTP сервера.
$site['smtp_mode'] = 'enabled'; // enabled or disabled (включен или выключен)
$site['smtp_host'] = 'vesta.impuls-perm.ru'; //77.236.64.201 ssl://vesta.impuls-perm.ru
$site['smtp_port'] = 587; //25
$site['smtp_username'] = 'meteo@impuls-perm.ru'; //null
$site['smtp_password'] = '1ahxUcT3FW';
$site['language']='ru';
//$site['SendShortReport']=['support@impuls-perm.ru','lab@npocodit.ru'];
$site['SendShortReport']=['fokuspokustest@gmail.com','lab@npocodit.ru','sysadmin@impuls-perm.ru'];
//$site['SendShortReport']=['fokuspokustest@gmail.com','sysadmin@impuls-perm.ru'];
//$site['SendShortReport']=['fokuspokustest@gmail.com'];
//$site['SendLongReport']=['lab@npocodit.ru','sysadmin@impuls-perm.ru','fokuspokustest@gmail.com','vz@impuls-perm.ru'];
//$site['SendLongReport']=['fokuspokustest@gmail.com'];
$site['SendLongReport']=['lab@npocodit.ru'];