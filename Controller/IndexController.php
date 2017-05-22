<?php
include_once "Model/IndexModel.php";

function indexAction (){
    $title = "Главная страница";
    $stockBalanse = getStockBalanse();
    $accInDep = getAccInDep();

    //d($accInDep);
    include_once "View/header.php";
    include_once "View/indexView.php";
    include_once "View/footer.php";
}