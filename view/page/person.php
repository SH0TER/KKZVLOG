<?php
require('view/header.php');
global $User;
?>
<link rel="stylesheet" type="text/css" href="css/pages/person.css">
<section>
    <div class="about-person">
        <form id="personeRedactor" action="#" method="post">
            <div class="photo">
                <div class="now">
                    <img src="<?php echo $page['student_info']['photoUrl']?>">
                </div>
                <div class="field hidden">
                    <div class="input">
                        <input type="file" name="photo" multiple="" accept="image/*,image/jpeg">
                    </div>
                </div>
            </div>
            <div class="description">
                <div class="field">
                    <label>ПІБ:</label>
                    <div class="input">
                        <input type="text" name="pib" value="<?php echo $page['student_info']['firstName']?>" ">
                    </div>
                </div>
                <div class="field">
                    <label>Телефон:</label>
                    <div class="input">
                        <input type="text" name="phone" value="<?php echo $page['student_info']['phone']?>">
                    </div>
                </div>

                <?php if($User->getAccess() == 1){ ?>

                    <h4>Інформація про батьків</h4>
                    <div class="field">
                        <label>Мама (ПІБ):</label>
                        <div class="input">
                            <input type="text" name="mather_pib" value="<?php echo $page['parents']['mather_pib'] ?>" id="title">
                        </div>
                    </div>
                    <div class="field">
                        <label>Телефон:</label>
                        <div class="input">
                            <input type="text" name="mather_phone" value="<?php echo $page['parents']['mather_phone'] ?>" id="title">
                        </div>
                    </div>
                    <div class="field">
                        <label>Батько (ПІБ):</label>
                        <div class="input">
                            <input type="text" name="dad_pib" value="<?php echo $page['parents']['dad_pib'] ?>" id="title">
                        </div>
                    </div>
                    <div class="field">
                        <label>Телефон:</label>
                        <div class="input">
                            <input type="text" name="dad_phone" value="<?php echo $page['parents']['dad_phone'] ?>" id="title">
                        </div>
                    </div>

                <?php } ?>

            </div>
        </form>
    </div>
</section>

<?php
require('view/footer.php');
?>
