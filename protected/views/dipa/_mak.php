<?php if (!$template): ?>
    <tr class="item mak" item-id="<?php echo $mak->id; ?>" item-uid="<?php echo $mak->uid; ?>" item-type="Mak">
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
            <?php echo $mak->kode; ?>
        </td>
        <td class="uraian">
            <div class="label pull-right">
                <?php echo $mak->sumber_dana; ?>
            </div>
            <?php
            if ($readonly) {
                echo $mak->detail->uraian;
            } else {
                echo CHtml::link($mak->detail->uraian, array('/dipa/update/' . $model->uid), array(
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
<?php else: ?>
    <tr class="item mak" item-id="[item-id]" item-uid="[item-uid]" item-type="Mak">
        <td class="kode">
            <?php if (!$readonly): ?>
                <div class="hapus btn btn-danger btn-mini pull-left">
                    <i class="icon-trash icon-white"></i>
                </div>
            <?php endif; ?>
            <span class="label label-important pull-left">
                <i class="icon-white icon-minus" style="display:none;"></i>
                <span>MAK</span>
            </span>
            [item-kode]
        </td>
        <td class="uraian">
            <div class="label pull-right">
                [item-sumber_dana]
            </div>
            [item-uraian]</td>
        <td class="volume"></td>
        <td class="freq"></td>
        <td class="tarif"></td>
        <td class="jumlah">[item-jumlah]</td>
    </tr>
    <?php
    echo $detailinput_new;
    echo str_replace("arrow-right", "arrow-down", $mak_new);
    ?>
<?php endif; ?>