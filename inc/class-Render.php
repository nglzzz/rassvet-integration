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
            'Крупы' => '',
            'Грибы' => '',
            'Масла' => '',
            'Мясо' => 'meet',
            'Птица' => 'bird',
            'Рыба' => 'fish',
            'Морепродукты' => '',
            'Субпродукты' => '',
            'Колбасные изделия' => '',
            'Яйца' => '',
            'Молочные продукты' => '',
            'Хлебобулочные изделия' => '',
            'Кондитерские изделия' => '',
            'Макаронные изделия' => '',
            'Другое'  => 'other-food',
            'Напитки' => 'drinks',
            'Алкоголь' => 'alcohol',
        ];
    }

    function pre($obj)
    {
        echo '<pre>';
        print_r($obj);
        echo '</pre>';
    }

    function format_num($num, $symbols = 2)
    {
        if (!$num) return;

        return number_format($num, $symbols, '.');
    }

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
            } ?>
            <tr class="<?php echo $class ?>">
                <?php if ($i == 0) : ?>
                    <td><b><?php echo $item['title'] ?></b></td>
                <?php else : ?>
                    <td><?php echo $item['title'] ?></td>
                <?php endif; ?>
                <td style="--width:<?php echo $item['percent'] ?>%">1 <?php echo $item['unit'] ?></td>
                <td><?php echo $item['percent'] ?>%</td>
            </tr>
        <?php
            $i++;
        endforeach;
    }

    function get_result_item($title, $data, $template = 'result-item')
    {
        if (!$data['mass']) return;
        $percent =  $this->calc_to_percent($data['maxThreshold'], $data['maxThreshold'], $data['mass'], $data['norm']);
        ?>
        <div class="result-item">
            <h3><?php echo $title ?></h3>
            <div class="result-item__flex">
                <div class="result-item__score"><?php echo $data['mass'] ?></div>
                <div class="result-item__scale">
                    <p>
                        <span>70</span>
                        <span>80</span>
                        <span>90</span>
                        <span>100</span>
                        <span>110</span>
                        <span>120</span>
                        <span>130</span>
                        <span>140</span>
                    </p>
                    <div style="<?php echo $percent['norma'] ?>; --patient:<?php echo $percent['patient'] ?>">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
<?php
    }

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

    function get_ration_meals($data)
    {
        if (!$data) return;

        // $html = 'template-parts/nutrition-plan__item.php';

        $html = '';

        foreach ($data as $item) {
            $html .= '<div class="nutrition-plan__item"><div>';
            $html .= '<label><b>' . $item['eatingName'] . '</b></label>';
            $html .= '<time>' . $item['eatingTime'] . '</time>';
            $html .= '</div>';

            $html .= '
            <table>
                <thead>
                    <tr>
                        <th>Продукт/блюдо</th>
                        <th>Кол-во</th>
                        <th>Вес</th>
                        <th>Ккал</th>
                        <th>БЖУ</th>
                        <th>Рецепт</th>
                    </tr>
                </thead>
                <tbody>';

            foreach ($item['foods'] as $food) {
                $html .= '<tr>
                        <td>' . $food['title'] . '</td>
                        <td>' . $food['unit'] . '</td>
                        <td>' . $food['mass'] . ' ' . $food['unit'] . '</td>
                        <td>' . $food['energy'] . '</td>
                        <td>' . $food['protein'] . '/' . $food['fat'] . '/' . $food['carbohydrate'] . '</td>
                        <td>' . $food['type'] . '</td>
                    </tr>';
            }
            $html .= '</table></tbody></div>';

            echo $html;
        }
    }

    function get_ration_meals_total($data)
    {
        if (!$data) return;

        echo '<div class="nutrition-plan__total">
                <h3>Итого:</h3>
                <div class="grid grid-3">
                    <div class="params-item">
                        <div class="params-item__wrap">
                            <div class="params-item__flex">
                                <div class="params-item__left">
                                    <div class="icon">
                                        <svg width="39" height="39" viewBox="0 0 39 39">
                                            <use xlink:href="assets/img/svg/icons.svg#chart"></use>
                                        </svg>
                                    </div>
                                </div>
                                <div class="params-item__right">
                                    <label>БЖУ</label>
                                    <span>' . $data['protein'] . '/' . $data['fat'] . '/' . $data['carbohydrate'] . '</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="params-item">
                        <div class="params-item__wrap">
                            <div class="params-item__flex">
                                <div class="params-item__left">
                                    <div class="icon">
                                        <svg width="33" height="42" viewBox="0 0 33 42">
                                            <use xlink:href="assets/img/svg/icons.svg#fire"></use>
                                        </svg>
                                    </div>
                                </div>
                                <div class="params-item__right">
                                    <label>Ккал</label>
                                    <span>' . $this->format_num($data['energy']) . '</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="params-item">
                        <div class="params-item__wrap">
                            <div class="params-item__flex">
                                <div class="params-item__left">
                                    <div class="icon">
                                        <svg width="39" height="39" viewBox="0 0 39 39">
                                            <use xlink:href="assets/img/svg/icons.svg#glass"></use>
                                        </svg>
                                    </div>
                                </div>
                                <div class="params-item__right">
                                    <label>Вода</label>
                                    <span>' . $this->format_num($data['water'] / 1000) . ' л</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    }
}
