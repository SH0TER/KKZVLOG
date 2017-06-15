<?php
require('view/header.php');
global $mainConfig;
?>

    <section>
        <div class="sigin">
            <form id="configForm" action="<?php echo getLink('config')?>" method="post">
                <div class="info">
                </div>
                <div class="field">
                    <label>Назва порталу:</label>
                    <div class="input"><input type="text" name="portalName" value="<?php echo $mainConfig['siteTitle'] ?>"></div>
                </div>
                <div class="field">
                    <label>Слог:</label>
                    <div class="input"><input type="text" name="slog" value="<?php echo $mainConfig['slog'] ?>"></div>
                </div>
                <div class="field">
                    <label>Інформація на сторінці звітності:</label>
                    <div class="input"><input type="text" name="zvitInfo" value="<?php echo $mainConfig['zvitInfo'] ?>"></div>
                </div>
                <div class="field">
                    <label>Адреса групи в Фейсбуці:</label>
                    <div class="input"><input type="text" name="facebook" value="<?php echo $mainConfig['fbLink'] ?>"></div>
                </div>
                <div class="submit">
                    <button name="config" type="submit">Зберегти</button>
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