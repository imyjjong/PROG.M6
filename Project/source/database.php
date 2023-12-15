<?php
    include 'config.php';
    function database_connect(){
        $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_SCHEMA);
        return $connection;
    }