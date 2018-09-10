<?php
include '../controller/index/page.php';

$className = $_GET['c'];
$method = $_GET['m'];
$page = new $className;
$page->$method();