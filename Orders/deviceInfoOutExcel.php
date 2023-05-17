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

        //Установка ширины всех столбцов
        for ($i=1;$i<=count($rowExcel);$i++) {
            $sheet->getColumnDimensionByColumn($i)->setWidth('20');
        }



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

        //Включение автоподбора ширины столбца
        //$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        for ($i = 'C'; $i !=  $spreadsheet->getActiveSheet()->getHighestColumn(); $i++) {
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
    $title1 = ['Дата и время','Имя узла','Название Датчика','ед изм','Влажность','Высота','Давление'];
    //$title2 = ['Название',''];
    //$titleShotName = ['','','DS18B20_1','','DS18B20_0','', 'DHT_T','','T_BMP280','','DHT_H','','DS18B20_','']; //,'P_BMP280','A_BMP280'
    //$titleShotName = ['','','DS18B20_','','DHT_H','', 'DHT_T','','T_BMP280','','DS18B20_1','','DS18B20_0',''];
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

        //Если первый элемент массива пустой то влажность перемещаю к следующему.
        $arrFirstNull = function (&$arr) {
            try {
                if (count($arr[0]) < 4) {
                    $arrElem = array_shift($arr);
                    if (isset($arrElem[4])) $arr[0][4] = $arrElem[4];
                    if (isset($arrElem[5])) $arr[0][5] = $arrElem[5];
                    if (isset($arrElem[6])) $arr[0][6] = $arrElem[6];
                }
            }
            catch (Exception $e) {
                echo "При перемещении датчика влажности в начало массива возникла ошибка: {$e->getMessage()}\n";
            }
        };
        //Получаю влажность если она есть. Формирую данные по датчику
        $getSensor = function ($item) {
            try {
                $deviceParam[0] = $item['lastUpdate'];
                $deviceParam[1] = $item['place'];
                $deviceParam[2] = $item['label'];
                $deviceParam[3] = $item['value'];
                $item['name'] == 'DHT_H' ? $deviceParam[4] = $item['value'] : $deviceParam[4] = null;
                $item['name'] == 'A_BMP280' ? $deviceParam[5] = $item['value'] : $deviceParam[5] = null;
                $item['name'] == 'P_BMP280' ? $deviceParam[6] = $item['value'] : $deviceParam[6] = null;

            }
            catch (Exception $e) {
                echo "При добавлении информации по датчику в массив для вывода возникла ошибка: {$e->getMessage()}\n";
            }
            return $deviceParam;
        };
        //Записываю влажность в первый элемент списка местности
        $SetSenserLeftFirst = function (&$tmpSensors, $elemSensor ) {
            try
            {
                if (!is_null($elemSensor[4])) $tmpSensors[0][4]=$elemSensor[4];
                elseif (!is_null($elemSensor[5])) $tmpSensors[0][5]=$elemSensor[5];
                elseif (!is_null($elemSensor[6])) $tmpSensors[0][6]=$elemSensor[6];
                else $tmpSensors[] = $elemSensor;
            }
            catch (Exception $e) {
                echo "В функции при добавлении информации по устройсквам в массив для вывода возникла ошибка: {$e->getMessage()}\n";
            }
        };

    $rowExcel=[];

    #region Формирую массив для вывода в Excel
    $id = -1;
    $i = 0;
    $tempDeviceArray = [];
    foreach ($arr as $item){
        try {
            if ($id == -1 or $id != $item['id']) {
                //Если закончил обрабатывать датчики по устройству и пошло следующее устройство
                if ($id != $item['id'] and $id != -1) {
                    $arrFirstNull($tempDeviceArray);
                    $rowExcel = array_merge($rowExcel, $tempDeviceArray);
                    $titleColorYELLOW[] = [count($tempDeviceArray), $dateId, $id];
                    $tempDeviceArray = [];
                };
                $id = $item['id'];
                $dateId = $item['datediff'];
                $SetSenserLeftFirst($tempDeviceArray, $getSensor($item));

            } else {
                //$addDeviceArr($item,$titleShotName, $deviceParam);
                $SetSenserLeftFirst($tempDeviceArray, $getSensor($item));
            };
        }
        catch (Exception $e) {
            echo "При добавлении информации по устройсквам в массив для вывода возникла ошибка: {$e->getMessage()}";
        }
        $i++;
    }
    #endregion

    $spreadsheet = new Spreadsheet();

    $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
    $spreadsheet->getDefaultStyle()->getFont()->setSize(12);

    $sheet = $spreadsheet->getActiveSheet();
    $sheet->getPageMargins()
        ->setLeft(0)
        ->setRight(0)
        ->setTop(0)
        ->setBottom(0);
    // Set paper size to A4
        $sheet->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
    //ориентацию
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT);
    // уместить 1 страницу в ширину на бесконечное количество страниц в высоту
    $sheet->getPageSetup()->setFitToWidth(1);
    $sheet->getPageSetup()->setFitToHeight(0);


    $endColumIndexTitle = count($title1);
    $startRowIndexTitle = 1;
    #region Устанавливаю выравниевание в ячейках столбцов

        for ($i=1; $i<= $endColumIndexTitle; $i++) {
            $ColumnChar = Coordinate::stringFromColumnIndex($i);
            $sheet->getStyle("$ColumnChar:$ColumnChar")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
           // if (in_array($ColumnChar,['A','B','E']))
                $sheet->getStyle("$ColumnChar:$ColumnChar")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        }
    #endregion

    $borders = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                'color' => [
                    'argb' => 'ff000000'
                ],
            ],
        ],
        'alignment' => [
            'wrapText' => true,
        ]
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
    //$sheet->fromArray($title2,null,'C2');

    /*
    //Временно Для отладки
    $sheet->fromArray($title1,null,'F1');
    $sheet->fromArray($title2,null,'H2');
/*
     *
     */
    //Выравнивание заголовка
    $sheet->getStyleByColumnAndRow(1,1,5,2)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

    /*
    //Объеденяю ячейки заголовка
    $sheet->mergeCellsByColumnAndRow(1, 1, 1, 2);
    $sheet->mergeCellsByColumnAndRow(2, 1, 2, 2);
    $sheet->mergeCellsByColumnAndRow(3, 1, 4, 1);
    $sheet->mergeCellsByColumnAndRow(5, 1, 5, 2);
    $sheet->mergeCellsByColumnAndRow(6, 1, 6, 2);
    $sheet->mergeCellsByColumnAndRow(7, 1, 7, 2);
    */

    //Закрашиваю заголовок таблицы
    $sheet->getStyleByColumnAndRow(1,1, $endColumIndexTitle,1)->applyFromArray($styleArray);
    //$sheet->getStyle('A1')->applyFromArray($borders);

    //Вывод данных в таблицу
    $firstCollumDataCharExcel = Coordinate::stringFromColumnIndex(1);
    $firstRowDataIndexExcel = 2;
    $sheet->fromArray($rowExcel,null,$firstCollumDataCharExcel.$firstRowDataIndexExcel);


    //Времено для отладки
    //Вывод данных в таблицу
    //$sheet->fromArray($rowExcel,null,'F3');

    $lastCollumnCharExcel = Coordinate::stringFromColumnIndex($endColumIndexTitle);
    $lastRowIndexDataExcel = count($rowExcel)+$firstRowDataIndexExcel-1;

    $sheet->getStyle($firstCollumDataCharExcel.$startRowIndexTitle.":".$lastCollumnCharExcel.$lastRowIndexDataExcel)->applyFromArray($borders);

    //Отступ ячееек
    //$sheet->getStyle($firstCollumDataCharExcel.$startRowIndexTitle.":".$lastCollumnCharExcel.$lastRowIndexDataExcel)->getAlignment()->setIndent(0);

    //Установка Автоподбора ширины столбцов
    for ($column = 'C'; $column !=  $sheet->getHighestColumn(); $column++) {
        $sheet->getColumnDimension($column)->setAutoSize(true);
    }
    $sheet->getColumnDimensionByColumn(1)->setWidth(11.77);
    $sheet->getColumnDimensionByColumn(2)->setWidth(14.5);
    $sheet->getColumnDimensionByColumn(5)->setWidth(10);

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



    /*
    $End = count($rowExcel)+2;
    $CollCharBegin = Coordinate::stringFromColumnIndex(3);
    $CollCharEnd = Coordinate::stringFromColumnIndex(4);
    for ($Row = 4; $Row <= $End; $Row += 2) {
        //$s = 'A' . $Row . ':'.$endColumnCharExcel . $Row;
        $sheet->getStyle( $CollCharBegin. $Row . ':'. $CollCharEnd . $Row)->applyFromArray($styleRowCell);
    }
*/

    $setColorRange= function ($sheet, $day, $rowStart, $collumnStart, $rowEnd, $collumnEnd, $row) {
            $drow = function ($sheet,$CollumnStart,$RowStart,$CollumnEnd,$RowEnd,$day) {
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

                $columnCharStart = Coordinate::stringFromColumnIndex($CollumnStart);
                $columnCharEnd = Coordinate::stringFromColumnIndex($CollumnEnd);
                if ($day < 3 and $day >= 1) $sheet->getStyle($columnCharStart . $RowStart. ':' . $columnCharEnd . $RowEnd)->applyFromArray($styleRowCellYELLOW);
                elseif ($day > 3) $sheet->getStyle($columnCharStart . $RowStart . ':' . $columnCharEnd . $RowEnd)->applyFromArray($styleRowCellRED);

            };

//темно зеленый d8e4bc // светло зеленый ebf1de
            if ($day >= 1) $drow($sheet,$collumnStart,$rowStart,$collumnEnd,$rowEnd,$day);
            else {
                if ($row%2==0)
                {
                    $styleRowCellDarkGreen =  [
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => [
                                'argb' => 'ffd8e4bc',
                            ]
                        ]
                    ];
                $sheet->getStyleByColumnAndRow($collumnStart, $rowStart, $collumnEnd, $rowEnd)->applyFromArray($styleRowCellDarkGreen);}
                else {
                    $styleRowCellLigthGreen =  [
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'startColor' => [
                                'argb' => 'ffebf1de',
                            ]
                        ]
                    ];
                    $sheet->getStyleByColumnAndRow($collumnStart, $rowStart, $collumnEnd, $rowEnd)->applyFromArray($styleRowCellLigthGreen);
                }
                }

            /*
        if ($day < 3 and $day >= 1) :
            $drow($sheet,$CollumnStart,$RowStart,$CollumnEnd,$RowEnd,$day);
        elseif   ($day > 3) :
            $drow($sheet,$CollumnStart,$RowStart,$CollumnEnd,$RowEnd,$day);
            //$sheet->getStyle($columnCharStart . $RowStart . ':' . $columnCharEnd . $RowEnd)->applyFromArray($styleRowCellRED);
        endif;
            */
    };

    #region Объединение яцеек данных
    $End = count($titleColorYELLOW)-1;
    $start = 1;
    for ($Row = 0; $Row <= $End; $Row += 1) {
        $nextRow = $start + $titleColorYELLOW[$Row][0];
        ++$start;
//        echo "1,$start,1,$nextRow";
        try {
            $sheet->mergeCellsByColumnAndRow(1, $start, 1, $nextRow);
            $sheet->mergeCellsByColumnAndRow(2, $start, 2, $nextRow);
            $sheet->mergeCellsByColumnAndRow(5, $start, 5, $nextRow);
            $sheet->mergeCellsByColumnAndRow(6, $start, 6, $nextRow);
            $sheet->mergeCellsByColumnAndRow(7, $start, 7, $nextRow);
        }
        catch (Exception $e){
            echo "sheet->mergeCellsByColumnAndRow(1, $start, 1, $nextRow),Количество записей - {$titleColorYELLOW[$Row][0]},Разность дат в днях - {$titleColorYELLOW[$Row][1]},ID - территории - {$titleColorYELLOW[$Row][2]}\n";
            echo "При объединении ячеек возникла ошибка:{$e->getMessage()}\n";
        }

        $setColorRange($sheet,$titleColorYELLOW[$Row][1],$start,1,$nextRow, $endColumIndexTitle,$Row+1);
        $start = $nextRow;
    }
    #endregion

    try {

        $filenameExcel = str_replace(':','-',"Показание метео датчиков_" . date("d-m-Y_H:i:s") . ".xlsx");
        @unlink($filenameExcel);

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save("Reports/{$filenameExcel}");


        $filenamePDF = str_replace(':','-',"Показание метео датчиков_" . date("d-m-Y_H:i:s") . ".pdf");
        @unlink($filenamePDF);

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Tcpdf');
        $writer->save("Reports/{$filenamePDF}");

    }
    catch (Exception $e) {
        echo $e->getMessage();
    }
    return [$filenameExcel,$filenamePDF];
}
}