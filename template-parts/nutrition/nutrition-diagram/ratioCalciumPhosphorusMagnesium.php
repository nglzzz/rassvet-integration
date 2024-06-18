<div class="nutrition-diagram__item" id="calcium-phosphorus-magnesium">
    <div class="nutrition-diagram__item-top">
        <h3>Соотношение Кальций/Фосфор/Магний</h3>
    </div>
    <div class="nutrition-diagram__item-bottom">
        <div class="canvas">
            <canvas></canvas>
        </div>
        <table>
            <tbody>
                <tr class="calcium">
                    <td class="percent" data-color="<?php echo $render->colors[0] ?>" style="--color:<?php echo $render->colors[0] ?>"><?php echo $diary['ratioCalciumPhosphorusMagnesium']['calciumPercent'] ?>%</td>
                    <td>Кальций</td>
                    <td><?php echo $diary['ratioCalciumPhosphorusMagnesium']['calcium'] ?> <?php echo $diary['ratioCalciumPhosphorusMagnesium']['unit'] ?></td>
                </tr>
                <tr class="phosphorus">
                    <td class="percent" data-color="<?php echo $render->colors[1] ?>" style="--color:<?php echo $render->colors[1] ?>"><?php echo $diary['ratioCalciumPhosphorusMagnesium']['phosphorusPercent'] ?>%</td>
                    <td>Фосфор</td>
                    <td><?php echo $diary['ratioCalciumPhosphorusMagnesium']['phosphorus'] ?> <?php echo $diary['ratioCalciumPhosphorusMagnesium']['unit'] ?></td>
                </tr>
                <tr class="magnesium">
                    <td class="percent" data-color="<?php echo $render->colors[2] ?>" style="--color:<?php echo $render->colors[2] ?>"><?php echo $diary['ratioCalciumPhosphorusMagnesium']['magnesiumPercent'] ?>%</td>
                    <td>Магний</td>
                    <td><?php echo $diary['ratioCalciumPhosphorusMagnesium']['magnesium'] ?> <?php echo $diary['ratioCalciumPhosphorusMagnesium']['unit'] ?></td>
                </tr>
                <tr class="calcium-phosphorus-magnesium">
                    <td class="percent" data-color="<?php echo $render->colors[3] ?>" style="--color:<?php echo $render->colors[3] ?>"><?php echo $diary['ratioCalciumPhosphorusMagnesium']['ratio'] ?></td>
                    <td>Кальций/Фосфор/Магний</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>