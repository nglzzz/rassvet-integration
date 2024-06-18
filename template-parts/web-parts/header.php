<header class="header page-web">
    <div class="header__container _container">
        <div class="header__body">
            <div class="header__logo">
                <img src="assets/img/logo.png" alt="">
                <span><?php echo $doctor['work'] ?></span>
            </div>
            <nav>
                <ul>
                    <?php if ($metabolism) : ?>
                        <li><a href="#params">Параметры тела</a></li>
                    <?php endif; ?>

                    <?php if ($diary) : ?>
                        <li><a href="#nutrition">Фактическое питание</a></li>
                    <?php endif; ?>

                    <?php if ($analisys) : ?>
                        <li>
                            <a href="#analisys">Анализы и заключения</a>
                            <ul>
                                <li><a href="#analisys">Анализы</a></li>
                                <li><a href="">Заключение и рекомендуемые исследования</a></li>
                                <li><a href="">Контрольные исследования</a></li>
                                <li><a href="">Риски развития алиментарных заболеваний</a></li>
                                <li><a href="">Итоговые заключения</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if ($ration) : ?>
                        <li><a href="#nutrition-plan">Рекомендуемый рацион</a></li>
                    <?php endif; ?>

                    <?php if ($shoppingList) : ?>
                        <li><a href="#shopping-list">Список покупок и рецепты</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            <button class=" header__burger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</header>