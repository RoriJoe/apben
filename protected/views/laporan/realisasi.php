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
    'action' => "?",
    'method' => 'get'
        ));
?>
<div class="dipa-group pull-left" style="padding:5px;">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'button',
        'type' => '',
        'icon' => 'remove',
        'htmlOptions' => array(
            'id' => 'reset-form',
            'style' => 'margin:0px;text-align:center;',
        )
    ));
    ?>
    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'name' => 'tgl_awal',
        'value' => @$_GET['tgl_awal'],
        'htmlOptions' => array(
            'style' => 'width:110px;margin:0px;text-align:center;',
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
            'style' => 'width:110px;margin:0px;text-align:center;',
            'placeholder' => 'Tgl. Akhir',
            'readonly' => 'readonly'
        )
    ));
    ?>
    <?php echo CHtml::hiddenField('options', @$_GET['options']); ?>
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

<div id="sumber_dana" class="dipa-group pull-left" style="padding:10px 0px 5px 10px;">
    <label style="float:left;margin-right:10px;display:block">
        <input class="sumber_dana" data="wb" type="checkbox" checked="checked" style="float:left;"/>
        <div style="float:left;margin-left:2px;"><b>WB</b></div>
    </label>
    <label style="float:left;margin-right:10px;">
        <input class="sumber_dana" data="jc" type="checkbox" checked="checked" style="float:left;"/>
        <div style="float:left;margin-left:2px;"><b>JC</b></div>
    </label>
    <label style="float:left;margin-right:10px;">
        <input class="sumber_dana" data="rm" type="checkbox" checked="checked" style="float:left;" /> 
        <div style="float:left;margin-left:2px;"><b>RM</b></div>
    </label>
    <label style="float:left;margin-right:10px;">
        <input class="sumber_dana" data="rmp" type="checkbox" checked="checked" style="float:left;" /> 
        <div style="float:left;margin-left:2px;"><b>RMP</b></div>
    </label>
</div>

<div id="mak" class="dipa-group pull-left" style="padding:10px 0px 5px 10px;">
</div>

<div id="sp" class="dipa-group pull-left" style="padding:10px 0px 5px 10px;">
    <label style="float:left;margin-right:10px;display:block">
        <input class="sp" data="spp" type="checkbox" checked="checked" style="float:left;"/>
        <div style="float:left;margin-left:2px;"><b>SPP</b></div>
    </label>
    <label style="float:left;margin-right:10px;">
        <input class="sp" data="spm" type="checkbox" checked="checked" style="float:left;"/>
        <div style="float:left;margin-left:2px;"><b>SPM</b></div>
    </label>
    <label style="float:left;margin-right:10px;">
        <input class="sp" data="sp2d" type="checkbox" checked="checked" style="float:left;" /> 
        <div style="float:left;margin-left:2px;"><b>SP2D</b></div>
    </label>
</div>
<div id="export_print" class="dipa-group pull-left" style="padding:5px;">
    
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'link',
        'url' => 'realisasi_excel',
        'type' => '',
        'label' => 'Unduh Excel',
        'icon' => 'share',
        'htmlOptions' => array(
        )
    ));
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'button',
        'type' => '',
        'label' => 'Print',
        'icon' => 'print',
        'htmlOptions' => array(
            'onclick' => 'window.print()'
        )
    ));
    ?>
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
    $(function() {
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

        function applyOptions() {
            $act = $("#options").val();
            if ($act != "") {
                $act = JSON.parse($act);
                $($act.sumber_dana).each(function() {
                    $(".sumber_dana[data=" + this + "]").prop("checked", false);
                });

                $($act.mak).each(function() {
                    $(".mak[data=" + this + "]").prop("checked", false);
                });

                $(".mak:not(:checked)").change();
                $(".sumber_dana:not(:checked)").change();
            }
        }

        function generateOptions() {
            $sumber_dana = [];
            $(".sumber_dana:not(:checked)").each(function() {
                $sumber_dana.push($(this).attr('data'));
            });

            $mak = [];
            $(".mak:not(:checked)").each(function() {
                $mak.push($(this).attr('data'));
            });


            $act = {
                'sumber_dana': $sumber_dana,
                'mak': $mak
            };

            $("#options").val(JSON.stringify($act));
        }

        function generateMAK() {
            $mak = [];
            $("#laporan-grid tr.odd, #laporan-grid tr.even").each(function() {
                $mak[$(this).find("td:eq(2)").text().trim().substr(0, 2)] = 1;
            });

            for (k in $mak) {
                $mak = $("#sumber_dana label:last").clone();
                $mak.find('input').removeClass("sumber_dana").addClass("mak").attr('data', k);
                $mak.find("b").text(k);
                $mak.appendTo("#mak");
            }
        }
        generateMAK();

        function calculate() {
            sum = [0, 0, 0, 0, 0, 0, 0];
            $(".sum-tr").remove();
            $("#laporan-grid tr.odd, #laporan-grid tr.even").each(function(i, item) {
                if ($(this).css('display') != "none") {
                    sum[0] += $(this).find("td:eq(4)").text().replace(/\./g, "") * 1;
                    sum[1] += $(this).find("td:eq(5)").text().replace(/\./g, "") * 1;
                    sum[2] += $(this).find("td:eq(6)").text().replace(/\%/g, "") * 1;
                    sum[3] += $(this).find("td:eq(7)").text().replace(/\./g, "") * 1;
                    sum[4] += $(this).find("td:eq(8)").text().replace(/\%/g, "") * 1;
                    sum[5] += $(this).find("td:eq(9)").text().replace(/\./g, "") * 1;
                    sum[6] += $(this).find("td:eq(10)").text().replace(/\%/g, "") * 1;
                }
            });
            tr = $("#laporan-grid tr:last").clone().addClass("sum-tr").show();
            tr.find("td").text("");
            tr.find("td:eq(4)").addClass("sum").text(ac(sum[0]));
            tr.find("td:eq(5)").addClass("sum").text(ac(sum[1]));
            tr.find("td:eq(6)").addClass("sum").text(sum[2] + "%");
            tr.find("td:eq(7)").addClass("sum").text(ac(sum[3]));
            tr.find("td:eq(8)").addClass("sum").text(sum[4] + "%");
            tr.find("td:eq(9)").addClass("sum").text(ac(sum[5]));
            tr.find("td:eq(10)").addClass("sum").text(sum[6] + "%");
            tr.insertAfter("#laporan-grid tr:last");
        }

        $(".sumber_dana").change(function() {
            sd = $(this).attr("data").toUpperCase();
            checked = $(this).is(':checked');
            $("#laporan-grid tr.odd, #laporan-grid tr.even").each(function() {
                if ($(this).find("td:eq(3)").text().trim() == sd) {
                    if (checked)
                        $(this).show();
                    else
                        $(this).hide();
                }
            });

            calculate();
            generateOptions();
        });

        $(".mak").change(function() {
            sd = $(this).attr("data");
            checked = $(this).is(':checked');
            $("#laporan-grid tr.odd, #laporan-grid tr.even").each(function() {
                if ($(this).find("td:eq(2)").text().trim().substr(0, 2) == sd) {
                    if (checked)
                        $(this).show();
                    else
                        $(this).hide();
                }
            });

            calculate();
            generateOptions();
        });

        $(".sp").change(function() {
            sd = $(this).attr("data");
            checked = $(this).is(':checked');
            $("#laporan-grid tr").each(function() {

                if (sd == "spp")
                    $sp = $(this).find("td:eq(5),td:eq(6),th:eq(5),th:eq(6)");
                else if (sd == "spm")
                    $sp = $(this).find("td:eq(7),td:eq(8),th:eq(7),th:eq(8)");
                else if (sd == "sp2d")
                    $sp = $(this).find("td:eq(9),td:eq(10),th:eq(9),th:eq(10)");

                if (checked)
                    $sp.show();
                else
                    $sp.hide();
            });

            calculate();
            generateOptions();
        });

        applyOptions();
        calculate();
    });

</script>