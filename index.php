<?php

require 'inc/class-Render.php';
$render = new Render();

$json_file = file_get_contents('assets/json.json');
$json = json_decode($json_file, true);
$json_data = $json['data'];

$doctor = $json_data['doctor'];
$doctor_name = $doctor['middle_name'] . ' ' . $doctor['first_name'] . ' ' . $doctor['last_name'];

$patient = $json_data['patient'];
$patient_name = $patient['middle_name'] . ' ' . $patient['first_name'] . ' ' . $patient['last_name'];

$gender = 'male';
if ($patient['gender'] = 1) {
    $gender = 'female';
}

$metabolism = $patient['meta'];
$diary = $json_data['diary'];
$ration = $json_data['ration'];
$rationOnWeeks = $ration['rationOnWeeks'];
$shoppingList = $ration['shoppingList'];
$recipeOnWeeks = $ration['recipeOnWeeks'];

$show_section = false;
?>

<?php
require 'template-parts/head.php';
require 'template-parts/header.php';
?>

<main>
    <?php
    require 'template-parts/hero.php';
    ?>

    <section class="section intro">
        <div class="section__container _container">
            <div class="section__body">
                <?php
                require 'template-parts/section-bodies/intro.php';
                ?>
            </div>
        </div>
    </section>

    <section class="section params <?php if ($gender == 'male') echo 'params-male'; ?>">
        <div class="section__linear">
            <div class="_container">
                <h2>Параметры и состав тела</h2>
            </div>
        </div>
        <div class="section__container _container">
            <div class="section__body">
                <?php
                require 'template-parts/params.php';
                ?>
                <div class="params-text _desctop">* <?php echo $metabolism['indexes']['percent_fat']['info'] ?></div>
            </div>
        </div>
    </section>

    <?php if ($metabolism['bioimpedansometry']) : ?>
        <section class="section results">
            <div class="section__container _container">
                <div class="section__body">
                    <div class="section__top _small">
                        <h2>Результаты биоимпедансного анализа</h2>
                    </div>
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
                    <?php
                    require 'template-parts/results-grid.php';
                    ?>
                    <div class="results-text">*Если вам потребуются разъяснения, обратитесь к специалисту.</div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($show_section) : ?>
        <section class="section results results-blue">
            <div class="section__container _container">
                <div class="section__body">
                    <div class="grid">
                        <div class="result-item">
                            <h3>Правая рука</h3>
                            <div class="grid grid-2">
                                <div class="result-item__wrap">
                                    <label>Тощая масса по сегментам</label>
                                    <div class="result-item__flex">
                                        <div class="result-item__score">120</div>
                                        <div class="result-item__scale">
                                            <p>
                                                <span>70</span>
                                                <span>80</span>
                                                <span>90</span>
                                                <span>100</span>
                                                <span>110</span>
                                                <span>120</span>
                                                <span>130</span>
                                                <span>140</span>
                                            </p>
                                            <div style="--norma:calc(100% / 2); --patient:calc(100% / 8);">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="result-item__flex">
                                        <div class="result-item__score">120%</div>
                                        <div class="result-item__scale">
                                            <div style="--norma:calc(100% / 2); --patient:calc(100% / 8);">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="result-item__wrap">
                                    <label>Жировая масса по сегментам</label>
                                    <div class="result-item__flex">
                                        <div class="result-item__score">120</div>
                                        <div class="result-item__scale">
                                            <p>
                                                <span>70</span>
                                                <span>80</span>
                                                <span>90</span>
                                                <span>100</span>
                                                <span>110</span>
                                                <span>120</span>
                                                <span>130</span>
                                                <span>140</span>
                                            </p>
                                            <div style="--norma:calc(100% / 2); --patient:calc(100% / 8);">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="result-item__flex">
                                        <div class="result-item__score">120%</div>
                                        <div class="result-item__scale">
                                            <div style="--norma:calc(100% / 2); --patient:calc(100% / 8);">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="result-item">
                            <h3>Правая рука</h3>
                            <div class="grid grid-2">
                                <div class="result-item__wrap">
                                    <label>Тощая масса по сегментам</label>
                                    <div class="result-item__flex">
                                        <div class="result-item__score">120</div>
                                        <div class="result-item__scale">
                                            <p>
                                                <span>70</span>
                                                <span>80</span>
                                                <span>90</span>
                                                <span>100</span>
                                                <span>110</span>
                                                <span>120</span>
                                                <span>130</span>
                                                <span>140</span>
                                            </p>
                                            <div style="--norma:calc(100% / 2); --patient:calc(100% / 8);">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="result-item__flex">
                                        <div class="result-item__score">120%</div>
                                        <div class="result-item__scale">
                                            <div style="--norma:calc(100% / 2); --patient:calc(100% / 8);">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="result-item__wrap">
                                    <label>Жировая масса по сегментам</label>
                                    <div class="result-item__flex">
                                        <div class="result-item__score">120</div>
                                        <div class="result-item__scale">
                                            <p>
                                                <span>70</span>
                                                <span>80</span>
                                                <span>90</span>
                                                <span>100</span>
                                                <span>110</span>
                                                <span>120</span>
                                                <span>130</span>
                                                <span>140</span>
                                            </p>
                                            <div style="--norma:calc(100% / 2); --patient:calc(100% / 8);">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="result-item__flex">
                                        <div class="result-item__score">120%</div>
                                        <div class="result-item__scale">
                                            <div style="--norma:calc(100% / 2); --patient:calc(100% / 8);">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="result-item">
                            <h3>Туловище</h3>
                            <div class="grid grid-2">
                                <div class="result-item__wrap">
                                    <label>Тощая масса по сегментам</label>
                                    <div class="result-item__flex">
                                        <div class="result-item__score">120</div>
                                        <div class="result-item__scale">
                                            <p>
                                                <span>70</span>
                                                <span>80</span>
                                                <span>90</span>
                                                <span>100</span>
                                                <span>110</span>
                                                <span>120</span>
                                                <span>130</span>
                                                <span>140</span>
                                            </p>
                                            <div style="--norma:calc(100% / 2); --patient:calc(100% / 8);">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="result-item__flex">
                                        <div class="result-item__score">120%</div>
                                        <div class="result-item__scale">
                                            <div style="--norma:calc(100% / 2); --patient:calc(100% / 8);">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="result-item__wrap">
                                    <label>Жировая масса по сегментам</label>
                                    <div class="result-item__flex">
                                        <div class="result-item__score">120</div>
                                        <div class="result-item__scale">
                                            <p>
                                                <span>70</span>
                                                <span>80</span>
                                                <span>90</span>
                                                <span>100</span>
                                                <span>110</span>
                                                <span>120</span>
                                                <span>130</span>
                                                <span>140</span>
                                            </p>
                                            <div style="--norma:calc(100% / 2); --patient:calc(100% / 8);">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="result-item__flex">
                                        <div class="result-item__score">120%</div>
                                        <div class="result-item__scale">
                                            <div style="--norma:calc(100% / 2); --patient:calc(100% / 8);">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="result-item">
                            <h3>Правая нога</h3>
                            <div class="grid grid-2">
                                <div class="result-item__wrap">
                                    <label>Тощая масса по сегментам</label>
                                    <div class="result-item__flex">
                                        <div class="result-item__score">120</div>
                                        <div class="result-item__scale">
                                            <p>
                                                <span>70</span>
                                                <span>80</span>
                                                <span>90</span>
                                                <span>100</span>
                                                <span>110</span>
                                                <span>120</span>
                                                <span>130</span>
                                                <span>140</span>
                                            </p>
                                            <div style="--norma:calc(100% / 2); --patient:calc(100% / 8);">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="result-item__flex">
                                        <div class="result-item__score">120%</div>
                                        <div class="result-item__scale">
                                            <div style="--norma:calc(100% / 2); --patient:calc(100% / 8);">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="result-item__wrap">
                                    <label>Жировая масса по сегментам</label>
                                    <div class="result-item__flex">
                                        <div class="result-item__score">120</div>
                                        <div class="result-item__scale">
                                            <p>
                                                <span>70</span>
                                                <span>80</span>
                                                <span>90</span>
                                                <span>100</span>
                                                <span>110</span>
                                                <span>120</span>
                                                <span>130</span>
                                                <span>140</span>
                                            </p>
                                            <div style="--norma:calc(100% / 2); --patient:calc(100% / 8);">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="result-item__flex">
                                        <div class="result-item__score">120%</div>
                                        <div class="result-item__scale">
                                            <div style="--norma:calc(100% / 2); --patient:calc(100% / 8);">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="result-item">
                            <h3>Левая нога</h3>
                            <div class="grid grid-2">
                                <div class="result-item__wrap">
                                    <label>Тощая масса по сегментам</label>
                                    <div class="result-item__flex">
                                        <div class="result-item__score">120</div>
                                        <div class="result-item__scale">
                                            <p>
                                                <span>70</span>
                                                <span>80</span>
                                                <span>90</span>
                                                <span>100</span>
                                                <span>110</span>
                                                <span>120</span>
                                                <span>130</span>
                                                <span>140</span>
                                            </p>
                                            <div style="--norma:calc(100% / 2); --patient:calc(100% / 8);">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="result-item__flex">
                                        <div class="result-item__score">120%</div>
                                        <div class="result-item__scale">
                                            <div style="--norma:calc(100% / 2); --patient:calc(100% / 8);">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="result-item__wrap">
                                    <label>Жировая масса по сегментам</label>
                                    <div class="result-item__flex">
                                        <div class="result-item__score">120</div>
                                        <div class="result-item__scale">
                                            <p>
                                                <span>70</span>
                                                <span>80</span>
                                                <span>90</span>
                                                <span>100</span>
                                                <span>110</span>
                                                <span>120</span>
                                                <span>130</span>
                                                <span>140</span>
                                            </p>
                                            <div style="--norma:calc(100% / 2); --patient:calc(100% / 8);">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="result-item__flex">
                                        <div class="result-item__score">120%</div>
                                        <div class="result-item__scale">
                                            <div style="--norma:calc(100% / 2); --patient:calc(100% / 8);">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="results-text">*Если вам потребуются разъяснения, обратитесь к специалисту.</div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="section results-conclusion">
        <div class="section__container _container">
            <div class="section__body">
                <?php
                require 'template-parts/results-conclusion.php';
                ?>
            </div>
        </div>
    </section>

    <section class="section params lifestyle">
        <div class="section__linear">
            <div class="_container">
                <h2>Образ жизни и состояние здоровья</h2>
            </div>
        </div>
        <div class="section__container _container">
            <div class="section__body">
                <?php
                require 'template-parts/lifestyle-params.php';
                ?>
            </div>
        </div>
    </section>

    <?php if ($diary) : ?>
        <section class="section nutrition">
            <div class="section__linear">
                <div class="_container">
                    <h2>Оценка фактического питания</h2>
                </div>
            </div>
            <div class="section__container _container">
                <div class="section__body">
                    <?php
                    require 'template-parts/nutrition.php';
                    ?>
                </div>
            </div>
        </section>

        <?php
        $nutrients = $diary['nutrientsInfo']['nutrients'];
        if ($nutrients) :
        ?>
            <section class="section nutrition-table">
                <div class="section__container _container">
                    <div class="section__body">
                        <?php
                        require 'template-parts/nutrition-table.php';
                        ?>
                    </div>
                </div>
            </section>

            <section class="section nutrition-diagram">
                <div class="section__container _container">
                    <div class="section__body">
                        <div class="text-accent italic">
                            <p>Ниже вам представлены наглядные диаграммы. Они показывают соотношение в вашем прошлом
                                рационе
                                важнейших для здоровья
                                веществ. Определённые соотношения тех или иных веществ влияют на здоровье по-разному —
                                улучшая
                                или ухудшая его. Для
                                подробных разъяснений обратитесь к специалисту</p>
                        </div>
                        <div class="grid grid-2">
                            <?php
                            require 'template-parts/nutrition-diagram.php';
                            ?>
                        </div>
                    </div>
                </div>
            </section>

        <?php endif; ?>

        <?php
        $nutrient_mass = $diary['percentCategoryProductInDiary'];
        if ($nutrient_mass) :
        ?>
            <section class="section nutrition-mass">
                <div class="section__container _container">
                    <div class="section__body">
                        <?php require 'template-parts/section-bodies/nutrition-mass.php'; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

    <?php endif; ?>

    <?php if ($ration) : ?>
        <section class="section nutrition-plan" data-tabs-area>
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
                        <?php $i++;
                        endforeach; ?>
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
    <?php endif; ?>


    <?php if ($shoppingList) : ?>
        <section class="section shopping-list" data-tabs-area>
            <div class="shopping-list__img">
                <img src="img/shopping-list.png" alt="">
            </div>
            <div class="section__linear">
                <div class="_container">
                    <h2>Список продуктов для покупок</h2>
                </div>
            </div>
            <div class="section__container _container">
                <div class="section__body">
                    <div class="tabs">
                        <?php
                        $render->get_tabs($shoppingList, 'Неделя', $inner = false);
                        ?>
                    </div>
                    <div class="tabs-content">
                        <?php
                        $i = 1;
                        foreach ($shoppingList as $item) :
                            if ($i == 1) {
                                $_active = '_active';
                            } else {
                                $_active = '';
                            }
                        ?>
                            <div data-tab-content="<?php echo $i ?>" class="<?php echo $_active ?>">
                                <?php
                                $render->get_shopping_list($item);
                                ?>
                            </div>
                        <?php $i++;
                        endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($recipeOnWeeks) : ?>
        <section class="section recepies" data-tabs-area>
            <div class="recepies-img">
                <img src="img/recepies.png" alt="">
            </div>
            <div class="section__linear">
                <div class="_container">
                    <h2>Рецепты</h2>
                </div>
            </div>
            <div class="section__container _container">
                <div class="section__body">
                    <div class="section__top">
                        <div class="tabs">
                            <?php
                            $render->get_tabs($recipeOnWeeks, 'Неделя', $inner = false);
                            ?>
                        </div>
                    </div>
                    <div class="tabs-content">
                        <?php
                        $i = 1;
                        foreach ($recipeOnWeeks as $item) :
                            if ($i == 1) {
                                $_active = '_active';
                            } else {
                                $_active = '';
                            }
                        ?>
                            <div data-tab-content="<?php echo $i ?>" class="<?php echo $_active ?>">
                                <?php
                                $render->get_recepies($item);
                                ?>
                            </div>
                        <?php $i++;
                        endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php
    require 'template-parts/contacts.php';
    ?>
</main>

<?php
require 'template-parts/scripts.php';
?>