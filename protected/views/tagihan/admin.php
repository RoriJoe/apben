<?php
$this->breadcrumbs = array(
    'Tagihan' => array('admin'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Tagihan', 'url' => array('index')),
    array('label' => 'Create Tagihan', 'url' => array('create')),
);
?>

<h1>Realisasi Tagihan</h1>

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
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => $columns,
));
?>
