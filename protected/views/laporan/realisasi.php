<?php
/* @var $this LaporanController */

$this->breadcrumbs = array(
    'Laporan' => array('/laporan'),
    'Realisasi',
);
?>
<h1>Laporan Realisasi</h1>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'laporan-filter-form',
    'enableAjaxValidation' => false,
    'method' => 'get'
        ));
?>
<div class="dipa-group pull-left" style="padding:5px;">
    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'tgl_awal',
        'value' => @$_GET['tgl_awal'],
        'htmlOptions' => array(
            'style' => 'width:100px;margin:0px;text-align:center;',
            'placeholder' => 'Tgl. Awal',
            'readonly' => 'readonly'
        )
    ));
    ?>
    -
    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'tgl_akhir',
        'value' => @$_GET['tgl_akhir'],
        'htmlOptions' => array(
            'style' => 'width:100px;margin:0px;text-align:center;',
            'placeholder' => 'Tgl. Akhir',
            'readonly' => 'readonly'
        )
    ));
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => '',
        'icon' => 'chevron-right',
        'htmlOptions' => array(
            'style' => 'margin:0px;text-align:center;',
        )
    ));
    ?>
</div>

<div class="dipa-group pull-left" style="padding:10px 0px 5px 10px;">
    <label style="float:left;margin-right:10px;display:block">
        <input type="checkbox" checked="checked" style="float:left;"/>
        <div style="float:left;margin-left:2px;"><b>WB</b></div>
    </label>
    <label style="float:left;margin-right:10px;">
        <input type="checkbox" checked="checked" style="float:left;"/>
        <div style="float:left;margin-left:2px;"><b>JC</b></div>
    </label>
    <label style="float:left;margin-right:10px;">
        <input type="checkbox" checked="checked" style="float:left;" /> 
        <div style="float:left;margin-left:2px;"><b>RM</b></div>
    </label>
    <label style="float:left;margin-right:10px;">
        <input type="checkbox" checked="checked" style="float:left;" /> 
        <div style="float:left;margin-left:2px;"><b>RMP</b></div>
    </label>
</div>

<?php $this->endWidget(); ?>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'laporan-grid',
    'dataProvider' => $dataProvider,
    'summaryText' => '',
    'columns' => array(
        array(
            'header' => 'OUTPUT',
            'name' => 'kode_output'
        ),
        array(
            'header' => 'SUBOUTPUT',
            'name' => 'kode_suboutput'
        ),
        array(
            'header' => 'MAK',
            'name' => 'kode'
        ),
        array(
            'header' => 'Sumber Dana',
            'name' => 'sumber_dana'
        ),
        array(
            'header' => 'Pagu',
            'value' => 'Format::currency($data["pagu"])'
        ),
        array(
            'header' => 'Realisasi SPP',
            'value' => 'Format::currency($data["realisasi_spp"])'
        ),
        array(
            'header' => '% SPP',
            'value' => 'round($data["prosentase_spp"],2) . "%"'
        ),
        array(
            'header' => 'Realisasi SPM',
            'value' => 'Format::currency($data["realisasi_spm"])'
        ),
        array(
            'header' => '% SPM',
            'value' => 'round($data["prosentase_spm"],2) . "%"'
        ),
        array(
            'header' => 'Realisasi SP2D',
            'value' => 'Format::currency($data["realisasi_sp2d"])'
        ),
        array(
            'header' => '% SP2D',
            'value' => 'round($data["prosentase_sp2d"],2) . "%"'
        ),
    )
));
?>

<script type="text/javascript">
    function ac(nStr) {
        nStr += '';
        var x = nStr.split('.');
        var x1 = x[0];
        var x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        return x1 + x2;
    }
    sum = [0, 0, 0, 0, 0, 0, 0];
    $("#laporan-grid tr.odd, #laporan-grid td.even").each(function(i, item) {
        sum[0] += $(this).find("td:eq(4)").text().replace(/\./g, "") * 1;
        sum[1] += $(this).find("td:eq(5)").text().replace(/\./g, "") * 1;
        sum[2] += $(this).find("td:eq(6)").text().replace(/\%/g, "") * 1;
        sum[3] += $(this).find("td:eq(7)").text().replace(/\./g, "") * 1;
        sum[4] += $(this).find("td:eq(8)").text().replace(/\%/g, "") * 1;
        sum[5] += $(this).find("td:eq(9)").text().replace(/\./g, "") * 1;
        sum[6] += $(this).find("td:eq(10)").text().replace(/\%/g, "") * 1;
    });
    tr = $("#laporan-grid tr:last").clone();
    tr.find("td").text("");
    tr.find("td:eq(4)").addClass("sum").text(ac(sum[0]));
    tr.find("td:eq(5)").addClass("sum").text(ac(sum[1]));
    tr.find("td:eq(6)").addClass("sum").text(sum[2] + "%");
    tr.find("td:eq(7)").addClass("sum").text(ac(sum[3]));
    tr.find("td:eq(8)").addClass("sum").text(sum[4] + "%");
    tr.find("td:eq(9)").addClass("sum").text(ac(sum[5]));
    tr.find("td:eq(10)").addClass("sum").text(sum[6] + "%");
    tr.insertAfter("#laporan-grid tr:last");
</script>