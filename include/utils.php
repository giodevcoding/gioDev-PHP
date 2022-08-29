<?php

    function gotoPage($host){
        header("Location: $host");
        exit;
    }

    function getSiteURL(){
        return (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    }

    function getHome(){
        return getSiteURL();
    }

    function getPage(){
        return getHost().$_SERVER['REQUEST_URI'];
    }

    function getAdmin(){
        if(isset($_SESSION['giodev_admin'])){
            return $_SESSION['giodev_admin'];
        }else{
            return "giodev_admin not set";
        }
    }

    function hasAdmin(){
        if(isset($_SESSION['giodev_admin'])){
            return $_SESSION['giodev_admin'] == 'true';
        }
        return false;
    }

     function consoleOut($string){
        $echo = $string;
        echo("<script>console.log(\"$string\")</script>");
    }

    function droot(){
        return $_SERVER['DOCUMENT_ROOT'];
    }

    function connectToDB($ip = "localhost", $dbname = "giodevDB", $user = "giodev", $pass = "temp_password"){
        try{
            $db = new PDO("mysql:host=$ip", $user, $pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->query("CREATE DATABASE IF NOT EXISTS $dbname");;
            $db->query("USE $dbname");
            consoleOut("DB CONNECTED");
        }catch(PDOException $e){
            consoleOut("COULD NOT CONNECT TO $ip");
            consoleOut($e->getMessage());
        }
        return $db;
    }

    function createTables($db){
        $db->query("CREATE TABLE IF NOT EXISTS projects (id int NOT NULL AUTO_INCREMENT, name varchar(255), link text, categories varchar(64), startDate date, endDate varchar(16), tools varchar(255), details text, PRIMARY KEY (id));");
        $db->query("CREATE TABLE IF NOT EXISTS projectimages (id int, url text);");
}
?>
