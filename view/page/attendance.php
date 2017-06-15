<?php
require('view/header.php');
?>

<section>
    <div class="table-block " id="atten">
        <div class="caption">
            <a class="marks" href="<?php echo getLink('reportmark')?>"><h2>Успішність</h2></a>
            <a class="atten" href="<?php echo getLink('attendance')?>"><h2>Відвідуваність</h2></a>
        </div>
        <div class="content">
            <div class="text">
                <h4><?php echo $mainConfig['zvitInfo'] ?></h4>
            </div>
            <div class="main-table">
                <form id="reportForm" method="post" action="<?php echo getLink('attendance'); ?>">
                    <table  class="responstable" >

                        <tbody>
                        <tr>
                            <th><p></p></th>

                            <?php foreach ($page['days'] as &$value) { ?>

                                <th><p><?php echo $value['num'] ?></p></th>

                            <?php } ?>

                        </tr>

                        <?php foreach ($page['students'] as &$valueS) { ?>

                            <tr>
                                <td><p><?php echo $valueS['firstName'] ?></p></td>

                                <?php foreach ($valueS['points'] as &$valueP) { ?>

                                    <td><input type="text" value="<?php echo $valueP['point'] ?>" name="<?php echo $valueS['id'].'-'.$valueP['id_day'] ?>"></td>

                                <?php } ?>

                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                    <div class="submit">
                        <a href="<?php echo getLink('calendar')?>" class="button hidden">
                            <span>Календар</span>
                        </a>
                        <button class="hidden" value="update_point" name="update_point" type="submit">Зберегти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
require('view/footer.php');
?>
