<?php

    //Извлечение статей
    $fields = array('id','title');

    $db = Conected::setConected();
    $articles = $db->select('articles', $fields, 10, '', 'data', false);

    $banerData['articles'] = $articles;
    unset($articles);
?>


<div class="last-post">
    <div class="title">
        <span>Нещодавні пости</span>
    </div>

    <?php foreach ($banerData['articles'] as $value){ ?>

        <div class="point">
            <a href="<?php echo getLink('article').'articleId='.$value['id'] ?>">
                <span><?php echo $value['title'] ?></span>
            </a>
        </div>

    <?php } ?>

</div>