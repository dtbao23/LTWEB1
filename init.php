<?php
//khởi động session
session_start();

//thêm thông báo lỗi
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Kết nối DB
try 
{
    $db = new PDO('mysql:host=localhost;dbname=dbweb1;charset=utf8','root','');
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) 
{
    echo "Connection failed: " . $e->getMessage();
}

require_once 'functions.php';

// lấy thông tin user đã đăng nhập
$currentUser = getCurrentUser();
