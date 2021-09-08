<?php

$sname= "localhost";

$unmae= 'root';

$password = '12345';

$db_name = "coacademy";

$conn = mysqli_connect($sname, $unmae, $password, $db_name, 3308);

if (!$conn) {

    echo "Connection failed!";

}

?>