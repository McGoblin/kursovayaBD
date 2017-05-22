<?php
/**
 * Функция получает текущие остатаки на складе
 * @return array
 */
function getStockBalanse(){
   $sql = "SELECT `sklad`.`id`, `types_kt`.`typename`, `sklad`.`number`
           FROM `sklad`
           LEFT JOIN `types_kt` ON `sklad`.`kanc_id` = `types_kt`.`id`; ";
    $result = mysqli_query(dbConect(), $sql);
    return assocArray($result);
}

/**Функция получает информацию о том, какие канцтовары находятся на руках
 *
 * @return array
 */
function getAccInDep (){
    $sql = "
SELECT  `vidano`.`number`, `kancelyary`.lifeLenght, `types_kt`.`typename`, `otdel`.`name`, `vidano`.`date`, `vidano`.`date`+`kancelyary`.`lifeLenght` as death
FROM `vidano`
LEFT JOIN `types_kt` ON `vidano`.`kanc_id`=`types_kt`.id
LEFT JOIN `otdel` ON `vidano`.`otdel_id`= `otdel`.`id`
LEFT JOIN `kancelyary` ON `vidano`.`kanc_id`=`kancelyary`.id
ORDER BY death DESC;
    ";
    $result = mysqli_query(dbConect(), $sql);
    return assocArray($result);
}
