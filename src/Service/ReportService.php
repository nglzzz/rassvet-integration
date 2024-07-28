<?php

declare(strict_types=1);

namespace App\Service;

class ReportService
{
    public function create(RenderService $render, array $json): string|false
    {
        $json_data = $json['data'];

        // doctor
        $doctor = $json_data['doctor'];
        $doctor_name = $doctor['middle_name'] . ' ' . $doctor['first_name'] . ' ' . $doctor['last_name'];


        // patient
        $patient = $json_data['patient'];
        $patient_name = $patient['middle_name'] . ' ' . $patient['first_name'] . ' ' . $patient['last_name'];


        // patient gender
        $gender = 'male';
        if ($patient['gender'] = 1) {
            $gender = 'female';
        }


        // metabolism
        $metabolism = false;
        if (array_key_exists('meta', $patient)) {
            $metabolism = $patient['meta'];
        }


        // diary
        $diary = false;
        if (array_key_exists('diary', $json_data)) {
            $diary = $json_data['diary'];
        }


        // ration, shopping list and recepies
        $ration = false;
        $shoppingList = false;
        $rationOnWeeks = false;
        $recipeOnWeeks = false;
        $infoNutrientsByRation = false;
        if (array_key_exists('ration', $json_data)) {
            $ration = $json_data['ration'];

            if (array_key_exists('rationOnWeeks', $ration)) {
                $rationOnWeeks = $ration['rationOnWeeks'];
            }
            if (array_key_exists('shoppingList', $ration)) {
                $shoppingList = $ration['shoppingList'];
            }
            if (array_key_exists('recipeOnWeeks', $ration)) {
                $recipeOnWeeks = $ration['recipeOnWeeks'];
            }
            if (array_key_exists('infoNutrientsByRation', $ration)) {
                $infoNutrientsByRation = $ration['infoNutrientsByRation'];
            }
        }

        // analisys
        $analisys = false;

        // hide sections
        $show_section = false;

        // start building html
        ob_start();
        require APPLICATION_PATH . '/template-parts/head.php';

        // web page
        require APPLICATION_PATH . '/pages/page-web.php';

        // pdf page
        require APPLICATION_PATH . '/pages/page-pdf.php';

        require APPLICATION_PATH . '/template-parts/scripts.php';

        $newcontent = ob_get_contents();
        ob_clean();
        // end building html

        $file_dir = APPLICATION_PATH . '/public/_client-reports/';

        $random_name = 'report_' . $this->translit($patient['last_name']) . '_' . date('Y-m-d-H-m-s');

        $filename = $file_dir . $random_name . '.html';

        $handle = fopen($filename, 'w+');
        $file = fwrite($handle, $newcontent);
        fclose($handle);

        return file_exists($filename) ? $newcontent : false;
    }

    public static function translit(string $value): string
    {
        $converter = [
            'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
            'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
            'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
            'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
            'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
            'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
            'э' => 'e',    'ю' => 'yu',   'я' => 'ya',

            'А' => 'A',    'Б' => 'B',    'В' => 'V',    'Г' => 'G',    'Д' => 'D',
            'Е' => 'E',    'Ё' => 'E',    'Ж' => 'Zh',   'З' => 'Z',    'И' => 'I',
            'Й' => 'Y',    'К' => 'K',    'Л' => 'L',    'М' => 'M',    'Н' => 'N',
            'О' => 'O',    'П' => 'P',    'Р' => 'R',    'С' => 'S',    'Т' => 'T',
            'У' => 'U',    'Ф' => 'F',    'Х' => 'H',    'Ц' => 'C',    'Ч' => 'Ch',
            'Ш' => 'Sh',   'Щ' => 'Sch',  'Ь' => '',     'Ы' => 'Y',    'Ъ' => '',
            'Э' => 'E',    'Ю' => 'Yu',   'Я' => 'Ya',
        ];

        return strtr($value, $converter);
    }
}
