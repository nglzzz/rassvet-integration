<section class="section nutrition" id="nutrition">
    <div class="section__container _container">
        <?php
        require APPLICATION_PATH . '/template-parts/pdf-parts/header.php';
        ?>
        <div class="section__body">
            <?php
            $section_title = 'Оценка фактического питания';
            require APPLICATION_PATH . '/template-parts/pdf-parts/section-title.php';
            ?>
            <?php
            require APPLICATION_PATH . '/template-parts/nutrition/nutrition.php';
            ?>
        </div>
        <?php
        require APPLICATION_PATH . '/template-parts/pdf-parts/footer.php';
        ?>
    </div>
</section>

<?php
$nutrients = $render->find_key('nutrients', $diary['nutrientsInfo']);
if (array_key_exists('nutrientsInfo', $diary) && $nutrients) :
?>
    <section class="section nutrition-table" id="nutrition-table-calories">
        <div class="section__container _container">
            <?php
            require APPLICATION_PATH . '/template-parts/pdf-parts/header.php';
            ?>
            <div class="section__body">
                <?php
                $section_title = 'Оценка фактического питания';
                require APPLICATION_PATH . '/template-parts/pdf-parts/section-title.php';
                ?>
                <?php
                require APPLICATION_PATH . '/template-parts/nutrition/nutrition-table-text.php';
                require APPLICATION_PATH . '/template-parts/nutrition/nutrition-table-calories.php';
                ?>
            </div>
            <?php
            require APPLICATION_PATH . '/template-parts/pdf-parts/footer.php';
            ?>
        </div>
    </section>

    <section class="section nutrition-table" id="nutrition-table">
        <div class="section__container _container">
            <?php
            require APPLICATION_PATH . '/template-parts/pdf-parts/header.php';
            ?>
            <div class="section__body">
                <?php
                $section_title = 'Оценка фактического питания';
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

    <section class="section nutrition-table" id="nutrition-table-minerales">
        <div class="section__container _container">
            <?php
            require APPLICATION_PATH . '/template-parts/pdf-parts/header.php';
            ?>
            <div class="section__body">
                <?php
                $section_title = 'Оценка фактического питания';
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
    $chunk_diagrams = $render->get_nutrition_diagramm_array($diary, true);
    foreach ($chunk_diagrams as $idx => $diagram) :
    ?>
        <section class="section nutrition-diagram" id="nutrition-diagram-<?php echo $idx + 1 ?>">
            <div class="section__container _container">
                <?php
                require APPLICATION_PATH . '/template-parts/pdf-parts/header.php';
                ?>
                <div class="section__body">
                    <?php
                    $section_title = 'Оценка фактического питания';
                    require APPLICATION_PATH . '/template-parts/pdf-parts/section-title.php';
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
                            include APPLICATION_PATH . '/template-parts/nutrition/nutrition-diagram/' . $item['template'] . '.php';
                        }
                        ?>
                    </div>
                </div>
                <?php
                require APPLICATION_PATH . '/template-parts/pdf-parts/footer.php';
                ?>
            </div>
        </section>
    <?php
    endforeach;
    ?>

<?php endif; ?>

<?php
$nutrient_mass = $render->find_key('percentCategoryProductInDiary', $diary);
if ($nutrient_mass) :
?>
    <section class="section nutrition-mass" id="nutrition-mass">
        <div class="section__container _container">
            <?php
            require APPLICATION_PATH . '/template-parts/pdf-parts/header.php';
            ?>
            <div class="section__body">
                <?php
                $section_title = 'Оценка фактического питания';
                require APPLICATION_PATH . '/template-parts/pdf-parts/section-title.php';
                ?>
                <?php require APPLICATION_PATH . '/template-parts/nutrition/nutrition-mass.php'; ?>
                <?php require APPLICATION_PATH . '/template-parts/nutrition/nutrition-mass-text.php'; ?>
            </div>
            <?php
            require APPLICATION_PATH . '/template-parts/pdf-parts/footer.php';
            ?>
        </div>
    </section>
<?php endif; ?>
