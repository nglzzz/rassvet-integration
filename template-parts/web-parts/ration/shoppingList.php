<section class="section shopping-list" id="shopping-list" data-tabs-area>
    <div class="shopping-list__img">
        <img src="assets/img/shopping-list.png" alt="">
    </div>
    <div class="section__linear">
        <div class="_container">
            <h2>Список продуктов для покупок</h2>
        </div>
    </div>
    <div class="section__container _container">
        <div class="section__body">
            <div class="section__top">
                <div class="tabs">
                    <?php
                    $render->get_tabs($shoppingList, 'Неделя', $inner = false);
                    ?>
                </div>
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
                        <div class="grid grid-3">
                            <?php
                            $render->get_shopping_list($item);
                            ?>
                        </div>
                    </div>
                <?php $i++;
                endforeach; ?>
            </div>
        </div>
    </div>
</section>