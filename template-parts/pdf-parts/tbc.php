<section class="section tbc">
    <div class="section__container _container">
        <?php
        require 'template-parts/pdf-parts/header.php';
        ?>
        <div class="section__body">
            <div class="section__title">
                <span>Содержание</span>
                <img src="assets/img/icons/section-linear.svg" alt="">
            </div>
            <nav>
                <ul>
                    <?php
                    $navigation = [
                        'params' => $metabolism,
                        'nutrition' => $diary,
                        'analisys' => $analisys,
                        'nutrition-plan' => $ration,
                        'shopping-list' => $shoppingList,
                    ];
                    foreach ($json_data as $key => $value) :
                    ?>
                        <li>
                            <a href="#<?php echo $key ?>">
                                <span>Параметры и состав тела </span>
                                <span>02</span>
                            </a>
                        </li>
                    <?php endforeach; ?>

                    <li>
                        <a href="#">
                            <span>Параметры и состав тела </span>
                            <span>02</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Образ жизни и состояние здоровья</span>
                            <span>08</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Оценка фактического питания</span>
                            <span>09</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Анализы</span>
                            <span>15</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Рекомендуемые исследования</span>
                            <span>17</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Заключение и рекомендуемые исследования</span>
                            <span>18</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Контрольные исследования</span>
                            <span>19</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Риски развития алиментарных заболеваний</span>
                            <span>20</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Итоговые заключения</span>
                            <span>21</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Пищевая ценность рекомендуемого рациона. Неделя 1</span>
                            <span>22</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Ваш персональный план питания. Неделя 1</span>
                            <span>25</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Спсиок продуктов. Неделя 1</span>
                            <span>26</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Рецепты. Неделя 1</span>
                            <span>27</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span>Контакты</span>
                            <span>28</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <?php
        require 'template-parts/pdf-parts/footer.php';
        ?>
    </div>
</section>