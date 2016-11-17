<?php

function connectionToDataBase()
{
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "pypdb";
    $conn = new \mysqli($servername, $username, $password, $dbname, 8889);
    if ($conn->connect_error) {
        return null;
    } else {
        return $conn;
    }
}

function loadTeacherInformation()
{
    $conn = connectionToDataBase();
    if ($conn != null) {
        $sql = "SELECT id, nombre, correo FROM profesor";
        $result = $conn->query($sql);
        if ($result-> num_rows>0) {
            $response = array();
            while ($row = $result->fetch_assoc()) {
                array_push($response, array("id" => $row["id"], "nombre" => $row["nombre"],"correo" => $row["correo"]));
            }
            return $response;
        } else {
            die("There was an error loading the teachers1");
        }
    }
    else
    {
        die("There was an error with the database connection");
    }
}

function loadProjectIndex(){
    $conn = connectionToDataBase();
    if($conn != null){
        $sql = "SELECT id, nombre, descripcion FROM proyecto";
        $result = $conn->query($sql);
         if($result->num_rows>0) {
            $response = array();
            while($row = $result->fetch_assoc()){
                array_push($response, array("id" => $row["id"], 'nombre'=>$row['nombre'], 'descripcion' => $row['descripcion']));
            }
            return $response;
        } else{
            die("There was an error loading the schools");
        }
    }
    else{
        die("There was an error with the database connection");
    }
}
function loadSchoolInformation(){
    $conn = connectionToDataBase();
    if($conn != null){
        $sql = "SELECT id,nombre FROM escuela";
        $result = $conn->query($sql);
        if($result->num_rows>0) {
            $response = array();
            while($row = $result->fetch_assoc()){
                array_push($response, array("id" => $row["id"], 'nombre'=>$row['nombre']));
            }
            return $response;
        } else{
            die("There was an error loading the schools");
        }
    }
    else{
        die("There was an error with the database connection");
    }
}

function loadAreaInvestigacion(){
    $conn = connectionToDataBase();
    if($conn != null){
        $sql = "SELECT id,nombre FROM area_estrategica";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            $response = array();
            while($row = $result -> fetch_assoc()){
                array_push($response, array("id"=> $row['id'], 'nombre' => $row['nombre']));
            }
            return $response;
        } else {
            die('There was an error loading the investigation areas');
        }
    }
    else{
        die('There was an error with the database connection');
    }
}

function loadTeacherProfile($id){
    $conn = connectionToDataBase();
    if($conn != null){
        $sql = "SELECT nombre, oficina, telefono, correo FROM profesor WHERE id = '$id'";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            $response = array();
            while($row = $result -> fetch_assoc()){
                array_push($response, array("nombre"=>$row['nombre'],'oficina'=>$row['oficina'],'telefono'=>$row['telefono'], 'correo'=>$row['correo']));
            }
            return $response;
        } else{
            die('There was an error loading the teacher profile2');
        }
    }
    else{
        die('There was an error with the database connection');
    }
}

function loadGrupoInvestigacionOpcion(){
    $conn = connectionToDataBase();
    if($conn != null){
        $sql = "SELECT id,nombre FROM grupo_investigacion";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            $response = array();
            while($row = $result -> fetch_assoc()){
                array_push($response, array("id"=> $row['id'], 'nombre' => $row['nombre']));
            }
            return $response;
        } else {
            die('There was an error loading the investigation areas');
        }
    }
    else{
        die('There was an error with the database connection');
    }
}

function loadRegistrarMaestro($grupo, $username, $passwrd, $nombre, $oficina, $telefono, $email){
        
    $conn = connectionToDataBase();

    if ($conn != null){

        $sql = "SELECT username FROM profesor WHERE username = '$username'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            $conn -> close();
            return array("status" => "Username already in use please use another one");
        }
        else{

            $sql = "INSERT INTO profesor (id_grupo_investigacion, nombre, oficina, telefono, correo, username, passwrd) VALUES ('$grupo','$nombre', '$oficina', '$telefono', '$email', '$username', '$passwrd')";
            
            if (mysqli_query($conn, $sql)) 
            {
                $conn -> close();
                return array("status" => "SUCCESS");
            } 
            else 
            {
                $conn -> close();
                return array("status" => "No se pudo hacer la query");
            }
        }
    }else{
        $conn -> close();
        return array("status" => "Mala conexion a la BD");
    }
}
function attemptRegisterProyect($id, $nombre, $cupo, $descripcion){
    $conn = connectionToDataBase();
    if ($conn != null){

        $sql = "SELECT nombre FROM proyecto WHERE nombre = '$nombre'";

        $result = $conn->query($sql);
        
        if ($result->num_rows > 0)
        {
            $conn -> close();
            return array("status" => "Proyecto con ese nombre ya existe");
        }
        else{

            $sql = "INSERT INTO proyecto (nombre, id_profesor, estado, cupo_limite, descripcion) VALUES ('$nombre','$id', 'abierto', '$cupo', '$descripcion')";
            
            if (mysqli_query($conn, $sql)) 
            {
                $conn -> close();
                return array("status" => "SUCCESS");
            } 
            else 
            {
                $conn -> close();
                return array("status" => "No se pudo hacer la query");
            }
        }
    }else{
        $conn -> close();
        return array("status" => "Mala conexion a la BD");
    }
}

function attemptLogin($username, $passwrd){
    $conn = connectionToDataBase();

    if ($conn != null){
        $sql = "SELECT id, nombre, correo
            FROM profesor 
            WHERE username = '$username' AND passwrd = '$passwrd'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
             {
                
                $nombre = $row["nombre"];
                $correo = $row["correo"];
                $userID = $row["id"];

             }

            session_start();

            $_SESSION['username'] = $username;	
            $_SESSION['id'] = $userID;	
            
            $conn -> close();
            return array("status" => "SUCCESS");
        }
        else{
            $conn -> close();
            return array("status" => "Usuario no encontrado");
        }
    }else{
        $conn -> close();
        return array("status" => "Mala conexion a la BD.");
    }
}

function updateTeacherProfile($id, $nombre, $oficina, $telefono,$correo){
    $conn = connectionToDataBase();
    if($conn != null){
        $sql = "UPDATE profesor SET nombre = '$nombre', oficina = '$oficina', telefono = '$telefono', correo = '$correo' WHERE id = '$id'";
        $result = $conn->query($sql);
        if($result){
            return array("status" => "SUCCESS");
        }
        else{
            return array("status" => "Error al actualizar los datos");
        }
    }
    else {
        return array("status" => "Mala conexion a la BD.");
    }
}

function updateProjectInformation($id, $idProy, $nombre, $cupo, $estado, $descripcion){
    $conn = connectionToDataBase();
    if($conn != null){
        $sql = "UPDATE proyecto SET nombre = '$nombre', estado = '$estado', cupo_limite = '$cupo', descripcion = '$descripcion' WHERE id_profesor = '$id' AND id = '$idProy'";
        $result = $conn->query($sql);
        if($result){
            return array("status" => "SUCCESS");
        }
        else{
            return array("status" => "Error al actualizar los datos");
        }
    }
    else {
        return array("status" => "Mala conexion a la BD.");
    }
}


function loadTeacherProjects($id){
    $conn = connectionToDataBase();
    if($conn != null){
        $sql = "SELECT id, nombre, estado, cupo_limite, descripcion FROM proyecto WHERE id_profesor = '$id'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            
            $response = array();
            while($row = $result -> fetch_assoc()){
                array_push($response, array('id'=> $row['id'],'nombre' => $row['nombre'], 'estado' => $row['estado'], 'cupo' => $row['cupo_limite'], 'descripcion' => $row['descripcion']));
            }
            return $response;
        } elseif($result->num_rows == 0){
            
            die('There are no projects to show');
        } else{
            
            die('There was an error loading the projects');
        }
    }
    else{
        die('There was an error with the database connection');
    }
}

function attemptChecaSesion(){

	session_start();

	if (isset($_SESSION["username"]) && isset($_SESSION["id"]))
	{
		return array("status" => "SUCCESS", "username"=>$_SESSION['username'],"id"=>$_SESSION['id']);
	}
	else
	{
		return array("status"=> "FAIL");
	}
}

function attemptTerminaSesion(){

	session_start();

    if (isset($_SESSION["username"]) && isset($_SESSION["id"])) {
        unset($_SESSION["username"]);
        unset($_SESSION["id"]);

    }

    session_destroy();
    return array("status" => "SUCCESS");
}


function loadProjectInformation($id){
    $conn = connectionToDataBase();
    if($conn != null){
        $sql = "SELECT proy.nombre as nombreProy, prof.nombre as nombreProf, proy.estado, proy.cupo_limite, proy.descripcion FROM proyecto proy, profesor prof WHERE proy.id = '$id' AND proy.id_profesor = prof.id";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $response = array();
            while($row = $result -> fetch_assoc()){
                array_push($response, array('nombre' => $row['nombreProy'], 'profesor' => $row['nombreProf'], 'estado' => $row['estado'], 'cupo' => $row['cupo_limite'], 'descripcion' => $row['descripcion']));
            }
            return $response;
        } else{
            
            die('There was an error loading the project information');
        }
    }
    else{
        die('There was an error with the database connection');
    }
}

?>