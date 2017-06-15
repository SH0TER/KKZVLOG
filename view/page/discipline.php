<?php
require('view/header.php');
?>

<section>
    <div class="group">
        <table class="group_tb">
            <tbody>
            <tr>
                <form action="<?php getLink('discipline') ?>" method="post" id="new_discipline">
                    <td class="input">
                        <input type="text" name="discipline">
                    </td>
                    <td>
                        <button type="submit" name="new_discipline"><p>Додати</p></button>
                    </td>
                </form>
            </tr>

            <?php foreach ($page['disciplines'] as &$value) { ?>

                <tr>
                    <td>
                        <a href="#" class="stud_pib">
                            <p><?php echo $value['name'] ?></p>
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo getLink('discipline').'del='.$value['id']."&" ?>" class="stud_pib">
                            <p>Видалити</p>
                        </a>
                    </td>
                </tr>

            <?php } ?>


            </tbody>
        </table>

    </div>
    <div class="other-inf">

        <?php require('view/banners.php'); ?>

    </div>
</section>

<?php
require('view/footer.php');
?>
