<div class="nutrition-table__item">
    <span>
        <span>Показатель</span>
        <span>% от вашей нормы</span>
    </span>
    <table>
        <?php if (isset($nutrients['energy']['energy'], $nutrients_energy['percent'])): ?>
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
        <?php endif; ?>
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
