<header class="header page-web">
    <div class="header__container _container">
        <div class="header__body">
            <div class="header__logo">
                <img src="assets/img/logo.png" alt="">
                <span><?php echo $doctor['work'] ?></span>
            </div>
            <nav>
                <ul>
                    <?php
                    $section_names = [
                        'meta' => [
                            'title' => 'Параметры тела',
                            'id' => 'paramas'
                        ],
                        'diary' =>
                        [
                            'title' => 'Фактическое питание',
                            'id' => 'nutrition'
                        ],
                        'analisys' => [
                            'title' => ' Анализы и заключения',
                            'id' => 'analisys'
                        ],
                        'rationOnWeeks' =>
                        [
                            'title' => 'Рекомендуемый рацион',
                            'id' => 'nutrition-plan'
                        ],
                        'shoppingList' =>
                        [
                            'title' => 'Список покупок и рецепты',
                            'id' => 'shopping-list'
                        ],
                    ];
                    foreach ($patient as $name => $section) {
                        $file_name = "template-parts/web-parts/$name.php";
                        if ($section && file_exists($file_name) && isset($section_names[$name])) {
                            echo '<li><a href="#' . $section_names[$name]['id'] . '">' . $section_names[$name]['title'] . '</a></li>';
                        }
                    }

                    foreach ($json_data as $name => $section) {
                        $file_name = "template-parts/web-parts/$name.php";

                        if ($section && file_exists($file_name) && isset($section_names[$name])) {
                            echo '<li><a href="#' . $section_names[$name]['id'] . '">' . $section_names[$name]['title'] . '</a></li>';
                        }

                        if ($name == 'ration') {
                            foreach ($section as $r_name => $item) {
                                $ration_file_name = "template-parts/web-parts/ration/$r_name.php";
                                if ($item && file_exists($ration_file_name) && isset($section_names[$r_name])) {
                                    echo '<li><a href="#' . $section_names[$r_name]['id'] . '">' . $section_names[$r_name]['title'] . '</a></li>';
                                }
                            }
                        }
                    }
                    ?>
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