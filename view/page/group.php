<?php
require('view/header.php');
global $User;
?>

<section>
    <div class="group">
        <table class="group_tb">
            <tbody>
                <?php if(!$page['students']) { ?>

                    <tr>
                        <td><a><p>Немає жодного зареєстрованого студента</p></a></td>
                    </tr>

                <?php }else{
                foreach ($page['students'] as &$value) { ?>

                    <tr>
                        <td>
                            <a href="<?php echo getLink('person').'id='.$value['id'].'&'; ?>" class="stud_pib">
                                <p><?php echo $value['firstName'] ?></p>
                            </a>
                        </td>

                        <?php if($User->getAccess() == 1) {?>

                            <?php if($value['status'] != 2){ ?>
                                <td>
                                    <a href="<?php echo getLink('person').'set='.$value['id'].'&'; ?>" class="stud_pib">
                                        <p>Підтвердити</p>
                                    </a>
                                </td>
                            <?php } ?>

                            <td>
                                <a href="<?php echo getLink('person').'del='.$value['id'].'&'; ?>" class="stud_pib">
                                    <p>Видалити</p>
                                </a>
                            </td>

                        <?php } ?>
                    </tr>

                <?php } }?>

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
