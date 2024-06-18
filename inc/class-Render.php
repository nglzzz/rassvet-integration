<?php

class Render
{
    public function __construct()
    {
        $this->colors = [
            '#02A0FC', // blue
            '#7FCEFB', // lightblue
            '#D26256', // red
            '#E3A098', // lightred
            '#1F74CA', // darkblue
            '#B7B7B7', // gray
        ];

        $this->icons = [
            'Фрукты' => 'fruits',
            'Ягоды' => 'berries',
            'Овощи' => 'vegetables',
            'Орехи' => 'nuts',
            'Бобовые' => 'beans',
            'Злаки' => 'cereals',
            'Крупы' => 'cereals-2',
            'Грибы' => 'mashrooms',
            'Масла' => 'oils',
            'Мясо' => 'meet',
            'Птица' => 'bird',
            'Рыба' => 'fish',
            'Морепродукты' => 'seafood',
            'Субпродукты' => 'by-products',
            'Колбасные изделия' => 'sausages',
            'Яйца' => 'eggs',
            'Молочные продукты' => 'milk',
            'Хлебобулочные изделия' => 'bread',
            'Кондитерские изделия' => 'cakes',
            'Макаронные изделия' => 'pasta',
            'Другое'  => 'other-food',
            'Напитки' => 'drinks',
            'Алкоголь' => 'alcohol',
        ];
    }

    // print data
    function pre($obj)
    {
        echo '<pre>';
        print_r($obj);
        echo '</pre>';
    }

    // format num ru
    function format_num($num, $symbols = 2)
    {
        if (!$num) return;

        return number_format($num, $symbols, '.');
    }

    function find_key($arr, $keySearch)
    {
        $out = false;
        if (is_array($arr)) {
            if (array_key_exists($keySearch, $arr)) {
                $out = $arr[$keySearch];
            } else {
                foreach ($arr as $key => $value) {
                    if ($out = self::find_key($value, $keySearch)) {
                        break;
                    }
                }
            }
        }
        return $out;
    }

    function get_text($url, $tempalte = '')
    {
    }

    // results compare percents
    function calc_to_percent($min, $max, $current, $norm)
    {
        if (!$min || !$max || !$current || !$norm) return;


        $norma_percent =  ($norm / $max) * 100;
        $patient_percent = ($current / $max) * 100;

        $norma_percent = $this->format_num($norma_percent);
        $patient_percent = $this->format_num($patient_percent);

        return [
            'norma' => $norma_percent . '%',
            'patient' => $patient_percent . '%',
        ];
    }

    // table row
    function get_table_row($data, $template = 'nutrition-table-row')
    {
        $i = 0;
        foreach ($data as $item) :
            if ($i == 0) {
                $class = 'parent';
            } else {
                if ($item['mass'] > $item['norm']) {
                    $class = 'red';
                } else {
                    $class = 'blue';
                }
            }
            require 'template-parts/table-row.php';
            $i++;
        endforeach;
    }

    // param results array
    function get_param_results_array($metabolism, $chunk = false)
    {
        if (!$metabolism) return;

        $results = [
            [
                'data' => $metabolism['bioimpedansometry']['totalFluid'],
                'title' => 'Общая жидкость, л',
            ],
            [
                'data' => $metabolism['bioimpedansometry']['intracellularFluid'],
                'title' => 'Внутриклеточная жидкость, л',
            ],
            // Внеклеточная жидкость, л
            // Соотношение ВКЖ/ОКЖ
            [
                'data' => $metabolism['bioimpedansometry']['fatMassKg'],
                'title' => 'Содержание жира в теле, кг',
            ],
            [
                'data' => $metabolism['bioimpedansometry']['fatMassPercent'],
                'title' => 'Процентное содержание жира, %',
            ],
            [
                'data' => $metabolism['bioimpedansometry']['visceralFat'],
                'title' => 'Висцелярный жир',
            ],
            [
                'data' => $metabolism['bioimpedansometry']['muscleMassKg'],
                'title' => 'Масса скелетной мускулатуры, кг',
            ],
            [
                'data' => $metabolism['bioimpedansometry']['skinnyBodyMass'],
                'title' => 'Тощая масса, кг',
            ],
            [
                'data' => $metabolism['bioimpedansometry']['muscleMassKg'],
                'title' => 'Безжировая масса, кг',
            ],
            [
                'data' => $metabolism['bioimpedansometry']['activeCellMass'],
                'title' => 'Активная масса клеток, кг',
            ],

            // Индекс массы скелетной мускулатуры
            // Протеин (белок), кг

            // Минералы, кг
            // Масса минералов в костях, кг
        ];

        if ($chunk) {
            return array_chunk($results, 10);
        }

        return $results;
    }

    // result item
    function get_result_item($title, $data, $template = 'result-item')
    {
        if (!$data['mass']) return;
        $percent = $this->calc_to_percent($data['minThreshold'], $data['maxThreshold'], $data['mass'], $data['norm']);
        $delta = $data['maxThreshold'] - $data['minThreshold'];
        require 'template-parts/' . $template . '.php';
    }


    // param results array
    function get_nutrition_diagramm_array($diary, $chunk = false)
    {
        if (!$diary) return;

        $results = [
            [
                'template' => 'calorieDistributionOfMeals',
                'data' => $diary['calorieDistributionOfMeals'],
            ],
            [
                'template' => 'ratioPFC',
                'data' => $diary['ratioPFC'],
            ],
            [
                'template' => 'percentCarbohydrates',
                'data' => $diary['percentCarbohydrates'],
            ],
            [
                'template' => 'ratioOmegas',
                'data' => $diary['ratioOmegas'],
            ],
            [
                'template' => 'ratioSodiumPotassium',
                'data' => $diary['ratioSodiumPotassium'],
            ],
            [
                'template' => 'ratioCalciumPhosphorusMagnesium',
                'data' => $diary['ratioCalciumPhosphorusMagnesium'],
            ],
            [
                'template' => 'addedSugars',
                'data' => null,
            ]
        ];

        if ($chunk) {
            return array_chunk($results, 4);
        }

        return $results;
    }

    // tabs
    function get_tabs($data, $tab_text, $inner_tab = false)
    {
        if (!$data) return;

        $days = [
            'Пн',
            'Вт',
            'Ср',
            'Чт',
            'Пт',
            'Сб',
            'Вс',
        ];

        for ($i = 0; $i < count($data); $i++) {
            if ($i == 0) {
                $active = '_active';
            } else {
                $active = '';
            }

            if ($tab_text == 'days') {
                $text = $days[$i];
            } else {
                $text = $tab_text . ' ' . $i + 1;
            }

            if ($inner_tab) {
                $tab_num =   $inner_tab  . '-' . $i + 1;
            } else {
                $tab_num = $i + 1;
            }

            echo '<button data-tab="' . $tab_num . '" class="' . $active . '">' . $text . '</button>';
        }
    }

    // meal ration item
    function get_ration_meals($data)
    {
        if (!$data) return;

        foreach ($data as $item) {
            require 'template-parts/nutrition-plan__item.php';
        }
    }

    // meal energy total
    function get_ration_meals_total($data)
    {
        if (!$data) return;
        require 'template-parts/nutrition-plan__total.php';
    }


    function get_shopping_list($data)
    {
        if (!$data) return;
        require 'template-parts/shopping-list.php';
    }

    function get_recepies($data)
    {
        if (!$data) return;
        require 'template-parts/recepies.php';
    }
}
