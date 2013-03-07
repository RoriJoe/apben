
<?php
$this->beginWidget('bootstrap.widgets.TbModal', array(
    'id' => 'DetailInputDialog',
    'events' => array(
        'show' => 'js:function() { 
            if (window.data_id != "" && window.data_table == "DetailInput") {
               url = "' . $this->createUrl('/detailInput/update') . '/" + window.data_id;
               window.data_id = "";
               window.data_table = "";
            } else {
                url = "' . $this->createUrl('/detailInput/create?dpv=' . $model->version . '&dpid=' . $model->id) . '&mid=" + window.mak_id; 
                window.mak_id = "";
            }
            
            $.get(url,
                function(data) {
                    $("#DetailInputDialog .modal-content").html(data);
            });

        }'
    )
));
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Rekam Detail Input</h4>
</div>
<div class="modal-content" style="padding:0px 20px;"></div>
<?php $this->endWidget(); ?>