<?php
require('view/header.php');
?>

<section>
    <div class="group">
        <table class="group_tb">
            <tbody>
            <tr>
                <form action="<?php getLink('calendar') ?>" method="post" id="new_discipline">
                    <td class="input">
                        <input type="text" name="num">
                    </td>
                    <td>
                        <button type="submit" name="new_day"><p>Додати</p></button>
                    </td>
                </form>
            </tr>

            <?php foreach ($page['calendar'] as &$value) { ?>

                <tr>
                    <td>
                        <a href="#" class="stud_pib">
                            <p><?php echo $value['num'] ?></p>
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo getLink('calendar').'del='.$value['id']."&" ?>" class="stud_pib">
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
