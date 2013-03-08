
<?php
$this->beginWidget('bootstrap.widgets.TbModal', array(
    'id' => 'OutputDialog',
    'events' => array(
        'show' => 'js:function() { 
            if (window.data_id != "" && window.data_table == "Output") {
               url = "' . $this->createUrl('/output/update') . '/" + window.data_id;
               window.data_id = "";
               window.data_table = "";
            } else {
                url = "' . $this->createUrl('/output/create?dpv=' . $model->version . '&dpid=' . $model->uid) . '"; 
            }
            
            $.get(url,
                function(data) {
                    $("#OutputDialog .modal-content").html(data);
            });

        }'
    )
));
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Rekam Output</h4>
</div>
<div class="modal-content" style="padding:0px 20px;"></div>
<?php $this->endWidget(); ?>