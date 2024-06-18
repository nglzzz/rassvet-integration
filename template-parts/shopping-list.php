<?php
$i = 0;
$count = count($data);
foreach ($data as $key => $item) :
    if ($i == 0) {
        echo '<ol class="shopping-list__item">';
    }
    if (round($count / 3) == $i) {
        echo '</ol><ol class="shopping-list__item">';
    }
    if (round(($count / 3) * 2) == $i) {
        echo '</ol><ol class="shopping-list__item">';
    }

    $icon = '' . $key . '';
    require 'template-parts/ration/shopping-list-item.php';
    $i++;
endforeach; ?>
</ol>