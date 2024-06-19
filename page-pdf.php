<main class="page-pdf">
    <?php
    require 'template-parts/pdf-parts/hero.php';
    ?>

    <section class="section intro">
        <div class="intro__bgi">
            <img src="assets/img/hero.png" alt="">
        </div>
        <div class="section__container _container">
            <?php
            require 'template-parts/pdf-parts/header.php';
            ?>
            <div class="section__body">
                <?php
                require 'template-parts/intro.php';
                ?>
            </div>
            <?php
            $page = 1;
            require 'template-parts/pdf-parts/footer.php';
            ?>
        </div>
    </section>

    <?php
    require 'template-parts/pdf-parts/tbc.php';
    ?>

    <section class="section params <?php if ($gender == 'male') echo 'params-male'; ?>" id="params">
        <div class="section__container _container">
            <?php
            require 'template-parts/pdf-parts/header.php';
            ?>
            <div class="section__body">
                <?php
                $section_title = 'Параметры и состав тела';
                require 'template-parts/pdf-parts/section-title.php';
                ?>
                <?php
                require 'template-parts/params.php';
                ?>
            </div>
            <div class="params-text _desctop">* <?php echo $metabolism['indexes']['percent_fat']['info'] ?></div>
            <?php
            require 'template-parts/pdf-parts/footer.php';
            ?>
        </div>
    </section>

    <?php
    if (array_key_exists('bioimpedansometry', $metabolism)) :
        $chunk_results = $render->get_param_results_array($metabolism, true);
        foreach ($chunk_results as $idx => $result) :
    ?>
            <section class="section results" id="results-<?php echo $idx + 1 ?>">
                <div class="section__container _container">
                    <?php
                    require 'template-parts/pdf-parts/header.php';
                    ?>
                    <div class="section__body">
                        <?php
                        $section_title = 'Параметры и состав тела';
                        require 'template-parts/pdf-parts/section-title.php';
                        ?>
                        <div class="section__top">
                            <h3>Результаты биоимпедансного анализа</h3>
                            <div class="results-compare">
                                <span class="results-norm">
                                    <span></span>
                                    <span>Норма</span>
                                </span>
                                <span class="results-patient">
                                    <span></span>
                                    <span>Ваш показатель</span>
                                </span>
                            </div>
                        </div>
                        <div class="grid grid-2">
                            <?php
                            foreach ($result as $item) {
                                if ($item['data']) {
                                    $render->get_result_item($item['title'], $item['data']);
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="results-text">*Если вам потребуются разъяснения, обратитесь к специалисту.</div>
                    <?php
                    require 'template-parts/pdf-parts/footer.php';
                    ?>
                </div>
            </section>
    <?php
        endforeach;
    endif;
    ?>

    <section class="section results-conclusion">
        <div class="section__container _container">
            <?php
            require 'template-parts/pdf-parts/header.php';
            ?>
            <div class="section__body">
                <?php
                $section_title = 'Параметры и состав тела';
                require 'template-parts/pdf-parts/section-title.php';
                ?>

                <?php
                require 'template-parts/results-conclusion.php';
                ?>
            </div>
            <?php
            require 'template-parts/pdf-parts/footer.php';
            ?>
        </div>
    </section>

    <section class="section params lifestyle" id="lifestyle">
        <div class="section__container _container">
            <?php
            require 'template-parts/pdf-parts/header.php';
            ?>
            <div class="section__body">
                <?php
                $section_title = 'Образ жизни и состояние здоровья';
                require 'template-parts/pdf-parts/section-title.php';
                ?>
                <?php
                require 'template-parts/lifestyle-params.php';
                ?>
            </div>
            <?php
            require 'template-parts/pdf-parts/footer.php';
            ?>
        </div>
    </section>

    <?php if ($diary) : ?>
        <section class="section nutrition" id="nutrition">
            <div class="section__container _container">
                <?php
                require 'template-parts/pdf-parts/header.php';
                ?>
                <div class="section__body">
                    <?php
                    $section_title = 'Оценка фактического питания';
                    require 'template-parts/pdf-parts/section-title.php';
                    ?>
                    <?php
                    require 'template-parts/nutrition/nutrition.php';
                    ?>
                </div>
                <?php
                require 'template-parts/pdf-parts/footer.php';
                ?>
            </div>
        </section>

        <?php
        $nutrients = $diary['nutrientsInfo']['nutrients'];
        if ($nutrients) :
        ?>
            <section class="section nutrition-table" id="nutrition-table-calories">
                <div class="section__container _container">
                    <?php
                    require 'template-parts/pdf-parts/header.php';
                    ?>
                    <div class="section__body">
                        <?php
                        $section_title = 'Оценка фактического питания';
                        require 'template-parts/pdf-parts/section-title.php';
                        ?>
                        <?php
                        require 'template-parts/nutrition/nutrition-table-calories.php';
                        ?>
                    </div>
                    <?php
                    require 'template-parts/pdf-parts/footer.php';
                    ?>
                </div>
            </section>

            <section class="section nutrition-table" id="nutrition-table">
                <div class="section__container _container">
                    <?php
                    require 'template-parts/pdf-parts/header.php';
                    ?>
                    <div class="section__body">
                        <?php
                        $section_title = 'Оценка фактического питания';
                        require 'template-parts/pdf-parts/section-title.php';
                        ?>
                        <?php
                        require 'template-parts/nutrition/nutrition-table.php';
                        ?>
                    </div>
                    <?php
                    require 'template-parts/pdf-parts/footer.php';
                    ?>
                </div>
            </section>

            <?php
            $chunk_diagrams = $render->get_nutrition_diagramm_array($diary, true);
            foreach ($chunk_diagrams as $idx => $diagram) :
            ?>
                <section class="section nutrition-diagram" id="nutrition-diagram-<?php echo $idx + 1 ?>">
                    <div class="section__container _container">
                        <?php
                        require 'template-parts/pdf-parts/header.php';
                        ?>
                        <div class="section__body">
                            <?php
                            $section_title = 'Оценка фактического питания';
                            require 'template-parts/pdf-parts/section-title.php';
                            ?>
                            <div class="text-accent italic">
                                <p>Ниже вам представлены наглядные диаграммы. Они показывают соотношение в вашем прошлом
                                    рационе
                                    важнейших для здоровья
                                    веществ. Определённые соотношения тех или иных веществ влияют на здоровье по-разному —
                                    улучшая
                                    или ухудшая его. Для
                                    подробных разъяснений обратитесь к специалисту</p>
                            </div>
                            <div class="grid">
                                <?php
                                foreach ($diagram as $item) {
                                    if ($item['data']) {
                                        require 'template-parts/nutrition/nutrition-diagram/' . $item['template'] . '.php';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                        require 'template-parts/pdf-parts/footer.php';
                        ?>
                    </div>
                </section>
            <?php
            endforeach;
            ?>

        <?php endif; ?>

        <?php
        $nutrient_mass = $diary['percentCategoryProductInDiary'];
        if ($nutrient_mass) :
        ?>
            <section class="section nutrition-mass" id="nutrition-mass">
                <div class="section__container _container">
                    <?php
                    require 'template-parts/pdf-parts/header.php';
                    ?>
                    <div class="section__body">
                        <?php
                        $section_title = 'Оценка фактического питания';
                        require 'template-parts/pdf-parts/section-title.php';
                        ?>
                        <?php require 'template-parts/nutrition/nutrition-mass.php'; ?>
                        <?php require 'template-parts/nutrition/nutrition-mass-text.php'; ?>
                    </div>
                    <?php
                    require 'template-parts/pdf-parts/footer.php';
                    ?>
                </div>
            </section>
        <?php endif; ?>


    <?php endif; ?>

    <?php
    if ($rationOnWeeks) :
        // loop weks
        foreach ($rationOnWeeks as $w_idx => $week) :
            // loop days
            foreach ($week['days'] as $d_idx => $day) :
                // split eatings by 3 eating
                foreach (array_chunk($day['eatings'], 3) as $eatings) :
    ?>
                    <section class="section nutrition-plan" id="nutrition-plan-w<?php echo $w_idx + 1 ?>-d<?php echo $d_idx + 1 ?>" data-tabs-area>
                        <div class="section__container _container">
                            <?php
                            require 'template-parts/pdf-parts/header.php';
                            ?>
                            <div class="section__body">
                                <?php
                                $section_title = 'Ваш персональный план питания. Неделя ' .  $w_idx + 1;
                                require 'template-parts/pdf-parts/section-title.php';
                                ?>
                                <div class="tabs">
                                    <button class="day">День <?php echo $d_idx + 1 ?></button>
                                </div>

                                <div class="grid">
                                    <?php
                                    $render->get_ration_meals($eatings);
                                    ?>
                                </div>
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
                                        <img src="assets/img/nutrition-plan.png" alt="">
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php
                            require 'template-parts/pdf-parts/footer.php';
                            ?>
                        </div>
                    </section>
    <?php
                endforeach;
            endforeach;
        endforeach;
    endif;
    ?>

    <?php
    if ($shoppingList) :
        foreach ($shoppingList as $w_idx => $list) :
            foreach (array_chunk($list, 6, true) as $list_items) :
    ?>
                <section class="section shopping-list" id="shopping-list-w-<?php echo $w_idx ?>" data-tabs-area>
                    <div class="shopping-list__img">
                        <img src="assets/img/shopping-list.png" alt="">
                    </div>
                    <div class="section__container _container">
                        <?php
                        require 'template-parts/pdf-parts/header.php';
                        ?>
                        <div class="section__body">
                            <?php
                            $section_title = 'Список продуктов для покупок. Неделя ' .  $w_idx + 1;
                            require 'template-parts/pdf-parts/section-title.php';
                            ?>
                            <div class="grid grid-2">
                                <?php
                                $i = 0;
                                foreach ($list_items as $key => $item) :
                                    if ($i == 0) {
                                        echo '<ol class="shopping-list__item">';
                                    }
                                    if ($i == 3) {
                                        echo '</ol><ol class="shopping-list__item">';
                                    }

                                    $icon = '' . $key . '';
                                    require 'template-parts/ration/shopping-list-item.php';
                                    $i++;
                                endforeach; ?>
                                </ol>
                            </div>
                        </div>
                        <?php
                        require 'template-parts/pdf-parts/footer.php';
                        ?>
                    </div>
                </section>
    <?php
            endforeach;
        endforeach;
    endif;
    ?>

    <?php
    if ($recipeOnWeeks) :
        foreach ($recipeOnWeeks as $w_idx => $weeks) :
            foreach (array_chunk($weeks, 2) as $recepies) :  ?>

                <section class="section recepies" id="recepies-w-<?php echo $w_idx ?>" data-tabs-area>
                    <div class="recepies-img">
                        <img src="assets/img/recepies.png" alt="">
                    </div>
                    <div class="section__container _container">
                        <?php
                        require 'template-parts/pdf-parts/header.php';
                        ?>
                        <div class="section__body">
                            <?php
                            $section_title = 'Рецепты. Неделя ' .  $w_idx + 1;
                            require 'template-parts/pdf-parts/section-title.php';
                            ?>

                            <div class="grid">
                                <?php foreach ($recepies as $item) :  ?>
                                    <?php
                                    require 'template-parts/recepies/recepie-item.php';
                                    ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php
                        require 'template-parts/pdf-parts/footer.php';
                        ?>
                    </div>
                </section>
    <?php
            endforeach;
        endforeach;
    endif;
    ?>

    <?php
    require 'template-parts/pdf-parts/contacts.php';
    ?>

</main>