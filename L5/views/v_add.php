<div class="form">
    <form method="post">
        Category:<br>
        <select name="id_cat">
            <? foreach($cats as $cat): ?>
                <option value="<?=$cat['id_cat']?>"
                    <?=($cat['id_cat'] == $fields['id_cat'] ? 'selected' : '')?>
                >
                    <?=$cat['title']?>
                </option>
            <? endforeach; ?>
        </select><br>
        Name:<br>
        <input type="text" name="name" value="<?=$fields['name']?>"><br>
        Text:<br>
        <textarea name="text"><?=$fields['text']?></textarea><br>
        <button>Send</button>
        <p><?=$err?></p>
    </form>
</div>
