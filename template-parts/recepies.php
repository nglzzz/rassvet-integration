<div class="grid">
    <?php
    foreach ($data as $key => $item) {
        $add_pdf_to_id = false;
        require 'template-parts/recepies/recepie-item.php';
    }
    ?>

</div>