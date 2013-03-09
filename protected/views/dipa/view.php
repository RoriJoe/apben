
<?php
$this->breadcrumbs = array(
    'DIPA' => array('admin'),
    $model->nomor_dipa . " ({$model->tanggal_dipa})",
);

$down_icon = "icon-folder-close";
$up_icon = "icon-folder-open";
?>
<div id="ajax-page">
    <div id="dipa-versi">
        <div class="dipa-group pull-left">
            <div class="pull-left" style="margin:1px 0px 0px -7px;">
                Revisi: <b><?php echo $model->version; ?></b>
            </div>
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'link',
                'size' => 'mini',
                'url' => array('/dipa/view/' . $model->uid . "?rev=" . ($model->version - 1)),
                'icon' => 'chevron-left',
                'htmlOptions' => array(
                    'hide' => 'no',
                    'class' => 'pull-left',
                    'style' => 'margin:0px -10px 0px 15px;'
                )
            ));
            ?>
            <?php
            if ($model->version != $version) {
                $this->widget('bootstrap.widgets.TbButton', array(
                    'buttonType' => 'link',
                    'size' => 'mini',
                    'url' => array('/dipa/view/' . $model->uid . "?rev=" . ($model->version + 1)),
                    'icon' => 'chevron-right',
                    'htmlOptions' => array(
                        'hide' => 'no',
                        'class' => 'pull-left',
                        'style' => 'margin:0px -10px 0px 15px;'
                    )
                ));
            }
            ?>
        </div>
        <?php
        if (!$readonly) {
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'link',
                'size' => 'small',
                'type' => 'success',
                'url' => array('/dipa/kalkulasi/' . $model->id),
                'icon' => 'check white',
                'label' => 'Kalkulasi ulang',
                'htmlOptions' => array(
                    'class' => 'pull-right',
                )
            ));
        }
        ?>
        <?php
        if (!$readonly) {
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'link',
                'size' => 'small',
                'icon' => 'trash',
                'label' => 'Mode Hapus',
                'toggle' => true,
                'htmlOptions' => array(
                    'id' => 'mode-hapus',
                    'class' => 'pull-right',
                    'style' => 'margin:0px 5px 0px 0px;',
                    'onclick' => ' $(".hapus").toggle(); '
                )
            ));
        }
        ?>
        <div class="pull-right dipa-group" style="padding:0px 0px 3px 3px;margin-top:-1px;">
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
                    'style' => 'margin-left:3px;margin-top:2px;',
                    'onclick' => 'return confirm("Apakah Anda yakin?")'
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
            <td class="uraian">
                <b>
                    <?php
                    if ($readonly) {
                        echo $model->satker;
                    } else {
                        echo CHtml::link($model->satker, array('/dipa/update/' . $model->id), array('class' => 'link'));
                    }
                    ?>
                </b>
            </td>
            <td class="volume"></td>
            <td class="freq"></td>
            <td class="tarif"></td>
            <td class="jumlah"><?php echo Format::currency($model->pagu); ?></td>
        </tr>
        <tr class="dipa">
            <td class="kode"><?php echo $model->kode_kegiatan; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td class="uraian">
                <?php
                if ($readonly) {
                    echo $model->kegiatan;
                } else {
                    echo CHtml::link($model->kegiatan, array('/dipa/update/' . $model->id), array('class' => 'link'));
                }
                ?>
            <td class="volume"></td>
            <td class="freq"></td>
            <td class="tarif"></td>
            <td class="jumlah"><?php echo Format::currency($model->pagu); ?></td>
        </tr>

        <?php include("_dipa_buttons.php"); ?>

        <?php
        $template = false;
        $outputs = $model->output;

        if (!$readonly) {
            echo $output_new;
        }
        foreach ($outputs as $output) {
            if ($output->dipa_version != $model->version)
                continue;

            include("_output.php");
            $suboutputs = $output->suboutput;

            if (!$readonly) {
                echo str_replace("[output_uid]", $output->uid, $suboutput_new);
                echo $output_new;
            }

            foreach ($suboutputs as $suboutput) {
                if ($suboutput->dipa_version != $model->version)
                    continue;

                include("_suboutput.php");
                $maks = $suboutput->mak;

                if (!$readonly) {
                    echo str_replace("[suboutput_uid]", $suboutput->uid, $mak_new);
                    echo str_replace("[output_uid]", $output->uid, str_replace("arrow-right", "arrow-down", $suboutput_new));
                }

                foreach ($maks as $mak) {
                    if ($mak->dipa_version != $model->version)
                        continue;

                    include("_mak.php");
                    $details = $mak->detail_input;


                    if (!$readonly) {
                        echo str_replace("[mak_uid]", $mak->uid, $detailinput_new);
                        echo str_replace("[suboutput_uid]", $suboutput->uid, str_replace("arrow-right", "arrow-down", $mak_new));
                    }

                    foreach ($details as $detail) {
                        if ($detail->dipa_version != $model->version)
                            continue;

                        include("_detailinput.php");


                        if (!$readonly) {
                            echo str_replace("[mak_uid]", $mak->uid, $detailinput_new);
                            echo str_replace("[suboutput_uid]", $suboutput->uid, str_replace("arrow-right", "arrow-down", $mak_new));
                        }
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

    <div id="template" style="display:none;">
        <?php $template = true; ?>
        <table class="output-table">
            <?php include("_output.php"); ?>
        </table>
        <table class="suboutput-table">
            <?php include("_suboutput.php"); ?>
        </table>
        <table class="mak-table">
            <?php include("_mak.php"); ?>
        </table>
        <table class="detailinput-table">
            <?php include("_detailinput.php"); ?>
        </table>
    </div>


    <script type="text/javascript">
        window.data_id = "";
        window.data_table = "";
        window.output_uid = "";
        window.suboutput_uid = "";
        window.mak_uid = "";


        function getTreeClass($class) {
            switch ($class) {
                case "detail-input":
                    return ".item.detail-input,.item.mak,.item.suboutput,.item.output";
                    break;
                case "mak":
                    return ".item.mak,.item.suboutput,.item.output";
                    break;
                case "suboutput":
                    return ".item.suboutput,.item.output";
                    break;
                case "output":
                    return ".item.output";
                    break;
            }
        }

        function downOneLevel($class) {
            switch ($class) {
                case "detail-input":
                    return "";
                    break;
                case "mak":
                    return "detail-input";
                    break;
                case "suboutput":
                    return "mak";
                    break;
                case "output":
                    return "suboutput";
                    break;
            }
        }

        function getNextItem($item) {
            $item = $item.next();
            while (!$item.hasClass('item') && $item.length > 0) {
                $item = $item.next();
            }
            return $item;
        }
        $(function() {
            $(document).on('click', '.hapus', function(e) {
                $parent = $(this).parent().parent();
                $class = $parent.attr('class').replace('item', '').trim();
                $url = '<?php echo $this->createUrl("/[item]/delete/[id]"); ?>';
                $url = $url.replace('[id]', $parent.attr('item-id'));
                $url = $url.replace('[item]', $parent.attr('item-type'));

                $.post($url, function(data) {
                    $childs = $parent.nextUntil(getTreeClass($class));
                    $parent.remove();
                    $childs.remove();
                });

                e.preventDefault();
                return false;
            });

            $(".kode .label").click(function(e) {
                if (!$("#mode-hapus").hasClass("active")) {
                    $parent = $(this).parent().parent();
                    $class = $parent.attr('class').replace('item', '').replace('active', '').trim();
                    $icon = $(this).find('i');
                    if ($icon.length > 0) {
                        $icon_class = $icon.attr('class').replace('icon-white', '').trim();
                        $down_icon = '<?php echo $down_icon; ?>';
                        $up_icon = '<?php echo $up_icon; ?>';

                        $childs = $parent.nextUntil(getTreeClass($class), '.item');
                        $btns = $parent.nextUntil(getTreeClass($class), '.newbtn');
                        $btns.hide();

                        if ($icon_class == $up_icon) {
                            $(this).addClass("always_show");

                            $childs.hide();
                            $icon.removeClass($up_icon).addClass($down_icon);
                        } else {
                            $(this).removeClass("always_show");

                            $down = downOneLevel($class);
                            $childs.each(function() {
                                if ($(this).hasClass($down)) {
                                    $(this).show();
                                } else if ($(this).find("label i").hasClass($up_icon)) {
                                    $(this).show();
                                }
                            });
                            $icon.removeClass($down_icon).addClass($up_icon);
                        }
                    }
                }

                e.preventDefault();
                return false;
            });

            $(document).on("click", '.kode', function() {
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
                $(".newbtn").hide();
                $("#sh-sub,#sh-mak").attr("hide", "no");

                $hidden = $("#sh-out").attr("hide");
                
                if ($hidden == "yes") {
                    $(".item.suboutput,.item.mak,.item.detail-input").show();
                    $("#sh-out").attr("hide", "no");
                    
                    $(".item.output .label,.item.suboutput .label,.item.mak .label")
                            .removeClass("always_show")
                            .find('i')
                            .removeClass('<?php echo $down_icon; ?>')
                            .removeClass('<?php echo $up_icon; ?>')
                            .addClass('<?php echo $up_icon; ?>');
                } else {
                    $(".item.suboutput,.item.mak,.item.detail-input").hide();
                    $("#sh-out").attr("hide", "yes");

                    $(".item.output .label,.item.suboutput .label,.item.mak .label")
                            .removeClass("always_show")
                            .find('i')
                            .removeClass('<?php echo $down_icon; ?>')
                            .removeClass('<?php echo $up_icon; ?>')
                            .addClass('<?php echo $down_icon; ?>');
                }
            });

            $("#sh-sub").click(function() {
                $(".newbtn").hide();
                $("#sh-out,#sh-mak").attr("hide", "no");
                $(".item.suboutput").show();

                $hidden = $("#sh-sub").attr("hide");
                
                if ($hidden == "yes") {
                    $(".item.mak,.item.detail-input").show();
                    $("#sh-sub").attr("hide", "no");

                    $(".item.suboutput .label, .item.mak .label")
                            .removeClass("always_show")
                            .find('i')
                            .removeClass('<?php echo $down_icon; ?>')
                            .removeClass('<?php echo $up_icon; ?>')
                            .addClass('<?php echo $up_icon; ?>');

                } else {
                    $(".item.mak,.item.detail-input").hide();
                    $("#sh-sub").attr("hide", "yes");

                    $(".item.suboutput .label, .item.mak .label")
                            .removeClass("always_show")
                            .find('i')
                            .removeClass('<?php echo $down_icon; ?>')
                            .removeClass('<?php echo $up_icon; ?>')
                            .addClass('<?php echo $down_icon; ?>');
                }
            });

            $("#sh-mak").click(function() {
                $(".newbtn").hide();
                $("#sh-out,#sh-sub").attr("hide", "no");
                $(".item.suboutput,.item.mak").show();

                $hidden = $("#sh-mak").attr("hide");

                if ($hidden == "yes") {
                    $(".item.detail-input").show();
                    $("#sh-mak").attr("hide", "no");

                    $(".item.mak .label")
                            .removeClass("always_show")
                            .find('i')
                            .removeClass('<?php echo $down_icon; ?>')
                            .removeClass('<?php echo $up_icon; ?>')
                            .addClass('<?php echo $up_icon; ?>');
                } else {
                    $(".item.detail-input").hide();
                    $("#sh-mak").attr("hide", "yes");

                    $(".item.mak .label")
                            .removeClass("always_show")
                            .find('i')
                            .removeClass('<?php echo $down_icon; ?>')
                            .removeClass('<?php echo $up_icon; ?>')
                            .addClass('<?php echo $down_icon; ?>');
                }
            });

        });
    </script>
</div>