<?php if (!$template): ?>
    <tr class="item suboutput" item-id="<?php echo $suboutput->id; ?>" item-uid="<?php echo $suboutput->uid; ?>" item-type="Suboutput">
        <td class="kode">
            <?php if (!$readonly): ?>
                <div class="hapus btn btn-danger btn-mini pull-left">
                    <i class="icon-trash icon-white"></i>
                </div>
            <?php endif; ?>
            <span class="label label-info pull-left">
                <i class="icon-white <?php echo $up_icon; ?>" style="display:none;"></i>
                <span>SUB</span>
            </span>
            <?php echo $suboutput->kode; ?>&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
        <td class="uraian">
            <div class="pull-right"  style="font-size:12px;">
                <span class="target">
                    <?php echo $suboutput->target; ?>
                </span>
                <span class="satuan_target">
                    <?php echo $suboutput->output->satuan_target; ?>
                </span>
            </div>
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
<?php else: ?>
    <tr class="item suboutput" item-id="[item-id]" item-uid="[item-uid]" item-type="Suboutput" >
        <td class="kode">
            <?php if (!$readonly): ?>
                <div class="hapus btn btn-danger btn-mini pull-left">
                    <i class="icon-trash icon-white"></i>
                </div>
            <?php endif; ?>
            <span class="label label-info pull-left">
                <i class="icon-white <?php echo $up_icon; ?>" style="display:none;"></i>
                <span>SUB</span>
            </span>
            [item-kode]&nbsp;&nbsp;&nbsp;&nbsp;
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
    echo $mak_new;
    echo str_replace("arrow-right", "arrow-down", $suboutput_new);
    ?>
<?php endif; ?>