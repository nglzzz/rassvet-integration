<?php
require 'template-parts/web-parts/header.php';
?>
<main class="page-web">
    <?php
    require 'template-parts/web-parts/hero.php';
    ?>

    <section class="section intro">
        <div class="section__container _container">
            <div class="section__body">
                <?php
                require 'template-parts/intro.php';
                ?>
            </div>
        </div>
    </section>

    <section class="section params <?php if ($gender == 'male') echo 'params-male'; ?>" id="params">
        <div class="section__linear">
            <div class="_container">
                <h2>Параметры и состав тела</h2>
            </div>
        </div>
        <div class="section__container _container">
            <div class="section__body">
                <?php
                require 'template-parts/params.php';
                ?>
                <div class="params-text _desctop">* <?php echo $metabolism['indexes']['percent_fat']['info'] ?></div>
            </div>
        </div>
    </section>

    <?php

    foreach ($patient as $name => $section) {
        $file_name = "template-parts/web-parts/$name.php";
        if ($section && file_exists($file_name)) {
            require $file_name;
        }
    }

    foreach ($json_data as $name => $section) {
        $file_name = "template-parts/web-parts/$name.php";

        if ($section && file_exists($file_name)) {
            require $file_name;
        }

        if ($name == 'ration') {
            foreach ($section as $r_name => $item) {
                $ration_file_name = "template-parts/web-parts/ration/$r_name.php";
                if ($item && file_exists($ration_file_name)) {
                    require $ration_file_name;
                }
            }
        }
    }
    ?>

    <?php
    require 'template-parts/web-parts/contacts.php';
    ?>
</main>