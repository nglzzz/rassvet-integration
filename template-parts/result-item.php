<!-- делим дельту на 6 равных частей между min и max -->
<?php
$arr = [0.15, 0.3, 0.45, 0.6, 0.75, 0.9];

$line_class = '';
if ($data['mass'] > $data['norm']) {
    $line_class = 'red';
}
?>
<div class="result-item">
    <h3><?php echo $title ?></h3>
    <div class="result-item__flex">
        <div class="result-item__score"><?php echo $data['mass'] ?></div>
        <div class="result-item__scale">
            <p>
                <span><?php echo $data['minThreshold'] ?></span>

                <?php foreach ($arr as $i) : ?>
                    <span><?php echo round($data['minThreshold'] + $delta * $i) ?></span>
                <?php endforeach; ?>
                <span><?php echo $data['maxThreshold'] ?></span>
            </p>
            <div style="--norma:<?php echo $percent['norma'] ?>; --patient:<?php echo $percent['patient'] ?>" class="<?php echo $line_class ?>">
                <span></span>
                <?php foreach ($arr as $i) : ?>
                    <span></span>
                <?php endforeach; ?>
                <span></span>
            </div>
        </div>
    </div>
</div>