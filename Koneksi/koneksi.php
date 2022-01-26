<?php

try {
    $con = new PDO('mysql:host=localhost;dbname=ekuesioner', 'root','',array(PDO::ATTR_PERSISTENT=>true));
}

catch (PDOException $e){
    echo $e->getMessage();
}
?>