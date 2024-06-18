<div class="nutrition-diagram__item" id="carbohydrates">
    <div class="nutrition-diagram__item-top">
        <h3>Состав углеводов</h3>
    </div>
    <div class="nutrition-diagram__item-bottom">
        <div class="canvas">
            <canvas></canvas>
        </div>
        <table>
            <tbody>
                <tr class="sugars">
                    <td class="percent" data-color="<?php echo $render->colors[0] ?>" style="--color:<?php echo $render->colors[0] ?>"><?php echo $diary['percentCarbohydrates']['simpleCarbohydrates'] ?>%</td>
                    <td>Простые сахара</td>
                    <td><?php echo $diary['percentCarbohydrates']['simpleCarbohydrates'] ?> г</td>
                </tr>
                <tr class="starch">
                    <td class="percent" data-color="<?php echo $render->colors[1] ?>" style="--color:<?php echo $render->colors[1] ?>"><?php echo $diary['percentCarbohydrates']['starch'] ?>%</td>
                    <td>Крахмал</td>
                    <td><?php echo $diary['percentCarbohydrates']['starch'] ?> г</td>
                </tr>
                <tr class="cellulose">
                    <td class="percent" data-color="<?php echo $render->colors[2] ?>" style="--color:<?php echo $render->colors[2] ?>"><?php echo $diary['percentCarbohydrates']['fiber'] ?>%</td>
                    <td>Клетчатка</td>
                    <td><?php echo $diary['percentCarbohydrates']['fiber'] ?> г</td>
                </tr>
                <tr class="complex-carbohydrates">
                    <td class="percent" data-color="<?php echo $render->colors[3] ?>" style="--color:<?php echo $render->colors[3] ?>"><?php echo $diary['percentCarbohydrates']['otherCarbohydrates'] ?>%</td>
                    <td>Прочие сложные углеводы</td>
                    <td><?php echo $diary['percentCarbohydrates']['otherCarbohydrates'] ?> г</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>