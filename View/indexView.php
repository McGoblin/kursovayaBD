<?php 
	echo "<h2 align='center'>Остатки на складе на ". date('d M Y') ."</h2>";
?>
<div align="center">
<table border="solid 1px black">
    <tr>
        <td>Наименование товара</td>
        <td>Остаток на складе</td>
    </tr>
    <?php foreach ($stockBalanse as $value){?><tr>
        <td><?php echo "{$value['typename']}"?></td>
        <td><?php echo "{$value['number']}"?></td>
    </tr><?php }?>
</table>
</div>
<?php
echo "<h2 align='center'>Скоро закончиться срок службы следующих канцтоваров:</h2>";
?>
<div align="center">
<table border="solid 1px black">
    <tr>
        <td>Отдел</td>
        <td>Канцтовар</td>
        <td>Дата выдачи</td>
        <td>Количество</td>
        <td>Когда истечет</td>
    </tr>
    <?php foreach ($accInDep as $value){?><tr>
        <?php
        $resurse = intval($value['lifeLenght']) -
            (modifyDateToDays($today = date('Y-m-d')) - modifyDateToDays($value['date']));
        if ($resurse > 0 ){
        ?>
        <td><?php echo "{$value['name']} "?></td>
        <td><?php echo "{$value['typename']}"?></td>
        <td><?php echo "{$value['date']}"?></td>
        <td><?php echo "{$value['number']}"?></td>
        <td><?php

            echo "{$resurse} дней";
        echo "{$Death}";?></td>
        </tr><?php }}?>
</table>
</div>
