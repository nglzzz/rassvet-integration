<?php

require 'inc/class-Render.php';
$render = new Render();


$json_file = file_get_contents('patient.json');
$json = json_decode($json_file, true);

// $json = $_POST['data'];
$json_data = $json['data'];


// doctor 
$doctor = $json_data['doctor'];
$doctor_name = $doctor['middle_name'] . ' ' . $doctor['first_name'] . ' ' . $doctor['last_name'];


// patient 
$patient = $json_data['patient'];
$patient_name = $patient['middle_name'] . ' ' . $patient['first_name'] . ' ' . $patient['last_name'];


// patient gender
$gender = 'male';
if ($patient['gender'] = 1) {
    $gender = 'female';
}


// metabolism
$metabolism = false;
if (array_key_exists('meta', $patient)) {
    $metabolism = $patient['meta'];
}


// diary
$diary = false;
if (array_key_exists('diary', $json_data)) {
    $diary = $json_data['diary'];
}


// ration, shopping list and recepies
$ration = false;
$shoppingList = false;
$rationOnWeeks = false;
$recipeOnWeeks = false;
$infoNutrientsByRation = false;
if (array_key_exists('ration', $json_data)) {
    $ration = $json_data['ration'];

    if (array_key_exists('rationOnWeeks', $ration)) {
        $rationOnWeeks = $ration['rationOnWeeks'];
    }
    if (array_key_exists('shoppingList', $ration)) {
        $shoppingList = $ration['shoppingList'];
    }
    if (array_key_exists('recipeOnWeeks', $ration)) {
        $recipeOnWeeks = $ration['recipeOnWeeks'];
    }
    if (array_key_exists('infoNutrientsByRation', $ration)) {
        $infoNutrientsByRation = $ration['infoNutrientsByRation'];
    }
}

// analisys
$analisys = false;

// hide sections
$show_section = false;

// start building html
ob_start();
require 'template-parts/head.php';

// web page 
require 'pages/page-web.php';

// pdf page
require 'pages/page-pdf.php';

require 'template-parts/scripts.php';

$newcontent = ob_get_contents();
ob_clean();

$file_dir = $_ENV['CLIENT_REPORT_PATH'] . '/';

$random_name = 'report_' . transliterator_transliterate('Russian-Latin/BGN', $patient['last_name']) . '_' . date('Y-m-d-H-m-s');

$filename = $file_dir . $random_name . '.html';

$handle = fopen($filename, 'w+');
$file = fwrite($handle, $newcontent);
fclose($handle);

if (file_exists($filename)) {
    echo json_encode(
        ['report_url' => __DIR__ . '/' . $filename]
    );
} else {
    echo 'Error!';
}

die();
