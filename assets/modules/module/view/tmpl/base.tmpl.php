<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ertertertert</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">        
        <?php echo $this->getBlock('styles') ?>
        <?php echo $this->getBlock('scripts') ?>
        <?php echo $this->getBlock('header') ?>

    </head>
    <body>
<!--       <?php var_dump($_REQUEST); ?>
        <a href="index.php?a=112&id=2&test" >Установить модуль</a>-->
        <div class="body_inner">
            <?php echo $this->getBlock('body') ?>
        </div>
    </body>
</html>