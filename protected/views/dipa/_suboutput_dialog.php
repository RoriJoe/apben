
<?php
$this->beginWidget('bootstrap.widgets.TbModal', array(
    'id' => 'SuboutputDialog',
    'events' => array(
        'show' => 'js:function() { 
            if (window.data_id != "" && window.data_table == "Suboutput") {
               url = "' . $this->createUrl('/suboutput/update') . '/" + window.data_id;
               window.data_id = "";
               window.data_table = "";
            } else {
                url = "' . $this->createUrl('/suboutput/create?dpv=' . $model->version . '&dpid=' . $model->uid) . '&oid=" + window.output_uid; 
                window.output_uid = "";
            }
            
            $("#SuboutputDialog .modal-content").html("<center><br><br><br><img src=\"'.$this->createUrl('/static/images/loading.gif').'\" /><br><br><br><br></center>");
            
            $.get(url,
                function(data) {
                    $("#SuboutputDialog .modal-content").html(data);
            });

        }'
    )
));
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Rekam Suboutput</h4>
</div>
<div class="modal-content" style="padding:0px 20px;"></div>
<?php $this->endWidget(); ?>