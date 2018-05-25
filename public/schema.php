<?php

namespace PHP;

require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHP\DbConnection;

$conn= new DbConnection();
$DBH= $conn->getConnection();

if ($argv[1] === 'create-schema') {
    $sql = "create table user (id int not null auto_increment,
    name varchar(30) not null,
    phone varchar(15) not null,
    gender varchar(6),
    email varchar(30) not null,
    username varchar(15) not null,
    password varchar(15) not null,
    primary key(id));";
    $DBH->exec($sql);
}

if ($argv[1] == "delete-schema") {
    $sql = "drop table user;";
    $DBH->exec($sql);
}
