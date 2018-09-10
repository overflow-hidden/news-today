<?php



if(isset($_GET['c'])){
    $className = $_GET['c'];

}else{
    $className = 'admin';
}
if(isset($_GET['m'])){
    $method = $_GET['m'];
}else{
    $method = 'index';
}
include '../controller/admin/'.$className . '.php';
$page = new $className;
$page->$method();