<?php
$page++;
?>
<div class="section__footer">
    <div class="author">
        <?php echo $doctor_name ?>,
        <?php echo $doctor['profession'] ?>
    </div>
    <div class="page" data-page="<?php echo $page ?>"><?php echo $page ?></div>
</div>