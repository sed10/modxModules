<div class="block_wrapper">
    <?php foreach ($this->items as $sectionName => $value) { ?>

        <h3><a href="#">Раздел <?php echo $value->attributes->caption; ?></a></h3>
        <div>
            <ul class="section">
                <?php foreach ($value->attributes as $fieldName => $fieldValue): ?>
                    <li><span style="width:100px;float: left;"><?php echo $fieldName; ?></span> <input type="text" value="<?php echo $fieldValue; ?>"></li>
                <?php endforeach; ?>
            </ul>
            <?php foreach ($value->items as $key => $inneritems) { ?>
                <form action="" method="POST">
                    <?php
                    echo \Helper\Helper::genFormElem((object) array(
                                "type" => "hidden",
                                'name' => 'action',
                                "value" => "saveSection"
                    ));
                    echo \Helper\Helper::genFormElem((object) array(
                                'type' => 'hidden',
                                'name' => 'model',
                                'value' => \Helper\Helper::getClassName(get_class($this))
                    ));
                    echo \Helper\Helper::genFormElem((object) array(
                                'type' => 'hidden',
                                'name' => 'itemId',
                                'value' => $key
                    ));
                    echo \Helper\Helper::genFormElem((object) array(
                                'type' => 'hidden',
                                'name' => 'sectionName',
                                'value' => $sectionName
                    ));
                    ?>
                    <ul>
                        <?php foreach ($inneritems as $fieldName => $fieldValue) : ?>
                            <li><span style="width:100px;float: left;"><?php echo $fieldName; ?></span> 
                                <?php
                                echo \Helper\Helper::genFormElem((object) array(
                                            'type' => $this->types[$fieldName],
                                            'name' => $fieldName,
                                            'value' => $fieldValue)
                                );
                                ?></li>

                        <?php endforeach; ?>
                    </ul>
                    <?php
                    echo \Helper\Helper::genFormElem((object) array(
                                "type" => "submit",
                                "value" => "Сохранить"
                    ));
                    ?>
                </form>
                <?php
            }
            ?>
        </div>
        <?php
    }
    ?>
</div> 