<div align="center">
    <h2>Список канцтоваров</h2>
    <table border="solid 1px black">
        <tr>
            <td>Канцтовар</td>
            <td>артикул</td>
            <td>Срок годности</td>
        </tr>
        <?php foreach ($kanc as $value){?><tr>
            <td><?php echo "{$value['kanc']}"?></td>
            <td><?php echo "{$value['art']}"?></td>
            <td><?php echo "{$value['life']}"?></td>
            </tr><?php }?>
    </table>
</div>