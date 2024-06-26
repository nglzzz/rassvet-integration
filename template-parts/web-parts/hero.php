<section class="hero">
    <div class="hero__bgi">
        <img src="../assets/img/hero.png" alt="">
    </div>
    <div class="hero__container _container">
        <div class="hero__body">
            <h1>Персональный отчёт <br> и рекомендации
                <span>по состоянию здоровья и питанию</span>
            </h1>
            <div class="hero__patient">
                <span class="hero__patient-name"><?php echo $patient_name ?></span>
                <span class="hero__patient-age"><?php echo $patient['age'] ?> лет</span>
            </div>
            <div class="hero__author">
                <span class="hero__author-name">
                    <span>Составил</span> <?php echo $doctor_name ?>
                </span>
                <span class="hero__author-info">
                    <?php
                    echo $doctor['profession'];
                    if ($doctor['title']) {
                        echo ' ';
                        echo $doctor['title'];
                    }
                    if ($doctor['post']) {
                        echo ', ';
                        echo $doctor['post'];
                    }
                    if ($doctor['work']) {
                        echo ' ';
                        echo $doctor['work'];
                    }
                    ?>
                </span>
            </div>
            <div class="hero__date">
                <?php if ($doctor['city']) : ?>
                    <span><?php echo $doctor['city'] ?></span>
                <?php endif; ?>
                <time><?php echo date('d.m.Y') ?></time>
            </div>
        </div>
    </div>
</section>