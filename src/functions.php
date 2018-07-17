<?php

use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * @param $file_name
 * @param $currencies_amount
 * @return mixed
 * @throws \PhpOffice\PhpSpreadsheet\Exception
 * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
 */
function getArticles($file_name, $currencies_amount)
{
    $articles = [];

    $spreadsheet = IOFactory::load($file_name);
    $worksheet = $spreadsheet->getActiveSheet();
    $lastRow = $worksheet->getHighestRow();
    for ($i = 1; $i <= $lastRow; $i++) {
        $cell = $worksheet->getCellByColumnAndRow(1, $i);
        if ($cell && $cell->getValue() === 'Title') {

            $title = $worksheet->getCellByColumnAndRow(2, $i)->getValue();

            $articles[$title] = [
                'FACTS' => [
                    'BTC' => $worksheet->getCellByColumnAndRow(4, $i + 5)->getValue() ?? '',
                    'ETH' => $worksheet->getCellByColumnAndRow(4, $i + 6)->getValue() ?? '',
                    'TRX' => $worksheet->getCellByColumnAndRow(4, $i + 7)->getValue() ?? '',
                    'XRP' => $worksheet->getCellByColumnAndRow(4, $i + 8)->getValue() ?? '',
                    'BCH' => $worksheet->getCellByColumnAndRow(4, $i + 9)->getValue() ?? '',
                    'LTC' => $worksheet->getCellByColumnAndRow(4, $i + 10)->getValue() ?? '',
                    'EOS' => $worksheet->getCellByColumnAndRow(4, $i + 11)->getValue() ?? '',
                    'ADA' => $worksheet->getCellByColumnAndRow(4, $i + 12)->getValue() ?? '',
                    'XLM' => $worksheet->getCellByColumnAndRow(4, $i + 13)->getValue() ?? '',
                    'NEO' => $worksheet->getCellByColumnAndRow(4, $i + 14)->getValue() ?? '',
                ],
                'PREDICTION' => [
                    'BTC' => $worksheet->getCellByColumnAndRow(5, $i + 5)->getValue() ?? '',
                    'ETH' => $worksheet->getCellByColumnAndRow(5, $i + 6)->getValue() ?? '',
                    'TRX' => $worksheet->getCellByColumnAndRow(5, $i + 7)->getValue() ?? '',
                    'XRP' => $worksheet->getCellByColumnAndRow(5, $i + 8)->getValue() ?? '',
                    'BCH' => $worksheet->getCellByColumnAndRow(5, $i + 9)->getValue() ?? '',
                    'LTC' => $worksheet->getCellByColumnAndRow(5, $i + 10)->getValue() ?? '',
                    'EOS' => $worksheet->getCellByColumnAndRow(5, $i + 11)->getValue() ?? '',
                    'ADA' => $worksheet->getCellByColumnAndRow(5, $i + 12)->getValue() ?? '',
                    'XLM' => $worksheet->getCellByColumnAndRow(5, $i + 13)->getValue() ?? '',
                    'NEO' => $worksheet->getCellByColumnAndRow(5, $i + 14)->getValue() ?? '',
                ],
                'TERM' => [
                    'BTC' => $worksheet->getCellByColumnAndRow(6, $i + 5)->getValue() ?? '',
                    'ETH' => $worksheet->getCellByColumnAndRow(6, $i + 6)->getValue() ?? '',
                    'TRX' => $worksheet->getCellByColumnAndRow(6, $i + 7)->getValue() ?? '',
                    'XRP' => $worksheet->getCellByColumnAndRow(6, $i + 8)->getValue() ?? '',
                    'BCH' => $worksheet->getCellByColumnAndRow(6, $i + 9)->getValue() ?? '',
                    'LTC' => $worksheet->getCellByColumnAndRow(6, $i + 10)->getValue() ?? '',
                    'EOS' => $worksheet->getCellByColumnAndRow(6, $i + 11)->getValue() ?? '',
                    'ADA' => $worksheet->getCellByColumnAndRow(6, $i + 12)->getValue() ?? '',
                    'XLM' => $worksheet->getCellByColumnAndRow(6, $i + 13)->getValue() ?? '',
                    'NEO' => $worksheet->getCellByColumnAndRow(6, $i + 14)->getValue() ?? '',
                ]
            ];

            $i = $i + 4 + $currencies_amount;
        }
    }

    return $articles;
}

/**
 * @param $array1
 * @param $array2
 * @return array
 */
function check_diff($array1, $array2)
{
    $difference = [];

    foreach ($array1 as $key => $value) {
        if (is_array($value)) {
            if (!isset($array2[$key]) || !is_array($array2[$key])) {
                $difference[$key] = $value;
            } else {
                $new_diff = check_diff($value, $array2[$key]);
                if ($new_diff !== []) {
                    $difference[$key] = $new_diff;
                }
            }
        } elseif (!isset($array2[$key]) || $array2[$key] !== $value) {
            $difference[$key] = (empty($value) ? 'NULL' : $value) . '/' . $array2[$key];
        }
    }

    return $difference;
}

function format($result, $type) {
    if (isset($result[$type])) {
        $data = $result[$type];
        echo '<ul class="list-group list-group-flush">';
        foreach ($data as $currency => $value) {
            echo "<li class=\"list-group-item\">$currency => $value</li>";
        }
        echo '</ul>';
    }
}