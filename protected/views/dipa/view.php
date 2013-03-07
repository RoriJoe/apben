
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
    <tr class="dipa">
        <td class="kode"><?php echo $model->nomor_dipa; ?></td>
        <td class="uraian"><b><?php echo CHtml::link($model->satker, array('/dipa/update/' . $model->id), array('class' => 'link'));
        ?></b></td>
        <td class="volume"></td>
        <td class="freq"></td>
        <td class="tarif"></td>
        <td class="jumlah"></td>
    </tr>
    <tr class="dipa">
        <td class="kode"><?php echo $model->kode_kegiatan; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td class="uraian"><?php echo CHtml::link($model->kegiatan, array('/dipa/update/' . $model->id), array('class' => 'link')); ?></td>
        <td class="volume"></td>
        <td class="freq"></td>
        <td class="tarif"></td>
        <td class="jumlah"></td>
    </tr>

    <?php include("_dipa_buttons.php"); ?>

    <?php
    $outputs = $model->output;

    if (count($outputs) > 0) {
        echo $output_new;
    }
    foreach ($outputs as $output) {
        include("_output.php");
        $suboutputs = $output->suboutput;

        echo str_replace("[output_id]", $output->uid, $suboutput_new);
        echo $output_new;

        foreach ($suboutputs as $suboutput) {
            include("_suboutput.php");
            $maks = $suboutput->mak;

            echo str_replace("[suboutput_id]", $suboutput->uid, $mak_new);
            echo str_replace("[output_id]", $output->uid, str_replace("arrow-right", "arrow-down", $suboutput_new));

            foreach ($maks as $mak) {
                include("_mak.php");
                $details = $mak->detail_input;

                echo str_replace("[mak_id]", $mak->uid, $detailinput_new);
                echo str_replace("[suboutput_id]", $suboutput->uid, str_replace("arrow-right", "arrow-down", $mak_new));

                foreach ($details as $detail) {
                    include("_detailinput.php");
                    echo str_replace("[mak_id]", $mak->uid, $detailinput_new);
                    echo str_replace("[suboutput_id]", $suboutput->uid, str_replace("arrow-right", "arrow-down", $mak_new));
                }
            }
        }
    }
    ?>

</table>


<?php
include("_output_dialog.php");
include("_suboutput_dialog.php");
include("_mak_dialog.php");
include("_detailinput_dialog.php");
?>

<script type="text/javascript">
    window.data_id = "";
    window.data_table = "";
    window.output_id = "";
    window.suboutput_id = "";
    window.mak_id = "";

    $(function() {
        $(".kode").click(function() {
            $next = $(this).parent().next();
            $parent = $(this).parent();

            if (!$parent.hasClass("active")) {
                $parent.addClass("active");
                while ($next.hasClass('newbtn')) {
                    $next.show();
                    $next = $next.next();
                }
            } else {
                $parent.removeClass("active");
                while ($next.hasClass('newbtn')) {
                    $next.hide();
                    $next = $next.next();
                }
            }
        });
    });
</script>