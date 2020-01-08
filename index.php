<?php

require_once 'lib/mysqli.php';

$data = GetData("select * from gebruiker");
var_dump($data);