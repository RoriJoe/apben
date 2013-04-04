
<?php

$dipa[0] = array();
$dipa['edit'] = array(
    array(
        'label' => 'Edit DIPA Terbaru',
        'url' => array('/dipa/view/0')
    ),
    '---',
    array(
        'label' => 'Manage DIPA',
        'url' => array('/dipa/admin')
    ),
    array(
        'label' => 'Buat DIPA Baru',
        'url' => array('/dipa/create')
    ),
);

$dipa['view'] = array(
    array(
        'label' => 'Lihat DIPA Terbaru',
        'url' => array('/dipa/view/0')
    ),
    '---',
    array(
        'label' => 'Daftar DIPA',
        'url' => array('/dipa/admin')
    )
);

$realisasi[0] = array();
$realisasi['edit'] = array(
    array(
        'label' => 'Realisasi Tagihan',
        'url' => array('/tagihan/admin')
    ),
);

if (!Yii::app()->user->isGuest && User::itemAlias('ilang_ilangan', Yii::app()->user->role)) {
    $realisasi['edit'] = array_merge($realisasi['edit'], array(
        '---',
        array(
            'label' => 'Rekapitulasi Tagihan',
            'url' => array('/tagihan/rekap')
        ))
    );
}
if (!Yii::app()->user->isGuest && (Yii::app()->user->role == "ar")) {
    $realisasi['edit'] = array_merge($realisasi['edit'], array(
        '---',
        array(
            'label' => 'Buat Tagihan Baru',
            'url' => array('/tagihan/create')
        ))
    );
}

$realisasi['view'] = array(
    array(
        'label' => 'Daftar Tagihan',
        'url' => array('/tagihan/admin')
    ),
);

$master[0] = array();
$master['edit'] = array(
    array(
        'label' => 'Master Output',
        'url' => array('/masterOutput/admin')
    ),
    array(
        'label' => 'Master Suboutput',
        'url' => array('/masterSuboutput/admin')
    ),
    array(
        'label' => 'Master MAK',
        'url' => array('/masterMak/admin')
    ),
);

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
                    'items' => $dipa[Yii::app()->user->detail->menuMode('dipa')]
                ),
                array(
                    'visible' => !Yii::app()->user->isGuest && Yii::app()->user->detail->isMenuAllowed('realisasi'),
                    'label' => 'Realisasi Anggaran',
                    'icon' => 'pencil',
                    'url' => '#',
                    'items' => $realisasi[Yii::app()->user->detail->menuMode('realisasi')]
                ),
                array(
                    'visible' => !Yii::app()->user->isGuest && Yii::app()->user->detail->isMenuAllowed('master'),
                    'label' => 'Data Master',
                    'icon' => 'book',
                    'items' => $master[Yii::app()->user->detail->menuMode('master')]
                ),
                array(
                    'visible' => !Yii::app()->user->isGuest && Yii::app()->user->role != "admin",
                    'label' => 'Laporan',
                    'icon' => 'list-alt',
                    'items' => array(
                        array(
                            'label' => 'Laporan Realisasi',
                            'url' => array('/laporan/realisasi')
                        )
                    )
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