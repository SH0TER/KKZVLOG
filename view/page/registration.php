<?php
require('view/header.php');
?>

<section>
    <div class="sigin">
        <form id="loginForm" action="<?php echo getLink('registration')?>" method="post">
            <div class="info">
                <span>Форму реєстрації заповнють батьки студента!!!</span>
                <?php if($page['error']) { ?>
                    <div class="auth_error">
                        <span>Помилка</span>
                        <span>Спробуйте ще раз</span>
                    </div>
                <?php } ?>
            </div>
            <div class="field">
                <label>Логін:</label>
                <div class="input"><input type="text" name="login" value="<?php if($page['error']) echo $_POST['login'] ?>"></div>
            </div>
            <div class="field">
                <label>ПІБ (студента):</label>
                <div class="input"><input type="text" name="pib" value="<?php if($page['error']) echo $_POST['pib'] ?>"></div>
            </div>
            <div class="field">
                <label>Email:</label>
                <div class="input"><input type="email" name="email" value="<?php if($page['error']) echo $_POST['email'] ?>"></div>
            </div>
            <div class="field">
                <label>Адреса:</label>
                <div class="input"><input type="text" name="adress" value="<?php if($page['error']) echo $_POST['adress'] ?>"></div>
            </div>
            <div class="field">
                <label>Пароль:</label>
                <div class="input"><input type="password" name="password" value="" ></div>
            </div>
            <div class="field">
                <label>Повторіть пароль:</label>
                <div class="input"><input type="password" name="password2" value="" ></div>
            </div>
            <div class="submit">
                <a href="<?php echo getLink('sigin') ?>" class="reg-button">
                    <span>Війти</span>
                </a>
                <button name="reg" type="submit">Зареєструватися</button>
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
