<section class="section recepies" id="recepies" data-tabs-area>
    <div class="recepies-img">
        <img src="assets/img/recepies.png" alt="">
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