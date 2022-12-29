<?php
    $db = new mysqli("localhost", "root", "", "qlknh", "3306");
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    $db->set_charset("utf8");
?>