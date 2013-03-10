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
    $template = (Yii::app()->user->role == "ar" ? "{update} {delete}" : "{update}");
    
    $columns = array_merge($columns, array(array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => $template,
    )));
} else {
    $columns = array_merge($columns, array(array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}',
    )));
}

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'tagihan-grid',
    'dataProvider' => $model->rekap(),
    'filter' => $model,
    'columns' => $columns,
));
?>
