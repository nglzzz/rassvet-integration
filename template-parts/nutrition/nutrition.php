<?php if ($diary['diet_restrictions']) : ?>
    <div class="nutrition-title">
        <span>Тип питания:</span>
        <?php foreach ($diary['diet_restrictions'] as $item) : ?>
            <span><?php echo $item ?></span>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<div class="grid">
    <?php
    $waterDeviationFromNorm = $render->find_key('waterDeviationFromNorm', $diary);
    if ($waterDeviationFromNorm) :
    ?>
        <div class="params-item fluid-amount">
            <div class="params-item__flex">
                <div class="params-item__left">
                    <div class="icon">
                        <svg width="22" height="26" viewBox="0 0 22 26">
                            <use xlink:href='../assets/img/svg/icons.svg#glass' />
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
                    $water_min = $waterDeviationFromNorm['minThreshold'];
                    $water_max = $waterDeviationFromNorm['maxThreshold'];
                    $water_current = $waterDeviationFromNorm['mass'];
                    $water_norm = $waterDeviationFromNorm['norm'];
                    $water_unit = $waterDeviationFromNorm['unit'];

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

    <?php
    $calorieDistributionOfMeals = $render->find_key('calorieDistributionOfMeals', $diary);
    if ($calorieDistributionOfMeals) :
    ?>
        <div class="params-item calorie-distribution">
            <div class="params-item__flex">
                <div class="params-item__left">
                    <div class="icon">
                        <svg width="22" height="26" viewBox="0 0 22 26">
                            <use xlink:href='../assets/img/svg/icons.svg#cutlery' />
                        </svg>
                    </div>
                </div>
                <div class="params-item__right">
                    <label>Распределение калорийности приёмов пищи</label>
                </div>
            </div>
            <div class="params-item__text">
                <div class="calorie-distribution__flex">
                    <?php foreach ($calorieDistributionOfMeals as $item) : ?>
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
$nutrientsInfo = $render->find_key('nutrientsInfo', $diary);
$nutr_graphic = $render->find_key('meta', $nutrientsInfo);

if ($nutrientsInfo && $nutr_graphic) :
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