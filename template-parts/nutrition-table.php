<div class="text-accent italic">
    <p>На этой странице показана пищевая ценность вашего прошлого рациона. Иными словами —
        <b>содержание</b> полезных и
        некоторых вредных для здоровья веществ. Голубой цвет — оптимальное количество. Красный —
        недостаточное или слишком
        избыточное количество вещества, что может негативно влиять на ваше здоровье или состав
        тела.
        Значения рассчитаны в
        среднем за один день.
    </p>
</div>
<div class="nutrition-table__item">
    <span>
        <span>Показатель</span>
        <span>% от вашей нормы</span>
    </span>
    <table>
        <thead>
            <?php
            $nutrients_energy = $nutrients['energy']['energy'];
            ?>
            <tr>
                <th>Калорийность</th>
                <th style="--width:<?php echo $nutrients_energy['percent'] ?>%">1 <?php echo $nutrients_energy['unit'] ?></th>
                <th><?php echo $nutrients_energy['percent'] ?>%</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nutrients_caloreis = [
                $nutrients['protein'],
                $nutrients['fats'],
                $nutrients['carbohydrate']
            ];
            foreach ($nutrients_caloreis as $nutrient) {
                $render->get_table_row($nutrient);
            }
            ?>
        </tbody>
    </table>
</div>

<?php
$nutrients_array = [
    'Прочее' => $nutrients['other'],
    'Витамины' => $nutrients['vitamins'],
    'Минаралы' => $nutrients['minerals']
];
if ($nutrients_array) :
    foreach ($nutrients_array as $key => $nutrient) :
?>
        <div class="nutrition-table__item">
            <table>
                <thead>
                    <tr>
                        <th><?php echo $key ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $render->get_table_row($nutrient);
                    ?>
                </tbody>
            </table>
        </div>
<?php endforeach;
endif;  ?>