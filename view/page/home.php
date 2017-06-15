<?php
    require('view/header.php');
?>

<section>
    <div class="articles main-page">

        <?php foreach ($page['articles'] as &$value) { ?>

            <article>
                <div class="top">
                    <a href="index.php?view=article&articleId=<?php echo $value['id'] ?>">
                        <h3><?php echo $value['title'] ?></h3>
                    </a>
                    <div class="data">
                        <span><?php echo $value['data'] ?></span>
                    </div>
                </div>
                <div class="content">
                    <p> <?php echo $value['text'] ?> </p>
                </div>
                <a class="will-read" href="index.php?view=article&articleId=<?php echo $value['id']  ?>">
                    <span>Читати далі</span>
                </a>
            </article>
            
        <?php } ?>

    </div>
    <div class="other-inf">
        
        <?php require('view/banners.php'); ?>
        
    </div>
</section>

<?php
    require('view/footer.php');
?>
