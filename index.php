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

$show_section = false;
?>

<?php
require 'template-parts/head.php';
require 'template-parts/header.php';
?>

<main>
    <section class="hero">
        <div class="hero__bgi">
            <img src="assets/img/hero.png" alt="">
        </div>
        <div class="hero__container _container">
            <div class="hero__body">
                <h1>Персональный отчёт <br> и рекомендации
                    <span>по состоянию здоровья и питанию</span>
                </h1>
                <div class="hero__patient">
                    <span class="hero__patient-name"><?php echo $patient_name ?></span>
                    <span class="hero__patient-age"><?php echo $patient['age'] ?> лет</span>
                </div>
                <div class="hero__author">
                    <span class="hero__author-name">
                        <span>Составил</span> <?php echo $doctor_name ?>
                    </span>
                    <span class="hero__author-info">
                        <?php
                        echo $doctor['profession'];
                        if ($doctor['title']) {
                            echo ' ';
                            echo $doctor['title'];
                        }
                        if ($doctor['post']) {
                            echo ', ';
                            echo $doctor['post'];
                        }
                        if ($doctor['work']) {
                            echo ' ';
                            echo $doctor['work'];
                        }
                        ?>
                    </span>
                </div>
                <div class="hero__date">
                    <?php if ($doctor['city']) : ?>
                        <span><?php echo $doctor['city'] ?></span>
                    <?php endif; ?>
                    <time><?php echo date('d.m.Y') ?></time>
                </div>
            </div>
        </div>
    </section>

    <section class="section intro">
        <div class="section__container _container">
            <div class="section__body">
                <div class="section__top _center _accent">
                    <h2>
                        <?php
                        if ($gender == 'female') {
                            echo 'Уважаемая';
                        } else {
                            echo 'Уважаемый';
                        }
                        ?>
                        <?php echo $patient['middle_name'] . ' ' . $patient['first_name'] ?>
                    </h2>
                </div>
                <div>
                    <p>Перед вами ваш персональный отчёт. Это важный шаг на пути к сбалансированному питанию,
                        здоровью и
                        профилактике
                        заболеваний.</p>
                    <p>Рацион и рекомендации разработаны строго под вашу ситуацию. Поэтому они помогут безопасно
                        и
                        комфортно
                        достичь вашу цель.</p>
                    <p>Вся информация в этой «мини-книге» учитывает ваши индивидуальные параметры, пищевые
                        предпочтения,
                        активность, состояние
                        здоровья и запрос по массе тела. Кроме того, вся аналитика, меню и рекомендации в отчёте
                        созданы
                        строго
                        на основе
                        современных научных данных.</p>
                    <p>Приятного изучения и применения!</p>
                </div>
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
                    <div class="grid grid-2">
                        <?php
                        $totalFluid = $metabolism['bioimpedansometry']['totalFluid'];
                        if ($totalFluid) {
                            $render->get_result_item('Общая жидкость, л', $totalFluid);
                        }
                        $intracellularFluid = $metabolism['bioimpedansometry']['intracellularFluid'];
                        if ($intracellularFluid) {
                            $render->get_result_item('Внутриклеточная жидкость, л', $intracellularFluid);
                        }

                        // Внеклеточная жидкость, л
                        // Соотношение ВКЖ/ОКЖ

                        $fatMassKg = $metabolism['bioimpedansometry']['fatMassKg'];
                        if ($fatMassKg) {
                            $render->get_result_item('Содержание жира в теле, кг', $fatMassKg);
                        }
                        $fatMassPercent = $metabolism['bioimpedansometry']['fatMassPercent'];
                        if ($fatMassPercent) {
                            $render->get_result_item('Процентное содержание жира, %', $fatMassPercent);
                        }

                        $visceralFat = $metabolism['bioimpedansometry']['visceralFat'];
                        if ($visceralFat) {
                            $render->get_result_item('Висцелярный жир', $visceralFat);
                        }
                        $fatMassPercent = $metabolism['bioimpedansometry']['fatMassPercent'];
                        if ($fatMassPercent) {
                            $render->get_result_item('Степень ожирения, %', $fatMassPercent);
                        }

                        $muscleMassKg = $metabolism['bioimpedansometry']['muscleMassKg'];
                        if ($muscleMassKg) {
                            $render->get_result_item('Масса скелетной мускулатуры, кг', $muscleMassKg);
                        }
                        $skinnyBodyMass = $metabolism['bioimpedansometry']['skinnyBodyMass'];
                        if ($skinnyBodyMass) {
                            $render->get_result_item('Тощая масса, кг', $skinnyBodyMass);
                        }

                        $muscleMassKg = $metabolism['bioimpedansometry']['muscleMassKg'];
                        if ($muscleMassKg) {
                            $render->get_result_item('Безжировая масса, кг', $muscleMassKg);
                        }
                        $activeCellMass = $metabolism['bioimpedansometry']['activeCellMass'];
                        if ($activeCellMass) {
                            $render->get_result_item('Активная масса клеток, кг', $activeCellMass);
                        }

                        // Индекс массы скелетной мускулатуры
                        // Протеин (белок), кг

                        // Минералы, кг
                        // Масса минералов в костях, кг

                        ?>
                    </div>
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
                <div class="params-item params-info large">
                    <div class="params-item__wrap">
                        <div class="icon">
                            <svg width="48" height="48" viewBox="0 0 48 48">
                                <use xlink:href='assets/img/svg/icons.svg#info' />
                            </svg>
                        </div>
                        <h3>Заключение по биоимпедансному анализу</h3>
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
                    <?php if ($diary['diet_restrictions']) : ?>
                        <div class="nutrition-title">
                            <span>Тип питания:</span>
                            <?php foreach ($diary['diet_restrictions'] as $item) : ?>
                                <span><?php echo $item ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <div class="grid">
                        <?php if ($diary['waterDeviationFromNorm']) : ?>
                            <div class="params-item fluid-amount">
                                <div class="params-item__flex">
                                    <div class="params-item__left">
                                        <div class="icon">
                                            <svg width="22" height="26" viewBox="0 0 22 26">
                                                <use xlink:href='assets/img/svg/icons.svg#glass' />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="params-item__right">
                                        <label>Количество потребляемой жидкости</label>
                                    </div>
                                </div>
                                <div class="params-item__text">
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
                                    <div class="result-item__scale">
                                        <?php
                                        $water_min = $diary['waterDeviationFromNorm']['minThreshold'];
                                        $water_max = $diary['waterDeviationFromNorm']['maxThreshold'];
                                        $water_current = $diary['waterDeviationFromNorm']['mass'];
                                        $water_norm = $diary['waterDeviationFromNorm']['norm'];
                                        $water_unit = $diary['waterDeviationFromNorm']['unit'];

                                        $water_status = '';
                                        if ($water_current > $water_norm) {
                                            $water_status = 'red';
                                        }

                                        $water_percents = $render->calc_to_percent($water_min, $water_max, $water_current, $water_norm);
                                        ?>
                                        <div style="--norma:<?php echo $water_percents['norma'] ?>; --patient:<?php echo $water_percents['patient'] ?>" class="<?php echo $water_status ?>"></div>
                                        <p class="fluid-amount__result">
                                            <span class="fluid-amount__patient <?php echo $water_status ?>">
                                                Выпито <?php echo $render->format_num(($water_current / 1000)) ?> л</span>
                                            <span class="fluid-amount__norma">Цель <?php echo $render->format_num(($water_norm / 1000)) ?> л</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ($diary['calorieDistributionOfMeals']) : ?>
                            <div class="params-item calorie-distribution">
                                <div class="params-item__flex">
                                    <div class="params-item__left">
                                        <div class="icon">
                                            <svg width="22" height="26" viewBox="0 0 22 26">
                                                <use xlink:href='assets/img/svg/icons.svg#cutlery' />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="params-item__right">
                                        <label>Распределение калорийности приёмов пищи</label>
                                    </div>
                                </div>
                                <div class="params-item__text">
                                    <div class="calorie-distribution__flex">
                                        <?php foreach ($diary['calorieDistributionOfMeals'] as $item) : ?>
                                            <div style="width: <?php echo $item['percent'] ?>%;">
                                                <time><?php echo $item['time'] ?></time>
                                                <span><?php echo $item['ingestion'] ?></span>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="nutrition-info text-accent italic">
                        Рацион человека состоит из нескольких десятков важнейших для здоровья веществ: витамины,
                        минералы,
                        белки и др. Очень
                        важно, чтобы их содержание было в норме. То есть соответствовало потребностям вашего
                        организма. Если
                        в вашем меню
                        количество каких-либо из этих веществ длительно находится в избытке (поступает слишком
                        много) или в
                        дефиците (поступает
                        слишком мало), то это может привести к различным заболеваниям.
                        Анализ вашего прошлого рациона показал, что: 52% важнейших веществ поступает в ваш организм
                        в
                        оптимальном количестве. В
                        то же время 43% полезных веществ вы недополучаете. А 5% — поступают в организм в чрезмерно
                        большом
                        количестве.
                    </div>
                    <?php
                    $nutr_graphic  = $diary['nutrientsInfo']['meta'];
                    if ($nutr_graphic) :
                    ?>
                        <div class="nutrition-graphic">
                            <h3>Из всех важнейших веществ в вашем рационе:</h3>
                            <div class="nutrition-graphic__flex">
                                <div class="nutrition-graphic__item nomra chart" data-percent="<?php echo $nutr_graphic['normal'] ?>" data-color="#1dbdf5">
                                    <canvas></canvas>
                                    <span class="percent"><?php echo $nutr_graphic['normal'] ?> %</span>
                                    <span class="status">в норме</span>
                                </div>
                                <div class="nutrition-graphic__item deficit chart" data-percent="<?php echo $nutr_graphic['deficit'] ?>" data-color="#d26256">
                                    <canvas></canvas>
                                    <span class="percent"><?php echo $nutr_graphic['deficit'] ?>%</span>
                                    <span class="status">в дефиците</span>
                                </div>
                                <div class="nutrition-graphic__item excess chart" data-percent="<?php echo $nutr_graphic['excess'] ?>" data-color="#1dbdf5">
                                    <canvas></canvas>
                                    <span class="percent"><?php echo $nutr_graphic['excess'] ?>%</span>
                                    <span class="status">в избытке</span>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
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
                        <div class="text-accent italic">
                            <p>На этой странице показана пищевая ценность вашего прошлого рациона. Иными словами —
                                <b>содержание</b> полезных и
                                некоторых вредных для здоровья веществ. Голубой цвет — оптимальное количество. Красный —
                                недостаточное или слишком
                                избыточное количество вещества, что может негативно влиять на ваше здоровье или состав
                                тела.
                                Значения рассчитаны в
                                среднем за один день.
                            </p>
                        </div>
                        <div class="nutrition-table__item">
                            <span>
                                <span>Показатель</span>
                                <span>% от вашей нормы</span>
                            </span>
                            <table>
                                <thead>
                                    <?php
                                    $nutrients_energy = $nutrients['energy']['energy'];
                                    ?>
                                    <tr>
                                        <th>Калорийность</th>
                                        <th style="--width:<?php echo $nutrients_energy['percent'] ?>%">1 <?php echo $nutrients_energy['unit'] ?></th>
                                        <th><?php echo $nutrients_energy['percent'] ?>%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nutrients_caloreis = [
                                        $nutrients['protein'],
                                        $nutrients['fats'],
                                        $nutrients['carbohydrate']
                                    ];
                                    foreach ($nutrients_caloreis as $nutrient) {
                                        $render->get_table_row($nutrient);
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <?php
                        $nutrients_array = [
                            'Прочее' => $nutrients['other'],
                            'Витамины' => $nutrients['vitamins'],
                            'Минаралы' => $nutrients['minerals']
                        ];
                        if ($nutrients_array) :
                            foreach ($nutrients_array as $key => $nutrient) :
                        ?>
                                <div class="nutrition-table__item">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th><?php echo $key ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $render->get_table_row($nutrient);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                        <?php endforeach;
                        endif;  ?>

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
                        $render->get_tabs($ration['rationOnWeeks'], 'Неделя', $inner = false);
                        ?>
                    </div>
                    <div class="tabs-content">
                        <?php
                        $i = 1;
                        foreach ($ration['rationOnWeeks'] as $item) :
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

    <?php
    require 'template-parts/contacts.php';
    ?>
</main>

<?php
require 'template-parts/scripts.php';
?>