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

function loadProjectInformation($id){
    $conn = connectionToDataBase();
    if($conn != null){
        $sql = "SELECT proy.nombre as nombreProy, prof.nombre as nombreProf, proy.estado, proy.cupo_limite, proy.descripcion FROM proyecto proy, profesor prof WHERE proy.id = '$id' AND proy.id_profesor = prof.id";
    }
}
?>