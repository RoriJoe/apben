
<tr class="output">
    <td class="kode">
        <span class="label label-success pull-left">OUT</span>
        <?php echo $output->kode; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </td>
    <td class="uraian">
        <?php
        
        echo CHtml::link($output->detail->uraian, array('/dipa/update/' . $model->id), array(
            'data-toggle' => 'modal',
            'data-target' => '#OutputDialog',
            'onclick' => "window.data_id = {$output->id}; window.data_table = 'Output';",
            'class' => 'link'
        ));
        ?>
    </td>
    <td class="volume"></td>
    <td class="freq"></td>
    <td class="tarif"></td>
    <td class="jumlah"></td>
</tr>