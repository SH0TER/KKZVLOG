<?php
require('view/header.php');
?>

<section>
    <div class="table-block">
        <div class="caption">
            <a class="marks" href="<?php echo getLink('reportmark')?>"><h2>Успішність</h2></a>
            <a class="atten" href="<?php echo getLink('attendance')?>"><h2>Відвідуваність</h2></a>
        </div>
        <div class="content">
            <div class="text">
                <h4><?php echo $mainConfig['zvitInfo'] ?></h4>
            </div>
            <div class="main-table">
                <form id="reportForm" method="post" action="<?php echo getLink('reportmark'); ?>">
                    <table  class="responstable" >

                        <tbody>
                            <tr>
                                <th><p></p></th>

                                <?php foreach ($page['disciplines'] as &$value) { ?>

                                    <th><p><?php echo $value['name'] ?></p></th>

                                <?php } ?>

                                <th><p>Середній бал</p></th>

                            </tr>

                            <?php foreach ($page['students'] as &$valueS) { ?>

                                <tr>
                                    <td><p><?php echo $valueS['firstName'] ?></p></td>

                                    <?php foreach ($valueS['marks'] as &$valueM) { ?>

                                        <td><input type="text" value="<?php echo $valueM['mark'] ?>" name="<?php echo $valueS['id'].'-'.$valueM['id_discipline'] ?>"></td>

                                    <?php } ?>

                                    <td><input type="text" value="<?php echo $valueS['centerMark']?>"></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                    <div class="submit">
                        <a href="<?php echo getLink('discipline')?>" class="button hidden">
                            <span>Редактор дисциплін</span>
                        </a>
                        <button class="hidden" value="updete_mark" name="update_mark" type="submit">Зберегти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
require('view/footer.php');
?>
