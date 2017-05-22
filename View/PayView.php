<div align="center">
    <h2>Приобретение канцтоваров</h2>
    <form method="post" action="/?controller=PayVidat&action=pay">
        <input type="hidden" name="pay" value="add"/>
        <select name="market">
            <?php foreach ($markets as $value) {
                echo "<option  value=\"{$value['id']}\"> {$value['name']} </option>";
            } ?>
        </select>
        <select name="kanc">
            <?php foreach ($kanc as $value) {
                echo "<option  value=\"{$value['id']}\"> {$value['typename']} </option>";
            } ?>
        </select>
        <input type="number" name="kol" min="1" value="1"/>
        <input type="number" name="cast" min="1" value="1"/>
        <input type="submit" value="Купить"/>
    </form>
    <br/>

</div>