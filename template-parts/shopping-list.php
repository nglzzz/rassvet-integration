<?php
$i = 0;
$count = count($data);
$chunk_data = $this->chunk_array($data, 6000, false, true);
foreach ($chunk_data as $keys => $data) :
    echo '<ol class="shopping-list__item">';
    foreach ($data as $key => $item) :
        $icon = '' . $key . '';
        require 'template-parts/ration/shopping-list-item.php';
        $i++;
    endforeach;
    echo '</ol>';
endforeach;
?>
</ol>