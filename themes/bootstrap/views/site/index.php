<?php

/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<?php

$this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading' => 'Welcome to ' . CHtml::encode(Yii::app()->name),
));
?>

<p>Selamat Datang, silakan pilih menu di atas untuk memulai.</p>

<?php $this->endWidget(); ?>
