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
    case "GET_ID":
        getID();
        break;
    case "REGISTRO":
        registrarMaestro();
        break;
    case "LOGIN":
        loginFunction();
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


function registrarMaestro(){
    $grupo = $_POST['grupo'];
    $username = $_POST['username'];
    $passwrd = $_POST['passwrd'];
    $nombre = $_POST['nombre'];
    $oficina = $_POST['oficina'];
    $telefono= $_POST['telefono'];
    $email = $_POST['email'];
    
    $result = loadRegistrarMaestro($grupo, $username, $passwrd, $nombre, $oficina, $telefono, $email);
    
    if ($result["status"] == "SUCCESS"){
		echo json_encode(array("message" => "Se creo nuevo maestro"));
	}	
	else{
		header('HTTP/1.1 500' . $result["status"]);
		die($result["status"]);
	}	
}

function loginFunction(){
	$username = $_POST["username"];
	$passwrd = $_POST["passwrd"];
    
	$result = attemptLogin($username, $passwrd);

	if ($result["status"] == "SUCCESS"){
		echo json_encode(array("message" => "Login Successful", "nombre"=>$result["nombre"], "email"=>$result["email"]));
	}	
	else{
		header('HTTP/1.1 500' . $result["status"]);
		die($result["status"]);
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
