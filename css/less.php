<?php
require $_SERVER['DOCUMENT_ROOT']."/css/lessc.inc.php";
include_once $_SERVER['DOCUMENT_ROOT']."/include/utils.php";
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

$_SESSION['lessc'] = new lessc;


$current = "";
function isLessNew(){
    global $current;
    $current = file_get_contents(droot()."/css/giodev.less");
    $last = file_get_contents(droot()."/css/lastcompile.less");
    if($current == $last){
        return false;
    }else{
        return true;
    }
}

function copyLess(){
    global $current;
    file_put_contents(droot()."/css/lastcompile.less", $current);

}

function compileLess(){
    if(isLessNew()){
        $less = $_SESSION['lessc'];
        try{
            $less->checkedCompile(droot()."/css/giodev.less", droot()."/css/giodev.css");
        }catch (Exception $e){
            consoleOut($e->getMessage());
        }
        copyLess();
        consoleOut("Updated giodev.css");
    }else{
        consoleOut("giodev.css is up to date.");
    }
}
?>
