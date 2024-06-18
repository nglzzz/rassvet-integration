
<section class="hero">
    <div class="hero__head">
        <div class="_container">
            <div class="hero__head-body">
                <div class="hero__logo">
                    <img src="assets/img/logo.png" alt="">
                    <span><?php echo $doctor['work'] ?></span>
                </div>
                <div class="date">
                    <?php if ($doctor['city']) : ?>
                        <span><?php echo $doctor['city'] ?></span>
                    <?php endif; ?>
                    <time><?php echo date('d.m.Y') ?></time>
                </div>
            </div>
        </div>
    </div>
    <div class="hero__bgi">
        <img src="assets/img/hero.png" alt="">
    </div>
    <div class="hero__container _container">
        <div class="hero__body">
            <h1>
                Персональный отчёт и рекомендации
                <span>по состоянию здоровья и питанию</span>
            </h1>
            <div class="patient">
                <span class="patient-name"><?php echo $patient_name ?></span>
                <span class="patient-age"><?php echo $patient['age'] ?> лет</span>
            </div>
            <div class="author">
                <span class="author-name">
                    <span>Составил</span> <?php echo $doctor_name ?>
                </span>
                <span class="author-info">
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
        </div>
    </div>
</section>