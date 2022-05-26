<?php
    require 'db.php';
    $mailto = $_GET['mailto'];
    $msg = $_GET['msg'];
    $email = $_GET['email'];
    $pwd = $_GET['pwd'];
    $host = $_GET['host'];
    $port = $_GET['port'];
    $sec = $_GET['sec'];
    $tenant_id=$_GET['tenant_id'];
    $client_id=$_GET['client_id'];
    $secret=$_GET['secret'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "UPDATE settings SET email = '$email', pwd = '$pwd', host = '$host',
            port = '$port', sec = '$sec', mailto = '$mailto', msg = '$msg',
            tenant_id = '$tenant_id', client_id = '$client_id', secret = '$secret';";
    $result = $conn->query($sql);
    $conn->close();
    header("Location: settings_page.php");
?>