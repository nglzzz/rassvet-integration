<div class="nutrition-diagram__item" id="calorie-intake">
    <div class="nutrition-diagram__item-top">
        <h3>Распределение калорийности рациона по приёмам пищи</h3>
    </div>
    <div class="nutrition-diagram__item-bottom">
        <div class="canvas">
            <canvas></canvas>
        </div>
        <table>
            <tbody>
                <?php $i = 0;
                foreach ($diary['calorieDistributionOfMeals'] as $item) : ?>
                    <tr>
                        <td class="percent" data-color="<?php echo $render->colors[$i] ?>" style="--color:<?php echo $render->colors[$i] ?>"><?php echo $item['percent'] ?>%</td>
                        <td><?php echo $item['ingestion'] ?></td>
                        <td><?php echo $item['energy'] ?> ккал</td>
                    </tr>
                <?php $i++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
</div>