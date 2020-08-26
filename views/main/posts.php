<?php foreach ($data['posts'] as $post):;
    if($post['avaibility'] == true):?>
        <div class="container">
            <div class='jumbotron '>
                <h1 class='display-4''><?=$post['title'];?></h1>
                <p class='lead''><?=$post['small_text'];?></p>
                <hr class='my-4''>
                <p>Автор: <?php if(empty($post['name'])) {echo 'Автор удален';} else {echo $post['name'];}?></p>
                <a class='btn btn-primary btn-lg' href='post/<?=$post['id']?>' role='button'>Читать далее</a>
            </div>
        </div>
    <?php endif; endforeach;;