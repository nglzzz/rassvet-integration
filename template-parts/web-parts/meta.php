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
                $results = $render->get_param_results_array($metabolism);
                foreach ($results as $item) {
                    if ($item['data']) {
                        $render->get_result_item($item['title'], $item['data']);
                    }
                }
                ?>
            </div>
            <div class="results-text">*Если вам потребуются разъяснения, обратитесь к специалисту.</div>
        </div>
    </div>
</section>

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