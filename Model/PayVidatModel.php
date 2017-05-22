<?php
/**
 * Функция вносит изменения в базу данных в части
 * Вставляет строку о том что канцтовар выдан
 * Обновляет раздел нужды отдела
 * Обновялет состояние склада
 * @param $dep индификатор отдела
 * @param $kanc индификатор канцтовара
 * @param $kol количество, выдаваемое
 * @param $NeedsDept
 */
function setVidaliOstatki($dep, $kanc, $kol, $NeedsDept)
{
    if (!isset($dep) or !isset($kanc) or !isset($kanc)) {
        echo "Проверьте правильно ли заполнены данные: </br>";
        echo "ид депертаемента = $dep </br>";
        echo "ид канцтоваров  =  $kanc </br>";
        echo "количество   = $kol </br>";
        die();
    }
    $date = date('Y/m/d');
//    d($date);
    $sql = "
INSERT INTO `vidano`(`otdel_id`, `kanc_id`, `number`, `date`)
VALUES ({$dep},{$kanc},{$kol},'{$date}')
";

    mysqli_query(dbConect(), $sql);

    foreach ($NeedsDept as $value) {
        if ($kanc == $value['kanc_id']) {
            $startCol = $value['col_na_sklad'];
            $startNeeds = $value['need'];

        }
    }
    $nd = $startNeeds - $kol;

    if (($startCol - $kol) > 0) {
        $sql = "
UPDATE `sklad` 
SET `number`=$startCol-$kol
WHERE `id` =$kanc";

        mysqli_query(dbConect(), $sql);
    } else {
        echo "Недостаточное количество на складе";
    }

    $sql = "
UPDATE `needs` 
SET `values`= {$nd}
WHERE `type_id` =$kanc and `odel_id` = {$dep}";
    mysqli_query(dbConect(), $sql);
}

function setSkladBalans($market, $kanc, $kol,$cast, $NeedsDept){

    foreach ($NeedsDept as $value) {
        if ($kanc == $value['kanc_id']) {
            $startCol = $value['col_na_sklad'];
        }
    }
    $newOstatok = $startCol+$kol;

    $sql = "UPDATE `sklad` 
            SET `cost`={$cast},`number`= $newOstatok
            WHERE `kanc_id`={$kanc}
";

    mysqli_query(dbConect(), $sql);


}
