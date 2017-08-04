<?php
/*** mysql hostname ***/
$hostname = 'mysql5.6';
/*** mysql username ***/
$username = 'root';
/*** mysql password ***/
$password = 'root';

function testdb_connect ($hostname, $username, $password){
    $dbh = new PDO("mysql:host=$hostname;dbname=mysql", $username, $password);
        return $dbh;
        }

        try {
            $dbh = testdb_connect ($hostname, $username, $password);
                echo 'Connected to database';
                } catch(PDOException $e) {
                    echo $e->getMessage();
                    }
