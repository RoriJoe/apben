
<tr class="item mak" item-id="<?php echo $mak->id; ?>" item-type="Mak">
    <td class="kode">
        <?php if (!$readonly): ?>
            <div class="hapus btn btn-danger btn-mini pull-left">
                <i class="icon-trash icon-white"></i>
            </div>
        <?php endif; ?>
        <div class="label label-important pull-left">
            <i class="icon-white icon-minus" style="display:none;"></i>
            <span>MAK</span>
        </div>
        <?php echo $mak->kode; ?>&nbsp;&nbsp;
    </td>
    <td class="uraian">
        <div class="label pull-right">
            <?php echo $mak->sumber_dana; ?>
        </div>
        <?php
        if ($readonly) {
            echo $mak->detail->uraian;
        } else {
            echo CHtml::link($mak->detail->uraian, array('/dipa/update/' . $model->id), array(
                'data-toggle' => 'modal',
                'data-target' => '#MakDialog',
                'onclick' => "window.data_id = {$mak->id}; window.data_table = 'Mak';",
                'class' => 'link'
            ));
        }
        ?>
    </td>
    <td class="volume"></td>
    <td class="freq"></td>
    <td class="tarif"></td>
    <td class="jumlah"><?php echo Format::currency($mak->pagu); ?></td>
</tr>