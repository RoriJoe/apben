
<tr class="suboutput">
    <td class="kode">
        <span class="label label-info pull-left">SUB</span>
        <?php echo $suboutput->kode; ?>&nbsp;&nbsp;&nbsp;&nbsp;
    </td>
    <td class="uraian">
        <?php
        
        echo CHtml::link($suboutput->detail->uraian, array('/dipa/update/' . $model->id), array(
            'data-toggle' => 'modal',
            'data-target' => '#SuboutputDialog',
            'onclick' => "window.data_id = {$suboutput->id}; window.data_table = 'Suboutput';",
            'class' => 'link'
        ));
        ?>
    </td>
    <td class="volume"></td>
    <td class="freq"></td>
    <td class="tarif"></td>
    <td class="jumlah"><?php echo Format::currency($suboutput->pagu); ?></td>
</tr>