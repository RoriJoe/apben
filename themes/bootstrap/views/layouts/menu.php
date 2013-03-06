
<?php

$this->widget('bootstrap.widgets.TbNavbar', array(
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.TbMenu',
            'items' => array(
                array(
                    'label' => 'Data Anggaran',
                    'icon' => 'briefcase',
                    'url' => '#'
                ),
                array(
                    'label' => 'Data Master',
                    'icon' => 'book',
                    'items' => array(
                        array(
                            'label' => 'Master Output',
                            'url' => array('/masterOutput/admin')
                        ),
                        array(
                            'label' => 'Master Suboutput',
                            'url' => array('/masterSubOutput/admin')
                        ),
                        array(
                            'label' => 'Master MAK',
                            'url' => array('/masterMak/admin')
                        ),
                    )
                ),
            ),
        ),
        //#####################################################//
        array(
            'class' => 'bootstrap.widgets.TbMenu',
            'htmlOptions' => array('class' => 'pull-right'),
            'items' => array(
                array(
                    'label' => 'Login',
                    'url' => array('/site/login'),
                    'visible' => Yii::app()->user->isGuest,
                ),
                array(
                    'label' => 'Logout (' . Yii::app()->user->name . ')',
                    'url' => array('/site/logout'),
                    'visible' => !Yii::app()->user->isGuest,
                )
            ),
        ),
    ),
));
?>