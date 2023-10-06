<?php
define('Root', dirname(__FILE__));
    error_reporting(E_ALL);

    require_once Root . '../DatabaseConnection.php';
    require_once Root . '../DAL/StudentDAO.php';
    require_once Root . '../BLL/StudentBLO.php';
    require_once Root . '../Entities/Student.php';

