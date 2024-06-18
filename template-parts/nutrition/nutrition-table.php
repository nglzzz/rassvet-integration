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
