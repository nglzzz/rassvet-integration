<!DOCTYPE html>
<html lang="<?php echo $json_data['locale'] ?>" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="assets/css/style.min.css?_v=20240527112453">
    <style>
        .calorie-distribution__flex>div {
            min-width: 12%;
        }

        .nutrition-table__item table td:nth-child(2),
        .nutrition-table__item table th:nth-child(2) {
            max-width: 100%;
            /* или еще меньше */
        }

        .shopping-list__item {
            height: fit-content;
        }

        .shopping-list .tabs-content {
            margin-top: 40px;
        }

        .recepies-item__text ol {
            padding-left: 0;
        }

        .recepies-item__text li {
            list-style: none;
        }

        .page-web {
            display: none;
        }

        /* .page-pdf {
            display: none;
        } */

        .hero__head ._container {
            height: auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">