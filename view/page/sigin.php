<?php
require('view/header.php');
?>

    <section>
        <div class="sigin">
            <form id="loginForm" action="index.php?view=sigin" method="POST">
                <?php if($page['error']) { ?>
                    <div class="info">
                        <span>Обліковий запис не знайдено</span><br/>
                        <span>Спробуйте ще раз</span>
                    </div>
                <?php } ?>
                <div class="field">
                    <label>Логін користувача:</label>
                    <div class="input"><input type="text" name="login" value="<?php if($page['error']) echo $_POST['login']?>" id="login"></div>
                </div>
                <div class="field">
                    <label>Пароль:</label>
                    <div class="input"><input type="password" name="password" value="" id="pass"></div>
                </div>
                <div class="submit">
                    <a href="<?php echo getLink('registration') ?>" class="reg-button">
                        <span>Зареєструватися</span>
                    </a>
                    <button name="in_sustem" type="submit">Війти</button>
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