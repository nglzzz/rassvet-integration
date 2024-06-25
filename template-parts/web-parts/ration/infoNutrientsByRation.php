<section class="section nutritional-value" id="nutritional-value" data-tabs-area>
    <div class="section__linear">
        <div class="_container">
            <h2>Пищевая ценность рекомендуемого рациона</h2>
        </div>
    </div>
    <div class="section__container _container">
        <div class="section__body">
            <div class="section__top">
                <div class="tabs">
                    <?php
                    $render->get_tabs($infoNutrientsByRation, 'Неделя', $inner = false);
                    ?>
                </div>
                <?php
                require 'template-parts/nutrition/nutrition-table-text.php';
                ?>
            </div>
            <div class="tabs-content">
                <?php
                $i = 1;
                foreach ($infoNutrientsByRation as $item) :
                    if ($i == 1) {
                        $_active = '_active';
                    } else {
                        $_active = '';
                    }
                ?>
                    <div data-tab-content="<?php echo $i ?>" class="<?php echo $_active ?>">
                        <?php
                        $nutrients = $item['nutrients'];
                        require 'template-parts/nutrition/nutrition-table-calories.php';
                        require 'template-parts/nutrition/nutrition-table.php';
                        require 'template-parts/nutrition/nutrition-table-minerales.php';
                        ?>
                    </div>
                <?php
                    $i++;
                endforeach;
                ?>
            </div>
        </div>
    </div>
</section>

<section class="section nutritional-value__graphic" data-tabs-area>
    <div class="section__container _container">
        <div class="section__body">
            <div class="section__top">
                <div class="tabs">
                    <?php
                    $render->get_tabs($infoNutrientsByRation, 'Неделя', $inner = false);
                    ?>
                </div>
                <div class="text-accent italic">
                    <p>Ниже вам представлены наглядные диаграммы. Они показывают соотношение в рекомендуемом
                        рационе
                        важнейших для здоровья
                        веществ. Это важно для укрепления вашего здоровья, лечения или профилактики
                        некоторых
                        заболеваний. Для подробных
                        разъяснений обратитесь к специалисту.</p>
                </div>
            </div>
            <div class="tabs-content">


                <?php
                $i = 1;
                foreach ($infoNutrientsByRation as $item) :
                    if ($i == 1) {
                        $_active = '_active';
                    } else {
                        $_active = '';
                    }
                ?>
                    <div data-tab-content="<?php echo $i ?>" class="<?php echo $_active ?>">
                        <?php
                        // $diagram = $render->get_nutrition_diagramm_array($diary);
                        // foreach ($diagram as $item) {
                        //     if ($item['data']) {
                        //         require 'template-parts/nutrition/nutrition-diagram/' . $item['template'] . '.php';
                        //     }
                        // }
                        ?>
                    </div>
                <?php
                    $i++;
                endforeach;
                ?>

            </div>
        </div>
    </div>
</section>