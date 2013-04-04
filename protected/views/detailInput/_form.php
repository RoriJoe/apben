<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'detail-input-form',
    'enableAjaxValidation' => false,
        ));
?>

<script type="text/javascript" src="<?php echo $this->staticUrl . "/js/jquery.maskMoney.js"; ?>"></script>
<?php $this->widget('ext.moneymask.MMask',array(
    'element' => '#DetailInput_tarif',
    'currency' => 'IDR',
    'config' => array(
        'showSymbol' => false,
        'thousands' => '.',
        'decimal' => ',',
        'precision' => 0
    )
)); ?>

<?php echo $form->textFieldRow($model, 'uraian', array('class' => 'span5', 'maxlength' => 255)); ?>

<div style="float:left;">
    <?php echo $form->textFieldRow($model, 'volume', array('class' => 'span2', 'maxlength' => 20)); ?>
</div>
<div style="float:left;margin-left:20px;">
    <?php echo $form->textFieldRow($model, 'satuan_volume', array('class' => 'span1', 'maxlength' => 25)); ?>
</div>

<div class="clearfix"></div>

<div style="float:left;">
    <?php echo $form->textFieldRow($model, 'frequensi', array('class' => 'span2', 'maxlength' => 20)); ?>
</div>
<div style="float:left;margin-left:20px;">
    <?php echo $form->textFieldRow($model, 'satuan_frequensi', array('class' => 'span1', 'maxlength' => 25)); ?>
</div>


<div class="clearfix"></div>

<?php echo $form->textFieldRow($model, 'tarif', array('class' => 'span2', 'maxlength' => 20, 'prepend' => '<div>Rp</div>')); ?>


<div class="form-actions">
    <?php
    $path = Yii::app()->request->pathInfo . "?dpid=" . $model->dipa_uid . "&dpv=" . $model->dipa_version . "&mid=" . $model->mak_uid;
    $id = 'DetailInput-' . Helper::rand();
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'ajaxSubmit',
        'url' => array($path),
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Rekam Detail Input' : 'Save',
        'htmlOptions' => array(
            'id' => $id,
        ),
        'ajaxOptions' => array(
            'beforeSend' => 'js:function() {
                $("<img src=\"'.$this->createUrl('/static/images/loading.gif').'\" />").insertAfter("#'.$id.'");
                $("#'.$id.'").remove();
            }',
            'complete' => 'js:function(data) {
               try {
               item = $.parseJSON(data.responseText);
               } catch(e) {
                    $("#DetailInputDialog .modal-content").html(data.responseText);
                    return false;
               }
               
               if (!item.isnew) { 
                    row = $("#template .detailinput-table").clone();
                    row.find(".newbtn").remove().end();
                    row = row.find("tbody");
               } else {
                    row = $("#template .detailinput-table").clone();
               }
               
               row = row.html()
               .replace("[item-id]",item.id)
               .replace("[item-uid]",item.uid)
               .replace("[item-kode]",item.kode)
               .replace("[item-uraian]",item.uraian)
               .replace("[mak_uid]",item.uid)
               .replace("[item-volume]",item.volume)
               .replace("[item-tarif]",item.tarif)
               .replace("[item-freq]",item.freq)
               .replace("[item-jumlah]",item.jumlah);
               
               if (item.isnew) {
                   $anc = $(".item.mak[item-uid="+item.mak_uid+"]");
                   $anc = $anc.next();
                   while (($anc.hasClass("newbtn") || $anc.hasClass("detail-input")) && $anc.next().length > 0) {
                        $anc = $anc.next();
                   }
                   
                   if ($anc.next().length != 0) {
                        $anc = $anc.prev();
                   }
                   
                   $(row).find("tr").each(function(i,item) {
                        if (i == 0) $(this).show();
                        $(this).insertAfter($anc);
                        $anc = $(this);
                   });
               } else {
                    $(".detail-input[item-id=" + item.id + "]").replaceWith($(row));
               }

               $(".modal-backdrop").click();
            }'
        )
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
