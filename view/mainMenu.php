<?php
global $User;
global $view;
?>
<nav>
    <div class="nav-content">
        <div class="main-menu">
            <a href="index.php">
                <span>Новини</span>
            </a>

            <?php if(!$User->getStatus() == 0){ ?>
                <a href="<?php echo getLink('reportmark') ?>">
                    <span>Звітність</span>
                </a>
            <?php } ?>

            <?php if($User->isIdentificate()){ ?>
                <a href="<?php echo getLink('group') ?>">
                    <span>Наша група</span>
                </a>
                <a href="<?php echo getLink('anketa') ?>">
                    <span>Моя анкета</span>
                </a>
            <?php } ?>

            <?php if(!$User->getStatus() == 0){ ?>
                <a href="<?php echo getLink('config') ?>">
                    <span>Налаштування</span>
                </a>
            <?php } ?>

        </div>
        <div class="links">

            <?php if($view == 'article' && $User->getAccess() == 1){?>
                <a href="<?php echo getLink('newarticle').'update='.$page['article']['id'].'&' ?>" id="">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
            <?php } ?>

            <?php if($view == 'newarticle' && $User->getAccess() == 1){?>
                <a href="<?php echo getLink('newarticle') ?>" id="">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
            <?php } ?>

            <?php if(($view == 'reportmark' || $view == 'attendance') && $User->getAccess() == 1){?>
                <a href="#" id="repotrRedact">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
            <?php } ?>

            <?php if($view == 'anketa'){?>
                <a href="" id="personeRedsct">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
            <?php } ?>

            <?php if(!$User->isIdentificate()){ ?>
                <a href="<?php echo getLink('sigin')?>">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                </a>
            <?php }else{ ?>
                <a href="<?php echo getLink('sigout')?>">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                </a>
            <?php } ?>

            <a href="<?php echo $mainConfig['fbLink'] ?>">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</nav>