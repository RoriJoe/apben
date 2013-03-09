<?php if (!$template): ?>
    <tr class="item output" item-id="<?php echo $output->id; ?>"
        item-uid="<?php echo $output->uid; ?>" item-type="Output">
        <td class="kode">
            <?php if (!$readonly): ?>
                <div class="hapus btn btn-danger btn-mini pull-left">
                    <i class="icon-trash icon-white"></i>
                </div>
            <?php endif; ?>
            <span class="label label-success pull-left">
                <i class="icon-white <?php echo $up_icon; ?>" style="display:none;"></i>
                <span>OUT</span>
            </span>
            <?php echo $output->kode; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
        <td class="uraian">
            <div class="pull-right" style="font-size:12px;">
                <span class="target">
                    <?php echo $output->target; ?>
                </span>
                <span class="satuan_target">
                    <?php echo $output->satuan_target; ?>
                </span>
            </div>
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
<?php else: ?>
    <tr class="item output" item-id="[item-id]" item-uid="[item-uid]" item-type="Output" >
        <td class="kode">
            <?php if (!$readonly): ?>
                <div class="hapus btn btn-danger btn-mini pull-left">
                    <i class="icon-trash icon-white"></i>
                </div>
            <?php endif; ?>
            <span class="label label-success pull-left">
                <i class="icon-white <?php echo $up_icon; ?>" style="display:none;"></i>
                <span>OUT</span>
            </span>
            [item-kode]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
        <td class="uraian">
            <div class="pull-right" style="font-size:12px;">
                <span class="target">
                    [item-target]
                </span>
                <span class="satuan_target">
                    [item-satuan-target]
                </span>
            </div>
            [item-uraian]</td>
        <td class="volume"></td>
        <td class="freq"></td>
        <td class="tarif"></td>
        <td class="jumlah">[item-jumlah]</td>
    </tr>
    <?php
    echo $suboutput_new;
    echo $output_new;
    ?>
<?php endif; ?>
