
<tr class="item output" item-id="<?php echo $output->id; ?>" item-type="Output">
    <td class="kode">
        <?php if (!$readonly): ?>
            <div class="hapus btn btn-danger btn-mini pull-left">
                <i class="icon-trash icon-white"></i>
            </div>
        <?php endif; ?>
        <span class="label label-success pull-left">
            <i class="icon-white icon-minus" style="display:none;"></i>
            <span>OUT</span>
        </span>
        <?php echo $output->kode; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </td>
    <td class="uraian">
        <?php
        if ($readonly) {
            echo $output->detail->uraian;
        } else {
            echo CHtml::link($output->detail->uraian, array('/dipa/update/' . $model->id), array(
                'data-toggle' => 'modal',
                'data-target' => '#OutputDialog',
                'onclick' => "window.data_id = {$output->id}; window.data_table = 'Output';",
                'class' => 'link'
            ));
        }
        ?>
    </td>
    <td class="volume"></td>
    <td class="freq"></td>
    <td class="tarif"></td>
    <td class="jumlah"><?php echo Format::currency($output->pagu); ?></td>
</tr>