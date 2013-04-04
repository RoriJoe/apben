<?php
$this->breadcrumbs = array(
    'Tagihan' => array('rekap'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Tagihan', 'url' => array('index')),
    array('label' => 'Create Tagihan', 'url' => array('create')),
);
?>

<h1>Rekapitulasi Tagihan</h1>

<?php
$columns = User::itemAlias('realisasi_view', Yii::app()->user->role);

if (Yii::app()->user->detail->menuMode('realisasi') == "edit") {
    if (Yii::app()->user->role == "psptb") {
        $columns = array_merge($columns, array(array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{update} {view}',
                'buttons' => array(
                    'update' => array(
                        'url' => 'Yii::app()->createUrl("tagihan/update/" . $data->id . "?redir=rekap")',
                    ),
                    'view' => array(
                        'label' => 'Lihat SPTB',
                        'url' => 'Yii::app()->createUrl("tagihan/sptb/" . $data->id . "?redir=rekap")',
                    )
                )
        )));
    } else {
        $template = (Yii::app()->user->role == "ar" ? "{update} {delete}" : "{update}");
        $columns = array_merge($columns, array(array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => $template,
                'buttons' => array(
                    'update' => array(
                        'url' => 'Yii::app()->createUrl("tagihan/update/" . $data->id . "?redir=rekap")',
                    )
                )
        )));
    }
} else {
    $columns = array_merge($columns, array(array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}',
            'buttons' => array(
                'view' => array(
                    'url' => 'Yii::app()->createUrl("tagihan/update/" . $data->id . "?redir=rekap")',
                )
            )
    )));
}

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'tagihan-grid',
    'dataProvider' => $model->rekap(),
    'filter' => $model,
    'columns' => $columns,
));
?>
