<?php

$id = \App\Service\ReportService::translit($item['title']);

if ($add_pdf_to_id) {
    $id .= '-pdf';
}

?>
<div class="recepies-item" id="<?php echo $id ?>">
    <div class="recepies-item__top">
        <h3 class="recepie-title"><?php echo $item['title'] ?></h3>
        <time>
            <svg width="14" height="14" viewBox="0 0 14 14">
                <use xlink:href='../assets/img/svg/icons.svg#time' />
            </svg>
            <?php echo $item['timeCook'] ?>
        </time>
    </div>
    <div class="recepies-item__bottom">
        <div class="recepies-item__table">
            <table>
                <thead>
                    <tr>
                        <th>Ингредиенты на 100 г готового блюда</th>
                        <th>Продукт</th>
                        <th>Кол-во</th>
                        <th>Вес</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($item['products'] as $prod) : ?>
                        <tr>
                            <td><?php echo $prod['title'] ?></td>
                            <td>1 шт.</td>
                            <td><?php echo $prod['mass_gr'] ?> <?php echo $prod['mass_human'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="recepies-item__img">
                <?php if ($item['image']) : ?>
                    <img src="<?php echo $item['image'] ?>" alt="">
                <?php else : ?>
                    <img src="../assets/img/recepie-no.png" alt="">
                <?php endif; ?>
            </div>
        </div>
        <div class="recepies-item__text">
            <ol>
                <?php
                $descr = explode(PHP_EOL, $item['description']);
                foreach ($descr as $li) :
                ?>
                    <li><?php echo $li ?></li>
                <?php endforeach; ?>
            </ol>
        </div>
    </div>
</div>
