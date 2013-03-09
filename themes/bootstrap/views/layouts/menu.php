
<?php

$this->widget('bootstrap.widgets.TbNavbar', array(
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.TbMenu',
            'items' => array(
                array(
                    'visible' => !Yii::app()->user->isGuest && Yii::app()->user->detail->isMenuAllowed('dipa'),
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
                    'visible' => !Yii::app()->user->isGuest && Yii::app()->user->detail->isMenuAllowed('realisasi'),
                    'label' => 'Realisasi Anggaran',
                    'icon' => 'pencil',
                    'url' => '#',
                    'items' => array(
                        array(
                            'label' => 'Manage Tagihan',
                            'url' => array('/tagihan/admin')
                        ),
                        '---',
                        array(
                            'label' => 'Buat Tagihan Baru',
                            'url' => array('/tagihan/create')
                        ),
                    )
                ),
                array(
                    'visible' => !Yii::app()->user->isGuest && Yii::app()->user->detail->isMenuAllowed('master'),
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
                array(
                    'visible' => !Yii::app()->user->isGuest && Yii::app()->user->detail->isMenuAllowed('user'),
                    'label' => 'Manage User',
                    'icon' => 'user',
                    'url' => '#',
                    'items' => array(
                        array(
                            'label' => 'Manage User',
                            'url' => array('/user/admin')
                        ),
                        '---',
                        array(
                            'label' => 'Buat User Baru',
                            'url' => array('/user/create')
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
                    'label' => 'Roles',
                    'icon' => 'user',
                    'url' => array('#'),
                    'items' => Yii::app()->user->detail->roles_menu,
                    'visible' => !Yii::app()->user->isGuest && Yii::app()->user->detail->roles_count > 1,
                ),
                array(
                    'label' => 'Login',
                    'url' => array('/site/login'),
                    'visible' => Yii::app()->user->isGuest,
                ),
                array(
                    'label' => 'Logout (' . Yii::app()->user->detail->nama . ')',
                    'url' => array('/site/logout'),
                    'visible' => !Yii::app()->user->isGuest,
                )
            ),
        ),
    ),
));
?>