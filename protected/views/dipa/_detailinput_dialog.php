
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
                url = "' . $this->createUrl('/detailInput/create?dpv=' . $model->version . '&dpid=' . $model->uid) . '&mid=" + window.mak_uid; 
                window.mak_uid = "";
            }
            $("#DetailInputDialog .modal-content").html("<center><br><br><br><img src=\"'.$this->createUrl('/static/images/loading.gif').'\" /><br><br><br><br></center>");
                
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