<div class="grid">
    <?php
    foreach ($data as $key => $item) {
        $add_pdf_to_id = false;
        require APPLICATION_PATH . '/template-parts/recepies/recepie-item.php';
    }
    ?>

</div>
