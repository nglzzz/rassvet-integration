<div class="grid grid-3">
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
    ?>
        <li>
            <div>
                <svg width="18" height="19" viewBox="0 0 18 19">
                    <use xlink:href='assets/img/svg/icons.svg#<?php echo $this->icons[$icon] ?>' />
                </svg>
                <label><?php echo $key ?></label>
            </div>
            <?php foreach ($item as $elem) : ?>
                <p>
                    <span><?php echo $elem['title'] ?></span>
                    <span><?php echo $elem['mass']  ?> <?php echo $elem['unit'] ?></span>
                </p>
            <?php endforeach; ?>
        </li>
    <?php $i++;
    endforeach; ?>
    </ol>
</div>