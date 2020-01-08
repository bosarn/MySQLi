<?php
require_once 'pwd/pwd.php';

function GetConnection()
{
    $host = '127.0.0.1';
    $user = 'root';
    $pwd = PwD();
    $db = 'datetime';
    $mysqli = new mysqli($host, $user, $pwd, $db);
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {
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

    //connect to mysqli database (Host/Username/Password)
    $connection = GetConnection();

    $sqli = mysqli_query($connection, "$sql");

    $result = $connection -> query("SELECT * FROM gebruiker");

    $rows = resultToArray($result);

    return $rows;
}