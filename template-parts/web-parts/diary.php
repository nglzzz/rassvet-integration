<section class="section nutrition" id="nutrition">
    <div class="section__linear">
        <div class="_container">
            <h2>Оценка фактического питания</h2>
        </div>
    </div>
    <div class="section__container _container">
        <div class="section__body">
            <?php
            require 'template-parts/nutrition/nutrition.php';
            ?>
        </div>
    </div>
</section>

<?php
$nutrients = $render->find_key('nutrients', $diary['nutrientsInfo']);
if (array_key_exists('nutrientsInfo', $diary) && $nutrients) :
?>
    <section class="section nutrition-table">
        <div class="section__container _container">
            <div class="section__body">
                <?php
                require 'template-parts/nutrition/nutrition-table-text.php';
                require 'template-parts/nutrition/nutrition-table-calories.php';
                require 'template-parts/nutrition/nutrition-table.php';
                require 'template-parts/nutrition/nutrition-table-minerales.php';
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
                    $diagram = $render->get_nutrition_diagramm_array($diary);
                    foreach ($diagram as $item) {
                        if ($item['data']) {
                            require 'template-parts/nutrition/nutrition-diagram/' . $item['template'] . '.php';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
$nutrient_mass = $render->find_key('percentCategoryProductInDiary', $diary);
if ($nutrient_mass) :
?>
    <section class="section nutrition-mass">
        <div class="section__container _container">
            <div class="section__body">
                <?php require 'template-parts/nutrition/nutrition-mass.php'; ?>
                <?php require 'template-parts/nutrition/nutrition-mass-text.php'; ?>
            </div>
        </div>
    </section>
<?php endif; ?>