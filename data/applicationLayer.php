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
    case "LOAD_PROFILE_SESSION":
        loadProfileSess();
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
    case "CHECA-SESION":
        loadChecaSesion();
        break;
    case "TERMINA-SESION":
        loadTerminaSesion();
        break;
    case "REGISTRO_PROY":
        registrarProyecto();
        break;
    case "UPDATE_PERFIL":
        updatePerfil();
        break;
    case "UPDATE_PROY":
        updateProyecto();
        break;
}

function updatePerfil(){
    session_start();
    $id = $_SESSION['id'];
    $nombre = $_POST['nombre'];
    $oficina = $_POST['oficina'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $result = updateTeacherProfile($id, $nombre, $oficina, $telefono,$correo);
    
    if ($result["status"] == "SUCCESS"){
		echo json_encode(array("message" => "Se actualizaron los datos correctamente!"));
	}	
	else{
		header('HTTP/1.1 500' . $result["status"]);
		die($result["status"]);
	}	
     
}

function updateProyecto(){
    session_start();
    $id = $_SESSION['id'];
    $idProy = $_POST['id'];
    $nombre = $_POST['nombre'];
    $cupo = $_POST['cupo'];
    $estado = $_POST['estado'];
    $descripcion = $_POST['descripcion'];
    
    $result = updateProjectInformation($id, $idProy, $nombre, $cupo, $estado, $descripcion);
    
    if ($result["status"] == "SUCCESS"){
		echo json_encode(array("message" => "Se actualizaron los datos correctamente!"));
	}	
	else{
		header('HTTP/1.1 500' . $result["status"]);
		die($result["status"]);
	}	
     
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
function loadProfileSess(){
    session_start();
    $id = $_SESSION["id"];
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
        die("There was an error loading the invetigation groups");
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

function registrarProyecto(){
    $nombre= $_POST['nombre'];
    $cupo = $_POST['cupo'];
    $descripcion = $_POST['descripcion'];
    $id =  $_POST['id'];
    
    $result = attemptRegisterProyect($id, $nombre, $cupo, $descripcion);
    
    if ($result['status'] == "SUCCESS"){
        echo json_encode(array("message"=>"Se creo un nuevo evento"));
        
    }else{
		header('HTTP/1.1 500' . $result["status"]);
		die($result["status"]);
	}
    
}

function loginFunction(){
	$username = $_POST["username"];
	$passwrd = $_POST["passwrd"];
    
	$result = attemptLogin($username, $passwrd);

	if ($result["status"] == "SUCCESS"){
		echo json_encode(array("message" => "Login Exitoso"));
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

function loadChecaSesion(){
    $result = attemptChecaSesion();
    if ($result["status"] == "SUCCESS"){
		echo json_encode(array("message" => "Sesion exitosa", "username" => $result["username"], "id" => $result["id"],));
	}	
    else{
        die("There was an error checking for a session");
    }
}

function loadTerminaSesion(){
    $result = attemptTerminaSesion();
    if ($result["status"] == "SUCCESS"){
		echo json_encode(array("message" => "Sesion exitosa"));
	}	
    else{
        die("There was an error checking for a session");
    }
}

?>
