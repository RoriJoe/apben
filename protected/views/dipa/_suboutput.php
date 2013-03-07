
<tr class="item suboutput" item-id="<?php echo $suboutput->id; ?>" item-type="Suboutput">
    <td class="kode">
        <?php if (!$readonly): ?>
            <div class="hapus btn btn-danger btn-mini pull-left">
                <i class="icon-trash icon-white"></i>
            </div>
        <?php endif; ?>
        <span class="label label-info pull-left">
            <i class="icon-white icon-minus" style="display:none;"></i>
            <span>SUB</span>
        </span>
        <?php echo $suboutput->kode; ?>&nbsp;&nbsp;&nbsp;&nbsp;
    </td>
    <td class="uraian">
        <?php
        if ($readonly) {
            echo $suboutput->detail->uraian;
        } else {
            echo CHtml::link($suboutput->detail->uraian, array('/dipa/update/' . $model->id), array(
                'data-toggle' => 'modal',
                'data-target' => '#SuboutputDialog',
                'onclick' => "window.data_id = {$suboutput->id}; window.data_table = 'Suboutput';",
                'class' => 'link'
            ));
        }
        ?>
    </td>
    <td class="volume"></td>
    <td class="freq"></td>
    <td class="tarif"></td>
    <td class="jumlah"><?php echo Format::currency($suboutput->pagu); ?></td>
</tr>