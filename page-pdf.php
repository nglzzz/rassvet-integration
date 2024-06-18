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
                require 'template-parts/section-bodies/intro.php';
                ?>
            </div>
            <?php
            $page = 2;
            require 'template-parts/pdf-parts/footer.php';
            ?>
        </div>
    </section>

    <?php
    require 'template-parts/pdf-parts/tbc.php';
    ?>

    <section class="section params <?php if ($gender == 'male') echo 'params-male'; ?>">
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
        foreach ($chunk_results as $result) :
    ?>
            <section class="section results">
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

    <section class="section params lifestyle">
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
        <section class="section nutrition">
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
            <section class="section nutrition-table">
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

            <section class="section nutrition-table">
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
            foreach ($chunk_diagrams as $diagram) :
            ?>
                <section class="section nutrition-diagram">
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
            <section class="section nutrition-mass">
                <div class="section__container _container">
                    <?php
                    require 'template-parts/pdf-parts/header.php';
                    ?>
                    <div class="section__body">
                        <?php
                        $section_title = 'Оценка фактического питания';
                        require 'template-parts/pdf-parts/section-title.php';
                        ?>
                        <?php require 'template-parts/section-bodies/nutrition-mass.php'; ?>
                    </div>
                    <?php
                    require 'template-parts/pdf-parts/footer.php';
                    ?>
                </div>
            </section>
        <?php endif; ?>


    <?php endif; ?>

</main>