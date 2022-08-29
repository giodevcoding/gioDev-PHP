<?php
session_start();
ob_start();
include $_SERVER['DOCUMENT_ROOT']."/include/utils.php";
$password = false;
$username = false;

$_SESSION['giodev_admin'] = false;
if(isset($_POST['admin_username']) || isset($_POST['admin_password'])){
    $username = $_POST['admin_username'];
    $password = $_POST['admin_password'];

    if($username == 'temp_username' && $password == 'temp_password'){
        $_SESSION['giodev_admin'] = true;
    }
    unset($_POST['admin_username']);
    unset($_POST['admin_password']);
    exitAdmin();
}
function exitAdmin(){
    $host = getHome();
    header("Location: $host");
    ob_end_flush();
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h2>ADMIN LOGIN</h2>
        <form action="/giodev/admin/" method="post">
            Username <input type="text" name="admin_username"><br>
            Password: <input type="text" name="admin_password"><br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
