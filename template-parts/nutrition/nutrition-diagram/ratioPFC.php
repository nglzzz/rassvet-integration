<div class="nutrition-diagram__item" id="ptc">
    <div class="nutrition-diagram__item-top">
        <h3>Соотношение БЖУ в рационе</h3>
    </div>
    <div class="nutrition-diagram__item-bottom">
        <div class="canvas">
            <canvas></canvas>
        </div>
        <table>
            <tbody>
                <tr class="proteins">
                    <td class="percent" data-color="<?php echo $render->colors[0] ?>" style="--color:<?php echo $render->colors[0] ?>"><?php echo $diary['ratioPFC']['proteinPercent'] ?>%</td>
                    <td>Белки</td>
                    <td><?php echo $diary['ratioPFC']['protein'] ?> ккал</td>
                </tr>
                <tr class="fats">
                    <td class="percent" data-color="<?php echo $render->colors[1] ?>" style="--color:<?php echo $render->colors[1] ?>"><?php echo $diary['ratioPFC']['fatsPercent'] ?>%</td>
                    <td>Жиры</td>
                    <td><?php echo $diary['ratioPFC']['fat'] ?> ккал</td>
                </tr>
                <tr class="carbohydrates">
                    <td class="percent" data-color="<?php echo $render->colors[2] ?>" style="--color:<?php echo $render->colors[2] ?>"><?php echo $diary['ratioPFC']['carbohydratePercent'] ?>%</td>
                    <td>Углеводы</td>
                    <td><?php echo $diary['ratioPFC']['carbohydrate'] ?> ккал</td>
                </tr>
                <tr class="ptc">
                    <td class="percent" data-color="<?php echo $render->colors[3] ?>" style="--color:<?php echo $render->colors[3] ?>"><?php echo $diary['ratioPFC']['ratio'] ?></td>
                    <td>Б/Ж/У</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>