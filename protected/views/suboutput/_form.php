<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'suboutput-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<?php
echo $form->dropDownListRow($model, 'kode', MasterSuboutput::getDropDownList(), array(
    'class' => 'span5',
    'maxlength' => 25,
    'options' => array($model->kode_uid . '-' . $model->kode => array('selected' => true))
));
?>
<?php
echo $form->textFieldRow($model, 'target', array(
    'class' => 'span2 pull-left',
    'append' => "<div>{$satuan_target}</div>"
));
?> 

<div class="clearfix"></div>

<div class="form-actions">
    <?php
    $path = Yii::app()->request->pathInfo . "?dpid=" . $model->dipa_uid . "&dpv=" . $model->dipa_version . "&oid=" . $model->output_uid;
    $id = 'SubOutput-' . Helper::rand();
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'ajaxSubmit',
        'url' => array($path),
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Rekam Suboutput' : 'Save',
        'htmlOptions' => array(
            'id' => $id,
        ),
        'ajaxOptions' => array(
            'complete' => 'js:function(data) {
               item = $.parseJSON(data.responseText);

               if (!item.isnew) { 
                    row = $("#template .suboutput-table").clone();
                    row.find(".newbtn").remove().end();
                    row = row.find("tbody");
               } else {
                    row = $("#template .suboutput-table").clone();
               }
               
               row = row.html()
               .replace("[item-id]",item.id)
               .replace("[item-uid]",item.uid)
               .replace("[item-kode]",item.kode)
               .replace("[item-uraian]",item.uraian)
               .replace("[item-jumlah]",item.jumlah)
               .replace("[output_uid]",item.output_uid)
               .replace("[suboutput_uid]",item.uid)
               .replace("[item-target]",item.target)
               .replace("[item-satuan-target]",item.satuan_target);
               
               target = $(".item.output[item-uid="+item.output_uid+"] .target").text() * 1;
               
               if (item.isnew) {
                   $anc = $(".item.output[item-uid="+item.output_uid+"]");
                   $anc = $anc.next();
                   while (($anc.hasClass("newbtn") ||  $anc.hasClass("suboutput") || $anc.hasClass("detail-input") || $anc.hasClass("mak")) && $anc.next().length > 0) {
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
                    $(".suboutput[item-id=" + item.id + "]").nextUntil(".item.suboutput",".suboutput").each(function() {
                        $(this).find(".satuan_target").text(item.satuan_target);
                    });
                    
                    target = target - ($(".suboutput[item-id=" + item.id + "] .target").text() * 1);
                    $(".suboutput[item-id=" + item.id + "]").replaceWith($(row));
               }
               $(".item.output[item-uid="+item.output_uid+"] .target").text(target + (item.target * 1));
               
               $(".modal-backdrop").click();
            }'
        )
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
