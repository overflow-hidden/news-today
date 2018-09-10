<?php

include '../core/db.php';

class admin extends db{
    public function index(){


    $rows = $this->pdo->query("select * from news")->fetchAll();
      include '../views/admin/recommend.html';
    }
}