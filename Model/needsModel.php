<?php
/**
 * Получает информацию о нуждах отдела в канцтоварах
 * @return array
 */
function getNeedsDep (){

    $sql = "
SELECT DISTINCT 
`otdel`.`name` AS dept,
`types_kt`.`typename` AS kanc,
`needs`.`value`AS need,
`vidano`.`number` AS otdali,
`sklad`.`number`AS ostatok
FROM `needs`
LEFT JOIN types_kt ON `needs`.`type_id`=`types_kt`.`id`
LEFT JOIN `otdel` ON `needs`.`odel_id`= `otdel`.`id`
LEFT JOIN `sklad` ON `needs`.`type_id`=`sklad`.`kanc_id`
LEFT JOIN `vidano` ON `needs`.`type_id`=`vidano`.`kanc_id`
ORDER BY dept ASC
";


    $result = mysqli_query(dbConect(), $sql);
    return assocArray($result);

}