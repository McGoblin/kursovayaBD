<div align="center">
    <h2>Список Поставщиков</h2>
    <table border="solid 1px black">
        <tr>
            <td>Отдел</td>
            <td>Количество человек</td>
        </tr>
        <?php foreach ($deps as $value){?><tr>
            <td><?php echo "{$value['name']}"?></td>
            <td><?php echo "{$value['number']}"?></td>
            </tr><?php }?>
    </table>
</div>