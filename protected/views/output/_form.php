<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'output-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php
echo $form->dropDownListRow($model, 'kode', MasterOutput::getDropDownList(), array(
    'class' => 'span5',
    'maxlength' => 25,
    'options' => array($model->kode_uid . '-' . $model->kode => array('selected' => true))
));
?>

<?php echo $form->textFieldRow($model, 'satuan_target'); ?>


<div class="form-actions">
    <?php
    $path = Yii::app()->request->pathInfo . "?dpid=" . $model->dipa_uid . "&dpv=" . $model->dipa_version;
    $id = 'Output-' . Helper::rand();
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'ajaxSubmit',
        'url' => array($path),
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Rekam Output' : 'Save',
        'htmlOptions' => array(
            'id' => $id,
        ),
        'ajaxOptions' => array(
            'complete' => 'js:function(data) {
               item = $.parseJSON(data.responseText);

               if (!item.isnew) { 
                    row = $("#template .output-table").clone();
                    row.find(".newbtn").remove().end();
                    row = row.find("tbody");
               } else {
                    row = $("#template .output-table").clone();
               }
               
               row = row.html()
               .replace("[item-id]",item.id)
               .replace("[item-uid]",item.uid)
               .replace("[item-kode]",item.kode)
               .replace("[item-uraian]",item.uraian)
               .replace("[item-jumlah]",item.jumlah)
               .replace("[output_uid]",item.uid)
               .replace("[item-target]","")
               .replace("[item-satuan-target]",item.satuan_target);
               
               if (item.isnew) {
                   $(row).find("tr").each(function() {
                        $(this).appendTo("#dipa-table tbody");
                   });
               } else {
                    $(".output[item-id=" + item.id + "]").nextUntil(".item.output",".suboutput").each(function() {
                        $(this).find(".satuan_target").text(item.satuan_target);
                    });
                    
                    $(".output[item-id=" + item.id + "]").replaceWith($(row));
               }
               $(".modal-backdrop").click();
            }'
        )
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
