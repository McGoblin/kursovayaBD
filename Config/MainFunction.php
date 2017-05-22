<?php
/**
 * Основные функции приложения
 */


/**
 * Функция выбора контролелера и действия
 * @param $controllerName
 * @param string $actionName
 */
function loadPage ($controllerName, $actionName = 'index'){
    include_once "Controller/" . $controllerName . "Controller.php";
    //подключаем функцию
    $function = $actionName . "Action";
    $function();
}

/**
 * Функция возвращает массив данных из запроса
 * @param $result результат запроса
 * @return array возвращаемый массив
 */
function assocArray($result){
    $res = array();
    while ($row = mysqli_fetch_assoc($result)){
        $res[] = $row;
    };
    return $res;
}

/**
 * Функция модифицирует дату в количество дней.
 * @param $Date получает дату
 * @return mixed возвращает количество дней
 */
function modifyDateToDays($Date){
    list ($tdYear, $tdMonth, $tdDay) = explode("-", $Date);
    $days = $tdDay + $tdMonth*30 + $tdYear*365;
    return $days;
}


/**
 * Функция для дебага
 * @param null $value для просмотра содержимого
 * @param int $die
 */
function d($value = null, $die = 1){
    echo 'Debug: <br /><pre>';
    print_r($value);
    echo '</pre>';

    if($die) die;
}