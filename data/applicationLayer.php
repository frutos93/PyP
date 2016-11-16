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
    case "LOAD_PROFILE":
        loadProfile();
        break;
    case "LOAD_GRUPO_OPCION":
        loadGrupoOpcion();
        break;
    case "LOAD_TEACH_PROJECT":
        loadTeachProjects();
        break;
    case "LOAD_PROY_INFO":
        loadProjectInfo();
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

function loadProfile(){
    $id = $_POST["id"];
    $result = loadTeacherProfile($id);
    if($result){
        echo json_encode($result);
    }
    else{
        die("There was an error loading the teacher profile");
    }
    
}

function loadGrupoOpcion(){
    $result = loadGrupoInvestigacionOpcion();
    if($result){
        echo json_encode($result);
    }
    else{
        die("There was an error loading the invetigation areas");
    }
}

function loadTeachProjects(){
    $id = $_POST["id"];
    $result = loadTeacherProjects($id);
    if($result){
        echo json_encode($result);
    }
    else{
        die('There was an error loading the teacher projects.');
    }
}

function loadProjectInfo(){
    $id = $_POST["id"];
    $result = loadProjectInformation($id);
    if($result){
        echo json_encode($result);
    } else{
        die('There was an error loading the project information.');
    }
}
?>
