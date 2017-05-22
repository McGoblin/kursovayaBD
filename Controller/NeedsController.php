<?php

include_once "Model/needsModel.php";

function indexAction (){
    $title = "Потребность";
    $NeedsDept = getNeedsDep();
    // d($NeedsDep);
    include_once "View/header.php";
    include_once "View/needsView.php";
    include_once "View/footer.php";
}