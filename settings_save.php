<?php
    require 'db.php';
    $tenant_id=$_GET['tenant_id'];
    $client_id=$_GET['client_id'];
    $secret=$_GET['secret'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "UPDATE settings SET tenant_id = '$tenant_id', client_id = '$client_id', secret = '$secret';";
    $result = $conn->query($sql);
    $conn->close();
    header("Location: settings_page.php");
?>