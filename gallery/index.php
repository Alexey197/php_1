<?php

    $files = scandir('images');
    $images = array_filter($files, function ($f){
        return is_file("images/$f") && preg_match('/.*\.jpg$/', $f);
    });
/*
    foreach ($files as $f){
        if (is_file("images/$f") && preg_match('/.*\.jpg$/', $f)) {
            $images[] = $f;
        }
    }
*/
//    echo '<pre>';
//    print_r($files);
//    print_r($images);
//    echo '</pre>';
?>
<div class="gallery">
    <? foreach ($images as $img): ?>
    <img src="images/<?=$img?>" alt="" width="100">
    <? endforeach; ?>
</div>
