<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: V_Login.php");
    exit;
}