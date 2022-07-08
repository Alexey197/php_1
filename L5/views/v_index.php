<h1>Chat</h1>
<a href="add.php">add</a>
<a href="index.php?view=table">View as table</a>
<div>
    <? foreach ($messages as $message): ?>
        <div>
            <strong><?=$message['name']?></strong>
            <em><?=$message['dt_add']?></em>
            <div>
                <?=$message['text']?>
            </div>
            <hr>
        </div>
    <? endforeach; ?>
</div>
