<?php
include_once 'database_operations.php';

$dbOps = new DatabaseOperations();

// Thêm người dùng
$dbOps->addUser("test_user", "password123");

        // Thêm thiết bị
        //$dbOps->addDevice("Light Bulb", "Lighting", "off", "Living Room");

        // Lấy danh sách thiết bị
        //$devices = $dbOps->getDevices();
        //print_r($devices);
?>
