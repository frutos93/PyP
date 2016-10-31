<?php

header('Content-type: application/json');
require_once 'dataLayer.php';

$action = $_POST["action"];

switch ($action) {
    case "LOAD_TEACH":
        loadTeachers();
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
?>