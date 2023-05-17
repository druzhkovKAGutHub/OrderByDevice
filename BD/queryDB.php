<?php
$this->ql['device_info']="
select d.id, d.name 'place', DATE_FORMAT(d.lastUpdate,'%d-%m-%Y %H:%i:%S') 'lastUpdate', dp.name, dp.label, dp.value, DATEDIFF(NOW(),d.lastUpdate) 'datediff' from devices d, devices_params dp
where d.id = dp.id_device
and (dp.name != dp.label or dp.name in ('DS18B20_1','DS18B20_0')) 
-- and (dp.name not LIKE 'DS%' or dp.name in ('DS18B20_1','DS18B20_0'))
and d.id not in (select DISTINCT d.id from devices d
where d.name in ('M00019','M00011','M00021','test baza','Дом','NEW'))
ORDER by d.name
";
$this->ql['procDeviceGetInfo']="
call meteo.deviceGetInfo()
";