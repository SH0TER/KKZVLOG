<?php
require('view/header.php');
?>

    <section>
        <article>

            <?php if(!$page['article']){ ?>

                <h1>Даної статті не існує</h1>

            <?php }else{ ?>

                <div class="top">
                    <h2><?php echo $page['article']['title'] ?></h2>
                    <div class="data">
                        <span><?php echo $page['article']['data'] ?></span>
                    </div>
                </div>
                <div class="content">

                    <?php if($page['article']['imgUrl']){?>
                        <img src="<?php echo $page['article']['imgUrl'] ?>" alt="">
                    <?php } ?>

                    <p><?php echo $page['article']['text'] ?></p>
                </div>

            <?php } ?>

        </article>
        <div class="other-inf">

            <?php require('view/banners.php'); ?>

        </div>
    </section>
<?php
require('view/footer.php');
?>