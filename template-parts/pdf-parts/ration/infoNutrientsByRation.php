<?php
if ($infoNutrientsByRation) :
?>
    <?php
    foreach ($infoNutrientsByRation as $w_idx => $weeks) :
        $nutrients = $weeks['nutrients'];
    ?>
        <section class="section nutritional-value" id="nutritional-table-value-calories-w-<?php echo $w_idx ?>">
            <div class="section__container _container">
                <?php
                require APPLICATION_PATH . '/template-parts/pdf-parts/header.php';
                ?>
                <div class="section__body">
                    <?php
                    $section_title = 'Пищевая ценность рекомендуемого рациона. Неделя ' .  $w_idx + 1;
                    require APPLICATION_PATH . '/template-parts/pdf-parts/section-title.php';
                    ?>
                    <div class="section__top">
                        <?php
                        require APPLICATION_PATH . '/template-parts/nutrition/nutrition-table-text.php';
                        ?>
                    </div>
                    <?php
                    require APPLICATION_PATH . '/template-parts/nutrition/nutrition-table-calories.php';
                    ?>
                </div>
                <?php
                require APPLICATION_PATH . '/template-parts/pdf-parts/footer.php';
                ?>
            </div>
        </section>

        <section class="section nutritional-value" id="nutritional-table-value-w-<?php echo $w_idx ?>">
            <div class="section__container _container">
                <?php
                require APPLICATION_PATH . '/template-parts/pdf-parts/header.php';
                ?>
                <div class="section__body">
                    <?php
                    $section_title = 'Пищевая ценность рекомендуемого рациона. Неделя ' .  $w_idx + 1;
                    require APPLICATION_PATH . '/template-parts/pdf-parts/section-title.php';
                    ?>
                    <?php
                    require APPLICATION_PATH . '/template-parts/nutrition/nutrition-table.php';
                    ?>
                </div>
                <?php
                require APPLICATION_PATH . '/template-parts/pdf-parts/footer.php';
                ?>
            </div>
        </section>

        <section class="section nutritional-value" id="nutrition-table-value-minerales-w-<?php echo $w_idx ?>">
            <div class=" section__container _container">
                <?php
                require APPLICATION_PATH . '/template-parts/pdf-parts/header.php';
                ?>
                <div class="section__body">
                    <?php
                    $section_title = 'Пищевая ценность рекомендуемого рациона. Неделя ' .  $w_idx + 1;
                    require APPLICATION_PATH . '/template-parts/pdf-parts/section-title.php';
                    ?>
                    <?php
                    require APPLICATION_PATH . '/template-parts/nutrition/nutrition-table-minerales.php';
                    ?>
                </div>
                <?php
                require APPLICATION_PATH . '/template-parts/pdf-parts/footer.php';
                ?>
            </div>
        </section>
<?php
    endforeach;
endif;
?>
