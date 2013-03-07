
<?php
$this->breadcrumbs = array(
    'DIPA' => array('admin'),
    $model->nomor_dipa . " ({$model->tanggal_dipa})",
);
?>
<div id="ajax-page">
    <div id="dipa-versi">
        <?php
        if (!$readonly) {
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'link',
                'size' => 'small',
                'url' => array('/dipa/kalkulasi/' . $model->id),
                'icon' => 'check',
                'label' => 'Kalkulasi ulang',
                'htmlOptions' => array(
                    'class' => 'pull-right',
                )
            ));
        }
        ?>
        <div class="dipa-group pull-left">
            <div class="pull-left" style="margin:1px 0px 0px -7px;">
                Revisi: <b><?php echo $model->version; ?></b>
            </div>
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'link',
                'size' => 'mini',
                'url' => array('/dipa/view/' . $model->id . "?rev=" . ($model->version - 1)),
                'icon' => 'chevron-left',
                'htmlOptions' => array(
                    'hide' => 'no',
                    'class' => 'pull-left',
                    'style' => 'margin:0px 0px 0px 15px;'
                )
            ));
            ?>
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'link',
                'size' => 'mini',
                'url' => array('/dipa/view/' . $model->id . "?rev=" . ($model->version + 1)),
                'icon' => 'chevron-right',
                'htmlOptions' => array(
                    'hide' => 'no',
                    'class' => 'pull-left',
                    'style' => 'margin:0px -10px 0px 5px;'
                )
            ));
            ?>
        </div>
        <div class="pull-right dipa-group" style="padding:0px 0px 3px 3px;">
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'link',
                'size' => 'mini',
                'type' => 'danger',
                'label' => 'MAK',
                'htmlOptions' => array(
                    'id' => 'sh-mak',
                    'hide' => 'no',
                    'class' => 'pull-right',
                    'style' => 'margin-right:3px;margin-top:3px;'
                )
            ));
            ?>
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'link',
                'size' => 'mini',
                'type' => 'info',
                'label' => 'SUB',
                'htmlOptions' => array(
                    'id' => 'sh-sub',
                    'hide' => 'no',
                    'class' => 'pull-right',
                    'style' => 'margin-right:3px;margin-top:3px;'
                )
            ));
            ?>
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'link',
                'size' => 'mini',
                'type' => 'success',
                'label' => 'OUT',
                'htmlOptions' => array(
                    'id' => 'sh-out',
                    'hide' => 'no',
                    'class' => 'pull-right',
                    'style' => 'margin-right:3px;margin-top:3px;'
                )
            ));
            ?>
        </div>
        <?php
        if (!$readonly) {
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'link',
                'url' => array('/dipa/saverev/' . $model->id),
                'size' => 'small',
                'icon' => 'book',
                'label' => 'Simpan Revisi',
                'htmlOptions' => array(
                    'class' => 'pull-left',
                    'style' => 'margin-left:3px;margin-top:2px;'
                )
            ));
        }
        ?>
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
            <td class="jumlah"><?php echo Format::currency($model->pagu); ?></td>
        </tr>
        <tr class="dipa">
            <td class="kode"><?php echo $model->kode_kegiatan; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td class="uraian"><?php echo CHtml::link($model->kegiatan, array('/dipa/update/' . $model->id), array('class' => 'link')); ?></td>
            <td class="volume"></td>
            <td class="freq"></td>
            <td class="tarif"></td>
            <td class="jumlah"><?php echo Format::currency($model->pagu); ?></td>
        </tr>

        <?php include("_dipa_buttons.php"); ?>

        <?php
        $outputs = $model->output;

        echo $output_new;
        foreach ($outputs as $output) {
            if ($output->dipa_version != $model->version)
                continue;

            include("_output.php");
            $suboutputs = $output->suboutput;

            echo str_replace("[output_id]", $output->id, $suboutput_new);
            echo $output_new;

            foreach ($suboutputs as $suboutput) {
                if ($suboutput->dipa_version != $model->version)
                    continue;

                include("_suboutput.php");
                $maks = $suboutput->mak;

                echo str_replace("[suboutput_id]", $suboutput->id, $mak_new);
                echo str_replace("[output_id]", $output->id, str_replace("arrow-right", "arrow-down", $suboutput_new));

                foreach ($maks as $mak) {
                    if ($mak->dipa_version != $model->version)
                        continue;

                    include("_mak.php");
                    $details = $mak->detail_input;

                    echo str_replace("[mak_id]", $mak->id, $detailinput_new);
                    echo str_replace("[suboutput_id]", $suboutput->id, str_replace("arrow-right", "arrow-down", $mak_new));

                    foreach ($details as $detail) {
                        if ($detail->dipa_version != $model->version)
                            continue;

                        include("_detailinput.php");
                        echo str_replace("[mak_id]", $mak->id, $detailinput_new);
                        echo str_replace("[suboutput_id]", $suboutput->id, str_replace("arrow-right", "arrow-down", $mak_new));
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
            function getNextItem($item) {
                $item = $item.next();
                while (!$item.hasClass('item') && $item.length > 0) {
                    $item = $item.next();
                }
                return $item;
            }

            $('.hapus').on('click', function(e) {
                $parent = $(this).parent().parent();
                $parent.addClass('menghapus');

                $url = '<?php echo $this->createUrl("/[item]/delete/[id]"); ?>';

                $url = $url.replace('[id]', $parent.attr('item-id'));
                $url = $url.replace('[item]', $parent.attr('item-type'));

                console.debug($url);

                $.post($url, function(data) {
                    $parent.hide();
                });

                e.preventDefault();
                return false;
            });

            /*
             $(".kode .label").click(function(e) {
             $parent = $(this).parent().parent();
             $class = $parent.attr('class').replace('item', '').trim();
             $next = getNextItem($parent);
             
             if ($class == 'mak') {
             while (!$next.hasClass('mak') && !$next.hasClass('suboutput') && !$next.hasClass('output')) {
             $next.hide();
             $next = getNextItem($next);
             }
             } else if ($class == 'suboutput') {
             while (!$next.hasClass('suboutput') && !$next.hasClass('output')) {
             $next.hide();
             $next = getNextItem($next);
             }
             } else if ($class == 'output') {
             while (!$next.hasClass('output')) {
             $next.hide();
             $next = getNextItem($next);
             }
             }
             
             e.preventDefault();
             return false;
             });
             */

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

            $("#sh-out").click(function() {
                $("#sh-sub,#sh-mak").attr("hide", "no");

                $hidden = $("#sh-out").attr("hide");
                if ($hidden == "yes") {
                    $(".item.suboutput,.item.mak,.item.detail-input").show();
                    $("#sh-out").attr("hide", "no");
                } else {
                    $(".item.suboutput,.item.mak,.item.detail-input").hide();
                    $("#sh-out").attr("hide", "yes");
                }
            });

            $("#sh-sub").click(function() {
                $("#sh-out,#sh-mak").attr("hide", "no");
                $(".item.suboutput").show();

                $hidden = $("#sh-sub").attr("hide");

                if ($hidden == "yes") {
                    $(".item.mak,.item.detail-input").show();
                    $("#sh-sub").attr("hide", "no");
                } else {
                    $(".item.mak,.item.detail-input").hide();
                    $("#sh-sub").attr("hide", "yes");
                }
            });

            $("#sh-mak").click(function() {
                $("#sh-out,#sh-sub").attr("hide", "no");
                $(".item.suboutput,.item.mak").show();

                $hidden = $("#sh-mak").attr("hide");

                if ($hidden == "yes") {
                    $(".item.detail-input").show();
                    $("#sh-mak").attr("hide", "no");
                } else {
                    $(".item.detail-input").hide();
                    $("#sh-mak").attr("hide", "yes");
                }
            });

        });
    </script>
</div>