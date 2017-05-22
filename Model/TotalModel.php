<?php
/**
 * Общие запросы
 *
 */

/**
 * Функция выдает список всех отделов
 * количество человек в нем
 */
function getDepts (){
    $sql = "SELECT * FROM `otdel`";
    $result = mysqli_query(dbConect(), $sql);
    return assocArray($result);
}

/** выдает список всех канцтоваров
 * @return array
 */
function getKans (){
    $sql = "SELECT * FROM `types_kt`";
    $result = mysqli_query(dbConect(), $sql);
    return assocArray($result);
}

function getMakers (){
    $sql = "SELECT * FROM `markets`";
    $result = mysqli_query(dbConect(), $sql);
    return assocArray($result);
}
function getKansAllInfo (){
    $sql = "
SELECT 
`kancelyary`.`art`, 
`types_kt`.`typename` as kanc, 
`kancelyary`.`lifeLenght` AS life
 FROM `types_kt`
 LEFT JOIN  `kancelyary` ON  `types_kt`.`id` = `kancelyary`.`type_id`";
    $result = mysqli_query(dbConect(), $sql);
    return assocArray($result);
}