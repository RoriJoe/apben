
<?php
$this->breadcrumbs = array(
    'DIPA' => array('admin'),
    $model->nomor_dipa . " ({$model->tanggal_dipa})",
);
?>

<div id="dipa-versi">
    <div class="dipa-group">
        <div class="pull-left">
            Revisi: <b><?php echo $model->version; ?></b>
        </div>
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'link',
            'size' => 'mini',
            'icon' => 'check',
            'label' => 'Simpan revisi ini',
            'htmlOptions' => array(
                'class' => 'pull-left',
                'style' => 'margin-left:10px;display:none;'
            )
        ));
        ?>
    </div>
    <div class="clearfix"></div>
</div>

<table id="dipa-table" class="table table-bordered table-condensed">
    <tr>
        <th style="width:10%;">Kode</th>
        <th style="width:50%;">Uraian</th>
        <th style="width:10%;">Volume</th>
        <th style="width:10%;">Frequensi</th>
        <th style="width:10%;">Tarif</th>
        <th style="width:10%;">Jumlah</th>
    </tr>
    <tr>
        <td class="kode"><?php echo $model->nomor_dipa; ?></td>
        <td class="uraian"><b><?php echo CHtml::link($model->satker, array('/dipa/update/' . $model->id)); ?></b></td>
        <td class="volume"></td>
        <td class="freq"></td>
        <td class="tarif"></td>
        <td class="jumlah"></td>
    </tr>
    <tr>
        <td class="kode"><?php echo $model->kode_kegiatan; ?></td>
        <td class="uraian"><?php echo CHtml::link($model->kegiatan, array('/dipa/update/' . $model->id)); ?></td>
        <td class="volume"></td>
        <td class="freq"></td>
        <td class="tarif"></td>
        <td class="jumlah"></td>
    </tr>

    <?php ob_start(); ?>
    <tr>
        <td></td>
        <td colspan="5">
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'link',
                'url' => array('/output/create?dpv=' . $model->version . '&dpid=' . $model->id),
                'type' => 'success',
                'size' => 'small',
                'icon' => 'arrow-down white',
                'label' => 'Rekam Output Baru'
            ));
            ?>
        </td>
    </tr>
    <?php $output_new = ob_get_clean(); ?>

    <?php
    $outputs = $model->output;

    foreach ($outputs as $output) {
        
    }
    echo $output_new;
    ?>

</table>