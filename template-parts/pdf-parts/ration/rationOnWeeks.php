<?php
foreach ($rationOnWeeks as $w_idx => $week) :
    foreach ($week['days'] as $d_idx => $day) :
        $sorted_eatings = $render->chunk_array($day['eatings'], 4000, false, true);
        foreach ($sorted_eatings as $eatings) :
?>
            <section class="section nutrition-plan" id="nutrition-plan-w<?php echo $w_idx + 1 ?>-d<?php echo $d_idx + 1 ?>" data-tabs-area>
                <div class="section__container _container">
                    <?php
                    require APPLICATION_PATH . '/template-parts/pdf-parts/header.php';
                    ?>
                    <div class="section__body">
                        <?php
                        $section_title = 'Ваш персональный план питания. Неделя ' .  $w_idx + 1;
                        require APPLICATION_PATH . '/template-parts/pdf-parts/section-title.php';
                        ?>
                        <div class="tabs">
                            <button class="day">День <?php echo $d_idx + 1 ?></button>
                        </div>

                        <div class="grid">
                            <?php
                            $render->get_ration_meals($eatings);
                            ?>
                        </div>

                    </div>
                    <?php
                    require APPLICATION_PATH . '/template-parts/pdf-parts/footer.php';
                    ?>
                </div>
            </section>

        <?php
        endforeach; ?>
        <?php
        if ($d_idx == count($week['days']) - 1) :
        ?>
            <section class="section nutrition-plan plan-total" id="nutrition-plan-w<?php echo $w_idx + 1 ?>-total" data-tabs-area>
                <div class="section__container _container">
                    <?php
                    require APPLICATION_PATH . '/template-parts/pdf-parts/header.php';
                    ?>
                    <div class="section__body">
                        <?php
                        $section_title = 'Ваш персональный план питания. Неделя ' .  $w_idx + 1 . '. Итоги';
                        require APPLICATION_PATH . '/template-parts/pdf-parts/section-title.php';
                        ?>

                        <?php
                        if ($d_idx == count($week['days']) - 1) :
                            $render->get_ration_meals_total($week['average']);
                        ?>
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
                                <img src="../assets/img/nutrition-plan.png" alt="">
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php
                    require APPLICATION_PATH . '/template-parts/pdf-parts/footer.php';
                    ?>
                </div>
            </section>
<?php
        endif;
    endforeach;
endforeach;
?>
