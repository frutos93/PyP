<?php

header('Content-type: application/json');
header('Content-Type: text/html;charset=utf-8');
require_once 'dataLayer.php';

$action = $_POST["action"];

switch ($action) {
    case "LOAD_TEACH":
        loadTeachers();
        break;
    case "LOAD_SCHOOL":
        loadSchool();
        break;
    case "LOAD_AREA":
        loadArea();
        break;
}

function loadTeachers(){
    $result = loadTeacherInformation();
    if($result){
        echo json_encode($result);
    }
    else{
        die("There was an error loading the teachers2");
    }
}

function loadSchool(){
    $result = loadSchoolInformation();
    if($result){
        echo json_encode($result);
    }
    else{
        die("There was an error loading the schools.");
    }
}

function loadArea(){
    $result = loadAreaInvestigacion();
    if($result){
        echo json_encode($result);
    }
    else{
        die("There was an error loading the invetigation areas");
    }
}
?>
