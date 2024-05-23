<h3 class="nutrition-mass__title">Массовая доля групп продуктов питания в рационе</h3>
<div class="nutrition-mass__flex">
    <div class="nutrition-mass__graphic">
        <canvas></canvas>
    </div>
    <div class="nutrition-mass__list">
        <ol>
            <?php
            foreach ($nutrient_mass as $item) :
                $icon = '' . $item['title'] . '';
            ?>
                <li data-icon="assets/img/icons/<?php echo $render->icons[$icon] ?>.svg" data-percent="<?php echo $item['percent'] ?>">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href='assets/img/svg/icons.svg#<?php echo $render->icons[$icon] ?>' />
                    </svg>
                    <span><?php echo $item['title'] ?></span>
                    <span><b><?php echo $item['percent'] ?>%</b></span>
                    <span><?php echo $item['mass'] ?> <?php echo $item['unit'] ?></span>
                </li>
            <?php
            endforeach;
            ?>
        </ol>
    </div>
</div>
<div class="params-item params-info large">
    <div class="params-item__wrap">
        <div class="icon">
            <svg width="48" height="48" viewBox="0 0 48 48">
                <use xlink:href="assets/img/svg/icons.svg#info"></use>
            </svg>
        </div>
        <h3>Заключение по фактическому питанию</h3>
        <p>Ваш фактический рацион не отвечает потребностям вашего организма. Наблюдается дефицит
            углеводов, избыток жиров, избыток
            белка. 52.4% важнейших для здоровья элементов содержатся в вашем рационе в
            необходимом
            количестве. Несмотря на это,
            следующие витамины и минералы поступают в недостаточном количестве: витамин A,
            бета-каротин,
            витамин D, витамин E,
            витамин K, витамин С, холин, витамин В5, витамин В9, кальций, железо, калий, хлор,
            бор, йод.
            В вашем фактическом рационе
            преобладают такие группы продуктов, как овощи и молочные продукты. Анализ состава
            жирных
            кислот показал допустимое
            соотношение омега-3/омега-6. Желательно повысить употребление продуктов, богатых
            омега-3
            жирными кислотами для
            достижения оптимального соотношения омега-3/омега-6. Вы потребляете оптимальное
            количество
            простых сахаров. В вашем
            рационе недостаточно клетчатки. Это снижает ваше насыщение, ухудшает пищеварение и
            повышает
            риск развития некоторых
            заболеваний. В целом, вы потребляете меньше калорий, чем вам требуется для вашей
            цели.</p>
    </div>
</div>
<img class="nutrition-mass__img" src="assets/img/vegetables.png" alt="">