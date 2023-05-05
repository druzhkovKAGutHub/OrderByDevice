<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

class deviceInfoOutExcel
{
    public function ExcelSheet(array $arr)
    {
        //$StartTime=microtime(true);
        $titleLong = ['','Дата и время','t° Узел','t° Улица','t° Улица 2','t°АКБ','t° в помещении','t° Внутри','t° Дом','t° Котельная','t° Обратка','t° Офис','t° под АКБ','t° Подача','t° Пол','t° Радиатор','t° Радиатора','t° Слева','t° Справа','t° Термобокс','t° Узел (пол)','t°Внутри','t°Обратка отопление','t°Обратка СК','t°Подача отопление','t°Подача СК','t°Узел','t°Улица','t°Улица 1','t°Улица 2','DHT_H','DHT_T','T_BMP280','АКБ напряжение','Влажность','Входящее напряжение','Высота','Высота над морем','Выход','Выход (ВА)','Выходная мощность активная (Вт','Выходная мощность активная (Вт)','Выходная мощность активная (Вт)','Выходное напряжение','Выходня мощность полная (ВА)','Давление','Нагрузка %','Нагрузка инвертора, (%)','Напряжение АКБ','Напряжение входной сети','Напряжение СП','Обратка отопление','Обратка СК','Подача отопление','Подача СК','Температура инвертора (NTC)','Ток заряда АКБ','Ток заряда АКБ от СБ','Ток заряда АКБ от СП','Ток заряда от сети','Ток разряда','Улица','Уровень заряда АКБ','Уровень заряда АКБ (%)','Частота входной сети','inv_status'];
        //$titleShot = ['','Дата и время','t° Узел','t° Улица','t° Улица 2','Влажность'];
//        $titleLong = ['','Дата и время','t° АКБ','t° в помещении','t° Внутри','t° Дом','t° Котельная','t° Обратка','t° Офис','t° под АКБ','t° Подача','t° Пол','t° Радиатор','t° Радиатора','t° Слева','t° Справа','t° Термобокс','t° Узел','t° Узел (пол)','t° Улица','t° Улица 2','t°АКБ','t°Внутри','t°Обратка отопление','t°Обратка СК','t°Подача отопление','t°Подача СК','t°Узел','t°Улица','t°Улица 1','t°Улица 2','DHT_H','DHT_T','T_BMP280','АКБ напряжение','Влажность','Входящее напряжение','Высота','Высота над морем','Выход','Выход (ВА)','Выходная мощность активная (Вт','Выходная мощность активная (Вт)','Выходная мощность активная (Вт)','Выходное напряжение','Выходня мощность полная (ВА)','Давление','Нагрузка %','Нагрузка инвертора, (%)','Напряжение АКБ','Напряжение входной сети','Напряжение СП','Обратка отопление','Обратка СК','Подача отопление','Подача СК','Температура инвертора (NTC)','Ток заряда АКБ','Ток заряда АКБ от СБ','Ток заряда АКБ от СП','Ток заряда от сети','Ток разряда','Улица','Уровень заряда АКБ','Уровень заряда АКБ (%)','Частота входной сети','inv_status'];
    /*
     '','Дата и время','t° Улица','t° Улица 2','t° Узел','t° Узел (пол)','t° в помещении','t°Улица 2','Влажность','t° АКБ','Ток заряда АКБ от СБ','Напряжение входной сети',
            'Частота входной сети','Выходное напряжение','Выходня мощность полная (ВА)','Выходная мощность активная (Вт)','Нагрузка инвертора, (%)','Напряжение АКБ','Ток заряда АКБ','Уровень заряда АКБ (%)',
            'Температура инвертора (NTC)','Давление','Высота','Выходная мощность активная (Вт)','t° под АКБ','Выходная мощность активная (Вт','Ток заряда от сети','t° Радиатор',
            't°Улица','t°Узел','Высота над морем','t° Радиатора','t° Внутри','t°Обратка отопление','t°Улица 1','t°Подача отопление','t°Обратка СК','t°Подача СК','t°Внутри',
            'Выход','Выход (ВА)','Нагрузка %','АКБ напряжение','Уровень заряда АКБ','T_Инвертора','Ток заряда АКБ от СП','Напряжение СП','Ток разряда','Входящее напряжение','Частота','t°АКБ','DHT_T',
            'DHT_H','T_BMP280','t° Слева','t° Справа','Улица','t° Обратка','t° Подача','t° Офис','Шахта скважины ','Труба скважины','t° Дом','t° Пол','t° Термобокс','t° Котельная','Обратка СК','Подача СК',
            'Обратка отопление','Подача отопление','inv_status','Температура инвертора (NTC','U_pv','I_discharge','U_bat_dec','U_grid','F_grid','U_out','S_out','P_out','Load','U_bat','I_charge','C_bat',
            'T_inv','I_pv_bat'
     */

        $pattern=[null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,
            null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,
            null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,
            null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,
            null,null,null,null,null,null,null,null,null,null
        ];
        $deviceParam=$pattern;
        $rowExcel=[];
        $id = -1;
            foreach ($arr as $item){
            if ($id==-1 or $id != $item['id']) {
                if ($id != $item['id'] and $id != -1) $rowExcel[]=$deviceParam;
                $deviceParam = $pattern;
                $id = $item['id'];
                $deviceParam[0] = $item['place'];
                $deviceParam[1] = $item['lastUpdate'];
                $idex = array_search($item['label'],$titleLong);
                if (gettype($idex )!="boolean") {
                    $deviceParam[$idex] = $item['value'];
                }
            } else {
                $idex = array_search($item['label'],$titleLong);
                if (gettype($idex )!="boolean") {
                    $deviceParam[$idex] = $item['value'];
                }
            };

        }
        $rowExcel[]=$deviceParam;

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
        $spreadsheet->getDefaultStyle()->getFont()->setSize(12);

        $sheet->getStyle('A:A')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        for ($i=1;$i<=count($rowExcel);$i++) {
            $sheet->getColumnDimensionByColumn($i)->setWidth('20');
        }
        /*
        $sheet->getColumnDimensionByColumn(1)->setWidth('20');
        $sheet->getColumnDimensionByColumn(2)->setWidth('40');
        $sheet->getColumnDimensionByColumn(3)->setWidth('50');
        $sheet->getColumnDimensionByColumn(4)->setWidth('20');
        $sheet->getColumnDimensionByColumn(5)->setWidth('20');
        $sheet->getColumnDimensionByColumn(6)->setWidth('35');
        $sheet->getColumnDimensionByColumn(7)->setWidth('30');
        $sheet->getColumnDimensionByColumn(8)->setWidth('20');
        $sheet->getColumnDimensionByColumn(9)->setWidth('35');
        $sheet->getColumnDimensionByColumn(10)->setWidth('20');
        $sheet->getColumnDimensionByColumn(11)->setWidth('40');
        $sheet->getColumnDimensionByColumn(12)->setWidth('40');
        $sheet->getColumnDimensionByColumn(13)->setWidth('40');
        $sheet->getColumnDimensionByColumn(14)->setWidth('40');
        $sheet->getColumnDimensionByColumn(15)->setWidth('30');
        $sheet->getColumnDimensionByColumn(16)->setWidth('30');
        $sheet->getColumnDimensionByColumn(17)->setWidth('30');
        $sheet->getColumnDimensionByColumn(18)->setWidth('30');
        $sheet->getColumnDimensionByColumn(19)->setWidth('30');
        $sheet->getColumnDimensionByColumn(20)->setWidth('30');
        */
        $sheet->mergeCellsByColumnAndRow(1, 1, count($rowExcel), 1);



        $borders = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => [
                        'argb' => 'ff000000'
                    ],
                ],
            ],
        ];

        $styleArray = [
            'font' => [
                'color' => ['argb' => 'ffffffff'],
                'name' => 'Times New Roman',
                'size' => 12,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => 'ff033479',],
                'endColor' => ['argb' => 'ff033479',],
            ],
        ];

        $sheet->fromArray($titleLong,null,'A2');

        $endColumnChar = "BO";
        $sheet->getStyle('A1:'.$endColumnChar.'2')->applyFromArray($styleArray);
        //$sheet->getStyle('A1')->applyFromArray($borders);

        //$sheet->fromArray($arr,null,'A3');
        $sheet->fromArray($rowExcel,null,'A3');

        $sheet->getStyle('A3:'.$endColumnChar. count($rowExcel)+2)->applyFromArray($borders);


        //$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        for ($i = 'A'; $i !=  $spreadsheet->getActiveSheet()->getHighestColumn(); $i++) {
            $spreadsheet->getActiveSheet()->getColumnDimension($i)->setAutoSize(TRUE);
        }

        $styleRowCell = $styleArray = [
            'font' => [
                'bold' => false,
                'color' => ['argb' => 'ff000000'],
                'name' => 'Times New Roman',
                'size' => 12,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'fff2f2f2',
                ],
            ],
            'alignment' => [
                'wrapText' => true,
            ]
        ];


        $End = count($rowExcel);
        for ($Row = 4; $Row <= $End; $Row += 2) {
            $s = 'A' . $Row . ':'.$endColumnChar . $Row;
            $sheet->getStyle('A' . $Row . ':'.$endColumnChar . $Row)->applyFromArray($styleRowCell);
        }
        try {

            $filename = str_replace(':','-',"Показание метео датчиков_" . date("d-m-Y_H:i:s") . ".xls");
            @unlink($filename);

            $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
            $writer->save("Reports/{$filename}");

        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
        return $filename;
    }

    //Уменьшено количество обрабатываемых данных
    public function ExcelSheetShot(array $arr)
{
    //$StartTime=microtime(true);

    //$title = ['Имя узла','Дата и время','t° Узел','','t° Улица','','t° Улица 2','','t°АКБ','','Влажность'];
    $title1 = ['Дата и время','Имя узла','Датчик','','Влажность, %'];
    $title2 = ['Название','t°'];
    //$titleShotName = ['','','DS18B20_1','','DS18B20_0','', 'DHT_T','','T_BMP280','','DHT_H','','DS18B20_','']; //,'P_BMP280','A_BMP280'
    $titleShotName = ['','','DS18B20_','','DHT_H','', 'DHT_T','','T_BMP280','','DS18B20_1','','DS18B20_0',''];
    $titleColorYELLOW = [];

//        $titleLong = ['','Дата и время','t° АКБ','t° в помещении','t° Внутри','t° Дом','t° Котельная','t° Обратка','t° Офис','t° под АКБ','t° Подача','t° Пол','t° Радиатор','t° Радиатора','t° Слева','t° Справа','t° Термобокс','t° Узел','t° Узел (пол)','t° Улица','t° Улица 2','t°АКБ','t°Внутри','t°Обратка отопление','t°Обратка СК','t°Подача отопление','t°Подача СК','t°Узел','t°Улица','t°Улица 1','t°Улица 2','DHT_H','DHT_T','T_BMP280','АКБ напряжение','Влажность','Входящее напряжение','Высота','Высота над морем','Выход','Выход (ВА)','Выходная мощность активная (Вт','Выходная мощность активная (Вт)','Выходная мощность активная (Вт)','Выходное напряжение','Выходня мощность полная (ВА)','Давление','Нагрузка %','Нагрузка инвертора, (%)','Напряжение АКБ','Напряжение входной сети','Напряжение СП','Обратка отопление','Обратка СК','Подача отопление','Подача СК','Температура инвертора (NTC)','Ток заряда АКБ','Ток заряда АКБ от СБ','Ток заряда АКБ от СП','Ток заряда от сети','Ток разряда','Улица','Уровень заряда АКБ','Уровень заряда АКБ (%)','Частота входной сети','inv_status'];
    /*
     '','Дата и время','t° Улица','t° Улица 2','t° Узел','t° Узел (пол)','t° в помещении','t°Улица 2','Влажность','t° АКБ','Ток заряда АКБ от СБ','Напряжение входной сети',
            'Частота входной сети','Выходное напряжение','Выходня мощность полная (ВА)','Выходная мощность активная (Вт)','Нагрузка инвертора, (%)','Напряжение АКБ','Ток заряда АКБ','Уровень заряда АКБ (%)',
            'Температура инвертора (NTC)','Давление','Высота','Выходная мощность активная (Вт)','t° под АКБ','Выходная мощность активная (Вт','Ток заряда от сети','t° Радиатор',
            't°Улица','t°Узел','Высота над морем','t° Радиатора','t° Внутри','t°Обратка отопление','t°Улица 1','t°Подача отопление','t°Обратка СК','t°Подача СК','t°Внутри',
            'Выход','Выход (ВА)','Нагрузка %','АКБ напряжение','Уровень заряда АКБ','T_Инвертора','Ток заряда АКБ от СП','Напряжение СП','Ток разряда','Входящее напряжение','Частота','t°АКБ','DHT_T',
            'DHT_H','T_BMP280','t° Слева','t° Справа','Улица','t° Обратка','t° Подача','t° Офис','Шахта скважины ','Труба скважины','t° Дом','t° Пол','t° Термобокс','t° Котельная','Обратка СК','Подача СК',
            'Обратка отопление','Подача отопление','inv_status','Температура инвертора (NTC','U_pv','I_discharge','U_bat_dec','U_grid','F_grid','U_out','S_out','P_out','Load','U_bat','I_charge','C_bat',
            'T_inv','I_pv_bat'
     */

    $pattern=[null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,
        null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,
        null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,
        null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,
        null,null,null,null,null,null,null,null,null,null
    ];

    /*
    $addDeviceArr = function ($item,$titleShotName, &$deviceParam) {
        $idex = array_search($item['name'],$titleShotName);
        if (gettype($idex )!="boolean") {
            $deviceParam[$idex] = $item['label'];
            $deviceParam[$idex+1] = $item['value'];
        } else {
            if (strlen($item['name']) > 9 and strpos($item['name'],'DS18B20_') === 0) {
                    $idex = array_search('DS18B20_',$titleShotName);
                    $deviceParam[$idex] = $item['label'];
                    $deviceParam[$idex+1] = $item['value'];
            }
        }
    };
    */



    //$deviceParam=$pattern;
    $rowExcel=[];
    $id = -1;
    /*
    foreach ($arr as $item){
        if ($id==-1 or $id != $item['id']) {
            if ($id != $item['id'] and $id != -1) $rowExcel[]=$deviceParam;
            $deviceParam = $pattern;
            $id = $item['id'];
            $deviceParam[1] = $item['place'];
            $deviceParam[0] = $item['lastUpdate'];
            $addDeviceArr($item,$titleShotName, $deviceParam);
            $titleColorYELLOW[]= $item['datediff'];
        } else {
            $addDeviceArr($item,$titleShotName, $deviceParam);
        };
    }*/
        $addDeviceArr = function ($item) {
            $deviceParam[0] = $item['lastUpdate'];
            $deviceParam[1] = $item['place'];
            $deviceParam[2] = $item['label'];
            $deviceParam[3] = $item['value'];
            $item['name'] == 'DHT_H' ? $deviceParam[4]=$item['value'] : $deviceParam[4]=null;

            return $deviceParam;
        };
        $ListDeviceAddArr = function (&$tmpArr, $elemAdd, ) {
            if (is_null($elemAdd[4]))
                $tmpArr[] = $elemAdd;
            else {
                array_unshift($tmpArr, $elemAdd);
            }
        };
    $i = 1;
    $tmp_i = 0;
    $temp_arr = [];
    foreach ($arr as $item){
        if ($id==-1 or $id != $item['id']) {
            //if ($id != $item['id'] and $id != -1) $rowExcel[]=$deviceParam;
            if ($id != $item['id'] and $id != -1) {
                //$rowExcel[] = $temp_arr;
                $rowExcel = array_merge($rowExcel,$temp_arr);
                $temp_arr = [];
            };
            //$deviceParam = $pattern;

            $id = $item['id'];
            //$addDeviceArr($item,$titleShotName, $deviceParam);
            $ListDeviceAddArr($temp_arr,$addDeviceArr($item));
            $titleColorYELLOW[]= [$i-$tmp_i,$item['datediff']];
            $tmp_i = $i;
            ;
        } else {
            //$addDeviceArr($item,$titleShotName, $deviceParam);
            $ListDeviceAddArr($temp_arr,$addDeviceArr($item));
            /*
            $t_a = $addDeviceArr($item);
            if (is_null($t_a[4]))
                $temp_arr[] = $t_a;
            else {
                array_unshift($temp_arr, $t_a);
            }
            */
        };

        $i++;
    }
    //$rowExcel[]=$deviceParam;

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
    $spreadsheet->getDefaultStyle()->getFont()->setSize(12);

        for ($i=1;$i<count($title1);$i++) {
            $ColumnChar = Coordinate::stringFromColumnIndex($i);
            $sheet->getStyle("$ColumnChar:$ColumnChar")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        }

    $borders = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                'color' => [
                    'argb' => 'ff000000'
                ],
            ],
        ],
    ];

    $styleArray = [
        'font' => [
            'color' => ['argb' => 'ffffffff'],
            'name' => 'Times New Roman',
            'size' => 12,
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'fill' => [
            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
            'startColor' => ['argb' => 'ff033479',],
            'endColor' => ['argb' => 'ff033479',],
        ],
    ];

    //Вывод значения заголовков
    $sheet->fromArray($title1,null,'A1');
    $sheet->fromArray($title2,null,'C2');

    /*
    //Временно Для отладки
    $sheet->fromArray($title1,null,'F1');
    $sheet->fromArray($title2,null,'H2');
/*
     *
     */
    //Объеденяю ячейки заголовка
    $sheet->mergeCellsByColumnAndRow(1, 1, 1, 2);
    $sheet->mergeCellsByColumnAndRow(2, 1, 2, 2);
    $sheet->mergeCellsByColumnAndRow(5, 1, 5, 2);

    //Закрашиваю заголовок таблицы
    $endColumnChar = Coordinate::stringFromColumnIndex(count($title1));
    $sheet->getStyle('A1:'.$endColumnChar.'2')->applyFromArray($styleArray);
    //$sheet->getStyle('A1')->applyFromArray($borders);

    //Вывод данных в таблицу
    $sheet->fromArray($rowExcel,null,'A3');

    /*
    //Времено для отладки
    //Вывод данных в таблицу
    $sheet->fromArray($rowExcel,null,'F3');
*/
    $sheet->getStyle('A3:'.$endColumnChar.count($rowExcel)+2)->applyFromArray($borders);

    for ($i = 'A'; $i !=  $spreadsheet->getActiveSheet()->getHighestColumn(); $i++) {
        $spreadsheet->getActiveSheet()->getColumnDimension($i)->setAutoSize(TRUE);
    }

    $styleRowCell = $styleArray = [
        'font' => [
            'bold' => false,
            'color' => ['argb' => 'ff000000'],
            'name' => 'Times New Roman',
            'size' => 12,
        ],
        'fill' => [
            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
            'startColor' => [
                'argb' => 'fff2f2f2',
            ],
        ],
        'alignment' => [
            'wrapText' => true,
        ]
    ];

    $styleRowCellYELLOW = $styleArray = [
        'fill' => [
            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
            'startColor' => [
                'argb' => 'ffffeb9c',
            ],
        ]
    ];
        $styleRowCellRED = $styleArray = [
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'ffffc7ce',
                ],
            ]
        ];

    $End = count($rowExcel);

    for ($Row = 4; $Row <= $End+2; $Row += 2) {
        //$s = 'A' . $Row . ':'.$endColumnChar . $Row;
        $sheet->getStyle('A' . $Row . ':'.$endColumnChar . $Row)->applyFromArray($styleRowCell);
    }

    $End = count($titleColorYELLOW)-2;
    $start =$titleColorYELLOW[0][0]+2;
    $nextRow = 0;
    for ($Row = 0; $Row <= $End; $Row += 1) {


        $nextRow = $start + $titleColorYELLOW[$Row+1][0]-1;
        $sheet->mergeCellsByColumnAndRow(1, $start, 1, $nextRow);
        $sheet->mergeCellsByColumnAndRow(2, $start, 2, $nextRow);
        $sheet->mergeCellsByColumnAndRow(5, $start, 5, $nextRow);
        $start = $nextRow+1;
        /*$titleColorYELLOW[$Row+1][0]
        if ($titleColorYELLOW[$Row-3] < 3 and $titleColorYELLOW[$Row-3] >= 1) :
            $sheet->getStyle('A' . $Row . ':' . $endColumnChar . $Row)->applyFromArray($styleRowCellYELLOW);
        elseif   ($titleColorYELLOW[$Row-3] > 3) :
            $sheet->getStyle('A' . $Row . ':' . $endColumnChar . $Row)->applyFromArray($styleRowCellRED);
        endif;
        */
    }

        //$sheet->setCellValue('E4',9999);

    try {

        $filename = str_replace(':','-',"Показание метео датчиков_" . date("d-m-Y_H:i:s") . ".xls");
        @unlink($filename);

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
        $writer->save("Reports/{$filename}");

    }
    catch (Exception $e) {
        echo $e->getMessage();
    }
    return $filename;
}
}