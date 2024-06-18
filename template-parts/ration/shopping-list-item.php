<li>
    <div>
        <svg width="18" height="19" viewBox="0 0 18 19">
            <use xlink:href='assets/img/svg/icons.svg#<?php echo $render->icons[$icon] ?>' />
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