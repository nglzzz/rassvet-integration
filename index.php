<?php

require 'inc/class-Render.php';
$render = new Render();


$json_file = file_get_contents('patient.json');
$json = json_decode($json_file, true);
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
}


// analisys
$analisys = false;


// hide sections
$show_section = false;


// start building html
// ob_start();
require 'template-parts/head.php';

// web page 
// require 'page-web.php'; 
 
// pdf page
require 'page-pdf.php';

require 'template-parts/scripts.php';
 
// $newcontent = ob_get_contents();
// ob_clean();

// $handle = fopen($patient_name . '.html', 'w+');
// fwrite($handle, $newcontent);
// fclose($handle);
