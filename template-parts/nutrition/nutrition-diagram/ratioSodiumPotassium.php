<div class="nutrition-diagram__item" id="sodium-potassium">
    <div class="nutrition-diagram__item-top">
        <h3>Соотношение Натрий/Калий</h3>
    </div>
    <div class="nutrition-diagram__item-bottom">
        <div class="canvas">
            <canvas></canvas>
        </div>
        <table>
            <tbody>
                <tr class="sodium">
                    <td class="percent" data-color="<?php echo $render->colors[0] ?>" style="--color:<?php echo $render->colors[0] ?>"><?php echo $diary['ratioSodiumPotassium']['sodiumPercent'] ?>%</td>
                    <td>Натрий</td>
                    <td><?php echo $diary['ratioSodiumPotassium']['sodium'] ?> <?php echo $diary['ratioSodiumPotassium']['unit'] ?></td>
                </tr>
                <tr class="potassium">
                    <td class="percent" data-color="<?php echo $render->colors[1] ?>" style="--color:<?php echo $render->colors[1] ?>"><?php echo $diary['ratioSodiumPotassium']['potassiumPercent'] ?>%</td>
                    <td>Калий</td>
                    <td><?php echo $diary['ratioSodiumPotassium']['potassium'] ?> <?php echo $diary['ratioSodiumPotassium']['unit'] ?></td>
                </tr>
                <tr class="sodium-potassium">
                    <td class="percent" data-color="<?php echo $render->colors[2] ?>" style="--color:<?php echo $render->colors[2] ?>"><?php echo $diary['ratioSodiumPotassium']['ratio'] ?></td>
                    <td>Натрий/Калий</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>