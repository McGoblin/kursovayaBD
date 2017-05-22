<?php
include_once "Model/PayVidatModel.php";
include_once "Model/needsModel.php";
include_once "Model/TotalModel.php";

function vidatAction (){
    $title = "Выдача канцтоваров";
    $NeedsDept = getNeedsDep();
    $dept = getDepts();
    $kanc = getKans();

    if ($_POST['vidat'] == "yes"){
        setVidaliOstatki ($_POST['dept'], $_POST['kanc'], $_POST['kol'],$NeedsDept);
        $_POST['vidat'] == "no";
        $_POST['dept']=null;
        $_POST['kanc']=null;
        $_POST['kol']=null;
    }


    // d($NeedsDep);
    include_once "View/header.php";
    include_once "View/VidatView.php";
    include_once "View/footer.php";
}

function payAction (){

    $NeedsDept = getNeedsDep();

    $kanc = getKans();
    $markets=getMakers();

    if ($_POST['pay'] == "add"){
        setSkladBalans ($_POST['market'], $_POST['kanc'], $_POST['kol'],$_POST['cast'],$NeedsDept);
        $_POST['pay'] == "no";
        $_POST['dept']=null;
        $_POST['kanc']=null;
        $_POST['kol']=null;
    }

    // d($NeedsDep);
    include_once "View/header.php";
    include_once "View/PayView.php";
    include_once "View/footer.php";
}