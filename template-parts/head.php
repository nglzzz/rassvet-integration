<!DOCTYPE html>
<html lang="<?php echo $json_data['locale'] ?>" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="assets/css/style.min.css?_v=20240620113750">
    <style>
        @media print {
            .nutrition-plan__item div {
                flex: 0 0 auto;
                width: 150px;
            }

            .plan-total .nutrition-plan__total h3 {
                display: none;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function(e) {

            function createreceieLinks(rations, recepies, type = 'web') {
                if (!rations.length) return;

                rations.forEach(item => {
                    const linkWrap = item.closest('tr').querySelector('.recepie-link');
                    const title = item.textContent.toLowerCase().replace('\s+', '');

                    recepies.forEach(recepie => {
                        const recTitle = recepie.textContent.toLowerCase().replace('\s+', '');
                        const id = recepie.closest('.recepies-item').id;

                        if (title == recTitle) {
                            let linkText = '';
                            if (type == 'web') {
                                linkText = 'Посмотреть';
                            } else {
                                linkText = 'Стр. ' + recepie.closest('.section').querySelector('.section__footer .page').dataset.page
                            }

                            const link = `<a href="#${id}">${linkText}</a>`
                            linkWrap.textContent = '';
                            linkWrap.insertAdjacentHTML('beforeend', link)
                        }

                    })
                })
            }

            createreceieLinks(
                document.querySelectorAll('.page-web .ration-title'),
                document.querySelectorAll('.page-web .recepie-title'),
                type = 'web'
            )

            createreceieLinks(
                document.querySelectorAll('.page-pdf .ration-title'),
                document.querySelectorAll('.page-pdf .recepie-title'),
                type = 'pdf'
            )

        })
    </script>
</head>

<body>
    <div class="wrapper">