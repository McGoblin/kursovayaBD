<div align="center">
    <table border="solid 1px black">
        <tr>
            <td>Отдел</td>
            <td>Канцтовар</td>
            <td>Надо довыдать</td>
            <td>Остаток на складе</td>
        </tr>
        <?php foreach ($NeedsDept as $value) { ?>
            <tr>
            <?php
            if ($value['need'] > $value['otdali']) {
                $need = $value['need'] - $value['otdali'];

                ?>
                <td><?php echo "{$value['dept']}"; ?></td>
                <td><?php echo "{$value['kanc']}"; ?></td>
                <td><?php echo "{$need}"; ?></td>
                <td><?php echo "{$value['ostatok']}"; ?></td>
                </tr><?php }
        } ?>
    </table>

    <br/>

    <form method="post" action="/?controller=PayVidat&action=vidat">
        <input type="hidden" name="vidat" value="yes"/>
        <select name="dept">
            <?php foreach ($dept as $value) {
                echo "<option  value=\"{$value['id']}\"> {$value['name']} </option>";
            } ?>
        </select>
        <select name="kanc">
            <?php foreach ($kanc as $value) {
                echo "<option  value=\"{$value['id']}\"> {$value['typename']} </option>";
            } ?>
        </select>
        <input type="number" name="kol" min="1" value="1"/>
        <input type="submit" value="Выдать"/>

    </form>
</div>