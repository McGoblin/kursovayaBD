<div align="center">
    <h2>Список Поставщиков</h2>
    <table border="solid 1px black">
        <tr>
            <td>Поставщик</td>
            <td>Адрес</td>
        </tr>
        <?php foreach ($markets as $value){?><tr>
            <td><?php echo "{$value['name']}"?></td>
            <td><?php echo "{$value['adress']}"?></td>
            </tr><?php }?>
    </table>
</div>