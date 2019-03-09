<?php

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "planner");
define("DB_CHAR", "utf8");

function connect()
    {
        $dbh = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
        return $dbh;
    }

function get_all_data($sql, $dbh){
    $sth = $dbh->query($sql);
    $data = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}
