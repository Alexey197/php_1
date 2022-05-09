<?php

    declare(strict_types=1);
    include_once('functions.php');

    $articles = getArticles();

    var_dump(checkId($_GET['id'] ?? ''));

?>

<div class="articles">
    <? foreach ($articles as $id => $article): ?>
        <div class="article">
            <h2><?=$article['title']?></h2>
            <a href="index.php?id=<?=$article['id']?>">Read more</a>
        </div>
    <? endforeach; ?>
</div>

<div class="form">
      <form class="appForm" method="post">
        Name:<br>
        <input type="text" name="name"><br>
        Phone:<br>
        <input type="text" name="phone"><br>
        <button>Send</button>
        <p class="err"></p>
      </form>
</div>
<script>
  let form = document.querySelector('.appForm');
  let errorBox = document.querySelector('.err');

  form.addEventListener('submit', function(e){
    // e.preventDefault();

    let formData = new FormData(form);


    fetch('send.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.res) {
        form.innerHTML = 'Your app is done!!!'
      }
      else {
        errorBox.innerHTML = data.error
      }
    })
  });
</script>
