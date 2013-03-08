<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'mak-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<?php
echo $form->dropDownListRow($model, 'kode', MasterMak::getDropDownList(), array(
    'class' => 'span5',
    'maxlength' => 25,
    'options' => array($model->kode_uid . '-' . $model->kode => array('selected' => true))
));
?>
<div class="row span2" style="margin-left:0px;width:100px;">
    <?php echo $form->dropDownListRow($model, 'sumber_dana', MasterMak::sumberDanaList(), array('class' => 'span2', 'maxlength' => 25)); ?>
</div>

<div class="clearfix"></div>
<div class="form-actions">
    <?php
    $path = Yii::app()->request->pathInfo . "?dpid=" . $model->dipa_uid . "&dpv=" . $model->dipa_version . "&soid=" . $model->suboutput_uid;
    $id = 'SubOutput-' . Helper::rand();
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'ajaxSubmit',
        'url' => array($path),
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Submit MAK Baru' : 'Save',
        'htmlOptions' => array(
            'id' => $id,
        ),
        'ajaxOptions' => array(
            'complete' => 'js:function(data) {
               item = $.parseJSON(data.responseText);
               
               if (!item.isnew) { 
                    row = $("#template .mak-table").clone();
                    row.find(".newbtn").remove().end();
                    row = row.find("tbody");
               } else {
                    row = $("#template .mak-table").clone();
               }
               
               row = row.html()
               .replace("[item-id]",item.id)
               .replace("[item-uid]",item.uid)
               .replace("[item-kode]",item.kode)
               .replace("[item-uraian]",item.uraian)
               .replace("[item-sumber_dana]",item.sumber_dana)
               .replace("[suboutput_uid]",item.suboutput_uid)
               .replace("[mak_uid]",item.uid)
               .replace("[item-jumlah]",item.jumlah);
               
               if (item.isnew) {
                   $anc = $(".item.suboutput[item-uid="+item.suboutput_uid+"]");
                   $anc = $anc.next();
                   while (($anc.hasClass("newbtn") || $anc.hasClass("detail-input") || $anc.hasClass("mak")) && $anc.next().length > 0) {
                        $anc = $anc.next();
                   }
                   
                   if ($anc.next().length != 0) {
                        $anc = $anc.prev();
                   }
                   
                   $(row).find("tr").each(function() {
                        $(this).show().insertAfter($anc);
                        $anc = $(this);
                   });
               } else {
                    $(".mak[item-id=" + item.id + "]").replaceWith($(row));
               }
               
               $(".modal-backdrop").click();
            }'
        )
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
