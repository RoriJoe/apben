
<tr class="detail-input">
    <td class="kode">
        <span class="label pull-left">DTL</span>
    </td>
    <td class="uraian">
        <?php
        echo CHtml::link($detail->uraian, array('/dipa/update/' . $model->id), array(
            'data-toggle' => 'modal',
            'data-target' => '#DetailInputDialog',
            'onclick' => "window.data_id = {$detail->id}; window.data_table = 'DetailInput';",
            'class' => 'link'
        ));
        ?>
    </td>
    <td class="volume">
        <?php echo $detail->volume . " " .$detail->satuan_volume; ?>        
    </td>
    <td class="freq">
        <?php echo $detail->frequensi . " " .$detail->satuan_frequensi; ?>
    </td>
    <td class="tarif">
        <?php echo Format::currency($detail->tarif); ?>
    </td>
    <td class="jumlah">
        <?php echo Format::currency($detail->jumlah); ?>
    </td>
</tr>