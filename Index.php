<?php
header("Content-Type: text/html; charset=utf-8"); // устанавливаем кодировку
require_once "Config/db.php"; //модуль подклчюения к базе данных
require_once "Config/MainFunction.php"; // модуль основных функций

//Определяем какой контролер будет работать
$controllerName = isset($_GET['controller'])?ucfirst($_GET['controller']):'Index';

//Определяем какой акшн будет работать
$actionName = isset($_GET['action'])?ucfirst($_GET['action']):'Index';

loadPage($controllerName, $actionName);


dbDisconect();
