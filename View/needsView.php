<div align="center">
<table border="solid 1px black">
    <tr>
        <td>Отдел</td>
        <td>Канцтовар</td>
        <td>Потребность</td>
        <td>Выдано</td>
        <td>Надо довыдать</td>
        <td>Остаток на складе</td>
    </tr>
    <?php foreach ($NeedsDept as $value){?><tr>
        <?php
        if ($value['need']>$value['otdali']){
            $need = $value['need']- $value['otdali'];
        ?>
    <td><?php echo "{$value['dept']}";?></td>
    <td><?php echo "{$value['kanc']}";?></td>
    <td><?php echo "{$value['need']}";?></td>
    <td><?php echo "{$value['otdali']}";?></td>
    <td><?php echo "{$need}";?></td>
    <td><?php echo "{$value['ostatok']}";?></td>
    </tr><?php }}?>
</table>
</div>