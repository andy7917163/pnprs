<?php

$pdo = new PDO('pgsql:host=postgres;dbname=mydb;port=5432','pgsql','pgsql');
var_dump($pdo);