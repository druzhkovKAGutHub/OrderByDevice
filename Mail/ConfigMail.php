<?php
// Настройки Email
echo "Загружаю";
global $site;
$site = [];
$site['from_name'] = 'Метео'; // from (от) имя
$site['from_email'] = 'meteo@i-perm.ru'; // from (от) email адрес
// На всякий случай указываем настройки
// для дополнительного (внешнего) SMTP сервера.
$site['smtp_mode'] = 'enabled'; // enabled or disabled (включен или выключен)
$site['smtp_host'] = 'vesta.impuls-perm.ru'; //77.236.64.201 ssl://vesta.impuls-perm.ru
$site['smtp_port'] = 587;
$site['smtp_username'] = 'meteo@impuls-perm.ru'; //null
$site['smtp_password'] = '1ahxUcT3FW';
$site['language']='ru';
//$site['SendShortReport']=['support@impuls-perm.ru','lab@npocodit.ru'];
$site['SendShortReport']=['fokuspokustest@gmail.com','lab@npocodit.ru','sysadmin@impuls-perm.ru'];
//$site['SendLongReport']=['lab@npocodit.ru','sysadmin@impuls-perm.ru','fokuspokustest@gmail.com','vz@impuls-perm.ru'];
//$site['SendLongReport']=['fokuspokustest@gmail.com'];
$site['SendLongReport']=['lab@npocodit.ru'];