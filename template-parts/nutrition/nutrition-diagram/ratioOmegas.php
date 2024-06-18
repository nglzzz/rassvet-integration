<div class="nutrition-diagram__item" id="omegas">
    <div class="nutrition-diagram__item-top">
        <h3>Соотношение Омега-3/Омега-6</h3>
    </div>
    <div class="nutrition-diagram__item-bottom">
        <div class="canvas">
            <canvas></canvas>
        </div>
        <table>
            <tbody>
                <tr class="omega-3">
                    <td class="percent" data-color="<?php echo $render->colors[0] ?>" style="--color:<?php echo $render->colors[0] ?>"><?php echo $diary['ratioOmegas']['omega3Percent'] ?>%</td>
                    <td>Омега-3</td>
                    <td><?php echo $diary['ratioOmegas']['omega3'] ?> <?php echo $diary['ratioOmegas']['unit'] ?></td>
                </tr>
                <tr class="omega-6">
                    <td class="percent" data-color="<?php echo $render->colors[1] ?>" style="--color:<?php echo $render->colors[1] ?>"><?php echo $diary['ratioOmegas']['omega6Percent'] ?>%</td>
                    <td>Омега-6</td>
                    <td><?php echo $diary['ratioOmegas']['omega6'] ?> <?php echo $diary['ratioOmegas']['unit'] ?></td>
                </tr>
                <tr class="omega-3-6">
                    <td class="percent" data-color="<?php echo $render->colors[2] ?>" style="--color:<?php echo $render->colors[2] ?>"><?php echo $diary['ratioOmegas']['ratio'] ?></td>
                    <td>Омега-3/Омега-6</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>