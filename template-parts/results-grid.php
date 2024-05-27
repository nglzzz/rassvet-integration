<div class="grid grid-2">
    <?php
    $results = [
        [
            'key' => $metabolism['bioimpedansometry']['totalFluid'],
            'title' => 'Общая жидкость, л',
        ],
        [
            'key' => $metabolism['bioimpedansometry']['intracellularFluid'],
            'title' => 'Внутриклеточная жидкость, л',
        ],
        // Внеклеточная жидкость, л
        // Соотношение ВКЖ/ОКЖ
        [
            'key' => $metabolism['bioimpedansometry']['fatMassKg'],
            'title' => 'Содержание жира в теле, кг',
        ],
        [
            'key' => $metabolism['bioimpedansometry']['fatMassPercent'],
            'title' => 'Процентное содержание жира, %',
        ],
        [
            'key' => $metabolism['bioimpedansometry']['visceralFat'],
            'title' => 'Висцелярный жир',
        ],
        [
            'key' => $metabolism['bioimpedansometry']['muscleMassKg'],
            'title' => 'Масса скелетной мускулатуры, кг',
        ],
        [
            'key' => $metabolism['bioimpedansometry']['skinnyBodyMass'],
            'title' => 'Тощая масса, кг',
        ],
        [
            'key' => $metabolism['bioimpedansometry']['muscleMassKg'],
            'title' => 'Безжировая масса, кг',
        ],
        [
            'key' => $metabolism['bioimpedansometry']['activeCellMass'],
            'title' => 'Активная масса клеток, кг',
        ],

        // Индекс массы скелетной мускулатуры
        // Протеин (белок), кг

        // Минералы, кг
        // Масса минералов в костях, кг
    ];

    foreach ($results as $item) {
        if ($item['key']) {
            $render->get_result_item($item['title'], $item['key']);
        }
    }
    ?>
</div>