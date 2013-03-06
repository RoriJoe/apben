
<?php

$this->widget('bootstrap.widgets.TbNavbar', array(
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.TbMenu',
            'items' => array(
                array(
                    'visible' => !Yii::app()->user->isGuest,
                    'label' => 'Data Anggaran',
                    'icon' => 'briefcase',
                    'url' => '#',
                    'items' => array(
                        array(
                            'label' => 'Edit DIPA Terbaru',
                            'url' => array('/dipa/view/0')
                        ),
                        '---',
                        array(
                            'label' => 'Buat DIPA Baru',
                            'url' => array('/dipa/create')
                        ),
                        array(
                            'label' => 'Manage DIPA',
                            'url' => array('/dipa/admin')
                        )
                    )
                ),
                array(
                    'visible' => !Yii::app()->user->isGuest,
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
                    ),
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