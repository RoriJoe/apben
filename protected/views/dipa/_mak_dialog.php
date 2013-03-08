
<?php
$this->beginWidget('bootstrap.widgets.TbModal', array(
    'id' => 'MakDialog',
    'events' => array(
        'show' => 'js:function() { 
            if (window.data_id != "" && window.data_table == "Mak") {
               url = "' . $this->createUrl('/mak/update') . '/" + window.data_id;
               window.data_id = "";
               window.data_table = "";
            } else {
                url = "' . $this->createUrl('/mak/create?dpv=' . $model->version . '&dpid=' . $model->uid) . '&soid=" + window.suboutput_uid; 
                window.suboutput_uid = "";
            }
            
            $.get(url,
                function(data) {
                    $("#MakDialog .modal-content").html(data);
            });

        }'
    )
));
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Rekam MAK</h4>
</div>
<div class="modal-content" style="padding:0px 20px;"></div>
<?php $this->endWidget(); ?>