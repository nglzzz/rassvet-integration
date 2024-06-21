<?php
foreach ($recipeOnWeeks as $w_idx => $weeks) :
    $sorted_weeks = $render->chunk_array($weeks,  7000,  false, false);
    foreach ($sorted_weeks as $recepies) :
?>
        <section class="section recepies" id="recepies-w-<?php echo $w_idx ?>" data-tabs-area>
            <div class="recepies-img">
                <img src="assets/img/recepies.png" alt="">
            </div>
            <div class="section__container _container">
                <?php
                require 'template-parts/pdf-parts/header.php';
                ?>
                <div class="section__body">
                    <?php
                    $section_title = 'Рецепты. Неделя ' .  $w_idx + 1;
                    require 'template-parts/pdf-parts/section-title.php';
                    ?>

                    <div class="grid">
                        <?php foreach ($recepies as  $item) :
                        ?>
                            <?php
                            $add_pdf_to_id = true;
                            require 'template-parts/recepies/recepie-item.php';
                            ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php
                require 'template-parts/pdf-parts/footer.php';
                ?>
            </div>
        </section>
<?php
    endforeach;
endforeach;
?>