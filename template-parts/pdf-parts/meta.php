<?php
$chunk_results = $render->get_param_results_array($metabolism, true);
foreach ($chunk_results as $idx => $result) :
?>
    <section class="section results" id="results-<?php echo $idx + 1 ?>">
        <div class="section__container _container">
            <?php
            require APPLICATION_PATH . '/template-parts/pdf-parts/header.php';
            ?>
            <div class="section__body">
                <?php
                $section_title = 'Параметры и состав тела';
                require APPLICATION_PATH . '/template-parts/pdf-parts/section-title.php';
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
            require APPLICATION_PATH . '/template-parts/pdf-parts/footer.php';
            ?>
        </div>
    </section>
<?php
endforeach;
?>

<section class="section results-conclusion">
    <div class="section__container _container">
        <?php
        require APPLICATION_PATH . '/template-parts/pdf-parts/header.php';
        ?>
        <div class="section__body">
            <?php
            $section_title = 'Параметры и состав тела';
            require APPLICATION_PATH . '/template-parts/pdf-parts/section-title.php';
            ?>

            <?php
            require APPLICATION_PATH . '/template-parts/results-conclusion.php';
            ?>
        </div>
        <?php
        require APPLICATION_PATH . '/template-parts/pdf-parts/footer.php';
        ?>
    </div>
</section>

<section class="section params lifestyle" id="lifestyle">
    <div class="section__container _container">
        <?php
        require APPLICATION_PATH . '/template-parts/pdf-parts/header.php';
        ?>
        <div class="section__body">
            <?php
            $section_title = 'Образ жизни и состояние здоровья';
            require APPLICATION_PATH . '/template-parts/pdf-parts/section-title.php';
            ?>
            <?php
            require APPLICATION_PATH . '/template-parts/lifestyle-params.php';
            ?>
        </div>
        <?php
        require APPLICATION_PATH . '/template-parts/pdf-parts/footer.php';
        ?>
    </div>
</section>
