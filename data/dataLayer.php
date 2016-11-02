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
            var_dump(json_encode($response));
            echo json_last_error();
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
?>
