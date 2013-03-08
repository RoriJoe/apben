
<?php ob_start(); ?>
<tr class="newbtn output">
    <td class="kode"></td>
    <td class="uraian">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'link',
            'type' => 'success',
            'size' => 'small',
            'icon' => 'arrow-down white',
            'label' => 'Rekam Output Baru',
            'htmlOptions' => array(
                'class' => 'dipa-btn',
                'data-toggle' => 'modal',
                'data-target' => '#OutputDialog',
            )
        ));
        ?>
    </td>
    <td colspan="4"></td>
</tr>
<?php $output_new = ob_get_clean(); ?>
<?php ob_start(); ?>
<tr class="newbtn suboutput">
    <td class="kode"></td>
    <td class="uraian">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'link',
            'size' => 'small',
            'type' => 'info',
            'icon' => 'arrow-right white',
            'label' => 'Rekam Suboutput Baru',
            'htmlOptions' => array(
                'class' => 'dipa-btn',
                'data-toggle' => 'modal',
                'data-target' => '#SuboutputDialog',
                'onclick' => "window.output_uid = [output_uid];"
            )
        ));
        ?>
    </td>
    <td colspan="4"></td>
</tr>
<?php $suboutput_new = ob_get_clean(); ?>
<?php ob_start(); ?>
<tr class="newbtn mak">
    <td class="kode"></td>
    <td class="uraian">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'link',
            'size' => 'small',
            'type' => 'danger',
            'icon' => 'arrow-right white',
            'label' => 'Rekam MAK Baru',
            'htmlOptions' => array(
                'class' => 'dipa-btn',
                'data-toggle' => 'modal',
                'data-target' => '#MakDialog',
                'onclick' => "window.suboutput_uid = [suboutput_uid];"
            )
        ));
        ?>
    </td>
    <td colspan="4"></td>
</tr>
<?php $mak_new = ob_get_clean(); ?>
<?php ob_start(); ?>
<tr class="newbtn detail-input">
    <td class="kode"></td>
    <td class="uraian">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'link',
            'size' => 'small',
            'icon' => 'arrow-right',
            'label' => 'Rekam Detail Input Baru',
            'htmlOptions' => array(
                'class' => 'dipa-btn',
                'data-toggle' => 'modal',
                'data-target' => '#DetailInputDialog',
                'onclick' => "window.mak_uid = [mak_uid];"
            )
        ));
        ?>
    </td>
    <td colspan="4"></td>
</tr>
<?php $detailinput_new = ob_get_clean(); ?>