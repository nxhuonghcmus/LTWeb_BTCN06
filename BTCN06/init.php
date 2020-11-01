<?php
session_start();
ini_set ('display_errors', 1);  
ini_set ('display_startup_errors', 1);  
error_reporting (E_ALL);  
require_once 'functions.php';
//Kết nối MySQL
$db = new PDO('mysql:host=localhost;dbname=testdb;charset=utf8', 'root','');
// lấy thông tin user đã đăng nhập
$currentUser = getCurrentUser();