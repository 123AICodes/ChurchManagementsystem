<?php
require_once 'config/constants.php';
session_destroy();
header('location: ' . ROOT_URL . 'auth/login.php');
die();
