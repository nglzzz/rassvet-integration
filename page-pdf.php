<main class="page-pdf">
    <?php
    require 'template-parts/pdf-parts/hero.php';
    ?>

    <section class="section intro">
        <div class="intro__bgi">
            <img src="assets/img/hero.png" alt="">
        </div>
        <div class="section__container _container">
            <?php
            require 'template-parts/pdf-parts/header.php';
            ?>
            <div class="section__body">
                <?php
                require 'template-parts/intro.php';
                ?>
            </div>
            <?php
            $page = 1;
            require 'template-parts/pdf-parts/footer.php';
            ?>
        </div>
    </section>

    <?php
    require 'template-parts/pdf-parts/tbc.php';
    ?>

    <section class="section params <?php if ($gender == 'male') echo 'params-male'; ?>" id="params">
        <div class="section__container _container">
            <?php
            require 'template-parts/pdf-parts/header.php';
            ?>
            <div class="section__body">
                <?php
                $section_title = 'Параметры и состав тела';
                require 'template-parts/pdf-parts/section-title.php';
                ?>
                <?php
                require 'template-parts/params.php';
                ?>
            </div>
            <div class="params-text _desctop">* <?php echo $metabolism['indexes']['percent_fat']['info'] ?></div>
            <?php
            require 'template-parts/pdf-parts/footer.php';
            ?>
        </div>
    </section>

    <?php

    foreach ($patient as $name => $section) {
        $file_name = "template-parts/pdf-parts/$name.php";
        if ($section && file_exists($file_name)) {
            require $file_name;
        }
    }

    require 'template-parts/pdf-parts/diary.php';


    foreach ($json_data as $name => $section) {
        $file_name = "template-parts/pdf-parts/$name.php";


        if ($section && file_exists($file_name)) {
            require $file_name;
        }

        if ($name == 'ration') {
            foreach ($section as $r_name => $item) {
                $ration_file_name = "template-parts/pdf-parts/ration/$r_name.php";
                if ($item && file_exists($ration_file_name)) {
                    require $ration_file_name;
                }
            }
        }
    }
    ?>


    <?php
    require 'template-parts/pdf-parts/contacts.php';
    ?>

</main>