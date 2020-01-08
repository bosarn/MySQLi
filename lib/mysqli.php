<?php
require_once 'pwd/pwd.php';

function GetConnection()
{
    //Informatie database
    $host = '127.0.0.1';
    $user = 'root';
    $pwd = PwD();
    $db = 'datetime';

    //Nieuwe connectie
    $mysqli = new mysqli($host, $user, $pwd, $db);

    //Error weergeven als er iets fout gaat
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {
        //Als connectie gemaakt is, deze returnen
        return $mysqli;
    }
}

function resultToArray($result)
{
    $rows = array();

    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

function GetData($sql)
{

    $connection = GetConnection();

    //Data ophalen uit databank
    $result = $connection -> query($sql);

    //Resultaten in associative array zetten
    $rows = resultToArray($result);

    return $rows;
}