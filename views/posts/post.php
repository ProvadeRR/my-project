<?php foreach ($data['post'] as $post):
    if($post['avaibility'] == true):?>
    <div class="container ">
                <h1 class='display-4 text-center align-items-center''><?=$post['title'];?></h1>
                <p class='lead''><?=$post['text'];?></p>
                <hr class='my-4''>
                <div class="div d-flex justify-content-between ">
                    <p class="text-left">Дата создания: <?=$post['date']?></p>
                    <p class="text-right">Автор: <?=$post['name']?></p>
                </div>
    <?php if(empty($data['object']->getName())){echo 'Авторизируйтесь , чтобы писать коментарии';}else{?>
            <div class="comentaries" style="margin-top: 150px">
                <form action="../addComentary" method="post">
                    <input type="text" id="inputLogin" autocomplete="off" name='comentary' class="form-control" placeholder="Введите комментарий" required="">
                    <input class="btn btn-outline-primary " name="<?=$post['id']?>" style="margin-top: 10px" type="submit">
                </form>
            </div>
            <?}?>
        <h3 class='display-5' style="margin-top: 10px;margin-bottom: 30px">Коментарии</h3>
        <?php  foreach ($data['comentaries'] as $comentary) {
            echo "<h4 class='text-left'>{$comentary['name']} {$comentary['surname']} </h4>";
            echo "<p class='text-left'>{$comentary['text']} </p>";
            }?>
    </div>
    <?php endif;if($post['avaibility']!=true) header('Location: http://portfolio.ua'); endforeach;

