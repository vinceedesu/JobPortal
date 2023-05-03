<?php
    function createDB($conn, $dbname){
    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS ".$dbname;
    $conn->query($sql);

    // Create Table
    function createTable($conn, $tablequery){
        $sql = "CREATE TABLE IF NOT EXISTS ".$tablequery;
        $conn->query($sql);
    }

    // Insert Data to Tablename(co)
    function insertData($conn, $dataquery, $valuequery){
        $sql = "INSERT INTO ".$dataquery."
        VALUES ".$valuequery;
        $conn->query($sql);
    }

    // Select Data from Table
    function selectData($conn, $tablename, $columnquery){
        $sql = "SELECT ".$columnquery." FROM ".$tablename;
        $result = $conn->query($sql);
        return $result;
    }

    // Select Data from Table Where...
    function selectWhere($conn, $tablename, $columnquery, $condition, $value){
        $sql = "SELECT $columnquery FROM $tablename
        WHERE $condition='$value'";
        $result = $conn->query($sql);
        return $result;
    }
    function sortData($conn, $tablename, $columnquery, $orderBy){
        $sql = "SELECT $columnquery FROM $tablename
        ORDER BY $orderBy";
        $result = $conn->query($sql);
        return $result;
    }
}