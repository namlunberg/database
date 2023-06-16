<table>
    <thead>
        <tr>
            <?foreach($thNames as $value){?>
            <th>
                <?=$value?>
            </th>
            <?}?>
            <th>del</th>
            <th>red</th>
        </tr>
    </thead>
    <tbody>
        <?foreach($tbVAlues as $string){?>
        <tr>
            <?foreach($string as $value){?>
            <td>
                <?=$value?>
            </td>
            <?}?>
            <td>
                <a href="/?mode=delete&id=<?=$string['id']?>">удалить</a>
            </td>
            <td>
                <a href="/?mode=update&id=<?=$string['id']?>">редактировать</a>
            </td>
        </tr>
        <?}?>
    </tbody>
</table>
<a href="/?mode=create">добавить нового работника</a>
<br>
<div style="display:flex;">
    <p style="margin-right:15px;">Навигация:</p>
    <div style="display:flex;">
    <?foreach ($navArray as $value){?>
        <p style="margin-right:15px;"><?=$value?></p>
    <?}?>
    </div>
</div>