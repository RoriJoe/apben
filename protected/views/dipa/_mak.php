
<tr class="mak">
    <td class="kode">
        <span class="label label-important pull-left">MAK</span>
        <?php echo $mak->kode; ?>&nbsp;&nbsp;
    </td>
    <td class="uraian">
        <div class="label pull-right">
            <?php echo $mak->sumber_dana; ?>
        </div>
        <?php
        
        echo CHtml::link($mak->detail->uraian, array('/dipa/update/' . $model->id), array(
            'data-toggle' => 'modal',
            'data-target' => '#MakDialog',
            'onclick' => "window.data_id = {$mak->id}; window.data_table = 'Mak';",
            'class' => 'link'
        ));
        ?>
    </td>
    <td class="volume"></td>
    <td class="freq"></td>
    <td class="tarif"></td>
    <td class="jumlah"><?php echo Format::currency($mak->pagu); ?></td>
</tr>