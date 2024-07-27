<main class="page-pdf">
    <?php
    require APPLICATION_PATH . '/template-parts/pdf-parts/hero.php';
    ?>

    <section class="section intro">
        <div class="intro__bgi">
            <img src="../assets/img/hero.png" alt="">
        </div>
        <div class="section__container _container">
            <?php
            require APPLICATION_PATH . '/template-parts/pdf-parts/header.php';
            ?>
            <div class="section__body">
                <?php
                require APPLICATION_PATH . '/template-parts/intro.php';
                ?>
            </div>
            <?php
            $page = 1;
            require APPLICATION_PATH . '/template-parts/pdf-parts/footer.php';
            ?>
        </div>
    </section>

    <?php
    require APPLICATION_PATH . '/template-parts/pdf-parts/tbc.php';
    ?>

    <section class="section params <?php if ($gender == 'male') echo 'params-male'; ?>" id="params">
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
                require APPLICATION_PATH . '/template-parts/params.php';
                ?>
            </div>
            <div class="params-text _desctop">* <?php echo $metabolism['indexes']['percent_fat']['info'] ?></div>
            <?php
            require APPLICATION_PATH . '/template-parts/pdf-parts/footer.php';
            ?>
        </div>
    </section>

    <?php

    foreach ($patient as $name => $section) {
        $file_name = APPLICATION_PATH . "/template-parts/pdf-parts/$name.php";
        if ($section && file_exists($file_name)) {
            require $file_name;
        }
    }

    foreach ($json_data as $name => $section) {
        $file_name = APPLICATION_PATH . "/template-parts/pdf-parts/$name.php";


        if ($section && file_exists($file_name)) {
            require $file_name;
        }

        if ($name == 'ration') {
            foreach ($section as $r_name => $item) {
                $ration_file_name = APPLICATION_PATH . "/template-parts/pdf-parts/ration/$r_name.php";
                if ($item && file_exists($ration_file_name)) {
                    require $ration_file_name;
                }
            }
        }
    }
    ?>

    <?php
    require APPLICATION_PATH . '/template-parts/pdf-parts/contacts.php';
    ?>

</main>
