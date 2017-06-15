<?php
require('view/header.php');
global $User;
?>

<section>
    <div class="redactor">
        <form id="articleRedactor" action="
            <?php if(array_key_exists('article',$page)) echo getLink('newarticle').'update='.$page['article']['id'].'&';
            else echo getLink('newarticle')?>
                " method="post" enctype = 'multipart/form-data'>
            <div class="field">
                <label>Назва статті:</label>
                <div class="input">
                    <input type="text" name="title" value="<?php if(array_key_exists('article',$page)) echo $page['article']['title'] ?>" id="title">
                </div>
            </div>
            <div class="field">
                <label>Фото: (не обов'язково)</label>
                <div class="input"><input type="file" name="photo" multiple="" accept="image/*,image/jpeg"></div>
            </div>
            <div class="field">
                <label>Текст</label>
                <div class="input">
                    <textarea name="text" ><?php if(array_key_exists('article',$page)) echo $page['article']['text'] ?></textarea>
                </div>
            </div>
            <div class="submit">

                <?php if(array_key_exists('article',$page)){ ?>
                    <a href="<?php echo getLink('newarticle').'del='.$page['article']['id'].'&' ?>" class="button hidden" style="display: block;">
                        <span>Видалити статтю</span>
                    </a>
                <?php } ?>

                <button type="submit" name="articleData" value="<?php if(array_key_exists('article',$page)) echo $page['article']['id'] ?>" >Зберегти</button>
            </div>
        </form>
    </div>
    <div class="other-inf">

        <?php require('view/banners.php'); ?>

    </div>
</section>

<?php
require('view/footer.php');
?>
