<?php
include_once "Model/TotalModel.php";





function nomenklaturaAction (){
    $kanc = getKansAllInfo();


    include_once "View/header.php";
    include_once "View/kancView.php";
    include_once "View/footer.php";
}


function marketsAction (){
    $markets = getMakers();

    include_once "View/header.php";
    include_once "View/marketView.php";
    include_once "View/footer.php";

}

function deptsAction (){
    $deps = getDepts();

    include_once "View/header.php";
    include_once "View/depsView.php";
    include_once "View/footer.php";
}


