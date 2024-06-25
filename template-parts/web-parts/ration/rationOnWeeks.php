<section class="section nutrition-plan" id="nutrition-plan" data-tabs-area>
    <div class="section__linear">
        <div class="_container">
            <h2>Ваш персональный план питания</h2>
        </div>
    </div>
    <div class="section__container _container">
        <div class="section__body">
            <div class="tabs">
                <?php
                $render->get_tabs($rationOnWeeks, 'Неделя', $inner = false);
                ?>
            </div>
            <div class="tabs-content">
                <?php
                $i = 1;
                foreach ($rationOnWeeks as $item) :
                    if ($i == 1) {
                        $_active = '_active';
                    } else {
                        $_active = '';
                    }
                ?>
                    <div data-tab-content="<?php echo $i ?>" class="<?php echo $_active ?>">
                        <div class="tabs">
                            <?php
                            $render->get_tabs($item['days'], 'days', $inner = $i);
                            ?>
                        </div>
                        <?php
                        $k = 1;
                        foreach ($item['days'] as $day) :
                            if ($k == 1) {
                                $inner_active = '_active';
                            } else {
                                $inner_active = '';
                            }
                        ?>
                            <div data-tab-content="<?php echo $i ?>-<?php echo $k ?>" class="<?php echo $inner_active ?>">
                                <?php
                                $render->get_ration_meals($day['eatings']);
                                $render->get_ration_meals_total($item['average']);
                                ?>
                            </div>
                        <?php $k++;
                        endforeach; ?>
                    </div>
                <?php
                    $i++;
                endforeach;
                ?>
            </div>
            <div class="text-accent italic">
                <p>Для вашего удобства вес некоторых продуктов указан не только в граммах, но и в штуках.
                    Если
                    вы видите, что указано «1
                    шт.», то имеется в виду продукт средних размеров. Например, «яблоко 1 шт.» — это одно
                    яблоко
                    среднего размера. 
                    Но, например, размер картофелины или яйца может варьироваться в широких пределах. Так, в
                    столбце «Количество» могут
                    встречаться дробные величины. Например, 1.5 яйца или 0.5 картофелины. Поэтому, чтобы вам
                    было удобно, для таких случаев
                    мы рекомендуем ориентироваться на вес таких продуктов в граммах. Так вам не придётся
                    разделять яйцо на части, а
                    измерения в граммах всегда намного точнее.</p>
                <p>Эти же советы применимы к ингредиентам в рецептах и к продуктам для покупок.</p>
            </div>
            <div class="nutrition-plan__img">
                <img src="assets/img/nutrition-plan.png" alt="">
            </div>
        </div>
    </div>
</section>